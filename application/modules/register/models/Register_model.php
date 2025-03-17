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

    /**
     * Creates a new member entry in the database
     *
     * @param string $name
     * @param string $email
     * @param string $phone
     *
     * @return int|false The ID of the newly created entry or false on failure
     */
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

    /**
     * Creates a new password entry in the database
     *
     * @param int $member_id
     * @param string $password
     *
     * @return bool TRUE if the password was created successfully, FALSE otherwise
     */
    public function create_password($member_id, $password) {
        $data = array(
            'member_id' => $member_id,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        );
        $this->db->insert('passwords', $data);
        return $this->db->insert_id() ? TRUE : FALSE;
    }

    /**
     * Updates an existing member entry in the database
     *
     * @param array $member_data An associative array containing the member data to update, including the 'id' key
     *
     * @return int The ID of the updated member
     */
    public function update($member_data) {
        $member_id = $member_data['member_id'];
        unset($member_data['member_id']);

        $this->db->where('id', $member_id);
        $this->db->update('members', $member_data);
        return $member_id;
    }
}
