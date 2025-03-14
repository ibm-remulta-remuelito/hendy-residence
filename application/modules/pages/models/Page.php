<?php 
class page extends CI_Model {

	var $data = '';
	
	private $_validViewArray;
	private $_ad_status_url_array;

	public function __construct()
	{
		parent::__construct();
		$this->data['x'] = 1;
		$this->load->model('admin/module');
		$this->_validViewArray = array();
	}

	public function fetch($id = FALSE, $args = FALSE)
	{
		if(!$id) return FALSE;

		$this->db->where('id', $id);
		if($args) $this->db->where($args);

		$query = $this->db->get('pages', 1);
		
		return ($query->num_rows() == 1)? $query->row() : FALSE;
	}

	public function fetch_by($args = FALSE)
	{
		if($args) $this->db->where($args);

		$query = $this->db->get('pages');
		
		return ($query->num_rows() > 0)? $query->result() : FALSE;
	}

	public function get_children($parent_id = FALSE)
	{
		if(!$parent_id) return FALSE;
		$this->db->where('parent_id >=', 0);
		$query = $this->db->where('parent_id', $parent_id)->get('pages');
		
		return ($query->num_rows() > 0)? $query->result() : FALSE;

	}

	public function get_first_child($parent_id = FALSE)
	{
		if(!$parent_id) return FALSE;
		$query = $this->db->where(array('parent_id' => $parent_id, 'status' => 1))->get('pages', 1);
		
		return ($query->num_rows() == 1)? $query->row() : FALSE;

	}

	public function image_by_permalink($safe_name = FALSE)
	{
		if(!$safe_name) return FALSE;
		$query = $this->db->select('image')->where(array('permalink' => $safe_name,))->get('pages', 1);
		
		return ($query->num_rows() == 1)? $query->row()->image : FALSE;

	}

	public function step_sitemap($parent_id = 0, $return = array())
	{
		//view('here');
		$this->db->where('parent_id', $parent_id);
		$this->db->where('status', 1);                    //published
		$this->db->order_by('display_order');
		$query = $this->db->get('pages');

		$return = array();

		if($query->num_rows() > 0) 
		{
			foreach($query->result() as $row) 
			{
				$return['home'.$row->id] = base_url($row->permalink);
				$children = $this->step_sitemap($row->id, $return);
				//view($children);
				if ($children) 
				{
					//view($this->db->last_query());
					foreach ($children as $key => $child) 
					{
						//if(!isset($child->permalink)) view($children);
						$return[$key] = $child;
					}
				}
			}
		}
		else
			return FALSE;

		//view($return);
		return (count($return) > 0)? $return : FALSE;
	}

	/**
	 * This function tries to find the first child page of any INDEPENDENT page.
	 * If Child page is found, Page ACTIVE RECORD Object is returned,
	 * If Child page is NOT found, FALSE is returned
	 *
	 * 
	 * @return active record / FALSE
	 */
	public function get_first()
	{
		//get the first page
		$this->db->where('parent_id >=', 0);
		$query = $this->db->where(array('parent_id' => 0, 'display_order >' => 0, 'status' => 1))->order_by('display_order')->get('pages');
		if($query->num_rows() === 0) return false;
		
		$firstChildPage = false;
		foreach($query->result() as $row)
		{
			$firstChildPage = $this->first_step($row);
			if($firstChildPage === false)
				continue;
			else
				break;
		}
		return $firstChildPage;
	}

	public function get_next_first($existing_page = FALSE)
	{
		if(!$existing_page) return false;
		$this->db->where('parent_id >=', 0);
		$query = $this->db->where(array('parent_id' => $existing_page->parent_id, 'display_order >' => $existing_page->display_order, 'id <>' => $existing_page->id))->order_by('display_order')->get('pages', 1);
		if($query->num_rows() === 1) 
			return $query->row();
		$this->db->where('parent_id >=', 0);
		$query = $this->db->select('display_order')->where(array('id' => $existing_page->parent_id, 'status' => 1))->get('pages', 1);
		if($query->num_rows() == 0) 
			return false;

		$currentParentOrder = $query->row()->display_order;
		$this->db->where('parent_id >=', 0);
		$query = $this->db->where(array('parent_id' => 0, 'id <>' => $existing_page->parent_id, 'status' => 1, 'display_order > ' => $currentParentOrder))->order_by('display_order')->get('pages');    
		if($query->num_rows() === 0) return false;
		
		foreach($query->result() as $row)
		{
			$firstChildPage = $this->first_step($row);
			if($firstChildPage === false)
				continue;
			else
				break;       
		}

		if($firstChildPage !== false)
			return $firstChildPage;
		else
		{
			$result = $query->result();
			return $result[0];
		}    
			
	}

	public function get_any_page($permalink = FALSE)
	{
		if(!$permalink) return false;

		$query = $this->db->where(array('permalink' => $permalink, 'status' => 1))->order_by('display_order')->get('pages', 1);

		if($query->num_rows() === 1) 
			return $query->row();
		
		return false;

	}

	public function first_step($page)
	{
		$this->db->where('parent_id >=', 0);
	   //get the first page
		$query = $this->db->where(array('parent_id' => $page->id, 'status' => 1))->order_by('display_order')->get('pages', 1);
		if($query->num_rows() === 1) 
			return $query->row();
		
		return false;
	}

	public function search($search_term = FALSE)
	{
		if(!$search_term) return FALSE;

		$search_term = trim(str_replace('%', ' ', $search_term));
		$search_term = str_replace(' ', '%', $search_term);

		$fields = array(
			'pages.title',
			'pages.detail',
			'pages.meta_keywords',
			'pages.meta_description'
		);

		//$search_term = $this->db->escape_like_str($search_term);

		$this->db->select('gallery_images.main, pages.permalink, pages.detail, pages.title');

		foreach($fields as $field)
		{
			$this->db->or_like($field, $search_term);
		}

		$this->db->join('gallery_images', 'gallery_images.gallery_id = pages.gallery_id', 'left');
		$this->db->group_by('pages.permalink');
		$this->db->order_by('pages.display_order');
		$query = $this->db->get('pages');
		//view($this->db->last_query());

		return ($query->num_rows() > 0) ? $query->result() : FALSE;
	}

	public function get_content($content_id)
	{
		$this->db->where('MD5(id)', $content_id);
		$query = $this->db->get('wells_content_tbl');

		return ($query->num_rows() == 1)? $query->row() : FALSE;
	}

	/**
	 * get a page based on url
	 * @param String $permalink
	 * @return active record
	 */
	public function get_permalink($permalink)
	{
		if(trim($permalink) == '') {
			$this->db->where('parent_id', 0);
			$this->db->order_by('display_order');
		} else {
			$this->db->where('permalink', rtrim($permalink, '/').'/');
		}
		
		$query = $this->db->get('pages', 1);
		//view($this->db->last_query());
		return ($query->num_rows() == 1)? $query->row() : FALSE;
	}

	/**
	 * checks if there is an old page
	 * @param String $permalink
	 * @return bool | header
	 */
	public function redirects($permalink = FALSE)
	{
		$this->db->where('from', rtrim($permalink, '/').'/');
		$query = $this->db->get('redirects', 1);
		if($query->num_rows() == 1)
		{
			$row = $query->row();
			redirect($row->to, $row->header);
		}
		return FALSE;
	}


	public function footer_links($column = FALSE)
	{
		$this->db->where('column', $column);
		$this->db->order_by('display_order');
		$query = $this->db->get('footer_links');
		return ($query->num_rows() > 0)? $query->result() : FALSE;
	}

	private function _checkAndFetchViewFileForModule($viewFileLocation, $moduleTypeName)
	{
		if(isset($this->_validViewArray[$viewFileLocation]))
			return $this->_validViewArray[$viewFileLocation];
		
		if(file_exists(VIEW_PATH.$viewFileLocation.'.php'))
			$this->_validViewArray[$viewFileLocation] = $viewFileLocation;
		else
		{
			if(($moduleTypeName = trim($moduleTypeName)) === '')
			{   
				$locationArray = explode('/', $viewFileLocation);
				$moduleTypeName = $locationArray[count($locationArray)-1];
			}
			
			if($viewFileLocation === 'modules/default/'.$moduleTypeName)
				$this->_validViewArray[$viewFileLocation] = '';
			else 
			{
				if(file_exists(VIEW_PATH.'modules/default/'.$moduleTypeName.'.php'))
					$this->_validViewArray[$viewFileLocation] = 'modules/default/'.$moduleTypeName;
				else 
					$this->_validViewArray[$viewFileLocation] = '';
			}                   
		}
		return $this->_validViewArray[$viewFileLocation];
	}
	

	#####################################################################################################################################################################################
	#####################################################################################################################################################################################
	#																						Modules
	#####################################################################################################################################################################################
	#####################################################################################################################################################################################

	// the magic is done here
	public function make_page($page_row)
	{
		if (!$page_row || !is_object($page_row))
			return false;
		
		$html 		= '';
		$modules 	= config_item('module_type');
		$page_rows 	= $this->get_page_rows($page_row->id);
		$return 	= array('html' => FALSE, 'data' => FALSE);
		if ($page_rows) 
		{
			foreach ($page_rows as $row_key => $row) 
			{
				$columns = $this->get_row_colums($row->id);
				if ($columns) 
				{
					foreach ($columns as $column_key => $column) 
					{
						//check to see if its a fixed_module
						if (strpos($column->module_type, 'fixed_module:') !== FALSE) 
						{
							die('sdf');
							$segments = explode(':', $column->module_type);
							$return['html'][$row_key][$column_key] = modules::run('columns/fixed_module', $segments[1], $column, $row);
						}
						else
						{
							$return['html'][$row_key][$column_key] = modules::run('columns/'.$column->module_type, $column, $row);							
						}					
						$return['data'][$row_key][$column_key] = $column;
					}
				}
			}
		}
		return $return;
	}

	function get_page_rows($page_id = FALSE)
	{
		if(!$page_id) return FALSE;

		$query = $this->db->query('SELECT * FROM page_rows WHERE page_id = ? ORDER BY sequence', array($page_id));
		return ($query->num_rows() > 0)? $query->result() : FALSE;
	}

	function get_row_colums($row_id = FALSE)
	{
		if(!$row_id) return FALSE;

		$query = $this->db->query('SELECT * 
			FROM page_row_columns 
			LEFT JOIN page_row_column_contents
			ON page_row_column_contents.page_row_column_id = page_row_columns.id
			WHERE page_row_id = ? 
			ORDER BY sequence', array($row_id));
		return ($query->num_rows() > 0)? $query->result() : FALSE;
	}
	
}