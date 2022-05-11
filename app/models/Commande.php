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
    public function findAllCommande() {
        $this->db->query('SELECT * FROM  prixlead');
        $results = $this->db->resultSet();
        return $results;
    }




    /**
     * Get All commande by professionel
     *
     * @param Int $idprix
     * @return object
     */
    public function findAllCommandeByPRO(Int $idpro) {
        $this->db->query('SELECT COUNT(*) AS totalcmd FROM  commande WHERE idpro = :idpro');
        $this->db->bind(':idpro', $idpro);
        $row = $this->db->single();
        return $row;
    }




}
