<?php

Class Administrateur {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function findAllAdministrateurs() {
        $this->db->query('SELECT * FROM Administrateur');
        $results = $this->db->resultSet();
        return $results;
    }



}