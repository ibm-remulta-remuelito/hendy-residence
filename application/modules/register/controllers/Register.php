<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Register extends MX_Controller {
    
    var $data;

    /**
     * Constructor
     *
     * Initializes the Register controller by calling the parent constructor, 
     * setting up the default data array, running the layout autoload module, 
     * initializing form result object, and loading the register model.
     */
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

    /**
     * Displays the registration page.
     *
     * This function sets up the default data array, sets various meta and template data, 
     * and loads the register view.
     */
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

    /**
     * Handles the member registration process.
     *
     * This function receives the user input from the registration form, uses the register model to create a new member, 
     * and then redirects the user to the password registration page.
     */
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

    /**
     * Handles the registration success and redirects to the password registration page.
     *
     * This function takes the registration status as an argument and sets up the default data array, sets various meta and template data, 
     * and loads the password registration view.
     *
     * @param object $registration_status The status of the registration which includes the form name, success status, form message, and member id.
     */
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

    /**
     * Handles the password registration process.
     *
     * This function receives the user input from the password registration form, uses the register model to create a new password, 
     * and then redirects the user to the login page.
     */
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

    /**
     * Updates member information.
     *
     * This function retrieves member data from a POST request and uses the register model to update the member's information.
     * If the update is successful, it sets the form result data and redirects to the members page.
     */
    public function update() {
        $member_data = $this->input->post();
        $member_id = $this->register_model->update($member_data);
        if ($member_id) {
            $this->data['form_result'] = (object) array('form_name' => 'register', 'form_success' => TRUE, 'member_id' => $member_id);
            redirect('members');
        }
    }
}
