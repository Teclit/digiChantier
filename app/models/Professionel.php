<?php
Class Professionel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function findAllProfessionels() {
        $this->db->query('SELECT * FROM  professionel');
        $results = $this->db->resultSet();
        return $results;
    }

}
