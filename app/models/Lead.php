<?php

Class Lead {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }


    /**
     * Find all leads
     *
     * @return array
     */
    public function findAllLeads() {
        $this->db->query('SELECT * FROM lead  ORDER BY date_inscrption DESC');
        $results = $this->db->resultSet();
        return $results;
    }


    /**
     * Find user by email. email is passed in by the Controller.
     *
     * @param String $email
     * @return boolean
     */
    public function findUserByEmail(String $email) {
        $this->db->query('SELECT * FROM lead WHERE email = :email');
        $this->db->bind(':email', $email);

        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Register new lead
     *
     * @param objet $data
     * @return boolean 
     */
    public function createLead($data) {
        $this->db->query('INSERT INTO lead (nom, prenom, tel, email, adresse, ville, codepostal, idctg, idsctg, projet, prix)
        VALUES(:nom, :prenom, :tel, :email, :adresse, :ville, :codepostal, :idctg, :idsctg, :projet, :prix)');
    
        //Bind values
        $this->db->bind(':nom',        $data['nomLead']);
        $this->db->bind(':prenom',     $data['prenomLead']);
        $this->db->bind(':tel',        $data['telLead']);
        $this->db->bind(':email',      $data['emailLead']);
        $this->db->bind(':adresse',    $data['adresseLead']);
        $this->db->bind(':ville',      $data['villeLead']);
        $this->db->bind(':codepostal', $data['codepostalLead']);
        $this->db->bind(':idctg',      $data['typeTravauxLead']);
        $this->db->bind(':idsctg',     $data['natureProjetLead']);
        $this->db->bind(':projet',     $data['projetLead']);
        $this->db->bind(':prix',       $data['prixLead']);

        //Execute function
        if ($this->db->execute()) {
            return  true;
        } else {
            return   false;
        }
    }



}