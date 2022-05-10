<?php
class Personnels extends Controller {

    public function __construct() {
        $this->personnelModel     = $this->model('Personnel');
        $this->professionelModel  = $this->model('Professionel');
    }

    public function indexPerso($idPro) { 
        $data = [
            'professionel'  => $this->professionelModel->findProfessionelByID($idPro),
        ];

        $this->view('personnels/indexPerso', $data);
    }

}
