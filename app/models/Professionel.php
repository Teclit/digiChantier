<?php
Class Professionel {
    private $db;

    /**
     * Iniciate database
     */
    public function __construct() {
        $this->db = new Database;
    }

    /**
     * professionel login
     *
     * @param ArrayObject $data
     * @return object/boolean
     */
    public function LoginPro($data) {
        $this->db->query('SELECT * FROM professionel WHERE emailcontact=:emailcontact');
        //Bind value
        $this->db->bind(':emailcontact', $data['userEmail']);
        $row = $this->db->single();
        
        if(!empty($row)){
            if (password_verify($data['userPassword'], $row->password)) {
                return $row;
            }
        } else {
            return false;
        }
    }


    /**
     * Get all Professionels
     *
     * @return void
     */
    public function findAllProfessionels() {
        $this->db->query('SELECT * FROM  professionel');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * Find all leads
     * @param String
     * @return ArrayObject
     * 
     */
    public function findSearchPro($search) {
        $search=strtolower($search);
        $this->db->query("SELECT * FROM professionel  WHERE LOWER(nom) LIKE :search OR LOWER(nomcontact) LIKE :search  
        OR LOWER(prenomcontact) LIKE :search OR LOWER(emailcontact) LIKE :search  OR LOWER(fonctioncontact) LIKE :search 
        OR LOWER(adresse) LIKE :search OR LOWER(ville) LIKE :search OR codepostal LIKE :search OR telcontact LIKE :search
        ORDER BY nom, nomcontact, prenomcontact, emailcontact, adresse, ville, codepostal, telcontact  ASC ");
        $this->db->bind(':search', '%'.$search.'%');
        $results = $this->db->resultSet();
        
        return $results;
        
    }


    /**
     * Get Professionel by Id
     *
     * @param Integer $idPro
     * @return ArrayObject
     */
    public function findProfessionelByID(Int $idPro){
        $this->db->query('SELECT * FROM professionel WHERE idpro = :idPro');
        $this->db->bind(':idPro', $idPro);
        $row = $this->db->single();
        return $row;
    }

    /**
     * Get Professionel by Email
     *
     * @param String $email
     * @return ArrayObject
     */
    public function GetProsByEmail(String $email){
        $this->db->query('SELECT * FROM professionel WHERE emailcontact = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        return $row;
    }


    /**
     * Find Professionel by email. email is passed in by the Controller.
     *
     * @param ArrayObject $email
     * @return Boolean
     */
    public function findProByEmail($data) {
        $this->db->query('SELECT COUNT(*) As nbemail FROM professionel WHERE emailcontact=:emailcontact');
        $this->db->bind(':emailcontact', $data['emailPro']);
        $result = $this->db->single();
        if($result->nbemail > 0) {
            return true;
        } else {
            return false;
        }
    }
    

    /**
     * Get alltravaux
     *
     * @return void
     */
    public function GetJob($data) {
       // SELECT * FROM  lead WHERE idctg=:idctg OR idsctg=:idsctg
       // SELECT * FROM lead Left JOIN souscategory ON lead.idsctg = souscategory.idsctg WHERE souscategory.idctg=5 or lead.idsctg=5; 
        $this->db->query('SELECT * FROM lead Left JOIN souscategory ON lead.idsctg = souscategory.idsctg 
                        WHERE souscategory.idctg=:idctg or lead.idsctg=:idsctg');
        $this->db->bind(':idctg',  $data['category']);
        $this->db->bind(':idsctg', $data['scategory']);
        $results = $this->db->resultSet();
        return $results;
    }



    /**
     *REgister new  professionel
     *
     * @param ArrayObject $data
     * @return Boolean
     */
    public function CreatePro($data){
        $this->db->query('INSERT INTO professionel (nom, adresse, ville, codepostal, pays , nomcontact, prenomcontact, telcontact, emailcontact, password, fonctioncontact)
        VALUES(:nom, :adresse, :ville, :codepostal, :pays, :nomcontact, :prenomcontact, :telcontact, :emailcontact, :password, :fonctioncontact)');
        //Bind values
        $this->db->bind(':nom',               $data['nomEnt']);
        $this->db->bind(':adresse',           $data['adressePro']);
        $this->db->bind(':ville',             $data['villePro']);
        $this->db->bind(':codepostal',        $data['codepostalPro']);
        $this->db->bind(':pays',              $data['villePro']);
        $this->db->bind(':nomcontact',        $data['nomPro']);
        $this->db->bind(':prenomcontact',     $data['prenomPro']);
        $this->db->bind(':telcontact',        $data['telPro']);
        $this->db->bind(':emailcontact',      $data['emailPro']);
        $this->db->bind(':password',          $data['passwordPro']);
        $this->db->bind(':fonctioncontact',   $data['fonctionPro']);

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
    public function UpdatePro($data) {
        $this->db->query('UPDATE professionel SET nom=:nom, adresse=:adresse, ville=:ville, codepostal=:codepostal, pays=:pays, nomcontact=:nomcontact, prenomcontact=:prenomcontact, telcontact=:telcontact, emailcontact=:emailcontact, password=:password, fonctioncontact=:fonctioncontact WHERE idpro=:idpro' );
        //Bind values
        //Bind values
        $this->db->bind(':nom',               $data['nomEnt']);
        $this->db->bind(':adresse',           $data['adressePro']);
        $this->db->bind(':ville',             $data['villePro']);
        $this->db->bind(':codepostal',        $data['codepostalPro']);
        $this->db->bind(':pays',              $data['villePro']);
        $this->db->bind(':nomcontact',        $data['nomPro']);
        $this->db->bind(':prenomcontact',     $data['prenomPro']);
        $this->db->bind(':telcontact',        $data['telPro']);
        $this->db->bind(':emailcontact',      $data['emailPro']);
        $this->db->bind(':password',          $data['passwordPro']);
        $this->db->bind(':fonctioncontact',   $data['fonctionPro']);
        $this->db->bind(':idpro',             $data['idPro']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


 
    /**
     * Update Prof update
     * @param ArrayObject $data
     * @return Boolean
     */
    public function updatePassword($data) {
        $this->db->query('UPDATE professionel SET  password=:password WHERE idpro=:idpro AND emailcontact=:emailcontact' );
        //Bind values
        $this->db->bind(':emailcontact',      $data['userEmail']);
        $this->db->bind(':password',          $data['userPassword']);
        $this->db->bind(':idpro',             $data['userId']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * delete Professionel
     * @param ArrayObject $data
     * @return Boolean
     */
    public function DeletePro($data) { 
        $this->db->query('DELETE FROM professionel WHERE idpro=:idpro');
        $this->db->bind(':idpro', $data['idpro']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * Get last id addes
     *
     * @return Integer
     */
    public function GetLastID(){
        $this->db->query('SELECT MAX(idpro) As idpro FROM professionel');
        $row = $this->db->single();
        return $row->idpro;
    
    }


    /**
     * Get all activities of the professionel 
     * @param ArrayObject $data
     * @return ArrayObject
     */
    public function GetActivitiesByID($idpro){
        $this->db->query('SELECT * FROM  activity WHERE idpro=:idpro');
        $this->db->bind(':idpro', $idpro);
        $results = $this->db->resultSet();
        return $results;
    }


    /**
     * Add and Update domaine activities of professionelle
     *
     * @param ArrayObject $data
     * @return Boolean
     */
    public function AddActivitePro($data){ 
        $this->db->query('INSERT INTO activity (idpro, idctg)
        VALUES(:idpro, :idctg)');
        //Bind values
        $this->db->bind(':idpro',     $data['idpro']);
        $this->db->bind(':idctg',     $data['idctg']);
        if ($this->db->execute()) {
            return   true;
        }else{
            return   false;
        }
    
    }

    /**
     * Delete domaine activities of professionelle
     *
     * @param  Integer $idPro
     * @return Boolean
     */
    public function DeleteActivitePro($idPro){ 
        $this->db->query('DELETE FROM `activity` WHERE idpro=:idpro');
        //Bind values
        $this->db->bind(':idpro', $idPro);
        if ($this->db->execute()) {
            return   true;
        }else{
            return   false;
        }
    
    }



}
