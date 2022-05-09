<?php
class Souscategories extends Controller {

    public function __construct() {
        $this->souscategoryModel = $this->model('Souscategory');
        $this->categoryModel = $this->model('Category');
    }

    public function indexSousctg(){
        $data = [ 
            'souscategories' => $this->souscategoryModel->findAllSousCategories(),
            'categories' =>  $this->categoryModel->findAllCategories() 
        ];
        $this->view('souscategories/indexSousctg', $data);
    }

}
