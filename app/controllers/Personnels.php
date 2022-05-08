<?php
class Personnels extends Controller {

    public function __construct() {
        $this->personnelModel = $this->model('Personnel');
    }

    public function indexPerso() {
        $data = [ 
            'file' => 'Espace Personel'
        ];
        $this->view('personnels/indexPerso', $data);
    }

}
