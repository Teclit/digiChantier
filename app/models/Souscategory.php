<?php
class Souscategory {
    private $db;
    
    /**
     *  
     */
    public function __construct() {
        $this->db = new Database;
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    public function findAllSousCategories() {
        $this->db->query('SELECT * FROM  souscategory');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * Undocumented function
     *
     * @param Int $idsctg
     * @return object
     */
    public function findSousCategoryByID(Int $idsctg) {
        $this->db->query('SELECT * FROM  souscategory WHERE idsctg = :idsctg');
        $this->db->bind(':idsctg', $idsctg);
        $row = $this->db->single();
        return $row;
    }


    /**
     * Undocumented function
     *
     * @param Int $idsctg
     * @param Int $idctg
     * @return array
     */
    public function findSousCategoryByGroup(Int $idctg) {
        $this->db->query('SELECT * FROM  souscategory WHERE idctg = :idctg');
        $this->db->bind(':idctg', $idctg);
        $results = $this->db->resultSet();
        return $results;
    }



}
