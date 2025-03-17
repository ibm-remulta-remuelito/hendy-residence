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
     * Updates member information in the database.
     *
     * This function updates the member's name, email, and phone based on the
     * provided member data array. It locates the member by their ID and executes
     * an update on the 'members' table.
     *
     * @param array $member_data An associative array containing the member's ID,
     *                           name, email, and phone.
     * @return int The ID of the updated member.
     */
    public function update_member($member_data) {
        $member_id = $member_data['member_id'];
        $member = array(
            'name' => $member_data['name'],
            'email' => $member_data['email'],
            'phone' => $member_data['phone']
        );

        $this->db->where('id', $member_id);
        $this->db->update('members', $member);
        return $member_id;
    }

    /**
     * Updates an existing password entry in the database
     *
     * @param int $member_id The ID of the member to update the password for
     * @param string $password The new password to store
     *
     * @return int The ID of the member that was updated
     */
    public function update_password($member_id, $password) {
        $data = array(
            'password' => password_hash($password, PASSWORD_BCRYPT)
        );
        $this->db->where('member_id', $member_id);
        $this->db->update('passwords', $data);
        return $member_id;
    }
}
