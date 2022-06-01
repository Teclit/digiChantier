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


    public function commandes($idPro){
        $cmds = $this->commandeModel->findAllCommandesByPRO($idPro);
        $cmdLine = [];

        //Get all commande line by commande id
        // foreach($cmds as $commande){
        //    // array_push($cmdLine, $this->commandeModel->getAllcommandeLineBYCmd($commande->idcmd) );
        //     var_dump($commande->idcmd);
        //     echo "<br>";
        //     var_dump($this->commandeModel->getAllcommandeLineBYCmd($commande->idcmd));
        // }

        $data = [
            'commandes'     => $cmds,
            'commandeLines' => $cmdLine,
        ];

        $this->view('personnels/commandes', $data);
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
            'prixunite'     => $this->commandeModel->GetUnitePrixLead($this->prixUnite),

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


}
