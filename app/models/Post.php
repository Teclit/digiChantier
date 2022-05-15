<?php
class Post {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    /**
     * Get All POSTS
     *
     * @return void
     */
    public function findAllPosts() {
        $this->db->query('SELECT * FROM posts ORDER BY created_at DESC');
        $results = $this->db->resultSet();
        return $results;
    }
    
    /**
     * get post by ID
     *
     * @param [type] $idpost 
     * @return void
     */
    public function findPostById($idpost ) {
        $this->db->query('SELECT * FROM posts  WHERE idpost=:idpost ');
        $this->db->bind(':idpost', $idpost);
        $row = $this->db->single();
        return $row;
    }


    /**
     * ADD new Posts
     *
     * @param [type] $data
     * @return void
     */
    public function AddPost($data) {
        $this->db->query('INSERT INTO posts (title, body, image, adminid) VALUES (:title, :body, :image, :adminid)');

        $this->db->bind(':title',   $data['title']);
        $this->db->bind(':body',    $data['body']);
        $this->db->bind(':image',   $data['image']);
        $this->db->bind(':adminid', $data['userID']);

        
        //Upload imge
        $tmpName=  $_FILES['image']['tmp_name'];
        $fileName=$_SERVER["DOCUMENT_ROOT"].URLDOCS.$data['image'];
        

        if(move_uploaded_file($tmpName, $fileName)) {
            try {
                if ($this->db->execute()) {
                        return true;
                    }
            } catch (PDOException $e){
                return false;
            }
        }

        
    }


    public function UpdatePost($data) {

        $this->db->query('UPDATE posts SET title=:title, body =:body, image =:image, adminid=:adminid WHERE idpost =:idpost');
        $this->db->bind(':title',   $data['title']);
        $this->db->bind(':body',    $data['body']);
        $this->db->bind(':image',   $data['image']);
        $this->db->bind(':adminid', $data['userID']);
        $this->db->bind(':idpost',  $data['userID']);


        //Upload imge
        $tmpName=  $_FILES['image']['tmp_name'];
        $fileName=$_SERVER["DOCUMENT_ROOT"].URLDOCS.$data['image'];


        if(move_uploaded_file($tmpName, $fileName)) {
            try {
                if ($this->db->execute()) {
                    return true;
                }
            } catch (PDOException $e){
                return false;
            }
        }


    }

    public function DeletePost($data ) {
        $this->db->query('DELETE FROM posts WHERE idpost=:idpost');
        $this->db->bind(':idpost', $data['idpost']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


}
