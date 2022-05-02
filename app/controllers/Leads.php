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


    public function create() {
        // $listtravaux = $this->categoryModel->findAllCategories();
        // $stravaux    = $this->souscategoryModel->findAllSousCategories();

        $data = [
                'travaux'  =>  $this->categoryModel->findAllCategories(),
                'stravaux' =>  $this->souscategoryModel->findAllSousCategories() 
            ];

        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            // Process form & Sanitize Get data
            $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
            $splitGetUrl = explode('/', trim($_GET['travaux']));
    
            $data = [
                'travaux'            => $this->categoryModel->findAllCategories(),
                'stravaux'           => $this->souscategoryModel->findAllSousCategories() ,
                'typeTravaux'        => $this->categoryModel->findCategoryByID($splitGetUrl[0]),
                'natureTravaux'      => $this->souscategoryModel->findSousCategoryByID($splitGetUrl[1]),
                'type-natureTravaux' => $this->souscategoryModel->findSousCategoryByGroup($splitGetUrl[0]),
            ];

            

            

            // var_dump($data);
            $this->view('leads/create', $data);

        }else if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                $data2 = [
                    'nomLead' =>trim($_POST['nom']),
                    'prenomLead' =>trim($_POST['prenom']),
                    'telLead' => trim($_POST['tel']),
                    'emailLead' => trim($_POST['email']),
                    'adresseLead' => trim($_POST['adresse']),
                    'codepostalLead' => trim($_POST['codepostal']),
                    'villeLead' => trim($_POST['ville']),
                    'typeTravauxLead' => trim($_POST['typetravaux']),
                    ' natureTravauxLead' => trim($_POST['naturetravaux']),
                    'projetLead' => trim($_POST['projet'])
                ];


                // echo $data1['nomLead']." ".$data1[ 'prenomLead'];

                var_dump($data2);
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

