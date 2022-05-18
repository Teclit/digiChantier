<?php
class Commandes extends Controller {

    public function __construct() {
        //Param Prix
        $this->prixUnite = packUnite ;
        $this->prixDapt  = packDepartment;
        $this->prixRgn   = packRegion;
        $this->prixPys   = packPays;

        $this->prixModel          = $this->model('Prix');
        $this->professionelModel  = $this->model('Professionel');
        $this->commandeModel      = $this->model('Commande');
        $this->leadModel          = $this->model('Lead');
        $this->categoryModel      = $this->model('Category');
        $this->souscategoryModel  = $this->model('Souscategory');
    }

    /**
     * Ajouter lead au panier
     *
     * @param Int $idLead
     * @return void
     */
    public function addPanier(Int $idLead){
        $key = 'panier-'.SessionHelper::getSession("userId");

        if(NULL != SessionHelper::getSession($key) ){ 
            $panierExistant = json_decode(SessionHelper::getSession($key));
            array_push($panierExistant, intval($idLead));

            SessionHelper::setSession($key, json_encode($panierExistant));
            SessionHelper::redirectTo('/personnels/projetDisponible/'.$idLead);  

        }else{
            $panier = [];
            array_push($panier, intval($idLead));
            SessionHelper::setSession($key, json_encode($panier));
            SessionHelper::redirectTo('/personnels/projetDisponible/'.$idLead);  
            
        }
    }

    
    /**
     * Ajouter lead au panier
     *
     * @param Int $idLead
     * @return void
     */
    public function deletePanier(Int $idLead){
        $key =  'panier-'.SessionHelper::getSession("userId");
        $monPanier = [];
        if(null != SessionHelper::getSession($key)){

            $panierExistant = json_decode(SessionHelper::getSession($key), true);
            $panierExistant = array_unique($panierExistant); //Get unigue id
            $panierExistant = array_diff($panierExistant, [$idLead]);

            SessionHelper::setSession($key, json_encode($panierExistant));
            foreach ($panierExistant as $idlead) {
                array_push($monPanier, $this->leadModel->findLeadById($idlead));
            }
        }

        $data = [
            'prixunite'     => $this->commandeModel->GetUnitePrixLead($this->prixUnite),
            'panier'        => $monPanier,
        ];
        
        $this->view('commandes/panier', $data);
    }


    /**
     * Show Mon Panier 
     *
     * @return void
     */
    public function panier(){
        $key =  'panier-'.SessionHelper::getSession("userId");
        $monPanier = [];

        if(null != SessionHelper::getSession($key)){
            $panierExistant = json_decode(SessionHelper::getSession($key), true);
            $panierExistant = array_unique($panierExistant); //Get unigue id
            foreach ($panierExistant as $idlead) {
                array_push($monPanier, $this->leadModel->findLeadById($idlead));
            }
        }

        $data = [
            'prixunite'     => $this->commandeModel->GetUnitePrixLead($this->prixUnite),
            'panier'        => $monPanier,
        ];
        
        $this->view('commandes/panier', $data);
    }


    /**
     * Ajouter lead au panier
     *
     * @param Int $idLead
     * @return void
     */
    public function payPanier(){
        $key =  'panier-'.SessionHelper::getSession("userId");
        $monPanier = [];

        if(null != SessionHelper::getSession($key)){
            $panierExistant = json_decode(SessionHelper::getSession($key), true);
            $panierExistant = array_unique($panierExistant); //Get unigue id
            foreach ($panierExistant as $idlead) {
                array_push($monPanier, $this->leadModel->findLeadById($idlead));
            }
        }

        $data = [
            'prixunite'     => $this->commandeModel->GetUnitePrixLead($this->prixUnite),
            'panier'        => $monPanier,
        ];
        
        
        $this->view('commandes/payPanier', $data);
    }





}
