<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MX_Controller {

    var $data;

    /**
     * Constructor
     *
     * This constructor calls the parent constructor, initiates the layout
     * autoload, and loads the members model.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->data         = array(
            'page_content'  => FALSE
        );
        modules::run('layout/autoload/initiate');
        $this->data['form_result'] = (object) array('form_name' => FALSE, 'form_success' => FALSE);
    }

    /**
     * Displays the login page.
     *
     * This function starts a session and checks if a member is logged in.
     * If a member is logged in, it retrieves all members via the member model,
     * sets various meta and template data, and loads the members view.
     * If not logged in, it destroys the session and redirects to the login page.
     */
    public function index()
    {
        $this->data['meta_keywords']    = '';
        $this->data['meta_description'] = '';
        $this->data['meta_title']       = '';
        $this->data['template']         = 'login';

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
     * Verifies member login credentials.
     *
     * This function loads the member model and retrieves the posted login credentials.
     * It checks the validity of the credentials using the model's method. If the credentials
     * are invalid, it destroys the session, sets an error message, and reloads the login page.
     * If the credentials are valid, it serializes and stores the member data in the session,
     * and redirects to the members page.
     */
    public function verify() {
        $this->load->model('members/member_model');
        $credentials = $this->input->post();
        $valid_member = $this->member_model->check_if_valid($credentials['email'], $credentials['password']);

        session_start();
        if( ! $valid_member) {
            session_destroy();
            $this->data['form_result'] = (object) array('form_name' => 'login', 'form_success' => FALSE, 'form_message' => 'Invalid login credentials.');
            $this->index();
        }

        $_SESSION['member'] = serialize($valid_member);
        redirect('members');
    }

    /**
     * Logs out the current user.
     *
     * This function starts a session, destroys the session, and redirects to the login page.
     */
    public function logout() {
        session_start();
        session_destroy();
        redirect('login');
    }
}
