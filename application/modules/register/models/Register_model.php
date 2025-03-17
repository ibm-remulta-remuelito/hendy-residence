<?php

class register_model extends CI_Model
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

    public function create($name, $email, $phone)
    {
        $data = array(
            'name' => $name,    
            'email' => $email,
            'phone' => $phone
        );
        $this->db->insert('members', $data);
        return $this->db->insert_id() ? $this->db->insert_id() : FALSE;
    }

    public function create_password($member_id, $password) {
        $data = array(
            'member_id' => $member_id,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        );
        $this->db->insert('passwords', $data);
        return $this->db->insert_id() ? TRUE : FALSE;
    }
}
