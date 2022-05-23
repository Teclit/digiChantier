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
                
                if ($this->proModel->LoginPro($data)){
                    $loggedInUser =$this->proModel->LoginPro($data);
                    $this->createUserSessionPro($loggedInUser);

                } elseif ($this->adminModel->LoginAdmin($data)) {
                    $loggedInUser = $this->adminModel->LoginAdmin($data);
                    print_r($loggedInUser);
                    $this->createUserSessionAdmin($loggedInUser);
                } else {
                    $data['userPasswordError'] = 'Le mot de passe ou l\'adresse e-mail de l\'utilisateur est incorrect. Veuillez réessayer.';
                    $this->view('users/login', $data);
                }
            }

        } else {
            $this->view('users/login', $data);
        }
    }   

    public function createUserSessionAdmin($user) {
        $date = new DateTime();
        SessionHelper::setSession("userLogin", $date->getTimestamp());
        SessionHelper::setSession("userId", $user->id);
        SessionHelper::setSession("userRoleAdmin", boolval($user->admin_role));
        SessionHelper::setSession("userNom", $user->nom);
        SessionHelper::setSession("userPrenom", $user->prenom);
        SessionHelper::setSession("userEmail", $user->email);
        SessionHelper::setSession("userTel", $user->tel);
        SessionHelper::setSession("UserAdresse", $user->adresse);
        SessionHelper::setSession("UserCodepostal", $user->codepostal);
        SessionHelper::setSession("UserVille", $user->ville);
        SessionHelper::setSession("userdateUpdated", $user->date_edition);

        $msg= "Bienvenue dans votre espace administrateur ";
        SessionHelper::setSession("SuccessMessage", $msg);
        SessionHelper::redirectTo('/pages/dashboard');
    }

    public function createUserSessionPro($user) {
        $date = new DateTime();
        SessionHelper::setSession("userLogin", $date->getTimestamp());
        SessionHelper::setSession("userId",              $user->idpro);
        SessionHelper::setSession("userRolePro",         boolval($user->pro_role));
        SessionHelper::setSession("userNom",             $user->nom);
        SessionHelper::setSession("UserAdresse",         $user->adresse);
        SessionHelper::setSession("UserCodepostal",      $user->codepostal);
        SessionHelper::setSession("UserVille",           $user->ville);
        SessionHelper::setSession("UserPays",            $user->pays);
        SessionHelper::setSession("userNomContact",      $user->nomcontact);
        SessionHelper::setSession("userPrenomContact",   $user->prenomcontact);
        SessionHelper::setSession("userEmailContact",    $user->emailcontact);
        SessionHelper::setSession("userTelContact",      $user->telcontact);
        SessionHelper::setSession("userFonctionContact", $user->fonctioncontact);
        SessionHelper::setSession("userdateUpdated",     $user->date_edition);

        $msg= "Bienvenue dans votre espace personnelle ";
        SessionHelper::setSession("SuccessMessage", $msg);
        SessionHelper::redirectTo('/personnels/indexPerso/'.$user->idpro);
    }

    /**
     * Redirect to Pofile page
     *
     * @return void
     */
    public function  profile(){
        $data = [
            'file' => "Profile.php",
        ];
        $this->view('/users/profile', $data);
    }

    /**
     * Modifier un mot de passe
     *
     * @return void
     */
    public function forgetpd() {
        $data = [
            'userEmail' => '',
            'userEmailError' => '',
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
        }
        $this->view('users/forgetpd', $data);
    }

    /**
     * Logout et destroy all  Sessions
     * 
     * 
     */
    public function logout() {
        SessionHelper::destroySessions();
        SessionHelper::redirectTo('/pages/index');
    }

}
