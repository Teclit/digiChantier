<?php
class Category {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function findAllCategories() {
        $this->db->query('SELECT * FROM  category');
        $results = $this->db->resultSet();
        return $results;
    }



}
