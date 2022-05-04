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


    /**
     * Find user by email. email is passed in by the Controller.
     *
     * @param String $email
     * @return Boolean
     */
    public function findAdminByEmail(String $email) {
        $this->db->query('SELECT * FROM administrateur WHERE email = :email');
        $this->db->bind(':email', $email);
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     *REgister new  admin
     *
     * @param ArrayObject $data
     * @return Boolean
     */
    public function CreateAdmin($data){

        $this->db->query('INSERT INTO administrateur (nom, prenom, tel, email, password, adresse, ville, codepostal)
        VALUES(:nom, :prenom, :tel, :email, :password, :adresse, :ville, :codepostal)');
        //Bind values
        $this->db->bind(':nom',        $data['nomAdmin']);
        $this->db->bind(':prenom',     $data['prenomAdmin']);
        $this->db->bind(':tel',        $data['telAdmin']);
        $this->db->bind(':email',      $data['emailAdmin']);
        $this->db->bind(':password',   $data['passwordAdmin']);
        $this->db->bind(':adresse',    $data['adresseAdmin']);
        $this->db->bind(':ville',      $data['villeAdmin']);
        $this->db->bind(':codepostal', $data['codepostalAdmin']);
        //Execute function
        if ($this->db->execute()) {
            return  true;
        } else {
            return   false;
        }

    }


    /**
     * Update Admin
     * @param ArrayObject $data
     * @return Boolean
     */
    public function UpdateAdmin($data) {
        $this->db->query('UPDATE administrateur SET nom=:nom, prenom=:prenom, tel=:tel, email=:email, password=:password, adresse=:adresse, ville=:ville, codepostal=:codepostal WHERE id=:id' );
        //Bind values
        $this->db->bind(':nom',        $data['nomAdmin']);
        $this->db->bind(':prenom',     $data['prenomAdmin']);
        $this->db->bind(':tel',        $data['telAdmin']);
        $this->db->bind(':email',      $data['emailAdmin']);
        $this->db->bind(':password',   $data['passwordAdmin']);
        $this->db->bind(':adresse',    $data['adresseAdmin']);
        $this->db->bind(':ville',      $data['villeAdmin']);
        $this->db->bind(':codepostal', $data['codepostalAdmin']);
        $this->db->bind(':id',         $data['idAdmin']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * delete Admin
     * @param ArrayObject $data
     * @return Boolean
     */
    public function DeleteAdmin($data) { 
        $this->db->query('DELETE FROM administrateur WHERE id=:idAdmin');
        $this->db->bind(':idAdmin', $data['idAdmin']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}