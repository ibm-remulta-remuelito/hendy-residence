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
        $this->load->model('register/register_model');
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

    public function create() {
        $member_data = $this->input->post();
        $member_id = $this->register_model->create($member_data['name'], $member_data['email'], $member_data['phone']);
        if ($member_id) {
            $this->data['form_result'] = (object) array('form_name' => 'register', 'form_success' => TRUE, 'member_id' => $member_id);
            $this->password_registration($this->data['form_result']);
        } else {
            return show_404();
        }
    }

    public function password_registration($registration_status)
    {
        $this->data['meta_keywords']    = '';
        $this->data['meta_description'] = '';
        $this->data['meta_title']       = '';
        $this->data['template']         = 'register';

        $this->data['site_name']        = config_item('site_name');       
        $this->data['css']              = config_item('css');
        $this->data['js']               = config_item('js');

        $page = 'password';

        $this->data['menu'] = config_item('menu');
        $this->data['page_name'] = $page;
        $this->data['form_name'] = $registration_status->form_name;
        $this->data['form_success'] = $registration_status->form_success;
        $this->data['form_message'] = $registration_status->form_message ?? '';
        $this->data['member_id'] = $registration_status->member_id;

        $this->data['page_content'] = $this->load->view($page, $this->data, TRUE);
        $this->load->view('template', $this->data);
    }

    public function create_password() {
        $password_data = $this->input->post();

        if (!$password_data['member_id']) {
            return show_404();
        } else if ($password_data['password'] != $password_data['password_confirm']) {
            $this->data['form_result'] = (object) array(
                'form_name' => 'password',
                'form_success' => FALSE,
                'form_message' => 'Password doesn\'t match',
                'member_id' => $member_id
            );
            $this->password_registration($this->data['form_result']);
        }

        $password_status = $this->register_model->create_password($password_data['member_id'], $password_data['password']);
        if ($password_status) {
            redirect('login');
        } else {
            return show_404();
        }
    }
}
