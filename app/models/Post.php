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
        $this->db->query('SELECT * FROM posts  WHERE idpost  = :idpost ');
        $this->db->bind(':idpost ', $idpost );
        $row = $this->db->single();
        return $row;
    }


    /**
     * ADD new Posts
     *
     * @param [type] $data
     * @return void
     */
    public function addPost($data) {
        $this->db->query('INSERT INTO posts (title, body, image,  adminid) VALUES ( :title, :body, :image, : adminid )');

        $this->db->bind(':title ',  $data['title']);
        $this->db->bind(':body  ',  $data['body']);
        $this->db->bind(':image',   $data['image']);
        $this->db->bind(':adminid', $data['userID']);
        
        // Image Resize
        $imageName= $data['image'];
        $tmpName=  $_FILES['image']['tmp_name'];
        $fileName=$_SERVER["DOCUMENT_ROOT"].URLDOCS.$imageName;
        
        
        if(move_uploaded_file($tmpName, $fileName )) {
            try {
                if ($this->db->execute()) {
                    return true;
                }
            }
            catch (PDOException $e){
                //display error  message
                ///echo $e;
                return false;
            }

        }else{
            echo $_SERVER["DOCUMENT_ROOT"] ."<br>";
        };

        
    }


    public function updatePost($data) {

        $this->db->query('UPDATE posts SET title= :title, body = :body,
                    image = :image,  adminid=:adminid WHERE idpost = :idpost ');

        
        $this->db->bind(':title',       $data['updatetitle']);
        $this->db->bind(':image',   $data['updateimage']);
        $this->db->bind(':body',        $data['updatebody  ']);
        $this->db->bind(':adminid',  $data['updateuserID']);
        $this->db->bind(':idpost',      $data['updateidpost ']);

        // Image upload
        $imageName= $data['updateimage'];
        $tmpName=  $_FILES['updateimage']['tmp_name'];
        $fileName=$_SERVER["DOCUMENT_ROOT"].URLDOCS.$imageName; 
        
        
        if(move_uploaded_file($tmpName, $fileName )) {
            
            if ($this->db->execute()) {
            
                return true;
            } else {
                return false;
            }

        }else{
            echo $_SERVER["DOCUMENT_ROOT"] ."<br>";
        };

    }

    public function deletePost($idpost ) {
        $this->db->query('DELETE FROM posts WHERE idpost  = :idpost ');

        $this->db->bind(':idpost ', $idpost );

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function findAllCategory() {
        $this->db->query('SELECT * FROM category ORDER BY categoryName ASC');
        $results = $this->db->resultSet();
        return $results;
    }


}
