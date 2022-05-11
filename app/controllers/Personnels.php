<?php
class Personnels extends Controller {

    public function __construct() {
        $this->personnelModel     = $this->model('Personnel');
        $this->professionelModel  = $this->model('Professionel');
        $this->commandeModel      = $this->model('Commande');
    }

    public function indexPerso($idPro) { 
        $data = [
            'professionel'  => $this->professionelModel->findProfessionelByID($idPro),
            'commandes'     => $this->commandeModel->findAllCommandeByPRO($idPro),
            // 'commandeLines' => $this->commandeModel->findAllCommandeByPRO($idPro),
        ];
        $this->view('personnels/indexPerso', $data);
    }

}
