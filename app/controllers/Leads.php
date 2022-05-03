<?php
class Leads extends Controller {

    /**
     * Model instance 
     */
    public function __construct() {
        $this->leadModel = $this->model('Lead');
        $this->categoryModel = $this->model('Category');
        $this->souscategoryModel = $this->model('Souscategory');
    }

    public function index() {
        $leads = $this->leadModel->findAllLeads();
        $data = [
            'leads' => $leads
        ];

        $this->view('leads/index', $data);
    }

    /**
     * for test
     *
     * @return void
     */
    public function linfos() {
        $leads = $this->leadModel->findAllLeads();
        $data = [
            'leads' => $leads
        ];

        $this->view('leads/linfos', $data);
    }

    /**
     * Reditrect to create lead/ home page 
     *
     * @return void
     */
    public function addlead() {
        if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['travaux']) ){
            // Process form & Sanitize Get data
            $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
            $splitGetUrl = explode('/', trim($_GET['travaux']));
    
            $data = [
                'typeTravaux'        => $this->categoryModel->findCategoryByID($splitGetUrl[0]),
                'natureTravaux'      => $this->souscategoryModel->findSousCategoryByID($splitGetUrl[1]),
                'type-natureTravaux' => $this->souscategoryModel->findSousCategoryByGroup($splitGetUrl[0]),
                // MESSAGE ERRORS 
                'nomLeadError'         => '',
                'prenomLeadError'      => '',
                'telLeadError'         => '',
                'emailLeadError'       => '',
                'adresseLeadError'     => '',
                'codepostalLeadError'  => '',
                'villeLeadError'       => '',
                'typeTravauxLeadError' => '',
                'natureProjetLeadError'=> '',
                'projetLeadError'      => '',
            ];
            $this->view('leads/create', $data);

        }else{
            $data = [
                'travaux'  =>  $this->categoryModel->findAllCategories(),
                'stravaux' =>  $this->souscategoryModel->findAllSousCategories() 
            ];
            $this->view('index', $data);
        }
    
    }


    /**
     * Register lead Controller
     *
     * @return void
     */
    public function create() {
        $data = [
            'typeTravaux'        => '',
            'natureTravaux'      => '',
            'type-natureTravaux' => '',
            'nomLead'            => '',
            'prenomLead'         => '',
            'telLead'            => '', 
            'emailLead'          => '', 
            'adresseLead'        => '',
            'codepostalLead'     => '',
            'villeLead'          => '',
            'typeTravauxLead'    => '',
            'natureProjetLead'   => '',
            'projetLead'         => '',
            // MESSAGE Error
            'nomLeadError'         => '',
            'prenomLeadError'      => '',
            'telLeadError'         => '',
            'emailLeadError'       => '',
            'adresseLeadError'     => '',
            'codepostalLeadError'  => '',
            'villeLeadError'       => '',
            'typeTravauxLeadError' => '',
            'natureProjetLeadError'=> '',
            'projetLeadError'      => '',
        ];
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form & Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'typeTravaux'        => $this->categoryModel->findCategoryByID(trim($_POST['typetravaux'])),
                'natureTravaux'      => $this->souscategoryModel->findSousCategoryByID(trim($_POST['naturetravaux'])),
                'type-natureTravaux' => $this->souscategoryModel->findSousCategoryByGroup(trim($_POST['typetravaux'])),
                'nomLead'            => trim($_POST['nom']),
                'prenomLead'         => trim($_POST['prenom']),
                'telLead'            => trim($_POST['tel']),
                'emailLead'          => trim($_POST['email']),
                'adresseLead'        => trim($_POST['adresse']),
                'codepostalLead'     => trim($_POST['codepostal']),
                'villeLead'          => trim($_POST['ville']),
                'typeTravauxLead'    => trim($_POST['typetravaux']),
                'natureProjetLead'   => trim($_POST['naturetravaux']),
                'projetLead'         => trim($_POST['projet']),
                'prixLead'           => 22.18,
                // MESSAGE ERRORS 
                'nomLeadError'         => '',
                'prenomLeadError'      => '',
                'telLeadError'         => '',
                'emailLeadError'       => '',
                'adresseLeadError'     => '',
                'codepostalLeadError'  => '',
                'villeLeadError'       => '',
                'typeTravauxLeadError' => '',
                'natureProjetLeadError'=> '',
                'projetLeadError'      => ''
            ];

            //Validate the form
            if (empty($data['nomLead'])) { 
                $data['nomLeadError']   = 'Veuillez saisir votre nom';
            } elseif (empty($data['prenomLead'])){ 
                $data['prenomLeadError'] = 'Veuillez remplir saisir votre prenom';
            }elseif (empty($data['telLead']) || strlen($data['telLead'] < 10)){ 
                $data['telLeadError']     = 'Veuillez remplir saisir votre telephone';
            }elseif (empty($data['adresseLead'])){ 
                $data['adresseLeadError'] = 'Veuillez remplir saisir votre adresse';
            }elseif (empty($data['codepostalLead'])){ 
                $data['codepostalLeadError'] = 'Veuillez saisir votre code postal';
            }elseif (empty($data['villeLead'])){ 
                $data['villeLeadError']      = 'Veuillez saisir votre ville';
            }elseif (empty($data['typeTravauxLead'])){ 
                $data['typeTravauxLeadError'] = 'Veuillez choisir votre type de travaux';
            }elseif (empty($data['natureProjetLead'])){ 
                $data['emailLeadError']  = 'Veuillez choisir votre nature de travaux';
            }elseif (empty($data['projetLead'])){ 
                $data['projetLeadError']  = 'Veuillez remplir préciser votre travaux';
            } 

            //Validate email and telephone
            if (empty($data['emailLead'])) {
                $data['emailLeadError'] = 'Veuillez saisir un email addresse.';
            } elseif (!filter_var($data['emailLead'], FILTER_VALIDATE_EMAIL)) {
                $data['emailLeadError'] = 'Veuillez saisir un correct un correct format.';
            } else {
                // Check if email exists.
                if ($this->leadModel->findUserByEmail($data['emailLead'])) {
                    $data['emailLeadError'] = 'Cet e-mail est déjà pris.';
                }
            }

            // Make sure that errors are empty
            if (
                empty($data['nomLeadError' ])        && 
                empty($data['prenomLeadError'])      && 
                empty($data['telLeadError'])         && 
                empty($data['emailLeadError'])       && 
                empty($data['adresseLeadError'])     && 
                empty($data['codepostalLeadError'])  && 
                empty($data['villeLeadError'])       && 
                empty($data['typeTravauxLeadError']) &&
                empty($data['typeTravauxLeadError']) &&
                empty($data['projetLeadError'])
            ){
                //Register lead from model function
                if ($this->leadModel->CreateLead($data)) {
                    //Redirect to the index
                    // $msg= "Vous avez bien ajouté le lead";
                    // Sessions::setSession("SuccessMessage", $msg);
                    header('location: ' . URLROOT . '/leads/index');
                } else {
                    die('Something went wrong.');
                }
            }

            $this->view('leads/create', $data);
        }
    }


    /**
     * update lead
     *
     * @param Integer $id
     * @return void
     */
    public function update(Int $id) {

        $lead = $this->leadModel->findLeadById($id);
        $data = [
            'idlead'               => $lead->idlead,
            'lead'                 => $lead,
            'typeTravaux'          => $this->categoryModel->findCategoryByID($lead->idctg),
            'natureTravaux'        => $this->souscategoryModel->findSousCategoryByID($lead->idsctg),
            'type-natureTravaux'   => $this->souscategoryModel->findSousCategoryByGroup($lead->idctg),
            'travaux'              => $this->categoryModel->findAllCategories(),
            'stravaux'             => $this->souscategoryModel->findAllSousCategories(),
            'nomLead'              => '',
            'prenomLead'           => '',
            'telLead'              => '', 
            'emailLead'            => '', 
            'adresseLead'          => '',
            'codepostalLead'       => '',
            'villeLead'            => '',
            'typeTravauxLead'      => '',
            'natureProjetLead'     => '',
            'projetLead'           => '',
            // MESSAGE Error
            'nomLeadError'         => '',
            'prenomLeadError'      => '',
            'telLeadError'         => '',
            'emailLeadError'       => '',
            'adresseLeadError'     => '',
            'codepostalLeadError'  => '',
            'villeLeadError'       => '',
            'typeTravauxLeadError' => '',
            'natureProjetLeadError'=> '',
            'projetLeadError'      => '',
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form & Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'idlead'               => $lead->idlead,
                'lead'                 => $lead,
                'typeTravaux'          => $this->categoryModel->findCategoryByID($lead->idctg),
                'natureTravaux'        => $this->souscategoryModel->findSousCategoryByID($lead->idsctg),
                'type-natureTravaux'   => $this->souscategoryModel->findSousCategoryByGroup($lead->idctg),
                'travaux'              => $this->categoryModel->findAllCategories(),
                'stravaux'             => $this->souscategoryModel->findAllSousCategories(),
                'nomLead'            => trim($_POST['nom']),
                'prenomLead'         => trim($_POST['prenom']),
                'telLead'            => trim($_POST['tel']),
                'emailLead'          => trim($_POST['email']),
                'adresseLead'        => trim($_POST['adresse']),
                'codepostalLead'     => trim($_POST['codepostal']),
                'villeLead'          => trim($_POST['ville']),
                'typeTravauxLead'    => trim($_POST['typetravaux']),
                'natureProjetLead'   => trim($_POST['naturetravaux']),
                'projetLead'         => trim($_POST['projet']),
                'prixLead'           => 22.18,
                // MESSAGE ERRORS 
                'nomLeadError'         => '',
                'prenomLeadError'      => '',
                'telLeadError'         => '',
                'emailLeadError'       => '',
                'adresseLeadError'     => '',
                'codepostalLeadError'  => '',
                'villeLeadError'       => '',
                'typeTravauxLeadError' => '',
                'natureProjetLeadError'=> '',
                'projetLeadError'      => ''
            ];

            //Validate the form
            if (empty($data['nomLead'])) { 
                $data['nomLeadError']   = 'Veuillez saisir votre nom';
            } elseif (empty($data['prenomLead'])){ 
                $data['prenomLeadError'] = 'Veuillez remplir saisir votre prenom';
            }elseif (empty($data['telLead']) || strlen($data['telLead'] < 10)){ 
                $data['telLeadError']     = 'Veuillez remplir saisir votre telephone';
            }elseif (empty($data['adresseLead'])){ 
                $data['adresseLeadError'] = 'Veuillez remplir saisir votre adresse';
            }elseif (empty($data['codepostalLead'])){ 
                $data['codepostalLeadError'] = 'Veuillez saisir votre code postal';
            }elseif (empty($data['villeLead'])){ 
                $data['villeLeadError']      = 'Veuillez saisir votre ville';
            }elseif (empty($data['typeTravauxLead'])){ 
                $data['typeTravauxLeadError'] = 'Veuillez choisir votre type de travaux';
            }elseif (empty($data['natureProjetLead'])){ 
                $data['emailLeadError']  = 'Veuillez choisir votre nature de travaux';
            }elseif (empty($data['projetLead'])){ 
                $data['projetLeadError']  = 'Veuillez remplir préciser votre travaux';
            } 

            //Validate email and telephone
            if (empty($data['emailLead'])) {
                $data['emailLeadError'] = 'Veuillez saisir un email addresse.';
            } elseif (!filter_var($data['emailLead'], FILTER_VALIDATE_EMAIL)) {
                $data['emailLeadError'] = 'Veuillez saisir un correct un correct format.';
            } else {
                // Check if email exists.
                if ($this->leadModel->findUserByEmail($data['emailLead'])) {
                    $data['emailLeadError'] = 'Cet e-mail est déjà pris.';
                }
            }

            // Make sure that errors are empty
            if (
                empty($data['nomLeadError' ])        && 
                empty($data['prenomLeadError'])      && 
                empty($data['telLeadError'])         && 
                empty($data['emailLeadError'])       && 
                empty($data['adresseLeadError'])     && 
                empty($data['codepostalLeadError'])  && 
                empty($data['villeLeadError'])       && 
                empty($data['typeTravauxLeadError']) &&
                empty($data['typeTravauxLeadError']) &&
                empty($data['projetLeadError'])
            ){
                //Register lead from model function
                if ($this->leadModel->UpdateLead($data)) {
                    //Redirect to the index
                    $msg= "Vous avez bien Modifier le lead";
                    SessionHelper::setSession("SuccessMessage", $msg);
                    header('location: ' . URLROOT . '/leads/index'); 
                } else {
                    die("Some thing going wrong.");
                    //header('location: ' . URLROOT . '/pages/index');
                }
            }
            $this->view('leads/update', $data);
        }

        // Ridirect to update formulaire
        $this->view('leads/update', $data);
    }

    /**
     * Delete lead Controller
     *
     * @return void
     */
    public function delete($id) {

        $lead = $this->leadModel->findLeadById($id);
        $data = [
            'idlead'               => $lead->idlead,
            'lead'                 => $lead,
            'typeTravaux'          => $this->categoryModel->findCategoryByID($lead->idctg),
            'natureTravaux'        => $this->souscategoryModel->findSousCategoryByID($lead->idsctg),
            'type-natureTravaux'   => $this->souscategoryModel->findSousCategoryByGroup($lead->idctg),
            'travaux'              => $this->categoryModel->findAllCategories(),
            'stravaux'             => $this->souscategoryModel->findAllSousCategories(),
            'nomLead'              => '',
            'prenomLead'           => '',
            'telLead'              => '', 
            'emailLead'            => '', 
            'adresseLead'          => '',
            'codepostalLead'       => '',
            'villeLead'            => '',
            'typeTravauxLead'      => '',
            'natureProjetLead'     => '',
            'projetLead'           => '',
            // MESSAGE Error
            'nomLeadError'         => '',
            'prenomLeadError'      => '',
            'telLeadError'         => '',
            'emailLeadError'       => '',
            'adresseLeadError'     => '',
            'codepostalLeadError'  => '',
            'villeLeadError'       => '',
            'typeTravauxLeadError' => '',
            'natureProjetLeadError'=> '',
            'projetLeadError'      => '',
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'idlead'               => $lead->idlead,
                'lead'                 => $lead,
                'typeTravaux'          => $this->categoryModel->findCategoryByID($lead->idctg),
                'natureTravaux'        => $this->souscategoryModel->findSousCategoryByID($lead->idsctg),
                'type-natureTravaux'   => $this->souscategoryModel->findSousCategoryByGroup($lead->idctg),
                'travaux'              => $this->categoryModel->findAllCategories(),
                'stravaux'             => $this->souscategoryModel->findAllSousCategories(),
                'nomLead'              => '',
                'prenomLead'           => '',
                'telLead'              => '', 
                'emailLead'            => '', 
                'adresseLead'          => '',
                'codepostalLead'       => '',
                'villeLead'            => '',
                'typeTravauxLead'      => '',
                'natureProjetLead'     => '',
                'projetLead'           => '',
                // MESSAGE Error
                'nomLeadError'         => '',
                'prenomLeadError'      => '',
                'telLeadError'         => '',
                'emailLeadError'       => '',
                'adresseLeadError'     => '',
                'codepostalLeadError'  => '',
                'villeLeadError'       => '',
                'typeTravauxLeadError' => '',
                'natureProjetLeadError'=> '',
                'projetLeadError'      => '',
            ];

            if($this->leadModel->DeleteLead($data['idlead'])) {
                header('location: ' . URLROOT . '/leads/index'); 
            } else {
                die('Something went wrong!');
            }
        }
        $this->view('leads/delete', $data);
    }
    




}



