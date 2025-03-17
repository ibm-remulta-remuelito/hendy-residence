<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Pages extends MX_Controller {
    
    var $data;

    public function __construct()
    {
        parent::__construct();
        $this->data         = array(
            'page_content'  => FALSE
        );
        modules::run('layout/autoload/initiate');
        $this->data['form_result'] = (object) array('form_name' => FALSE, 'form_success' => FALSE);
    }

    public function index()
    {
        if(isset($_SESSION['member'])) {
            redirect('members');
        }
        session_destroy();

        $this->data['meta_keywords']    = '';
        $this->data['meta_description'] = '';
        $this->data['meta_title']       = '';
        $this->data['template']         = 'home';

        $this->data['site_name']        = config_item('site_name');       
        $this->data['css']              = config_item('css');
        $this->data['js']               = config_item('js');
        
        if ($this->input->post('ref'))
        {
            $this->data['form_result'] = $this->_contact_submission($this->data);
        }

        $page = $this->uri->segment(1);
        if(!$page) $page = 'home';
        if ( ! file_exists('application/modules/pages/views/'.$page.'.php') )
        {
            // Whoops, we don't have a page for that!
            return show_404();
        }

        $this->data['menu'] = config_item('menu');
        $this->data['page_name'] = $page;

        $this->data['page_content'] = $this->load->view($page, $this->data, TRUE);
        $this->load->view('template', $this->data);
    }

    function _contact_submission($data = FALSE) 
    {
        $form = $this->input->post('ref'); 

        $method = '_'.$form.'_form_validation';

        if (is_callable(array($this, $method))) 
        {

            call_user_func(array($this, $method));

            $this->form_validation->set_error_delimiters('', '<br />');
        
            if($this->form_validation->run()) 
            {   
                $this->load->library('leadmonitor');
                $leadmonitor_sent = $this->leadmonitor->process_request($_POST);
              
                if($leadmonitor_sent)
                {
                    $this->form_validation->clear_field_data();
                    return (object) array('form_name' => $form, 'form_success' => TRUE);
                } 

            }
        }
        unset($_POST['ref']);
        return (object) array('form_name' => $form, 'form_success' => FALSE);
    }

     private function _general_enquiry_form_validation()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim');
    }

    public function sitemap()
    {
        $this->data['pages'] = config_item('menu');

        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view('sitemap', $this->data);
    }
}