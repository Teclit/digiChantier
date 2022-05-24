<?php
class Users extends Controller {
    public function __construct() {
        $this->adminModel = $this->model('Administrateur');
        $this->proModel   = $this->model('Professionel');
    }

    
    /**
     * User login
     *
     * @return void
     */
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

            //Validate email and telephone
            if (empty($data['userEmail'])) {
                $data['userEmailError'] = 'Veuillez saisir un email addresse.';
            } elseif (!filter_var($data['userEmail'], FILTER_VALIDATE_EMAIL)) {
                $data['userEmailError'] = 'Veuillez saisir un correct un correct format.';
            }

            //Validate password
            if (empty($data['userPassword'])) {
                $data['userPasswordError'] = 'Veuillez saisir un mot de passe.';
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

    /**
     * Create admin session and profile
     *
     * @param ArrayObject $user
     * @return void
     */
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

    /**
     * Create professionel session and profile
     *
     * @param ArrayObject $user
     * @return void
     */
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
     * forget mot de passe un mot de passe
     *
     * @return void
     */
    public function forgetpd() {
        $data = [
            'userId' => '',
            'userEmail' => '',
            'userEmailError' => '',
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $data = [
                'userEmail'      => trim($_POST['userEmail']),
                'userEmailError' => '',
            ];


            //Validate email and telephone
            if (empty($data['userEmail'])) {
                $data['userEmailError'] = 'Veuillez saisir un email addresse.';
            } elseif (!filter_var($data['userEmail'], FILTER_VALIDATE_EMAIL)) {
                $data['userEmailError'] = 'Veuillez saisir un correct un correct format.';
            }

            if(empty($data['userEmailError'])){
                $getEmail = '';
                
                if($this->adminModel->GetAdminByEmail($data['userEmail'])){
                    $getEmail = $this->adminModel->GetAdminByEmail($data['userEmail']);
                    $data['userEmail'] = $getEmail->email;
                    $data['userId']    = $getEmail->id;
                }elseif($this->proModel->GetProsByEmail($data['userEmail'])){
                    $getEmail = $this->proModel->GetProsByEmail($data['userEmail']);
                    $data['userEmail'] = $getEmail->emailcontact;
                    $data['userId']    = $getEmail->idpro;

                }
                //var_dump($getEmail);
                $this->view('users/mailrecover', $data);
            }
            $this->view('users/forgetpd', $data);
        }

        $this->view('users/forgetpd', $data);
    }

    /**
     * Redirect to edit password
     *
     * @return void
     */
    public function  editpassword($idpro){
        $data = [
            'file'                     => "editpassword",
            'userId'                   => $idpro,
            'userEmail'                => '',
            'userPassword'             => '',
            'userConfirmpassword'      => '',
            'userPasswordError'        => '',
            'userConfirmpasswordError' => '',
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $data = [
                'file'                     => "editpassword",
                'userId'                   => $idpro,
                'userEmail'                => trim($_POST['userEmail']),
                'userPassword'             =>trim($_POST['userPassword']),
                'userConfirmpassword'      =>trim($_POST['userConfirmpassword']),
                'userPasswordError'        => '',
                'userConfirmpasswordError' => '',
                'userEmailError'            => ''
            ];
            
            $passwordValidation    = "/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/";
            if (empty($data['userPassword']) || !preg_match($passwordValidation, $data['userPassword']) || (strlen($data['userPassword'])<6)){ 
                $data['passwordError'] = 'Veuillez saisir un valide mot de passe.';
            } elseif (empty($data['userConfirmpassword']) || !preg_match($passwordValidation, $data['userConfirmpassword'])){ 
                $data['userConfirmpasswordError'] = 'Veuillez confirmer votre mot de passe.';
            } else {
                if ($data['userPassword'] != $data['userConfirmpassword']) {
                $data['userConfirmpasswordError'] = 'Les mots de passe ne correspondent pas, Veuillez réessayer.';
                }
            }

            //Validate email and telephone
            if (empty($data['userEmail'])) {
                $data['userEmailError'] = 'Veuillez saisir un email addresse.';
            } elseif (!filter_var($data['userEmail'], FILTER_VALIDATE_EMAIL)) {
                $data['userEmailError'] = 'Veuillez saisir un correct un correct format.';
            } 

            // Make sure that errors are empty
            if (empty($data['userEmailError'])  && empty($data['adresseProError'])){
                //Hash password
                $data['userPassword'] = password_hash($data['userPassword'], PASSWORD_DEFAULT);

                if($this->proModel ->GetProsByEmail($data['userEmail'])) {
                    if($this->proModel->updatePassword($data)) {
                        $msg= "Vous avez bien modifier le mot de passe";
                        SessionHelper::setSession("SuccessMessage", $msg);
                        SessionHelper::redirectTo('/users/forgetpd');
                    }
                    // Redirect to index page
                    

                }elseif($this->adminModel->GetAdminByEmail($data['userEmail'])){

                    if($this->adminModel->updatePassword($data)){
                        $msg= "Vous avez bien modifier le mot de passe";
                        SessionHelper::setSession("SuccessMessage", $msg);
                        SessionHelper::redirectTo('/users/forgetpd');
                        //$this->view('users/forgetpd', $data);
                    }
                }else {
                    $msg= "Vous n'avez pas modifier le mot de passe";
                    SessionHelper::setSession("ErrorMessage", $msg);
                    SessionHelper::redirectTo('/users/forgetpd');
                }
        
            }
            //var_dump($data);
            $this->view('/users/editpassword', $data);
        }

        $this->view('/users/editpassword', $data);
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
