<?php
class professionels extends Controller {
    public function __construct() {
        $this->professionelModel         = $this->model('Professionel');
        $this->categoryModel             = $this->model('Category');
        $this->souscategoryModel       = $this->model('Souscategory');
    }

    public function indexPro() {
        $professionels = $this->professionelModel->findAllProfessionels();
        $data = [
            'professionels' => $professionels
        ];
        $this->view('professionels/indexPro', $data);
    }


    public function homePro() {

        $data = [
            'travaux'  =>  $this->categoryModel->findAllCategories(),
            'stravaux' => $this->souscategoryModel->findAllSousCategories()
        ];
        

        $this->view('professionels/homePro', $data);
    }

    /**
     * Reditrect to create get job 
     *
     * @return void
     */

    public function getJob() {
        if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['travaux']) ){
    
            $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
            $splitGetUrl = explode('/', trim($_GET['travaux']));

            $data = [
                'typeTravaux'        => $this->categoryModel->findCategoryByID($splitGetUrl[0]),
                'natureTravaux'      => $this->souscategoryModel->findSousCategoryByID($splitGetUrl[1]),
                'type-natureTravaux' => $this->souscategoryModel->findSousCategoryByGroup($splitGetUrl[0]),
            ];
            
            
            var_dump($splitGetUrl);
            // $this->view('professionels/createPro', $data);

        }else{
            $data = [
                'travaux'  =>  $this->categoryModel->findAllCategories(),
                'stravaux' =>  $this->souscategoryModel->findAllSousCategories() 
            ];
            $this->view('professionels/homePro', $data);
        }
    
    }

    /**
     * Controller - create professionel
     *
     * @return void
     */
    public function createPro() {

        $data = [
            'nomPro'             => '',
            'prenomPro'          => '',
            'telPro'             => '', 
            'emailPro'           => '', 
            'passwordPro'        => '', 
            'confirmpasswordPro' => '', 
            'adressePro'         => '',
            'codepostalPro'      => '',
            'villePro'           => '',
            //MESSAGE ERROR
            'nomProError'              => '',
            'prenomProError'           => '',
            'telProError'              => '',
            'passwordProError'         => '', 
            'confirmpasswordProError'  => '', 
            'emailProError'            => '',
            'adresseProError'          => '',
            'codepostalProError'       => '',
            'villeProError'            => '',

            //FormAction
            'actionForm'                 => 'createAdmin',
            'submitBtn'                 => 'Créer Pro'
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
            'nomPro'             => trim($_POST['nom']),
            'prenomPro'          => trim($_POST['prenom']),
            'telPro'             => trim($_POST['tel']), 
            'emailPro'           => trim($_POST['email']), 
            'passwordPro'        => trim($_POST['password']), 
            'confirmpasswordPro' => trim($_POST['confirmpassword']), 
            'adressePro'         => trim($_POST['adresse']),
            'codepostalPro'      => trim($_POST['codepostal']),
            'villePro'           => trim($_POST['ville']),

            // MESSAGE Error
            'nomProError'              => '',
            'prenomProError'           => '',
            'telProError'              => '',
            'passwordProError'         => '', 
            'confirmpasswordProError'  => '', 
            'emailProError'            => '',
            'passwordProError'         => '', 
            'confirmpasswordProError'  => '', 
            'adresseProError'          => '',
            'codepostalProError'       => '',
            'villeProError'            => '',
            //FormAction
            'actionForm'                 => 'createPro',
            'submitBtn'                  => 'Créer Pro'

            ];

            $nameValidation        = "/^[a-zA-Z0-9]*$/";
            $passwordValidation    = "/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/";
            $codepostalValidation  = "/^[0-9]{5}+$/";
            $telephoneValidation   = "/^[0-9]{10}+$/";

            //Validate the form
            if (empty($data['nomPro']) || !preg_match($nameValidation, $data['nomPro'])) { 
                $data['nomProError']   = 'Veuillez saisir votre nom';
            } elseif (empty($data['prenomPro']) || !preg_match($nameValidation, $data['prenomPro'])){ 
                $data['prenomProError'] = 'Veuillez remplir saisir votre prenom';
            }elseif (empty($data['telPro']) || !preg_match($telephoneValidation, $data['telPro'])){ 
                $data['telProError']     = 'Veuillez saisir votre telephone.<br>Example: 06(07) ** ** ** **';
            }elseif (empty($data['adressePro'])){ 
                $data['adresseProError'] = 'Veuillez remplir saisir votre adresse';
            }elseif (empty($data['codepostalPro']) || !preg_match($codepostalValidation, $data['codepostalPro'])){ 
                $data['codepostalProError'] = 'Veuillez saisir votre code postal.<br>Example: 75100';
            }elseif (empty($data['villePro'])){ 
                $data['villeProError']      = 'Veuillez saisir votre ville';
            }elseif (empty($data['passwordPro']) || !preg_match($passwordValidation, $data['passwordPro']) || (strlen($data['passwordPro'])<6)){ 
                $data['passwordProError'] = 'Veuillez saisir un valide mot de passe.';
            }elseif (empty($data['confirmpasswordPro']) || !preg_match($passwordValidation, $data['confirmpasswordPro'])){ 
                $data['confirmpasswordProError'] = 'Veuillez confirmer votre mot de passe.';
            }else {
                if ($data['passwordPro'] != $data['confirmpasswordPro']) {
                $data['confirmpasswordProError'] = 'Les mots de passe ne correspondent pas, Veuillez réessayer.';
                }
            }

            //Validate email and telephone
            if (empty($data['emailPro'])) {
                $data['emailProError'] = 'Veuillez saisir un email addresse.';
            } elseif (!filter_var($data['emailPro'], FILTER_VALIDATE_EMAIL)) {
                $data['emailProError'] = 'Veuillez saisir un correct un correct format.';
            } else {
                // Check if email exists.
                if ($this->professionelModel ->findAdminByEmail($data['emailPro'])) {
                    $data['emailProError'] = 'Cet e-mail est déjà pris.';
                }
            }

            // Make sure that errors are empty
            if (
                empty($data['nomProError'])              && 
                empty($data['prenomProError'])           && 
                empty($data['telProError'])              && 
                empty($data['passwordProError'])         &&  
                empty($data['confirmpasswordProError'])  &&  
                empty($data['emailProError'])            && 
                empty($data['passwordProError'])         &&  
                empty($data['confirmpasswordProError'])  &&  
                empty($data['adresseProError'])          && 
                empty($data['codepostalProError'])       && 
                empty($data['villeProError'])        
            ){
                // Hash password
                $data['passwordPro'] = password_hash($data['passwordPro'], PASSWORD_DEFAULT);
                //Register lead from model function
                

                if ($this->professionelModel ->CreateAdmin($data)){
                    // Redirect to index page
                    $msg= "Vous avez bien enregistrer le professionel";
                    SessionHelper::setSession("SuccessMessage", $msg);
                    SessionHelper::redirectTo('/professionels/indexAdmin');  
                } else {
                    $msg= "Vous n'avez pas enregistrer le professionel";
                    SessionHelper::setSession("ErrorMessage", $msg);
                    SessionHelper::redirectTo('/professionels/indexPro');
                }
            }
            $this->view('/professionels/createPro', $data);
        }
        $this->view('/professionels/createPro', $data);
    }



    /**
     * Controller - update professionel
     *
     * @param Integer $idPro
     * @return void
     */
    public function updatePro(int $idPro) {

        $pros = $this->professionelModel ->findAllAdministrateurByID($idPro);
        $data = [
            'idPro'            => $pros->id,
            'nomPro'             => $pros->nom,
            'prenomPro'          => $pros->prenom,
            'telPro'             => $pros->tel, 
            'emailPro'           => $pros->email, 
            'passwordPro'        => $pros->password, 
            'confirmpasswordPro' => $pros->password, 
            'adressePro'         => $pros->adresse,
            'codepostalPro'      => $pros->codepostal,
            'villePro'           => $pros->ville,
            //MESSAGE ERROR
            'nomProError'              => '',
            'prenomProError'           => '',
            'telProError'              => '',
            'passwordProError'         => '', 
            'confirmpasswordProError'  => '', 
            'emailProError'            => '',
            'adresseProError'          => '',
            'codepostalProError'       => '',
            'villeProError'            => '',

            //FormAction
            'actionForm'                 => 'updatePro/'.$pros->id,
            'submitBtn'                 => 'Modifier Pro',
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
            'idPro'              => $pros->id,
            'nomPro'             => trim($_POST['nom']),
            'prenomPro'          => trim($_POST['prenom']),
            'telPro'             => trim($_POST['tel']), 
            'emailPro'           => trim($_POST['email']), 
            'passwordPro'        => trim($_POST['password']), 
            'confirmpasswordPro' => trim($_POST['confirmpassword']), 
            'adressePro'         => trim($_POST['adresse']),
            'codepostalPro'      => trim($_POST['codepostal']),
            'villePro'           => trim($_POST['ville']),

            // MESSAGE Error
            'nomProError'              => '',
            'prenomProError'           => '',
            'telProError'              => '',
            'passwordProError'         => '', 
            'confirmpasswordProError'  => '', 
            'emailProError'            => '',
            'passwordProError'         => '', 
            'confirmpasswordProError'  => '', 
            'adresseProError'          => '',
            'codepostalProError'       => '',
            'villeProError'            => '',
            //FormAction
            'actionForm'                 => 'updatePro/'.$pros->id,
            'submitBtn'                 => 'Modifier Pro',

            ];

            $nameValidation        = "/^[a-zA-Z0-9]*$/";
            $passwordValidation    = "/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/";
            $codepostalValidation  = "/^[0-9]{5}+$/";
            $telephoneValidation   = "/^[0-9]{10}+$/";

            //Validate the form
            if (empty($data['nomPro']) || !preg_match($nameValidation, $data['nomPro'])) { 
                $data['nomProError']   = 'Veuillez saisir votre nom';
            } elseif (empty($data['prenomPro']) || !preg_match($nameValidation, $data['prenomPro'])){ 
                $data['prenomProError'] = 'Veuillez remplir saisir votre prenom';
            }elseif (empty($data['telPro']) || !preg_match($telephoneValidation, $data['telPro'])){ 
                $data['telProError']     = 'Veuillez saisir votre telephone.<br>Example: 06(07) ** ** ** **';
            }elseif (empty($data['adressePro'])){ 
                $data['adresseProError'] = 'Veuillez remplir saisir votre adresse';
            }elseif (empty($data['codepostalPro']) || !preg_match($codepostalValidation, $data['codepostalPro'])){ 
                $data['codepostalProError'] = 'Veuillez saisir votre code postal.<br>Example: 75100';
            }elseif (empty($data['villePro'])){ 
                $data['villeProError']      = 'Veuillez saisir votre ville';
            }elseif (empty($data['passwordPro']) || !preg_match($passwordValidation, $data['passwordPro']) || (strlen($data['passwordPro'])<6)){ 
                $data['passwordProError'] = 'Veuillez saisir un valide mot de passe.';
            }elseif (empty($data['confirmpasswordPro']) || !preg_match($passwordValidation, $data['confirmpasswordPro'])){ 
                $data['confirmpasswordProError'] = 'Veuillez confirmer votre mot de passe.';
            }else {
                if ($data['passwordPro'] != $data['confirmpasswordPro']) {
                $data['confirmPasswordError'] = 'Les mots de passe ne correspondent pas, Veuillez réessayer.';
                }
            }

            //Validate email and telephone
            if (empty($data['emailPro'])) {
                $data['emailProError'] = 'Veuillez saisir un email addresse.';
            } elseif (!filter_var($data['emailPro'], FILTER_VALIDATE_EMAIL)) {
                $data['emailProError'] = 'Veuillez saisir un correct un correct format.';
            } else {
                // Check if email exists.
                if ($this->professionelModel ->findAdminByEmail($data['emailPro'])) {
                    $data['emailProError'] = 'Cet e-mail est déjà pris.';
                }
            }

            // Make sure that errors are empty
            if (
                empty($data['nomProError'])              && 
                empty($data['prenomProError'])           && 
                empty($data['telProError'])              && 
                empty($data['passwordProError'])         &&  
                empty($data['confirmpasswordProError'])  &&  
                empty($data['emailProError'])            && 
                empty($data['passwordProError'])         &&  
                empty($data['confirmpasswordProError'])  &&  
                empty($data['adresseProError'])          && 
                empty($data['codepostalProError'])       && 
                empty($data['villeProError'])        
            ){
                // Hash password
                $data['passwordPro'] = password_hash($data['passwordPro'], PASSWORD_DEFAULT);
                //Register lead from model function
                echo  $data['passwordPro'];

                if ($this->professionelModel ->updatePro($data) ){
                    // Redirect to index page
                    $msg= "Vous avez bien Modifier le professionel";
                    SessionHelper::setSession("SuccessMessage", $msg);
                    SessionHelper::redirectTo('/professionels/indexAdmin');  
                } else {
                    $msg= "Vous n'avez pas Modifier le professionel";
                    SessionHelper::setSession("ErrorMessage", $msg);
                    SessionHelper::redirectTo('/professionels/indexAdmin');
                }
            }
            $this->view('/professionels/updatePro', $data);
        }
        $this->view('/professionels/updatePro', $data);
    }

    /**
     * Controller - delete professionel
     *
     * @param Integer $idPro
     * @return void
     */
    public function deletePro($idPro) {
        $pros = $this->professionelModel ->findAllAdministrateurByID($idPro);
        $data = [
            'idPro'              => $pros->id,
            'nomPro'             => $pros->nom,
            'prenomPro'          => $pros->prenom,
            'telPro'             => $pros->tel, 
            'emailPro'           => $pros->email, 
            'passwordPro'        => $pros->password, 
            'confirmpasswordPro' => $pros->password, 
            'adressePro'         => $pros->adresse,
            'codepostalPro'      => $pros->codepostal,
            'villePro'           => $pros->ville,
            //MESSAGE ERROR
            'nomProError'              => '',
            'prenomProError'           => '',
            'telProError'              => '',
            'passwordProError'         => '', 
            'confirmpasswordProError'  => '', 
            'emailProError'            => '',
            'adresseProError'          => '',
            'codepostalProError'       => '',
            'villeProError'            => '',

            //FormAction
            'actionForm'                 => 'deletePro/'.$pros->id,
            'submitBtn'                 => 'Supprimer Pro',
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'idPro'              => $pros->id,
                'actionForm'           => 'deletePro/'.$pros->id,
                'submitBtn'            => 'Supprimer Pro',
            ];

        
            if ($this->professionelModel ->deletePro($data) ){
                // Redirect to index page
                $msg= "Vous avez bien supprimer le professionel";
                SessionHelper::setSession("SuccessMessage", $msg);
                SessionHelper::redirectTo('/professionels/indexAdmin');  
            } else {
                //die('Something went wrong.');
                $msg= "Vous n'avez pas supprimer le professionel";
                SessionHelper::setSession("ErrorMessage", $msg);
                SessionHelper::redirectTo('/professionels/indexAdmin');
            }
            
            $this->view('/professionels/deletePro', $data);
        }
        $this->view('/professionels/deletePro', $data);
    }


}