<?php
class Category {
    private $db;

    /**
     * Initiate database
     */
    public function __construct() {
        $this->db = new Database;
    }


    /**
     * get all categories
     *
     * @return array
     */
    public function findAllCategories() {
        $this->db->query('SELECT * FROM  category');
        $results = $this->db->resultSet();
        return $results;
    }


    /**
     * Get lead  par  id
     *
     * @param Int $idctg
     * @return object
     */
    public function findCategoryByID(Int $idctg) {
        $this->db->query('SELECT * FROM  category WHERE idctg = :idctg');
        $this->db->bind(':idctg', $idctg);
        $row = $this->db->single();
        return $row;
    }



}
