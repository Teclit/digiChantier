<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
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
