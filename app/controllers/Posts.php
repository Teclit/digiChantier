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
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'title'    => trim($_POST['title']),
                'body'     => trim($_POST['body']),
                'image'    => trim($_FILES["image"]["name"]), 
                'userID'   =>  SessionHelper::getSession('userId'),
                
                'titleError' => '',
                'bodyError'  => '',
                'imageError' => ''
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
                    
                if ($this->postModel->addPost($data)) {
                    $msg= "Vous avez bien creer le post";
                    SessionHelper::setSession("SuccessMessage", $msg);
                    SessionHelper::redirectTo('/posts/indexPost');
                } else {
                    // die("Something went wrong, please try again!");
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

    public function updatePost($postID) {

        $post = $this->postModel->findPostById($postID);

        $data = [
            'updatePost'        => $post,
            'updatetitle'   =>'',
            'updatebody'    =>'',
            'updateimage'   =>'',

            'updatetitleError'       => '',
            'updatebodyError'        => '',
            'updateimageError'       => '',

            //FormAction
            'actionForm'                => '/posts/updatePost/'.$postID,
            'submitBtn'                 => 'Modifier'
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'updatePostID'          => $postID,
                'post'                  => $post,
                'userID'                => SessionHelper::getSession('userId'),
                'updatePost'            =>$post,
                'updatetitle'       =>trim($_POST['updatetitle']),
                'updatebody'        =>trim($_POST['updatebody']),
                'updateimage'       =>trim($_FILES["updateimage"]["name"]),
                

                'updatetitleError'      => '',
                'updatebodyError'       => '',
                'updateimageError'      => '',
                //FormAction
                'actionForm'                => '/posts/updatePost/'.$postID,
                'submitBtn'                 => 'Modifier'
            ];

        

            if(empty($data['updatetitle'])) {
                $data['updatetitleError'] = 'The title  of a post cannot be empty';
            }

            if(empty($data['updatebody'])) {
                $data['updatebodyError'] = 'The body of a post cannot be empty';
            }

            if($data['updatetitle'] == $this->postModel->findPostById($postID)->title ) {
                $data['updatetitleError'] == 'At least change the title !';
            }

            if($data['updatebody'] == $this->postModel->findPostById($postID)->body) {
                $data['updatebodyError'] == 'At least change the body!';
            }

            if (empty($data['updatetitleError']) && empty($data['updatebodyError'])) {

                if ($this->postModel->updatePost($data)) {
                    
                    header("Location: " . URLROOT . "/posts");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('posts/updatePost', $data);
            }
        }

        $this->view('posts/updatePost', $data);
    }

    public function deletePost($postID) {

        $post = $this->postModel->findPostById($postID);
        $data = [
            'post' => $post,
            'title ' => '',
            'body' => '',
            'title Error' => '',
            'bodyError' => '',

            //FormAction
            'actionForm'                => '/posts/deletePost/'.$postID,
            'submitBtn'                 => 'Supprimer'
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($this->postModel->deletePost($postID)) {
                    header("Location: " . URLROOT . "/posts");
            } else {
                die('Something went wrong!');
            }
        }
    }
}

