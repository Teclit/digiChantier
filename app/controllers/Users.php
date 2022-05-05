<?php
class Users extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    

    public function login() {
        $data = [
            
            'userEmail' => '',
            'userPassword' => '',
            'userEmailError' => '',
            'userPasswordError' => ''
        ];

        //Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'userEmail'         => trim($_POST['userEmail']),
                'userPassword'      => trim($_POST['userPassword']),
                'userEmailError'    => '',
                'userPasswordError' => '',
            ];
            //Validate userEmail
            if (empty($data['userEmail'])) {
                $data['userEmailError'] = 'Please enter a userEmail.';
            }

            //Validate password
            if (empty($data['userPassword'])) {
                $data['userPasswordError'] = 'Please enter a password.';
            }

            //Check if all errors are empty
            if (empty($data['userEmailError']) && empty($data['userPasswordError'])) {
                $loggedInUser = $this->userModel->LoginAdmin($data); //call Methode user
                
                print_r($loggedInUser);

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['userPasswordError'] = 'Password or userEmail is incorrect. Please try again.';
                    $this->view('users/login', $data);
                }
            }

        } else {
            $data = [
                'userEmail' => '',
                'userPassword' => '',
                'userEmailError' => '',
                'userPasswordError' => ''
            ];
        }
        
        $this->view('users/login', $data);
    }

    public function createUserSession($user) {

        SessionHelper::setSession("userId", $user->id);
        SessionHelper::setSession("userNom", $user->nom);
        SessionHelper::setSession("userPrenom", $user->prenom);
        SessionHelper::setSession("userEmail", $user->email);
        SessionHelper::setSession("userTel", $user->tel);
        SessionHelper::setSession("UserAdresse", $user->adresse);
        SessionHelper::setSession("UserCodepostal", $user->codepostal);
        SessionHelper::setSession("UserVille", $user->ville);

        header('location:' . URLROOT . '/pages/index');
    }


    public function forgetpd() {
        $data = [
            'userEmail' => '',
            'userEmailError' => '',
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
        }
        $this->view('users/forgetpd', $data);
    }

    public function logout() {
        unset($_SESSION['userID']);
        unset($_SESSION['userEmail']);
        unset($_SESSION['email']);
        header('location:' . URLROOT . '/users/login');
    }

}
