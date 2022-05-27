<?php
class Commande {
    private $db;
    
    /**
     *  
     */
    public function __construct() {
        $this->db = new Database;
    }

    /**
     * Get All commandes
     *
     * @return void
     */
    public function findAllCommandes() {
        $this->db->query('SELECT * FROM commande ');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    public function GetUnitePrixLead($codepack) {
        $this->db->query('SELECT *  FROM  prixlead WHERE codepack = :icodepack');
        $this->db->bind(':icodepack', $codepack);
        $row = $this->db->single();
        return $row;
    }


    /**
     * Undocumented function
     *
     * @return array
     */
    public function findAllLeadsDispo($idpro){
        $this->db->query('SELECT * FROM lead WHERE idlead NOT IN (
            SELECT commandeline.idlead FROM commande 
            INNER JOIN commandeline ON commande.idcmd = commandeline.idcmd 
            WHERE commande.idpro = :idpro )');
        $this->db->bind(':idpro', $idpro);
        $results = $this->db->resultSet();
        return $results;
    }




    /**
     * Get All commande by professionel
     *
     * @param Int $idprix
     * @return int
     */
    public function findAllCommandeByPRO(Int $idpro) {
        $this->db->query('SELECT COUNT(*) AS totalcmd FROM  commande WHERE idpro = :idpro');
        $this->db->bind(':idpro', $idpro);
        $row = $this->db->single();
        return $row;
    }

/**############################# Comand line #############################**/
    /**
     *   
     *  Get All commandelines by professionel
     *
     * @return array
     */
    public function findAllCommandLineByPRO(Int $idpro) {
        $paid = 1;
        $this->db->query('SELECT * FROM lead WHERE idlead IN (
            SELECT commandeline.idlead FROM commande 
            INNER JOIN commandeline ON commande.idcmd = commandeline.idcmd 
            WHERE commande.idpro = :idpro and commande.paid = :paid)');
        $this->db->bind(':idpro', $idpro);
        $this->db->bind(':paid',  $paid);
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * Add commande
     *
     * @param Arrayobject $data
     * @return void
     */
    public function AddCommand($data){
        $this->db->query('INSERT INTO commande ( paid, transactionstatus, totalprix, idpro, pymdate) 
        VALUES(:paid, :transactionstatus, :totalprix, :idpro, :pymdate)');

        $this->db->bind(':paid',               $data['paid']);
        $this->db->bind(':transactionstatus',  $data['transactionstatus']);
        $this->db->bind(':totalprix',          $data['totalprix']);
        $this->db->bind(':idpro',              $data['idpro']);
        $this->db->bind(':pymdate',            $data['pymdate']);
        //Execute function
        if ($this->db->execute()) {
            return  true;
        } else {
            return   false;
        }
    }

    /**
     * Get last id addes to command by pro
     *
     * @return Integer
     */
    public function CommandLastID(int $idpro){
        $this->db->query('SELECT MAX(idcmd) As idcmd FROM commande WHERE idpro=:idpro');
        $this->db->bind(':idpro', $idpro);
        $row = $this->db->single();
        return $row->idcmd;
    }


    /**
     * Add commande line 
     *
     * @param Array $data
     * @return void
     */
    public function AddCommandLine($data){
        $this->db->query('INSERT INTO commandeline ( idlead, idcmd) VALUES(:idlead, :idcmd)');
        $this->db->bind(':idlead', $data['idlead']);
        $this->db->bind(':idcmd',  $data['idcmd']);
        //Execute function
        if ($this->db->execute()) {
            return  true;
        } else {
            return   false;
        }
    }






}
