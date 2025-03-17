<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members extends MX_Controller
{
    var $data;

    /**
     * Class constructor
     *
     * Calls the parent constructor to initialize the Members controller.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('members/member_model');
    }

    /**
     * Displays the members index page.
     *
     * This function starts a session and checks if a member is logged in.
     * If a member is logged in, it retrieves all members via the member model,
     * sets various meta and template data, and loads the members view.
     * If not logged in, it destroys the session and redirects to the login page.
     */
    public function index() {
        if(isset($_SESSION['member'])) {
            $members = $this->member_model->get_all();

            $this->data['meta_keywords']    = '';
            $this->data['meta_description'] = '';
            $this->data['meta_title']       = '';
            $this->data['template']         = 'members';

            $this->data['site_name']        = config_item('site_name');       
            $this->data['css']              = config_item('css');
            $this->data['js']               = config_item('js');

            $page = 'index';

            $this->data['menu'] = config_item('menu');
            $this->data['page_name'] = $page;
            $this->data['members'] = $members;

            $this->data['page_content'] = $this->load->view($page, $this->data, TRUE);
            $this->load->view('template', $this->data);
        } else {
            session_destroy();
            redirect('login');
        }
    }
}
