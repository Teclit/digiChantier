<?php
class Users extends Controller {
    public function __construct() {
        $this->userModel = $this->model('Administrateur');
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

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['userPasswordError'] = 'Password or userEmail is incorrect. Please try again.';
                    $this->view('users/login', $data);
                }
            }

        } else {
            $this->view('users/login', $data);
        }
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
        SessionHelper::setSession("userdateUpdated", $user->date_edition);

        $msg= "Bienvenue dans votre espace personnelle ";
        SessionHelper::setSession("SuccessMessage", $msg);
        SessionHelper::redirectTo('/pages/index');
    }


    public function  profile(){
        $admins = $this->userModel->findAllAdministrateurByID(SessionHelper::getSession("userId"));
        $data = [
            'user' => $admins,
        ];

        $this->view('/users/profile', $data);
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
        SessionHelper::destroySessions();
        SessionHelper::redirectTo('/pages/index');
    }

}
