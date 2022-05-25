

<?php
class Administrateurs extends Controller {
    public function __construct() {
        $this->administrateursModel = $this->model('Administrateur');
    }

    /**
     * Get all admins
     *
     * @return void
     */
    public function indexAdmin() {
        $administrateurs = $this->administrateursModel->findAllAdministrateurs();
        $data = [
            'administrateurs' => $administrateurs
        ];

        $this->view('administrateurs/indexAdmin', $data);
    }

    /**
     * Searche form professionel 
     *
     * @return void
     */
    public function search() {
        $data = ['administrateurs' => $this->administrateursModel->findAllAdministrateurs(), ];

        // var_dump(!empty($_GET['search']));
        if($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['search']) ){
            $search = trim($_GET['search']);
            $data = [
                'searchAdmin' => $this->administrateursModel->findSearchAdmin($search),
            ];
            
            
            if (count($data['searchAdmin']) > 0) {
                // Redirect to index page
                $msg = COUNT($data['searchAdmin'])." - résultat trouvé pour la recherche  -> '".$search."'";
                SessionHelper::setSession("SuccessMessage", $msg); 
            } else {
                //Redirect to the index
                $msg= " Aucun résultat n'est trouvé pour la recherche  -> '".$search."'";
                SessionHelper::setSession("ErrorMessage", $msg);
            }
            $this->view('administrateurs/indexAdmin', $data);
        }else{
            SessionHelper::redirectTo('/administrateurs/indexAdmin'); 
        }

    }


    /**
     * get infos administrateur
     *
     * @param [type] $idAdmin
     * @return void
     */
    public function detailAdmin($idAdmin) {
        $administrateurs = $this->administrateursModel->findAllAdministrateurByID($idAdmin);
        $data = [
            'administrateur' => $administrateurs
        ];

        $this->view('administrateurs/detailAdmin', $data);
    }


    /**
     * Register administrateur
     *
     * @return void
     */
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
            //MESSAGE ERROR
            'nomAdminError'              => '',
            'prenomAdminError'           => '',
            'telAdminError'              => '',
            'passwordAdminError'         => '', 
            'confirmpasswordAdminError'  => '', 
            'emailAdminError'            => '',
            'adresseAdminError'          => '',
            'codepostalAdminError'       => '',
            'villeAdminError'            => '',

            //FormAction
            'actionForm'                 => 'createAdmin',
            'submitBtn'                 => 'Créer Admin'
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
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
            'villeAdminError'            => '',
            //FormAction
            'actionForm'                 => 'createAdmin',
            'submitBtn'                  => 'Créer Admin'

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
                $data['passwordAdminError'] = 'Veuillez saisir un valide mot de passe.';
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
                    $data['emailAdminError'] = 'Cet e-mail est déjà pris. Si vous avez oublier votre mot de passe, Veuillez modifier.';
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
                
                

                if ($this->administrateursModel->CreateAdmin($data)){
                    // Redirect to index page
                    $msg= "Vous avez bien enregistrer l'administrateur";
                    SessionHelper::setSession("SuccessMessage", $msg);
                    SessionHelper::redirectTo('/administrateurs/indexAdmin');  
                } else {
                    $msg= "Vous n'avez pas enregistrer l'administrateur";
                    SessionHelper::setSession("ErrorMessage", $msg);
                    SessionHelper::redirectTo('/administrateurs/indexAdmin');
                }
            }
            $this->view('administrateurs/createAdmin', $data);
        }
        $this->view('administrateurs/createAdmin', $data);
    }


    /**
     * updatye administrateur
     *
     * @param [type] $idAdmin
     * @return void
     */
    public function updateAdmin($idAdmin) {

        $admins = $this->administrateursModel->findAllAdministrateurByID($idAdmin);
        $data = [
            'idAdmin'              => $admins->id,
            'nomAdmin'             => $admins->nom,
            'prenomAdmin'          => $admins->prenom,
            'telAdmin'             => $admins->tel, 
            'emailAdmin'           => $admins->email, 
            'passwordAdmin'        => $admins->password, 
            'confirmpasswordAdmin' => $admins->password, 
            'adresseAdmin'         => $admins->adresse,
            'codepostalAdmin'      => $admins->codepostal,
            'villeAdmin'           => $admins->ville,
            //MESSAGE ERROR
            'nomAdminError'              => '',
            'prenomAdminError'           => '',
            'telAdminError'              => '',
            'passwordAdminError'         => '', 
            'confirmpasswordAdminError'  => '', 
            'emailAdminError'            => '',
            'adresseAdminError'          => '',
            'codepostalAdminError'       => '',
            'villeAdminError'            => '',

            //FormAction
            'actionForm'                 => 'updateAdmin/'.$admins->id,
            'submitBtn'                 => 'Modifier Admin',
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $data = [
            'idAdmin'              => $admins->id,
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
            'villeAdminError'            => '',
            //FormAction
            'actionForm'                 => 'updateAdmin/'.$admins->id,
            'submitBtn'                 => 'Modifier Admin',

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
                $data['passwordAdminError'] = 'Veuillez saisir un valide mot de passe.';
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
                
                echo  $data['passwordAdmin'];

                if ($this->administrateursModel->UpdateAdmin($data) ){
                    // Redirect to index page
                    $msg= "Vous avez bien Modifier l'administrateur";
                    SessionHelper::setSession("SuccessMessage", $msg);
                    SessionHelper::redirectTo('/administrateurs/indexAdmin');  
                } else {
                    $msg= "Vous n'avez pas Modifier l'administrateur";
                    SessionHelper::setSession("ErrorMessage", $msg);
                    SessionHelper::redirectTo('/administrateurs/indexAdmin');
                }
            }
            $this->view('administrateurs/updateAdmin', $data);
        }
        $this->view('administrateurs/updateAdmin', $data);
    }

    /**
     * Delete administrateur
     *
     * @param [type] $idAdmin
     * @return void
     */
    public function deleteAdmin($idAdmin) {
        $admins = $this->administrateursModel->findAllAdministrateurByID($idAdmin);
        $data = [
            'idAdmin'              => $admins->id,
            'nomAdmin'             => $admins->nom,
            'prenomAdmin'          => $admins->prenom,
            'telAdmin'             => $admins->tel, 
            'emailAdmin'           => $admins->email, 
            'passwordAdmin'        => $admins->password, 
            'confirmpasswordAdmin' => $admins->password, 
            'adresseAdmin'         => $admins->adresse,
            'codepostalAdmin'      => $admins->codepostal,
            'villeAdmin'           => $admins->ville,
            //MESSAGE ERROR
            'nomAdminError'              => '',
            'prenomAdminError'           => '',
            'telAdminError'              => '',
            'passwordAdminError'         => '', 
            'confirmpasswordAdminError'  => '', 
            'emailAdminError'            => '',
            'adresseAdminError'          => '',
            'codepostalAdminError'       => '',
            'villeAdminError'            => '',

            //FormAction
            'actionForm'                 => 'deleteAdmin/'.$admins->id,
            'submitBtn'                 => 'Supprimer Admin',
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $data = [
            'idAdmin'              => $admins->id,
            'actionForm'           => 'deleteAdmin/'.$admins->id,
            'submitBtn'            => 'Modifier Admin',

            ];

        
            if ($this->administrateursModel->DeleteAdmin($data) ){
                // Redirect to index page
                $msg= "Vous avez bien supprimer l'administrateur";
                SessionHelper::setSession("SuccessMessage", $msg);
                SessionHelper::redirectTo('/administrateurs/indexAdmin');  
            } else {
                //die('Something went wrong.');
                $msg= "Vous n'avez pas supprimer l'administrateur";
                SessionHelper::setSession("ErrorMessage", $msg);
                SessionHelper::redirectTo('/administrateurs/indexAdmin');
            }
            
            $this->view('administrateurs/deleteAdmin', $data);
        }
        $this->view('administrateurs/deleteAdmin', $data);
    }


}
