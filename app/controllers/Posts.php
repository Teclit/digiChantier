<?php
class Posts extends Controller {
    public function __construct() {
        $this->postModel = $this->model('Post');
    }

    /**
     * Get all Posts
     *
     * @return void
     */
    public function indexPost() {
        $data = [
            'posts' => $this->postModel->findAllPosts(),
        ];
        $this->view('posts/indexPost', $data);
    }

    /**
     * Create new posts
     *
     * @return void
     */
    public function createPost() {
        $data = [
            'title'      =>'',
            'body'       =>'',
            'image'      =>'',

            'titleError' => '',
            'bodyError'  => '',
            'imageError' => '',
            //FormAction
            'actionForm'                => '/posts/createPost',
            'submitBtn'                 => 'Creer'
        ];
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            
            $data = [
                'title'    => trim($_POST['title']),
                'body'     => trim($_POST['body']),
                'image'    => trim($_FILES["image"]["name"]), 
                'userID'   =>  SessionHelper::getSession('userId'),
                
                'titleError' => '',
                'bodyError'  => '',
                'imageError' => '',
                 //FormAction
                'actionForm' => '/posts/createPost',
                'submitBtn'  => 'Creer'
            ];

            if(empty($data['title'])) {
                $data['titleError'] = 'The title  of a post cannot be empty';
            }

            if(empty($data['body'])) {
                $data['bodyError'] = 'The body of a post cannot be empty';
            }

            if(empty($data['image'])) {
                $data['imageError'] = 'The image of a post cannot be empty';
            } 
            

            if ( empty($data['titleError']) && empty($data['bodyError']) && empty($data['imageError'])  ) {
                    
                if ($this->postModel->AddPost($data)) {
                    $msg= "Vous avez bien creer le post";
                    SessionHelper::setSession("SuccessMessage", $msg);
                    SessionHelper::redirectTo('/posts/indexPost');
                } else {
                    die("Something went wrong, please try again!");
                    $msg= "Vous n'avez pas supprimer le post";
                    SessionHelper::setSession("ErrorMessage", $msg);
                    SessionHelper::redirectTo('/posts/indexPost');
                }
                
            } else {
                $this->view('posts/createPost', $data);
            }
        }
        
        $this->view('posts/createPost', $data);
    }

    /**
     * update post
     *
     * @param int $postID
     * @return void
     */
    public function updatePost($postID) {

        $post = $this->postModel->findPostById($postID);

        $data = [
            'idpost' =>$postID,
            'title'  => $post->title,
            'body'   => $post->body,
            'image'  => $post->image,

            'titleError' => '',
            'bodyError'  => '',
            'imageError' => '',

            //FormAction
            'actionForm'                => '/posts/updatePost/'.$postID,
            'submitBtn'                 => 'Modifier'
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            

            $data = [
                'idpost'      => $postID,
                'userID'      => SessionHelper::getSession('userId'),
                'title'       =>trim($_POST['title']),
                'body'        =>trim($_POST['body']),
                'image'       =>trim($_FILES["image"]["name"]),
                
                'titleError'      => '',
                'bodyError'       => '',
                'imageError'      => '',
                //FormAction
                'actionForm'      => '/posts/updatePost/'.$postID,
                'submitBtn'        => 'Modifier'
            ];

        

            if(empty($data['title'])) {
                $data['titleError'] = 'The title  of a post cannot be empty';
            }

            if(empty($data['body'])) {
                $data['bodyError'] = 'The body of a post cannot be empty';
            }

            if($data['title'] == $this->postModel->findPostById($postID)->title ) {
                $data['titleError'] == 'At least change the title !';
            }

            if($data['body'] == $this->postModel->findPostById($postID)->body) {
                $data['bodyError'] == 'At least change the body!';
            }

            if (empty($data['titleError']) && empty($data['bodyError']) ) {

                if ($this->postModel->UpdatePost($data)) {
                    $msg= "Vous avez bien editer le post";
                    SessionHelper::setSession("SuccessMessage", $msg);
                    SessionHelper::redirectTo('/posts/indexPost');
                } else {
                    // die("Something went wrong, please try again!");
                    $msg= "Vous n'avez pas editer le post";
                    SessionHelper::setSession("ErrorMessage", $msg);
                    SessionHelper::redirectTo('/posts/indexPost');
                }


            } else {
                $this->view('posts/updatePost', $data);
            }
        }

        $this->view('posts/updatePost', $data);
    }

    /**
     * Delete 
     *
     * @param int $postID
     * @return void
     */
    public function deletePost($postID) {

        $post = $this->postModel->findPostById($postID);
        $data = [
            
            'idpost' =>$postID,
            'title ' => $post->title,
            'body'   => $post->body,
            'image'  => $post->image,
            'titleError' => '',
            'imageError' => '',
            'bodyError' => '',

            //FormAction
            'actionForm'                => '/posts/deletePost/'.$postID,
            'submitBtn'                 => 'Supprimer'
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'idpost' =>$postID,
                'title ' => $post->title,
                'body'   => $post->body,
                'image'  => $post->image,
                'titleError' => '',
                'imageError' => '',
                'bodyError' => '',
    
                //FormAction
                'actionForm'                => '/posts/deletePost/'.$postID,
                'submitBtn'                 => 'Supprimer'
            ];
            

            if($this->postModel->DeletePost($data)) {
                $msg= "Vous avez bien supprimer le post";
                SessionHelper::setSession("SuccessMessage", $msg);
                SessionHelper::redirectTo('/posts/indexPost');
            } else {
                // die("Something went wrong, please try again!");
                $msg= "Vous n'avez pas supprimer le post";
                SessionHelper::setSession("ErrorMessage", $msg);
                SessionHelper::redirectTo('/posts/indexPost');
            }
            $this->view('posts/updatePost', $data);
        }
        $this->view('posts/updatePost', $data);
    }
}

