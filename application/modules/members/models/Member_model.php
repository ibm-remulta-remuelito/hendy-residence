<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class member_model extends CI_Model
{
    /**
     * Class constructor
     *
     * Loads the database class
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Validate a member's login details
     *
     * @param string $email
     * @param string $password
     * @return bool|array
     */
    public function check_if_valid($email, $password) {
        $this->db->where('email', $email);
        $query = $this->db->get('members');

        if (!$member = $query->row()) {
            return FALSE;
        }


        $this->db->where('member_id', $member->id);
        $query = $this->db->get('passwords');
        $password_hash = $query->row()->password;

        return array(
            'is_valid' => password_verify($password, $password_hash),
            'member_data' => $member
        );
    }

    /**
     * Get all members from the database
     *
     * @return array
     */
    public function get_all() {
        $query = $this->db->get('members');

        return $query->result();
    }

    /**
     * Retrieve a member by their ID
     *
     * @param int $id The ID of the member to retrieve
     * @return object|null The member object if found, null otherwise
     */
    public function get_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('members');

        return $query->row();
    }

    /**
     * Remove a member from the database
     *
     * @param int $id The ID of the member to remove
     * @return int The number of rows affected by the deletion
     */
    public function remove($id) {
        $this->db->where('id', $id);
        $this->db->delete('members');

        return $this->db->affected_rows();
    }
}
