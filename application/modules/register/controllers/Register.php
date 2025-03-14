<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Register extends MX_Controller {
    
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
        $this->data['meta_keywords']    = '';
        $this->data['meta_description'] = '';
        $this->data['meta_title']       = '';
        $this->data['template']         = 'register';

        $this->data['site_name']        = config_item('site_name');       
        $this->data['css']              = config_item('css');
        $this->data['js']               = config_item('js');

        $page = 'index';

        $this->data['menu'] = config_item('menu');
        $this->data['page_name'] = $page;

        $this->data['page_content'] = $this->load->view($page, $this->data, TRUE);
        $this->load->view('template', $this->data);
    }
}
