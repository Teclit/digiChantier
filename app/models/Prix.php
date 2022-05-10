<?php
class Prix {
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
    public function findAllPrixs() {
        $this->db->query('SELECT * FROM  prixlead');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * Undocumented function
     *
     * @param Int $idprix
     * @return object
     */
    public function findPrixByID(Int $idprix) {
        $this->db->query('SELECT * FROM  prixlead WHERE idprix = :idprix');
        $this->db->bind(':idprix', $idprix);
        $row = $this->db->single();
        return $row;
    }


    /**
     * Undocumented function
     *
     * @param Int $idprix
     * @param Int $idprix
     * @return array
     */
    public function findprixleadByGroup(Int $idprix) {
        $this->db->query('SELECT * FROM  prixlead WHERE idprix = :idprix');
        $this->db->bind(':idprix', $idprix);
        $results = $this->db->resultSet();
        return $results;
    }

    
    /**
     *REgister new  Sous Category
     *
     * @param ArrayObject $data
     * @return Boolean
     */
    public function CreatePrix($data){

        $this->db->query('INSERT INTO prixlead (prix, nbleads, codepack) VALUES(:prix, :nbleads, :codepack)');
        //Bind values
        $this->db->bind(':prix',    $data['prix']);
        $this->db->bind(':nbleads', $data['nbleads']);
        $this->db->bind(':codepack', $data['codepack']);
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
    public function UpdatePrix($data) {
        $this->db->query('UPDATE prixlead SET prix=:prix, nbleads=:nbleads, codepack=:codepack WHERE idprix=:idprix' );
        //Bind values
        $this->db->bind(':prix',     $data['prix']);
        $this->db->bind(':nbleads',  $data['nbleads']);
        $this->db->bind(':codepack', $data['codepack']);
        $this->db->bind(':idprix',   $data['idprix']);

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
    public function DeletePrix($data) { 
        $this->db->query('DELETE FROM prixlead WHERE idprix=:idprix');
        $this->db->bind(':idprix', $data['idprix']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }



}
