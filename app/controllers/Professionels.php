<?php
class professionels extends Controller {
    public function __construct() {
        $this->administrateursModel    = $this->model('Administrateur');
        $this->professionelModel       = $this->model('Professionel');
        $this->categoryModel           = $this->model('Category');
        $this->souscategoryModel       = $this->model('Souscategory');
        $this->postModel               = $this->model('Post');
    }

    public function indexPro() {
        $professionels = $this->professionelModel->findAllProfessionels();
        $data = [
            'professionels' => $professionels
        ];
        $this->view('professionels/indexPro', $data);
    }


    /**
     * Searche form professionel 
     *
     * @return void
     */
    public function search() {
        $professionels = $this->professionelModel->findAllProfessionels();
        $data = [
            'professionels' => $professionels
        ];

        // var_dump(!empty($_GET['search']));
        if($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['search']) ){
            $search = trim($_GET['search']);
            $data = [
                'searchPro' => $this->professionelModel->findSearchPro($search),
            ];
            
            
            if (count($data['searchPro']) > 0) {
                // Redirect to index page
                $msg = COUNT($data['searchPro'])." - résultat trouvé pour la recherche  -> '".$search."'";
                SessionHelper::setSession("SuccessMessage", $msg); 
            } else {
                //Redirect to the index
                $msg= " Aucun résultat n'est trouvé pour la recherche  -> '".$search."'";
                SessionHelper::setSession("ErrorMessage", $msg);
            }
            $this->view('professionels/indexPro', $data);
        }else{
            SessionHelper::redirectTo('/professionels/indexPro'); 
        }

    }


    /**
     * Home page professionelle
     *
     * @return void
     */
    public function homePro() {
        $data = [
            'jobs'   =>'',
            'category'  =>'',
            'scategory' =>'',
            'travaux'   => $this->categoryModel->findAllCategories(),
            'stravaux'  => $this->souscategoryModel->findAllSousCategories(),
            'posts'     => $this->postModel->findAllPosts(),
        ];
        $this->view('professionels/homePro', $data);
    }

    /**
     * Reditrect to create get job 
     *
     * @return void
     */

    public function getJob() {
        $data = [
            'jobs'   =>'',
            'category'           =>'',
            'scategory'          =>'',
            'travaux'            =>$this->categoryModel->findAllCategories(),
            'stravaux'           =>$this->souscategoryModel->findAllSousCategories(),
            'posts'              => $this->postModel->findAllPosts(),
        ];
        
        if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['travaux']) ){
            $splitGetUrl = explode('/', trim($_GET['travaux']));
            
            if(count($splitGetUrl)>1){
                $idcategory  =  intval($splitGetUrl[0]);
                $idscategory =  intval($splitGetUrl[1]);
                $data = [
                    'jobs'   =>'',
                    'category'           =>$idcategory,
                    'scategory'          =>$idscategory,
                ];

                if ($this->professionelModel->GetJob($data)){
                    // Redirect to index page
                    $data = [
                        'jobs'     =>$this->professionelModel->GetJob($data),
                        'travaux'  =>$this->categoryModel->findAllCategories(),
                        'stravaux' =>$this->souscategoryModel->findAllSousCategories(),
                        'posts'    => $this->postModel->findAllPosts(),
                    ];
                    $msg= count($data['jobs'])." - "."  travaux à votre proposition.";
                    SessionHelper::setSession("SuccessMessage", $msg);
                    $this->view('professionels/homePro', $data);  
                } else {
                    $msg= "Aucun travaux disponible.";
                    SessionHelper::setSession("ErrorMessage", $msg);
                    SessionHelper::redirectTo('/professionels/homePro');
                }
                
            
            }

            $this->view('professionels/homePro', $data);
        }
        
        $this->view('professionels/homePro', $data);
    }


    public function detailPro($idpro){
        $professionel = $this->professionelModel->findProfessionelByID($idpro);
        // Get existing Domaines id and Name
        $domainesPro = $this->professionelModel->GetActivitiesByID($idpro);
        $arrDomaineID = array();
        $arrDomaineNom = array();
        foreach ($domainesPro as $item) {
            array_push($arrDomaineID , $item->idctg);
            //Get domainnames
            array_push($arrDomaineNom, $this->categoryModel->findCategoryByID($item->idctg)->ctgnom);
        }
        $prvDomainesID   = implode(", ",$arrDomaineID );//array to string
        $prvDomainesNom  = implode(", ",$arrDomaineNom);
        
        $data = [
            'idPro'              => $professionel->idpro,
            'professionel'       => $professionel,
            'choixDomains'       => $this->categoryModel->findAllCategories(),
            'nomEnt'             => $professionel->nom,
            'nomPro'             => $professionel->nomcontact,
            'prenomPro'          => $professionel->prenomcontact,
            'fonctionPro'        => $professionel->fonctioncontact,
            'domainesEnt'        => $prvDomainesID,
            'choixDomain'        => $prvDomainesNom,
            'telPro'             => $professionel->telcontact, 
            'emailPro'           => $professionel->emailcontact, 
            'passwordPro'        => $professionel->password, 
            'confirmpasswordPro' => $professionel->password, 
            'adressePro'         => $professionel->adresse,
            'codepostalPro'      => $professionel->codepostal,
            'villePro'           => $professionel->ville,
            'paysPro'            => $professionel->pays,
            //MESSAGE ERROR
            'nomEntError'              => '',
            'nomProError'              => '',
            'prenomProError'           => '',
            'fonctionProError'         => '',
            'domainesEntError'         => '',
            'choixDomainError'         => '',
            'telProError'              => '',
            'passwordProError'         => '', 
            'confirmpasswordProError'  => '', 
            'emailProError'            => '',
            'adresseProError'          => '',
            'codepostalProError'       => '',
            'villeProError'            => '',
            'paysProError'             => '',

            //FormAction
            'actionForm'                => '/professionels/detailPro/'.$professionel->idpro,
            'submitBtn'                 => 'Modifier Professionel'
        ];
        $this->view('professionels/detailPro', $data);
    }

    /**
     * Controller - create professionel
     *
     * @return void
     */
    public function createPro() {

        $data = [
            'choixDomains'       =>  $this->categoryModel->findAllCategories(),
            'nomEnt'             => '',
            'nomPro'             => '',
            'prenomPro'          => '',
            'fonctionPro'        => '',
            'domainesEnt'        => '',
            'choixDomain'        => '',
            'telPro'             => '', 
            'emailPro'           => '', 
            'passwordPro'        => '', 
            'confirmpasswordPro' => '', 
            'adressePro'         => '',
            'codepostalPro'      => '',
            'villePro'           => '',
            'paysPro'            => '',
            //MESSAGE ERROR
            'nomEntError'              => '',
            'nomProError'              => '',
            'prenomProError'           => '',
            'fonctionProError'         => '',
            'domainesEntError'         => '',
            'choixDomainError'         => '',
            'telProError'              => '',
            'passwordProError'         => '', 
            'confirmpasswordProError'  => '', 
            'emailProError'            => '',
            'adresseProError'          => '',
            'codepostalProError'       => '',
            'villeProError'            => '',
            'paysProError'             => '',

            //FormAction
            'actionForm'                 => '/professionels/createPro',
            'submitBtn'                 => 'Créer Pro'
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $data = [
                'choixDomains'       =>  $this->categoryModel->findAllCategories(),
                'nomEnt'             => trim($_POST['nomEnt']),
                'domainesEnt'        => trim($_POST['domaine']),
                'choixDomain'        => trim($_POST['choixDomains']),
                'nomPro'             => trim($_POST['nom']),
                'prenomPro'          => trim($_POST['prenom']),
                'fonctionPro'        => trim($_POST['fonction']),
                'telPro'             => trim($_POST['tel']), 
                'emailPro'           => trim($_POST['email']), 
                'passwordPro'        => trim($_POST['password']), 
                'confirmpasswordPro' => trim($_POST['confirmpassword']), 
                'adressePro'         => trim($_POST['adresse']),
                'codepostalPro'      => trim($_POST['codepostal']),
                'villePro'           => trim($_POST['ville']),
                'paysPro'            => trim($_POST['pays']),

                //MESSAGE ERROR
                'nomEntError'              => '',
                'nomProError'              => '',
                'prenomProError'           => '',
                'fonctionProError'         => '',
                'domainesEntError'         => '',
                'choixDomainError'         => '',
                'telProError'              => '',
                'passwordProError'         => '', 
                'confirmpasswordProError'  => '', 
                'emailProError'            => '',
                'adresseProError'          => '',
                'codepostalProError'       => '',
                'villeProError'            => '',
                'paysProError'             => '',

                //FormAction
                'actionForm'                => '/professionels/createPro',
                'submitBtn'                 => 'Créer Professionel'

            ];

            $nameValidation        = "/^[a-zA-Z0-9]*$/";
            $passwordValidation    = "/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/";
            $codepostalValidation  = "/^[0-9]{5}+$/";
            $telephoneValidation   = "/^[0-9]{10}+$/";

            //Validate the form
            if (empty($data['nomEnt']) || !preg_match($nameValidation, $data['nomEnt'])) { 
                $data['nomEntError']   = 'Veuillez saisir votre nom d\'enterprise';
            } elseif (empty($data['nomPro']) || !preg_match($nameValidation, $data['nomPro'])) { 
                $data['nomProError']   = 'Veuillez saisir votre nom';
            } elseif (empty($data['prenomPro']) || !preg_match($nameValidation, $data['prenomPro'])){ 
                $data['prenomProError'] = 'Veuillez remplir saisir votre prenom';
            } elseif (empty($data['domainesEnt']) ){ 
                $data['domainesEntError'] = 'Veuillez choisir votre domanine d\'activité';
            } elseif (empty($data['fonctionPro'])){ 
                $data['fonctionProError'] = 'Veuillez remplir votre fonction dans l\'enterprise ';
            } elseif (empty($data['telPro']) || !preg_match($telephoneValidation, $data['telPro'])){ 
                $data['telProError']     = 'Veuillez saisir votre telephone.<br>Example: 06(07) ** ** ** **';
            }  if (empty($data['emailPro'])) { //Validate email 
                $data['emailProError'] = 'Veuillez saisir un email addresse.';
            } elseif (!filter_var($data['emailPro'], FILTER_VALIDATE_EMAIL)) {
                $data['emailProError'] = 'Veuillez saisir un correct un correct format.';
            } elseif (empty($data['adressePro'])){ 
                $data['adresseProError'] = 'Veuillez remplir saisir votre adresse';
            } elseif (empty($data['codepostalPro']) || !preg_match($codepostalValidation, $data['codepostalPro'])){ 
                $data['codepostalProError'] = 'Veuillez saisir votre code postal.<br>Example: 75100';
            } elseif (empty($data['villePro'])){ 
                $data['villeProError']     = 'Veuillez saisir votre ville';
            } elseif (empty($data['paysPro'])){ 
                $data['paysProError']      = 'Veuillez saisir votre pays';
            } elseif (empty($data['passwordPro']) || !preg_match($passwordValidation, $data['passwordPro']) || (strlen($data['passwordPro'])<6)){ 
                $data['passwordProError'] = 'Veuillez saisir un valide mot de passe.';
            } elseif (empty($data['confirmpasswordPro']) || !preg_match($passwordValidation, $data['confirmpasswordPro'])){ 
                $data['confirmpasswordProError'] = 'Veuillez confirmer votre mot de passe.';
            } else {
                if ($data['passwordPro'] != $data['confirmpasswordPro']) {
                $data['confirmpasswordProError'] = 'Les mots de passe ne correspondent pas, Veuillez réessayer.';
                }
            }



            if ($this->professionelModel->findProByEmail($data) ) {
                $data['emailProError'] = 'Cet e-mail est déjà pris. Si vous avez oublier votre mot de passe, Veuillez modifier.';
            }

            // Make sure that errors are empty
            if (
                empty($data['nomEntError'])              &&
                empty($data['domainesEntError'])         && 
                empty($data['nomProError'])              && 
                empty($data['prenomProError'])           && 
                empty($data['telProError'])              && 
                empty($data['fonctionProError'])         && 
                empty($data['passwordProError'])         &&  
                empty($data['confirmpasswordProError'])  &&  
                empty($data['emailProError'])            &&  
                empty($data['adresseProError'])          && 
                empty($data['codepostalProError'])       && 
                empty($data['villeProError'])        
            ){
                //Hash password
                $data['passwordPro'] = password_hash($data['passwordPro'], PASSWORD_DEFAULT);
                
                
                if ($this->professionelModel->CreatePro($data)){
                        $idPro = $this->professionelModel->GetLastID();
                        $secteuActivite = explode(",", $data['domainesEnt']);

                        foreach ($secteuActivite as $item) {
                            $activite = [
                                'idctg'        =>intval($item),
                                'idpro'        =>$idPro,
                            ];
                            $this->professionelModel->AddActivitePro($activite);
                        }



                    // Redirect to index page
                    $msg= "Vous avez bien enregistrer le professionel";
                    SessionHelper::setSession("SuccessMessage", $msg);
                    SessionHelper::redirectTo('/professionels/indexPro');  
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
     * Controller - Update professionel
     *
     * @return void
     */
    public function UpdatePro($idpro) {
        $professionel = $this->professionelModel->findProfessionelByID($idpro);

        // Get existing Domaines id and Name
        $domainesPro = $this->professionelModel->GetActivitiesByID($idpro);
        $arrDomaineID = array();
        $arrDomaineNom = array();
        foreach ($domainesPro as $item) {
            array_push($arrDomaineID , $item->idctg);
            //Get domainnames
            array_push($arrDomaineNom, $this->categoryModel->findCategoryByID($item->idctg)->ctgnom);
        }
        $prvDomainesID   = implode(", ",$arrDomaineID );//array to string
        $prvDomainesNom  = implode(", ",$arrDomaineNom);
        

        $data = [
            'idPro'              => $professionel->idpro,
            'existingDomaines'   => $arrDomaineID,
            'choixDomains'       => $this->categoryModel->findAllCategories(),
            'nomEnt'             => $professionel->nom,
            'nomPro'             => $professionel->nomcontact,
            'prenomPro'          => $professionel->prenomcontact,
            'fonctionPro'        => $professionel->fonctioncontact,
            'domainesEnt'        => $prvDomainesID,
            'choixDomain'        => $prvDomainesNom,
            'telPro'             => $professionel->telcontact, 
            'emailPro'           => $professionel->emailcontact, 
            'passwordPro'        => $professionel->password, 
            'confirmpasswordPro' => $professionel->password, 
            'adressePro'         => $professionel->adresse,
            'codepostalPro'      => $professionel->codepostal,
            'villePro'           => $professionel->ville,
            'paysPro'            => $professionel->pays,
            //MESSAGE ERROR
            'nomEntError'              => '',
            'nomProError'              => '',
            'prenomProError'           => '',
            'fonctionProError'         => '',
            'domainesEntError'         => '',
            'choixDomainError'         => '',
            'telProError'              => '',
            'passwordProError'         => '', 
            'confirmpasswordProError'  => '', 
            'emailProError'            => '',
            'adresseProError'          => '',
            'codepostalProError'       => '',
            'villeProError'            => '',
            'paysProError'             => '',

            //FormAction
            'actionForm'                => '/professionels/updatePro/'.$professionel->idpro,
            'submitBtn'                 => 'Modifier Professionel'
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $data = [
                'idPro'              => $professionel->idpro,
                'choixDomains'       =>  $this->categoryModel->findAllCategories(),
                'nomEnt'             => trim($_POST['nomEnt']),
                'domainesEnt'        => trim($_POST['domaine']),
                'choixDomain'        => trim($_POST['choixDomains']),
                'nomPro'             => trim($_POST['nom']),
                'prenomPro'          => trim($_POST['prenom']),
                'fonctionPro'        => trim($_POST['fonction']),
                'telPro'             => trim($_POST['tel']), 
                'emailPro'           => trim($_POST['email']), 
                'passwordPro'        => trim($_POST['password']), 
                'confirmpasswordPro' => trim($_POST['confirmpassword']), 
                'adressePro'         => trim($_POST['adresse']),
                'codepostalPro'      => trim($_POST['codepostal']),
                'villePro'           => trim($_POST['ville']),
                'paysPro'            => trim($_POST['pays']),

                //MESSAGE ERROR
                'nomEntError'              => '',
                'nomProError'              => '',
                'prenomProError'           => '',
                'fonctionProError'         => '',
                'domainesEntError'         => '',
                'choixDomainError'         => '',
                'telProError'              => '',
                'passwordProError'         => '', 
                'confirmpasswordProError'  => '', 
                'emailProError'            => '',
                'adresseProError'          => '',
                'codepostalProError'       => '',
                'villeProError'            => '',
                'paysProError'             => '',

                //FormAction
                'actionForm'                => '/professionels/updatePro/'.$professionel->idpro,
                'submitBtn'                 => 'Modifier Professionel'

            ];

            $nameValidation        = "/^[a-zA-Z0-9]*$/";
            $passwordValidation    = "/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/";
            $codepostalValidation  = "/^[0-9]{5}+$/";
            $telephoneValidation   = "/^[0-9]{10}+$/";

            //Validate the form
            if (empty($data['nomEnt'])) { 
                $data['nomEntError']   = 'Veuillez saisir votre nom d\'enterprise';
            } elseif (empty($data['nomPro']) || !preg_match($nameValidation, $data['nomPro'])) { 
                $data['nomProError']   = 'Veuillez saisir votre nom';
            } elseif (empty($data['prenomPro']) || !preg_match($nameValidation, $data['prenomPro'])){ 
                $data['prenomProError'] = 'Veuillez remplir saisir votre prenom';
            } elseif (empty($data['domainesEnt']) ){ 
                $data['domainesEntError'] = 'Veuillez remplir saisir votre adresse';
            } elseif (empty($data['fonctionPro'])){ 
                $data['fonctionProError'] = 'Veuillez remplir saisir votre fonction';
            } elseif (empty($data['telPro']) || !preg_match($telephoneValidation, $data['telPro'])){ 
                $data['telProError']     = 'Veuillez saisir votre telephone.<br>Example: 06(07) ** ** ** **';
            } elseif (empty($data['adressePro'])){ 
                $data['adresseProError'] = 'Veuillez remplir saisir votre adresse';
            } elseif (empty($data['codepostalPro']) || !preg_match($codepostalValidation, $data['codepostalPro'])){ 
                $data['codepostalProError'] = 'Veuillez saisir votre code postal.<br>Example: 75100';
            } elseif (empty($data['villePro'])){ 
                $data['villeProError']     = 'Veuillez saisir votre ville';
            } elseif (empty($data['paysPro'])){ 
                $data['paysProError']      = 'Veuillez saisir votre pays';
            } elseif (empty($data['passwordPro']) || !preg_match($passwordValidation, $data['passwordPro']) || (strlen($data['passwordPro'])<6)){ 
                $data['passwordProError'] = 'Veuillez saisir un valide mot de passe.';
            } elseif (empty($data['confirmpasswordPro']) || !preg_match($passwordValidation, $data['confirmpasswordPro'])){ 
                $data['confirmpasswordProError'] = 'Veuillez confirmer votre mot de passe.';
            } else {
                if ($data['passwordPro'] != $data['confirmpasswordPro']) {
                $data['confirmpasswordProError'] = 'Les mots de passe ne correspondent pas, Veuillez réessayer.';
                }
            }

            //Validate email and telephone
            if (empty($data['emailPro'])) {
                $data['emailProError'] = 'Veuillez saisir un email addresse.';
            } elseif (!filter_var($data['emailPro'], FILTER_VALIDATE_EMAIL)) {
                $data['emailProError'] = 'Veuillez saisir un correct un correct format.';
            } 
        

            // Make sure that errors are empty
            if (
                empty($data['nomEntError'])              &&
                empty($data['domainesEntError'])         && 
                empty($data['nomProError'])              && 
                empty($data['prenomProError'])           && 
                empty($data['telProError'])              && 
                empty($data['fonctionProError'])         && 
                empty($data['passwordProError'])         &&  
                empty($data['confirmpasswordProError'])  &&  
                empty($data['emailProError'])            &&  
                empty($data['adresseProError'])          && 
                empty($data['codepostalProError'])       && 
                empty($data['villeProError'])        
            ){
                
                //Hash password
                $data['passwordPro'] = password_hash($data['passwordPro'], PASSWORD_DEFAULT);
                // $data['passwordPro'] = password_hash($data['passwordPro'], PASSWORD_DEFAULT);
                
                
                if ($this->professionelModel->updatePro($data)){
                        
                    if($this->professionelModel->DeleteActivitePro($idpro)) {
                        $newDomaines = explode(",", $data['domainesEnt']);
                        foreach ($newDomaines as $item) {
                            $Addactivite = [
                                'idctg'        =>intval($item),
                                'idpro'        =>$idpro,
                            ];
                            $this->professionelModel->AddActivitePro($Addactivite);
                        }
                        // Redirect to index page
                        $msg= "Vous avez bien modifier le professionel";
                        SessionHelper::setSession("SuccessMessage", $msg);
                        SessionHelper::redirectTo('/professionels/indexPro'); 
                    }
                
                } else {
                    $msg= "Vous n'avez pas modifier le professionel";
                    SessionHelper::setSession("ErrorMessage", $msg);
                    SessionHelper::redirectTo('/professionels/indexPro');
                }
            }
            $this->view('/professionels/updatePro', $data);
        }
        $this->view('/professionels/updatePro', $data);
    }



    /**
     * Controller - delete professionel
     *
     * @return void
     */
    public function deletePro($idpro) {

        $professionel = $this->professionelModel->findProfessionelByID($idpro);

        // Get existing Domaines id and Name
        $domainesPro = $this->professionelModel->GetActivitiesByID($idpro);
        $arrDomaineID = array();
        $arrDomaineNom = array();
        foreach ($domainesPro as $item) {
            array_push($arrDomaineID , $item->idctg);
            //Get domainnames
            array_push($arrDomaineNom, $this->categoryModel->findCategoryByID($item->idctg)->ctgnom);
        }
        $prvDomainesID   = implode(", ",$arrDomaineID );//array to string
        $prvDomainesNom  = implode(", ",$arrDomaineNom);
        

        $data = [
            'idpro'              => $professionel->idpro,
            'existingDomaines'   => $arrDomaineID,
            'choixDomains'       => $this->categoryModel->findAllCategories(),
            'nomEnt'             => $professionel->nom,
            'nomPro'             => $professionel->nomcontact,
            'prenomPro'          => $professionel->prenomcontact,
            'fonctionPro'        => $professionel->fonctioncontact,
            'domainesEnt'        => $prvDomainesID,
            'choixDomain'        => $prvDomainesNom,
            'telPro'             => $professionel->telcontact, 
            'emailPro'           => $professionel->emailcontact, 
            'passwordPro'        => $professionel->password, 
            'confirmpasswordPro' => $professionel->password, 
            'adressePro'         => $professionel->adresse,
            'codepostalPro'      => $professionel->codepostal,
            'villePro'           => $professionel->ville,
            'paysPro'            => $professionel->pays,
            //MESSAGE ERROR
            'nomEntError'              => '',
            'nomProError'              => '',
            'prenomProError'           => '',
            'fonctionProError'         => '',
            'domainesEntError'         => '',
            'choixDomainError'         => '',
            'telProError'              => '',
            'passwordProError'         => '', 
            'confirmpasswordProError'  => '', 
            'emailProError'            => '',
            'adresseProError'          => '',
            'codepostalProError'       => '',
            'villeProError'            => '',
            'paysProError'             => '',

            //FormAction
            'actionForm'                => '/professionels/deletePro/'.$professionel->idpro,
            'submitBtn'                 => 'Supprimer Professionel'
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            
            $data = [
                'idpro'            => $professionel->idpro,
                //FormAction
                'actionForm'       => '/professionels/deletePro/'.$professionel->idpro,
                'submitBtn'        => ' Supprimer Professionel',
            ];

            if($this->professionelModel->DeleteActivitePro($idpro)){

                if($this->professionelModel->deletePro($data)){
                    // Redirect to index page
                    $msg= "Vous avez bien supprimer le professionel";
                    SessionHelper::setSession("SuccessMessage", $msg);
                    SessionHelper::redirectTo('/professionels/indexPro');    
                }else{
                    //die('Something went wrong.');
                    $msg= "Vous n'avez pas supprimer le professionels";
                    SessionHelper::setSession("ErrorMessage", $msg);
                    SessionHelper::redirectTo('/professionels/indexPro');
                }
            }
            $this->view('professionels/deletePro', $data);
        }
        $this->view('professionels/deletePro', $data);
    }


    /**Exporter Excel */
    public function exporter() {

        $fileType ="xls";
        $professionels = $this->professionelModel->findAllProfessionels();;
        return $this->ExporterExcel( $fileType, $professionels);
        print_r($professionels );
    
    }


    public function ExporterExcel($fileType, $professionels){
        
        // Filter the excel data 
        function filterData(&$str){ 
            $str = preg_replace("/\t/", "\\t", $str); 
            $str = preg_replace("/\r?\n/", "\\n", $str); 
            if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
        } 

        // Excel file name for download 
        $fileName = "Exportation professionels - " . date('Ymd') .".". $fileType; 
        
        // Column names 
        $fields = array('Nb     ', 'Nom     ', 'Prenom  ', 'Telephone   ', 'Email   ', 'Adresse  ', 'Code Postal ', 'Ville   ', 'Date_created    ', 'Pays'); 
        // Display column names as first row 
        $excelData = implode("\t", array_values($fields)) . "\n"; 
        
        if(!empty($professionels)){
        
            foreach($professionels as $index=>$professionel) {
                $rowData = array( $index+1, $professionel->nom, $professionel->prenomcontact, $professionel->telcontact, $professionel->emailcontact, $professionel->adresse, $professionel->codepostal, $professionel->ville, $professionel->dateinscription , $professionel->pays );
                array_walk($rowData, 'filterData'); 
                $excelData .= implode("\t", array_values($rowData)) . "\n"; 
            }

        } else { 
                $excelData .= 'No records found...'. "\n"; 
            
        }

        header("Content-Encoding: UTF-8");
        header("Content-Type: application/x-msexcel; charset=utf-8");
        header("Content-Disposition: attachment; filename=".$fileName);
        // echo pack("CCC",0xef,0xbb,0xbf);

        // Render excel data 
        echo $excelData; 
        
        exit;

        

    }



}