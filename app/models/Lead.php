<?php

Class Lead {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }


    /**
     * Find all leads
     *
     * @return array
     */
    public function findAllLeads() {
        $this->db->query('SELECT * FROM lead  ORDER BY date_inscrption DESC');
        $results = $this->db->resultSet();
        return $results;
    }


    /**
     * Find user by email. email is passed in by the Controller.
     *
     * @param String $email
     * @return boolean
     */
    public function findUserByEmail(String $email) {
        $this->db->query('SELECT * FROM lead WHERE email = :email');
        $this->db->bind(':email', $email);

        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function createLead($data) {
        // $this->db->query('INSERT INTO users (firstName, lastName,  userTel, userEmail, userName, userPassword, roleID) 
        // VALUES(:firstName, :lastName, :userTel, :userEmail, :userName,  :userPassword, :roleID)');

        // //Bind values
        // $this->db->bind(':firstName', $data['firstName']);
        // $this->db->bind(':lastName', $data['lastName']);
        // $this->db->bind(':userTel', $data['userTel']);
        // $this->db->bind(':userEmail', $data['userEmail']);
        // $this->db->bind(':userName', $data['userName']);
        // $this->db->bind(':userPassword', $data['userPassword']);
        // $this->db->bind(':roleID', $data['userRoleID']);

        // //Execute function
        // if ($this->db->execute()) {
        //     return true;
        // } else {
        //     return false;
        // }
    }



}