<?php
Class Professionel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function findAllProfessionels() {
        $this->db->query('SELECT * FROM  professionel');
        $results = $this->db->resultSet();
        return $results;
    }


    /**
     * Get Admin by Id
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

}
