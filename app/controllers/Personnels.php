<?php
class Personnels extends Controller {

    public function __construct() {
        $this->personnelModel     = $this->model('Personnel');
        $this->professionelModel  = $this->model('Professionel');
    }

    public function indexPerso() { 
        $data = [
            'professionel'  => $this->professionelModel->findProfessionelByID(20),
        ];

        $this->view('personnels/indexPerso', $data);
    }

}
