<?php
class Users extends Controller {
    public function __construct() {
        $this->adminModel = $this->model('Administrateur');
        $this->proModel   = $this->model('Professionel');
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
                $loggedInUser = '';//call Methode user
                if ($this->adminModel->LoginAdmin($data)) {
                    $loggedInUser = $this->adminModel->LoginAdmin($data);
                    print_r($loggedInUser);
                    $this->createUserSession($loggedInUser);
                //Test12&&DD
                //test1@gmail.com
                } else if ($this->proModel->LoginPro($data)){
                    //var_dump($data);
                    echo "<hr>";
                    print_r($loggedInUser);
                    $loggedInUser =$this->proModel->LoginPro($data);
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['userPasswordError'] = 'Le mot de passe ou l\'adresse e-mail de l\'utilisateur est incorrect. Veuillez réessayer.';
                    $this->view('users/login', $data);
                }
            }

        } else {
            $this->view('users/login', $data);
        }
    }   

    public function createUserSession($user) {
        SessionHelper::setSession("userId", $user->id);
        SessionHelper::setSession("userRole", boolval($user->status_role));
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
        $admins = $this->adminModel->findAllAdministrateurByID(SessionHelper::getSession("userId"));
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
