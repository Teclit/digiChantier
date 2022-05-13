<?php
class Personnels extends Controller {


    public function __construct() {
        //Param Prix
        $this->prixUnite = packUnite ;
        $this->prixDapt  = packDepartment;
        $this->prixRgn   = packRegion;
        $this->prixPys   = packPays;

        $this->personnelModel     = $this->model('Personnel');
        $this->professionelModel  = $this->model('Professionel');
        $this->commandeModel      = $this->model('Commande');
        $this->leadModel          = $this->model('Lead');
        $this->categoryModel      = $this->model('Category');
        $this->souscategoryModel  = $this->model('Souscategory');


    }

    /**
     * Undocumented function
     *
     * @param [type] $idPro
     * @return void
     */
    public function indexPerso($idPro) { 
        $data = [
            'professionel'  => $this->professionelModel->findProfessionelByID($idPro),
            'commandes'     => $this->commandeModel->findAllCommandeByPRO($idPro),
            'commandeLines' => $this->commandeModel->findAllCommandLineByPRO($idPro),
            'leads'         => $this->commandeModel->findAllLeadsDispo($idPro),
            'prixunite'     => $this->commandeModel->GetUnitePrixLead($this->prixUnite),
        ];
        $this->view('personnels/indexPerso', $data);
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


}
