

<?php
class Administrateurs extends Controller {
    public function __construct() {
        $this->administrateursModel = $this->model('Administrateur');
    }

    public function indexAdmin() {
        $administrateurs = $this->administrateursModel->findAllAdministrateurs();
        $data = [
            'administrateurs' => $administrateurs
        ];

        $this->view('administrateurs/indexAdmin', $data);
    }

    public function detailAdmin($idAdmin) {
        $administrateurs = $this->administrateursModel->findAllAdministrateurByID($idAdmin);
        $data = [
            'administrateur' => $administrateurs
        ];

        $this->view('administrateurs/detailAdmin', $data);
    }



    public function createAdmin() {

        $data = [
            'nomAdmin'             => '',
            'prenomAdmin'          => '',
            'telAdmin'             => '', 
            'emailAdmin'           => '', 
            'passwordAdmin'        => '', 
            'confirmpasswordAdmin' => '', 
            'adresseAdmin'         => '',
            'codepostalAdmin'      => '',
            'villeAdmin'           => '',
            // MESSAGE Error
            'nomAdminError'              => '',
            'prenomAdminError'           => '',
            'telAdminError'              => '',
            'passwordAdminError'         => '', 
            'confirmpasswordAdminError'  => '', 
            'emailAdminError'            => '',
            'adresseAdminError'          => '',
            'codepostalAdminError'       => '',
            'villeAdminError'            => '',
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
            'nomAdmin'             => trim($_POST['nom']),
            'prenomAdmin'          => trim($_POST['prenom']),
            'telAdmin'             => trim($_POST['tel']), 
            'emailAdmin'           => trim($_POST['email']), 
            'passwordAdmin'        => trim($_POST['password']), 
            'confirmpasswordAdmin' => trim($_POST['confirmpassword']), 
            'adresseAdmin'         => trim($_POST['adresse']),
            'codepostalAdmin'      => trim($_POST['codepostal']),
            'villeAdmin'           => trim($_POST['ville']),

            // MESSAGE Error
            'nomAdminError'              => '',
            'prenomAdminError'           => '',
            'telAdminError'              => '',
            'passwordAdminError'         => '', 
            'confirmpasswordAdminError'  => '', 
            'emailAdminError'            => '',
            'passwordAdminError'         => '', 
            'confirmpasswordAdminError'  => '', 
            'adresseAdminError'          => '',
            'codepostalAdminError'       => '',
            'villeAdminError'            => ''

            ];

            $nameValidation        = "/^[a-zA-Z0-9]*$/";
            $passwordValidation    = "/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/";
            $codepostalValidation  = "/^[0-9]{5}+$/";
            $telephoneValidation   = "/^[0-9]{10}+$/";

            //Validate the form
            if (empty($data['nomAdmin']) || !preg_match($nameValidation, $data['nomAdmin'])) { 
                $data['nomAdminError']   = 'Veuillez saisir votre nom';
            } elseif (empty($data['prenomAdmin']) || !preg_match($nameValidation, $data['prenomAdmin'])){ 
                $data['prenomAdminError'] = 'Veuillez remplir saisir votre prenom';
            }elseif (empty($data['telAdmin']) || !preg_match($telephoneValidation, $data['telAdmin'])){ 
                $data['telAdminError']     = 'Veuillez saisir votre telephone.<br>Example: 06(07) ** ** ** **';
            }elseif (empty($data['adresseAdmin'])){ 
                $data['adresseAdminError'] = 'Veuillez remplir saisir votre adresse';
            }elseif (empty($data['codepostalAdmin']) || !preg_match($codepostalValidation, $data['codepostalAdmin'])){ 
                $data['codepostalAdminError'] = 'Veuillez saisir votre code postal.<br>Example: 75100';
            }elseif (empty($data['villeAdmin'])){ 
                $data['villeAdminError']      = 'Veuillez saisir votre ville';
            }elseif (empty($data['passwordAdmin']) || !preg_match($passwordValidation, $data['passwordAdmin']) || (strlen($data['passwordAdmin'])<6)){ 
                $data['passwordAdminError'] = 'Veuillez saisir votre mot de passe.';
            }elseif (empty($data['confirmpasswordAdmin']) || !preg_match($passwordValidation, $data['confirmpasswordAdmin'])){ 
                $data['confirmpasswordAdminError'] = 'Veuillez confirmer votre mot de passe.';
            }else {
                if ($data['passwordAdmin'] != $data['confirmpasswordAdmin']) {
                $data['confirmPasswordError'] = 'Les mots de passe ne correspondent pas, Veuillez réessayer.';
                }
            }

            //Validate email and telephone
            if (empty($data['emailAdmin'])) {
                $data['emailAdminError'] = 'Veuillez saisir un email addresse.';
            } elseif (!filter_var($data['emailAdmin'], FILTER_VALIDATE_EMAIL)) {
                $data['emailAdminError'] = 'Veuillez saisir un correct un correct format.';
            } else {
                // Check if email exists.
                if ($this->administrateursModel->findAdminByEmail($data['emailAdmin'])) {
                    $data['emailAdminError'] = 'Cet e-mail est déjà pris.';
                }
            }

            // Make sure that errors are empty
            if (
                empty($data['nomAdminError'])              && 
                empty($data['prenomAdminError'])           && 
                empty($data['telAdminError'])              && 
                empty($data['passwordAdminError'])         &&  
                empty($data['confirmpasswordAdminError'])  &&  
                empty($data['emailAdminError'])            && 
                empty($data['passwordAdminError'])         &&  
                empty($data['confirmpasswordAdminError'])  &&  
                empty($data['adresseAdminError'])          && 
                empty($data['codepostalAdminError'])       && 
                empty($data['villeAdminError'])        
            ){
                // Hash password
                $data['passwordAdmin'] = password_hash($data['passwordAdmin'], PASSWORD_DEFAULT);
                //Register lead from model function
                

                if ($this->administrateursModel->CreateAdmin($data)){
                    // Redirect to index page
                    $msg= "Vous avez bien enregistrer l'administrateur";
                    SessionHelper::setSession("SuccessMessage", $msg);
                    header('location:'. URLROOT .'/administrateurs/indexAdmin');  
                } else {
                    die('Something went wrong.');
                }
            }
            $this->view('administrateurs/createAdmin', $data);
        }
        $this->view('administrateurs/createAdmin', $data);
    }


    public function updateAdmin($idAdmin) {
        $administrateurs = $this->administrateursModel->findAllAdministrateurByID($idAdmin);
        $data = [
            'administrateur' => $administrateurs
        ];

        $this->view('administrateurs/updateAdmin', $data);
    }


    public function deleteAdmin($idAdmin) {
        $administrateurs = $this->administrateursModel->findAllAdministrateurByID($idAdmin);
        $data = [
            'administrateur' => $administrateurs
        ];

        $this->view('administrateurs/deleteAdmin', $data);
    }


}
