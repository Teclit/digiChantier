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






}
