<?php

Class Lead {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function findAllLeads() {
        $this->db->query('SELECT * FROM lead  ORDER BY date_inscrption DESC');
        $results = $this->db->resultSet();
        return $results;
    }



}