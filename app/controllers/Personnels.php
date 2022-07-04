<?php
class Personnels extends Controller {


    public function __construct() {
        //Param Prix
        $this->prixUnite = packUnite ;
        $this->prixDapt  = packDepartment;
        $this->prixRgn   = packRegion;
        $this->prixPys   = packPays;

        $this->professionelModel  = $this->model('Professionel');
        $this->commandeModel      = $this->model('Commande');
        $this->leadModel          = $this->model('Lead');
        $this->categoryModel      = $this->model('Category');
        $this->souscategoryModel  = $this->model('Souscategory');


    }


    /**
     * Undocumented function
     *
     * @param int $idPro
     * @return void
     */
    public function indexPerso(int $idPro) { 
        $data = [
            'professionel'  => $this->professionelModel->findProfessionelByID($idPro),
            'commandes'     => $this->commandeModel->findTotalCommandeByPRO($idPro),
            'commandeLines' => $this->commandeModel->findAllCommandLineByPRO($idPro),
            'leads'         => $this->commandeModel->findAllLeadsDispo($idPro),
            'prixunite'     => $this->commandeModel->GetUnitePrixLead($this->prixUnite),
        ];
        $this->view('personnels/indexPerso', $data);
    }


    /**
     * Show Total commandelines of commande by professionel
     *
     * @param int $idPro
     * @return void
     */
    public function userCommandes(int $idPro){
        $data = ['commandes'     => $this->commandeModel->findAllCommandesByPRO($idPro),];
        $this->view('personnels/commandes', $data);
    }


    /**
     * Delete commande of user by 
     *
     * @param integer $idPro
     * @return void
     */
    public function deleteUserCommande(int $idCmd){
        $idPro = intval(SessionHelper::getSession("userId"));
        $dataCmd = [
            'idcmd'         =>$idCmd,
            'idPro'         =>$idPro,
        ];

        if($this->commandeModel->DeleteUserCommandLine($dataCmd)){
            // var_dump($this->commandeModel->DeleteUserCommandLine($dataCmd));
            if($this->commandeModel->DeleteUserCommande($dataCmd)){
                $msg ="Vous avez bien supprimer votre commande";
                SessionHelper::setSession("SuccessMessage", $msg);
            }else{
                $msg ="Vous n'avez pas supprimer votre commande";
                SessionHelper::setSession("ErrorMessage", $msg);
            }
        }else{

            $msg= "Vous n'avez pas supprimer le commmande line.";
            SessionHelper::setSession("ErrorMessage", $msg);
        }
        

        $data = ['commandes'     => $this->commandeModel->findAllCommandesByPRO($idPro),];

        $this->view('personnels/commandes', $data);
    }


    /**
     * Searche  form leads 
     *
     * @return void
     */
    public function search() { 
        $data = [ 'leads' => $this->commandeModel->findAllLeadsDispo(SessionHelper::getSession("userId")), ];

        if($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['search']) ){
            $search = trim($_GET['search']);
            $data = [ 'searchLead' => $this->leadModel->findSearchLead($search), ];
            
            if (count($data['searchLead']) > 0) {
                // Redirect to index page
                $msg = COUNT($data['searchLead'])." - résultat trouvé pour la recherche  -> '".$search."'";
                SessionHelper::setSession("SuccessMessage", $msg); 
            } else {
                //Redirect to the index
                $msg= "Aucun résultat n'est trouvé pour la recherche  -> '".$search."'";
                SessionHelper::setSession("ErrorMessage", $msg);
            }
            $this->view('personnels/projetDisponible', $data);
        } else{
            SessionHelper::redirectTo('/personnels/projetDisponible/'.SessionHelper::getSession("userId"));
        }
    }

    /**
     * projetDisponible function
     *
     * @param int $idPro
     * @return void
     */
    public function projetDisponible(int $idPro) { 
        
        $data = [
            'professionel'  => $this->professionelModel->findProfessionelByID($idPro),
            'commandes'     => $this->commandeModel->findTotalCommandeByPRO($idPro),
            'commandeLines' => $this->commandeModel->findAllCommandLineByPRO($idPro),
            'leads'         => $this->commandeModel->findAllLeadsDispo($idPro),
            // 'prixunite'     => $this->commandeModel->GetUnitePrixLead($this->prixUnite),

        ];
        $this->view('personnels/projetDisponible', $data);
    }



    /**
     * Get all information about lead
     *
     * @param INT $idLead
     * @return void
     */
    public function leadDetail(INT $idLead){
        $lead = $this->leadModel->findLeadById($idLead);
        $data = [
            'idlead'               => $lead->idlead,
            'lead'                 => $lead,
            'typeTravaux'          => $this->categoryModel->findCategoryByID($lead->idctg),
            'natureTravaux'        => $this->souscategoryModel->findSousCategoryByID($lead->idsctg),
            'type-natureTravaux'   => $this->souscategoryModel->findSousCategoryByGroup($lead->idctg),
            'travaux'              => $this->categoryModel->findAllCategories(),
            'stravaux'             => $this->souscategoryModel->findAllSousCategories()
        ];

        $this->view('personnels/leadDetail', $data);
    }

    /**
     * Get infos  lead Potentiel
     *
     * @param INT $idLead
     * @return void
     */
    public function leadPotentiel(INT $idLead){
        $lead = $this->leadModel->findLeadById($idLead);
        $data = [
            'idlead'               => $lead->idlead,
            'lead'                 => $lead,
            'typeTravaux'          => $this->categoryModel->findCategoryByID($lead->idctg),
            'natureTravaux'        => $this->souscategoryModel->findSousCategoryByID($lead->idsctg),
            'type-natureTravaux'   => $this->souscategoryModel->findSousCategoryByGroup($lead->idctg),
            'travaux'              => $this->categoryModel->findAllCategories(),
            'stravaux'             => $this->souscategoryModel->findAllSousCategories()
        ];

        $this->view('personnels/leadPotentiel', $data);
    }

    /**
     * Delete Commande line
     *
     * @param INT $idLead
     * @return void
     */
    public function deleteClient(Int $idLead){
        $idPro = SessionHelper::getSession("userId");
        $data = [
            'idLead' =>intval($idLead),
            'idPro'  =>intval($idPro),
        ];

        var_dump($data);

        
        if($this->commandeModel->DeleteCommandLine($data)) {
            $msg= "Vous avez bien supprimer le commmande line.";
            SessionHelper::setSession("SuccessMessage", $msg);
        } else {
            $msg= "Vous n'avez pas supprimer le commmande line.";
            SessionHelper::setSession("ErrorMessage", $msg);
        }
        SessionHelper::redirectTo("/personnels/indexPerso/".SessionHelper::getSession("userId"));
    }

    

    public function commandeLines(int $idcmd) { 
        $data = [
            'commandeLines' => $this->commandeModel->getAllcommandeLineBYCmd($idcmd),
        ];
        $this->view('personnels/commandelines', $data);
    }
}
