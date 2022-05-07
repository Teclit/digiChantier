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
     * Find Professionel by email. email is passed in by the Controller.
     *
     * @param ArrayObject $email
     * @return Boolean
     */
    public function findProByEmail($data) {
        $this->db->query('SELECT * FROM professionel WHERE emailcontact = :email');
        $this->db->bind(':email', $$data['emailPro']);
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


}
