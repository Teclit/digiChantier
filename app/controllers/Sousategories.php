<?php
class Souscategries extends Controller {

    public function __construct() {
        $this->souscategoryModel = $this->model('Souscategory');
    }

    public function index() {
        $Scategories = $this->souscategoryModel->findAllSousCategories();
        $data = [ 'Souscategories' =>  $Scategories ];
        $this->view('Souscategories/listSouscategories', $data);
    }

}
