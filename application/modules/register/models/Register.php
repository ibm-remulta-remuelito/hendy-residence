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
    }

    /**
     * Registers a new member
     *
     * This method inserts a new member record into the 'members' table with the provided
     * name, email, and phone. It returns the ID of the newly created member.
     *
     * @param string $name  The name of the member.
     * @param string $email The email of the member.
     * @param string $phone The phone number of the member.
     *
     * @return int The ID of the newly created member.
     */
    public function addNewMember($name, $email, $phone)
    {

        // Insert the data into the 'members' table
        // $this->db->insert('members');

        // Return the ID of the newly inserted member
        // return $this->db->insert_id();
    }
}
