<?php

Class Lead {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
    

    /**
     * Find all leads
     * @return ArrayObject
     */
    public function findAllLeads() {
        $this->db->query('SELECT * FROM  lead 
        LEFT JOIN souscategory ON lead.idsctg = souscategory.idsctg
        LEFT JOIN  category   ON  category.idctg = souscategory.idctg  
        ORDER BY date_inscrption DESC');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * Find all leads
     * @return ArrayObject
     */
    public function findSearchLead($search) {
        $search=strtolower($search);
        $this->db->query("SELECT * FROM lead  
        JOIN prixlead ON lead.idprix = prixlead.nbleads 
        WHERE LOWER(nom) LIKE :search OR LOWER(prenom) LIKE :search OR LOWER(email) LIKE :search 
        OR LOWER(adresse) LIKE :search OR LOWER(ville) LIKE :search OR codepostal LIKE :search OR tel  LIKE :search
        ORDER BY nom, prenom, email, adresse, ville, codepostal, tel  ASC ");
        $this->db->bind(':search', '%'.$search.'%');
        $results = $this->db->resultSet();
        
        return $results;
            
    }



    /**
     * Get lead by id
     *
     * @param Integer $id
     * @return ArrayObject
     */
    public function findLeadById(int $id){
        $this->db->query(' SELECT * FROM  lead 
                LEFT JOIN souscategory ON lead.idsctg = souscategory.idsctg
                LEFT JOIN  category   ON  category.idctg = souscategory.idctg
                WHERE lead.idlead = :idlead');
        $this->db->bind(':idlead', $id);
        $row = $this->db->single();
        return $row;
    }



    /**
     * Register new lead
     *
     * @param ArrayObject $data
     * @return Boolean
     */
    public function createLead($data) {
        $this->db->query('INSERT INTO lead (nom, prenom, tel, email, adresse, ville, codepostal,  idsctg, projet)
        VALUES(:nom, :prenom, :tel, :email, :adresse, :ville, :codepostal, :idsctg, :projet)');
    
        //Bind values
        $this->db->bind(':nom',        $data['nomLead']);
        $this->db->bind(':prenom',     $data['prenomLead']);
        $this->db->bind(':tel',        $data['telLead']);
        $this->db->bind(':email',      $data['emailLead']);
        $this->db->bind(':adresse',    $data['adresseLead']);
        $this->db->bind(':ville',      $data['villeLead']);
        $this->db->bind(':codepostal', $data['codepostalLead']);
        $this->db->bind(':idsctg',     $data['natureProjetLead']);
        $this->db->bind(':projet',     $data['projetLead']);

        //Execute function
        if ($this->db->execute()) {
            return  true;
        } else {
            return   false;
        }
    }

    /**
     * Update lead
     * @param ArrayObject $data
     * @return Boolean
     */
    public function UpdateLead($data) {
        $this->db->query('UPDATE lead SET nom=:nom, prenom=:prenom, tel=:tel, email=:email, adresse=:adresse, ville=:ville, codepostal=:codepostal, idsctg=:idsctg, projet=:projet WHERE idlead = :idlead');
        //Bind values
        $this->db->bind(':idlead',     $data['idlead']);
        $this->db->bind(':nom',        $data['nomLead']);
        $this->db->bind(':prenom',     $data['prenomLead']);
        $this->db->bind(':tel',        $data['telLead']);
        $this->db->bind(':email',      $data['emailLead']);
        $this->db->bind(':adresse',    $data['adresseLead']);
        $this->db->bind(':ville',      $data['villeLead']);
        $this->db->bind(':codepostal', $data['codepostalLead']);
        $this->db->bind(':idsctg',     $data['natureProjetLead']);
        $this->db->bind(':projet',     $data['projetLead']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * delete lead
     * @param ArrayObject $data
     * @return Boolean
     */
    public function DeleteLead($idlead) { 

        $this->db->query('DELETE FROM lead WHERE idlead=:idlead ');
        $this->db->bind(':idlead', $idlead);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }



}