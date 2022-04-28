<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function register($data) {
        $this->db->query('INSERT INTO users (firstName, lastName,  userTel, userEmail, userName, userPassword, roleID) 
        VALUES(:firstName, :lastName, :userTel, :userEmail, :userName,  :userPassword, :roleID)');

        //Bind values
        $this->db->bind(':firstName', $data['firstName']);
        $this->db->bind(':lastName', $data['lastName']);
        $this->db->bind(':userTel', $data['userTel']);
        $this->db->bind(':userEmail', $data['userEmail']);
        $this->db->bind(':userName', $data['userName']);
        $this->db->bind(':userPassword', $data['userPassword']);
        $this->db->bind(':roleID', $data['userRoleID']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($userEmail, $userPassword) {
        $this->db->query('SELECT * FROM users WHERE userName = :userName');

        //Bind value
        $this->db->bind(':userName', $userEmail);
        $this->db->bind(':userName', $userPassword);
        $row = $this->db->single();
        // $hashedPassword = $row->userPassword;
        // if (password_verify($userPassword, $hashedPassword)) {
        //     return $row;
        // } else {
        //     return false;
        // }

        return $row;
    }

    //Find user by userEmail. userEmail is passed in by the Controller.
    public function findUserByEmail($userEmail) {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE userEmail = :userEmail');

        //userEmail param will be binded with the userEmail variable
        $this->db->bind(':userEmail', $userEmail);

        //Check if userEmail is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

}
