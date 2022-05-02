<?php
class Leads extends Controller {
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


    public function linfos() {
        $leads = $this->leadModel->findAllLeads();
        $data = [
            'leads' => $leads
        ];

        $this->view('leads/linfos', $data);
    }

    public function addlead() {


        if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['travaux']) ){
            // Process form & Sanitize Get data
            $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
            $splitGetUrl = explode('/', trim($_GET['travaux']));
    
            $data = [
                //'travaux'            => $this->categoryModel->findAllCategories(),
                //'stravaux'           => $this->souscategoryModel->findAllSousCategories() ,
                'typeTravaux'        => $this->categoryModel->findCategoryByID($splitGetUrl[0]),
                'natureTravaux'      => $this->souscategoryModel->findSousCategoryByID($splitGetUrl[1]),
                'type-natureTravaux' => $this->souscategoryModel->findSousCategoryByGroup($splitGetUrl[0]),
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


    public function create() {

        $data = [
            'nomLead'          => '',
            'prenomLead'       => '',
            'telLead'          => '', 
            'emailLead'        => '', 
            'adresseLead'      => '',
            'codepostalLead'   => '',
            'villeLead'        => '',
            'typeTravauxLead'  => '',
            'natureProjetLead' => '',
            'projetLead'       => '',
            
            // MESSAGE Errrot 
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
    
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form & Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
                $data = [

                    // 'typeTravaux'        => $this->categoryModel->findCategoryByID($_POST['typetravaux']),
                    // 'natureTravaux'      => $this->souscategoryModel->findSousCategoryByID($_POST['naturetravaux']),
                    // 'type-natureTravaux' => $this->souscategoryModel->findSousCategoryByGroup($_POST['typetravaux']),

                    'nomLead' =>trim($_POST['nom']),
                    'prenomLead' =>trim($_POST['prenom']),
                    'telLead' => trim($_POST['tel']),
                    'emailLead' => trim($_POST['email']),
                    'adresseLead' => trim($_POST['adresse']),
                    'codepostalLead' => trim($_POST['codepostal']),
                    'villeLead' => trim($_POST['ville']),
                    'typeTravauxLead' => trim($_POST['typetravaux']),
                    'natureProjetLead' => trim($_POST['naturetravaux']),
                    'projetLead' => trim($_POST['projet']),
                    
                    // MESSAGE Errrot 
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
                    $data['enomLeadError'] = 'Veuillez saisir votre nom';
                } elseif ( empty($data['prenomLead'])){ 
                    $data['prenomLeadError'] = 'Veuillez remplir saisir votre prenom';
                } elseif (empty($data['telLead']) || strlen($data['telLead'] < 10)){ 
                    $data['telLeadError'] = 'Veuillez remplir saisir votre Telephone';
                }elseif ( empty($data['adresseLead'])){ 
                    $data['adresseLeadError'] = 'Veuillez remplir saisir votre adresse';
                }  elseif ( empty($data['codepostalLead'])){ 
                    $data['codepostalLeadError'] = 'Veuillez remplir saisir votre prenom';
                } elseif ( empty($data['villeLead'])){ 
                    $data['villeLeadError'] = 'Veuillez remplir saisir votre ville';
                } elseif ( empty($data['typeTravauxLead'])){ 
                    $data['typeTravauxLeadError'] = 'Veuillez remplir saisir votre type de travaux';
                } elseif (empty($data['natureProjetLead'])){ 
                    $data['emailLeadError'] = 'Veuillez remplir choisir votre nature de travaux';
                } 

                

                //Validate email and telephone
                if (empty($data['emailLead'])) {
                    $data['emailLeadError'] = 'Veuillez saisir un correct email addresse.';
                } elseif (!filter_var($data['emailLead'], FILTER_VALIDATE_EMAIL)) {
                    $data['emailLeadError'] = 'Veuillez saisir un correct un correct format.';
                } else {
                    //Check if email exists.
                    // if ($this->leadModel->findUserByEmail($data['emailLead'])) {
                    //     $data['emailLeadError'] = 'Cet e-mail est déjà pris.';
                    // }

                    echo "<h1>Tout vas Bien !!</h1><hr>";
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
                    empty($data['typeTravauxLeadError'])  
                ) {

                    //Register lead from model function
                    if ($this->leadModel->CreateLead($data)) {
                        //Redirect to the login page
                        header('location: ' . URLROOT . '/leads/index');
                    } else {
                        die('Something went wrong.');
                    }

                }

                var_dump($data);

        }

        $this->view('leads/create', $data);
    
    }


    public function update() {
        $leads = $this->leadModel->findAllLeads();
        $data = [
            'leads' => $leads
        ];

        $this->view('leads/update', $data);
    }

    public function delete() {
        $leads = $this->leadModel->findAllLeads();
        $data = [
            'leads' => $leads
        ];

        $this->view('leads/delete', $data);
    }



}

