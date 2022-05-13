<?php
class Prixs extends Controller {

    public function __construct() {
        $this->prixModel = $this->model('Prix');
    }

    public function indexPrix(){
        $data = [ 
            'prixs' => $this->prixModel->findAllprixs(),
        ];
        $this->view('prixs/indexPrix', $data);
    }
}
