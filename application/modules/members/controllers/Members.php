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

    /**
     * Displays the edit member page.
     *
     * This function starts a session and checks if a member is logged in.
     * If a member is logged in, it retrieves the member data via the member model,
     * sets various meta and template data, and loads the edit member view.
     * If not logged in, it destroys the session and redirects to the login page.
     * 
     * @param int $member_id The member ID to be retrieved and edited.
     */
    public function edit($member_id) {
        if(isset($_SESSION['member'])) {
            $member = $this->member_model->get_by_id($member_id);
            $this->data['meta_keywords']    = '';
            $this->data['meta_description'] = '';
            $this->data['meta_title']       = '';
            $this->data['template']         = 'members';

            $this->data['site_name']        = config_item('site_name');       
            $this->data['css']              = config_item('css');
            $this->data['js']               = config_item('js');

            $page = 'edit';

            $this->data['menu'] = config_item('menu');
            $this->data['page_name'] = $page;
            $this->data['member'] = $member;

            $this->data['page_content'] = $this->load->view($page, $this->data, TRUE);
            $this->load->view('template', $this->data);
        } else {
            session_destroy();
            redirect('login');
        }
    }

    /**
     * Displays the confirm delete member page.
     *
     * This function starts a session and checks if a member is logged in.
     * If a member is logged in, it retrieves the member data via the member model,
     * sets various meta and template data, and loads the confirm delete member view.
     * If not logged in, it destroys the session and redirects to the login page.
     * 
     * @param int $member_id The member ID to be retrieved and deleted.
     */
    public function confirm_delete($member_id) {
        if(isset($_SESSION['member'])) {
            $member = $this->member_model->get_by_id($member_id);
            $this->data['meta_keywords']    = '';
            $this->data['meta_description'] = '';
            $this->data['meta_title']       = '';
            $this->data['template']         = 'members';

            $this->data['site_name']        = config_item('site_name');       
            $this->data['css']              = config_item('css');
            $this->data['js']               = config_item('js');

            $page = 'confirm_delete';

            $this->data['menu'] = config_item('menu');
            $this->data['page_name'] = $page;
            $this->data['member'] = $member;

            $this->data['page_content'] = $this->load->view($page, $this->data, TRUE);
            $this->load->view('template', $this->data);
        } else {
            session_destroy();
            redirect('login');
        }
    }

    /**
     * Deletes a member from the database.
     *
     * This function removes a member's record using the member model and then
     * sets a session status message. It finally redirects to the members page.
     *
     * @param int $member_id The ID of the member to be deleted.
     */
    public function delete($member_id) {
        $this->member_model->remove($member_id);
        $_SESSION['status'] = "Member successfully updated/deleted";
        redirect('members');
    }
}
