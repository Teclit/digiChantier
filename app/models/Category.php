<?php
class Category {
    private $db;

    /**
     * Initiate database
     */
    public function __construct() {
        $this->db = new Database;
    }


    /**
     * get all categories
     *
     * @return array
     */
    public function findAllCategories() {
        $this->db->query('SELECT * FROM  category');
        $results = $this->db->resultSet();
        return $results;
    }


    /**
     * Find all leads
     * @param String
     * @return ArrayObject
     *
     */
    public function findSearchCtg($search) {
        $search=strtolower($search);
        $this->db->query("SELECT * FROM category  WHERE LOWER(ctgnom) LIKE :search ORDER BY ctgnom ASC ");
        $this->db->bind(':search', '%'.$search.'%');
        $results = $this->db->resultSet();
        
        return $results;
            
    }


    /**
     * Get lead  par  id
     *
     * @param Int $idctg
     * @return object
     */
    public function findCategoryByID(Int $idctg) {
        $this->db->query('SELECT * FROM  category WHERE idctg = :idctg');
        $this->db->bind(':idctg', $idctg);
        $row = $this->db->single();
        return $row;
    }


    /**
     *REgister new  Category
     *
     * @param ArrayObject $data
     * @return Boolean
     */
    public function CreateCtg($data){

        $this->db->query('INSERT INTO category (ctgnom) VALUES(:nom)');
        //Bind values
        $this->db->bind(':nom',   $data['nomCtg']);
        //Execute function
        if ($this->db->execute()) {
            return  true;
        } else {
            return   false;
        }
    }


    /**
     * Update Category
     * @param ArrayObject $data
     * @return Boolean
     */
    public function UpdateCtg($data) {
        $this->db->query('UPDATE category SET ctgnom=:nom WHERE idctg=:idCtg' );
        //Bind values
        $this->db->bind(':nom',   $data['nomCtg']);
        $this->db->bind(':idCtg', $data['idCtg']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }




    /**
     * delete Category
     * @param ArrayObject $data
     * @return Boolean
     */
    public function DeleteCtg($data) { 
        $this->db->query('DELETE FROM category WHERE idctg=:idCtg');
        $this->db->bind(':idCtg', $data['idCtg']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }




}
