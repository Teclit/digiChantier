<?php
class Leads extends Controller {

    /**
     * Model instance 
     */
    public function __construct() {
        $this->leadModel          = $this->model('Lead');
        $this->categoryModel      = $this->model('Category');
        $this->souscategoryModel  = $this->model('Souscategory');
        $this->postModel          = $this->model('Post');
    }
    
    /**
     * index page leads 
     *
     * @return void
     */
    public function index() {
        $leads = $this->leadModel->findAllLeads();
        $data = [
            'leads' => $leads
        ];

        $this->view('leads/index', $data);
    }

    
    /**
     * Get all information about lead
     *
     * @param INT $idLead
     * @return void
     */
    public function linfo(INT $idLead){
        $lead = $this->leadModel->findLeadById($idLead);
        $data = [
            'idlead'               => $lead->idlead,
            'lead'                 => $lead,
            // 'typeTravaux'          => $this->categoryModel->findCategoryByID($lead->idctg),
            // 'natureTravaux'        => $this->souscategoryModel->findSousCategoryByID($lead->idsctg),
            // 'type-natureTravaux'   => $this->souscategoryModel->findSousCategoryByGroup($lead->idctg),
            'travaux'              => $this->categoryModel->findAllCategories(),
            'stravaux'             => $this->souscategoryModel->findAllSousCategories()
        ];

        $this->view('leads/linfo', $data);
    }


    /**
     * Reditrect to create lead/ home page 
     *
     * @return void
     */
    public function addlead() {

        $splitGetUrl = explode('/', trim($_GET['travaux']));
        // var_dump($splitGetUrl );
            
        if($_SERVER['REQUEST_METHOD'] == 'GET' && count($splitGetUrl)>1 ){
            // Process form & Sanitize Get data
            
            $data = [
                'posts'              => $this->postModel->findAllPosts(),
                'travaux'            =>  $this->categoryModel->findAllCategories(),
                'stravaux'           =>  $this->souscategoryModel->findAllSousCategories() ,
                'typeTravaux'        => $this->categoryModel->findCategoryByID($splitGetUrl[0]),
                'natureTravaux'      => $this->souscategoryModel->findSousCategoryByID($splitGetUrl[1]),
                'type-natureTravaux' => $this->souscategoryModel->findSousCategoryByGroup($splitGetUrl[0]),
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
    
                //FormAction
                'actionForm'                => '/leads/create',
                'submitBtn'                 => 'cr??er'
            ];
            
            $this->view('leads/create', $data);

        }else{
            $data = [
                'posts'    => $this->postModel->findAllPosts(),
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
            'posts'              => $this->postModel->findAllPosts(),
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

            //FormAction
            'actionForm'                => '/leads/create',
            'submitBtn'                 => 'cr??er'
        ];
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form & Sanitize POST data
            
            $data = [
                'posts'              => $this->postModel->findAllPosts(),
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

                //FormAction
                'actionForm'                => '/leads/create',
                'submitBtn'                 => 'cr??er'
            ];

            $nameValidation        = "/^[a-zA-Z0-9]*$/";
            $codepostalValidation  = "/^[0-9]{5}+$/";
            $telephoneValidation   = "/^[0-9]{10}+$/";

            //Validate the form
            if (empty($data['nomLead']) || !preg_match($nameValidation , $data['nomLead'])) { 
                $data['nomLeadError']   = 'Veuillez saisir votre nom';
            } elseif (empty($data['prenomLead']) || !preg_match($nameValidation , $data['prenomLead'])){ 
                $data['prenomLeadError'] = 'Veuillez remplir saisir votre prenom';
            }elseif (empty($data['telLead']) || !preg_match($telephoneValidation, $data['telLead'])){ 
                $data['telLeadError']     = 'Veuillez saisir votre telephone.<br>Example: 06(07) ** ** ** **';
            }elseif (empty($data['adresseLead'])){ 
                $data['adresseLeadError'] = 'Veuillez remplir saisir votre adresse';
            }elseif (empty($data['codepostalLead']) || !preg_match($codepostalValidation, $data['codepostalLead'])){ 
                $data['codepostalLeadError'] = 'Veuillez saisir votre code postal.<br>Example: 75100';
            }elseif (empty($data['villeLead'])){ 
                $data['villeLeadError']      = 'Veuillez saisir votre ville';
            }elseif (empty($data['typeTravauxLead'])){ 
                $data['typeTravauxLeadError'] = 'Veuillez choisir votre type de travaux';
            }elseif (empty($data['natureProjetLead'])){ 
                $data['emailLeadError']  = 'Veuillez choisir votre nature de travaux';
            }elseif (empty($data['projetLead'])){ 
                $data['projetLeadError']  = 'Veuillez remplir pr??ciser votre travaux';
            } 

            //Validate email and telephone
            if (empty($data['emailLead'])) {
                $data['emailLeadError'] = 'Veuillez saisir un email addresse.';
            } elseif (!filter_var($data['emailLead'], FILTER_VALIDATE_EMAIL)) {
                $data['emailLeadError'] = 'Veuillez saisir un correct un correct format.';
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
                
                if ($this->leadModel->CreateLead($data)) {
                    // Redirect to index page
                    $msg= "Vous avez bien enregistrer le lead";
                    SessionHelper::setSession("SuccessMessage", $msg);
                    SessionHelper::redirectTo('/index');  
                } else {
                    //Redirect to the index
                    $msg= "Vous n'avez pas  enregistrer le lead";
                    SessionHelper::setSession("ErrorMessage", $msg);
                    SessionHelper::redirectTo('/index');
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
            'nomLead'              => $lead->nom,
            'prenomLead'           => $lead->prenom,
            'telLead'              => $lead->tel, 
            'emailLead'            => $lead->email, 
            'adresseLead'          => $lead->adresse,
            'codepostalLead'       => $lead->codepostal,
            'villeLead'            => $lead->ville,
            'projetLead'           => $lead->projet,
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

            //FormAction
            'actionForm'           => '/leads/update/'.$lead->idlead,
            'submitBtn'            => 'Modifier'
        ];


        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form & Sanitize POST data
            
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

                //FormAction
                'actionForm'           => '/leads/update/'.$lead->idlead,
                'submitBtn'            => 'Modifier'
            ];


            $nameValidation        = "/^[a-zA-Z0-9]*$/";
            $codepostalValidation  = "/^[0-9]{5}+$/";
            $telephoneValidation   = "/^[0-9]{10}+$/";

            //Validate the form
            if (empty($data['nomLead']) || !preg_match($nameValidation , $data['nomLead'])) { 
                $data['nomLeadError']   = 'Veuillez saisir votre nom';
            } elseif (empty($data['prenomLead']) || !preg_match($nameValidation , $data['nomLead'])){ 
                $data['prenomLeadError'] = 'Veuillez remplir saisir votre prenom';
            }elseif (empty($data['telLead']) || !preg_match($telephoneValidation, $data['telLead'])){ 
                $data['telLeadError']     = 'Veuillez remplir saisir votre telephone.<br>Example: 06(07) ** ** ** **';
            }elseif (empty($data['adresseLead'])){ 
                $data['adresseLeadError'] = 'Veuillez remplir saisir votre adresse';
            }elseif (empty($data['codepostalLead']) || !preg_match($codepostalValidation, $data['codepostalLead'])){ 
                $data['codepostalLeadError'] = 'Veuillez saisir votre code postal.<br>Example: 75100';
            }elseif (empty($data['villeLead'])){ 
                $data['villeLeadError']      = 'Veuillez saisir votre ville';
            }elseif (empty($data['typeTravauxLead'])){ 
                $data['typeTravauxLeadError'] = 'Veuillez choisir votre type de travaux';
            }elseif (empty($data['natureProjetLead'])){ 
                $data['emailLeadError']  = 'Veuillez choisir votre nature de travaux';
            }elseif (empty($data['projetLead'])){ 
                $data['projetLeadError']  = 'Veuillez remplir pr??ciser votre travaux';
            } 

            //Validate email and telephone
            if (empty($data['emailLead'])) {
                $data['emailLeadError'] = 'Veuillez saisir un email addresse.';
            } elseif (!filter_var($data['emailLead'], FILTER_VALIDATE_EMAIL)) {
                $data['emailLeadError'] = 'Veuillez saisir un correct un correct format.';
            } 

            // Make sure that errors are empty
            if (empty($data['nomLeadError' ])        && 
                empty($data['prenomLeadError'])      && 
                empty($data['telLeadError'])         && 
                empty($data['emailLeadError'])       && 
                empty($data['adresseLeadError'])     && 
                empty($data['codepostalLeadError'])  && 
                empty($data['villeLeadError'])       && 
                empty($data['typeTravauxLeadError']) &&
                empty($data['typeTravauxLeadError']) &&
                empty($data['projetLeadError'])){
                //Update lead from model function

                if ($this->leadModel->UpdateLead($data)) {
                    //Redirect to the index
                    $msg= "Vous avez bien Modifier le lead";
                    SessionHelper::setSession("SuccessMessage", $msg);
                    SessionHelper::redirectTo('/leads/index'); 
                } else {
                    //Redirect to the index
                    $msg= "Vous n'avez pas  Modifier le lead";
                    SessionHelper::setSession("ErrorMessage", $msg);
                    SessionHelper::redirectTo('/leads/index'); 
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
            'nomLead'              => $lead->nom,
            'prenomLead'           => $lead->prenom,
            'telLead'              => $lead->tel, 
            'emailLead'            => $lead->email, 
            'adresseLead'          => $lead->adresse,
            'codepostalLead'       => $lead->codepostal,
            'villeLead'            => $lead->ville,
            'projetLead'           => $lead->projet,
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

            //FormAction
            'actionForm'           => '/leads/delete/'.$lead->idlead,
            'submitBtn'            => 'Supprimer'
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $data = [
                'idlead'               => $lead->idlead,
                'lead'                 => $lead,
                    // 'typeTravaux'          => $this->categoryModel->findCategoryByID($lead->idctg),
                    // 'natureTravaux'        => $this->souscategoryModel->findSousCategoryByID($lead->idsctg),
                    // 'type-natureTravaux'   => $this->souscategoryModel->findSousCategoryByGroup($lead->idctg),
                    // 'travaux'              => $this->categoryModel->findAllCategories(),
                    // 'stravaux'             => $this->souscategoryModel->findAllSousCategories(),
                    // 'nomLead'              => '',
                    // 'prenomLead'           => '',
                    // 'telLead'              => '', 
                    // 'emailLead'            => '', 
                    // 'adresseLead'          => '',
                    // 'codepostalLead'       => '',
                    // 'villeLead'            => '',
                    // 'typeTravauxLead'      => '',
                    // 'natureProjetLead'     => '',
                    // 'projetLead'           => '',
                    // // MESSAGE Error
                    // 'nomLeadError'         => '',
                    // 'prenomLeadError'      => '',
                    // 'telLeadError'         => '',
                    // 'emailLeadError'       => '',
                    // 'adresseLeadError'     => '',
                    // 'codepostalLeadError'  => '',
                    // 'villeLeadError'       => '',
                    // 'typeTravauxLeadError' => '',
                    // 'natureProjetLeadError'=> '',
                    // 'projetLeadError'      => '',
            ];

            if($this->leadModel->DeleteLead($data['idlead'])) {
                //Redirect to the index
                $msg= "Vous avez bien supprimer le lead";
                SessionHelper::setSession("SuccessMessage", $msg);
                SessionHelper::redirectTo('/leads/index');  
            } else {
                die('Something went wrong!');
                $msg= "Vous n'avez pas supprimer le lead";
                SessionHelper::setSession("ErrorMessage", $msg);
                SessionHelper::redirectTo('/leads/index'); 
            }
        }
        $this->view('leads/delete', $data);
    }


    /**
     * Searche  form leads 
     *
     * @return void
     */
    public function search() { 
        $data = [ 'leads' => $this->leadModel->findAllLeads(), ];

        if($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['search']) ){
            $search = trim($_GET['search']);
            $data = [ 'searchProjet' => $this->leadModel->findSearchLead($search), ];
            
            if (count($data['searchLead']) > 0) {
                // Redirect to index page
                $msg = COUNT($data['searchLead'])." - r??sultat trouv?? pour la recherche  -> '".$search."'";
                SessionHelper::setSession("SuccessMessage", $msg); 
            } else {
                //Redirect to the index
                $msg= "Aucun r??sultat n'est trouv?? pour la recherche  -> '".$search."'";
                SessionHelper::setSession("ErrorMessage", $msg);
            }
            $this->view('leads/index', $data);
        } else{
            SessionHelper::redirectTo('/leads/index');
        }
    }

    /**Exporter Excel */
    public function exporter() {

        $fileType ="xls";
        $leads = $this->leadModel->findAllLeads();
        return $this->ExporterExcel( $fileType, $leads);
        print_r($leads );
    
    }

    /**
     * Dowload execel
     *
     * @param String $fileType
     * @param ArrayObject $leads
     * @return void
     */
    public function ExporterExcel( $fileType, $leads){
        
        // Filter the excel data 
        function filterData(&$str){ 
            $str = preg_replace("/\t/", "\\t", $str); 
            $str = preg_replace("/\r?\n/", "\\n", $str); 
            if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
        } 

        // Excel file name for download 
        $fileName = "Exportation Leads - " . date('Ymd') .".". $fileType; 
        
        // Column names 
        $fields = array('Nb     ', 'Nom     ', 'Prenom  ', 'Telephone   ', 'Email   ', 'Adresse  ', 'Code Postal ', 'Ville   ', 'Date_created    ', 'Project '); 
        // Display column names as first row 
        $excelData = implode("\t", array_values($fields)) . "\n"; 
        
        if(!empty($leads)){
        
            foreach($leads as $index=>$lead) {
                $rowData = array( $index+1, $lead->nom, $lead->prenom, $lead->tel, $lead->email, $lead->adresse, $lead->codepostal, $lead->ville, $lead->date_inscrption, $lead->projet );
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



