<?php 

/**
* CSV Library
*/
class Csv 
{
	
	var $file_name 		= 'export.csv';
	var $file_path;
	var $delimiter 		= ",";
	var $titles 		= FALSE;

	function __construct()
	{
		$this->file_path = ROOT.config_item('export_file_path');
		// Needed for MACS
		ini_set('auto_detect_line_endings',TRUE);
	}

	function records_to_csv($data = FALSE)
	{
		if(!$data) return FALSE;

		//make the directory
		if(!is_dir($this->file_path)) make_folder($this->file_path);

		//if we have titles then add them to the array
		if($this->titles) array_unshift($data, $this->titles);


		// get our pointer and start writing our file, 
		// then close the pointer
		$fp = fopen($this->file_path.$this->file_name, 'w');
		foreach ($data as $key => $row) 
		{
			fputcsv($fp, (array)$row, $this->delimiter);
		}

		fclose($fp);
	}

	function download_csv($data = FALSE)
	{
		if(!$data) return FALSE;

		$this->records_to_csv($data);

		// make sure it's a file before doing anything!
		if(is_file($this->file_path.$this->file_name))
		{
			$ci =& get_instance();
			// required for IE
		    if(ini_get('zlib.output_compression')) { ini_set('zlib.output_compression', 'Off'); }

		    // get the file mime type using the file extension
		    $ci->load->helper('file');

		    $mime = get_mime_by_extension($this->file_path.$this->file_name);

		    // Build the headers to push out the file properly.
		    header('Pragma: public');     // required
		    header('Expires: 0');         // no cache
		    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		    header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($this->file_path.$this->file_name)).' GMT');
		    header('Cache-Control: private',false);
		    header('Content-Type: '.$mime);  // Add the mime type from Code igniter.
		    header('Content-Disposition: attachment; filename="'.basename($this->file_name).'"');  // Add the file name
		    header('Content-Transfer-Encoding: binary');
		    header('Content-Length: '.filesize($this->file_path.$this->file_name)); // provide file size
		    header('Connection: close');
		    readfile($this->file_path.$this->file_name); // push it out

		    @unlink($this->file_path.$this->file_name);
		    exit();
		}
	}

	function set_titles($title_array)
	{
		$this->titles = $title_array;
	}

	function set_file_name($file_name)
	{
		$this->file_name = $file_name;
	}

	/**
     * @access    public
     * @param    string
     * @param    boolean
     * @return    array
     */
    function parse_file($file_path, $remove_title = FALSE) 
    {
        $content 	= FALSE;
        $file 		= fopen($file_path, 'r');

        //loop over the lines and get the data
        while(($row = fgetcsv($file)) != FALSE ) 
        {            
        	// skip empty lines
            if( $row[0] != null ) 
            {
                $content[] = $row;
            }
        }
        fclose($file);

        //if there are titles then remove them from the return
        if($remove_title)
        {
        	unset($content[0]);
        }
        return $content;
    }
}
