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

    
    /**
     *REgister new  Sous Category
     *
     * @param ArrayObject $data
     * @return Boolean
     */
    public function CreateSousctg($data){

        $this->db->query('INSERT INTO souscategory (sctgnom, idctg) VALUES(:nomSctg, :idCtg)');
        //Bind values
        $this->db->bind(':nomSctg',   $data['nomSctg']);
        $this->db->bind(':idCtg',     $data['idCtg']);
        //Execute function
        if ($this->db->execute()) {
            return  true;
        } else {
            return   false;
        }
    }


    /**
     * Update Sous Category
     * @param ArrayObject $data
     * @return Boolean
     */
    public function UpdateSousctg($data) {
        $this->db->query('UPDATE souscategory SET sctgnom =:nomSctg, idctg=:idCtg WHERE idsctg=:idSctg' );
        //Bind values
        $this->db->bind(':nomSctg',   $data['nomSctg']);
        $this->db->bind(':idCtg', $data['idCtg']);
        $this->db->bind(':idSctg', $data['idSctg']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }




    /**
     * Delete Sous Category
     * @param ArrayObject $data
     * @return Boolean
     */
    public function DeleteSousctg($data) { 
        $this->db->query('DELETE FROM souscategory WHERE idsctg=:idSctg');
        $this->db->bind(':idSctg', $data['idSctg']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }



}
