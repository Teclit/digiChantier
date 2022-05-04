<?php

Class Administrateur {
    private $db;

    /**
     * instance Datebase
     */
    public function __construct() {
        $this->db = new Database;
    }

    /**
     * Get all Adminstrateur 
     *
     * @return ArrayObject
     */
    public function findAllAdministrateurs() {
        $this->db->query('SELECT * FROM Administrateur');
        $results = $this->db->resultSet();
        return $results;
    }

    
    /**
     * Get Admin by Id
     *
     * @param Integer $idAdmin
     * @return ArrayObject
     */
    public function findAllAdministrateurByID(Int $idAdmin){
        $this->db->query('SELECT * FROM administrateur WHERE id = :id');
        $this->db->bind(':id', $idAdmin);
        $row = $this->db->single();
        return $row;
    }

    // INSERT INTO administrateur(id, nom, prenom, tel, email, password, adresse, ville, codepostal)
    // UPDATE administrateur SET nom=value-2,prenom=value-3,tel=value-4, email=value-5,password=value-6,adresse=value-7,ville=value-8,codepostal=value-9 WHERE id=value-1
    // DELETE FROM administrateur WHERE id=value-1


}