<?php
class Pages extends Controller {
    public function __construct() {
        $this->categoryModel = $this->model('Category');
        $this->souscategoryModel = $this->model('Souscategory');
    }

    public function index() {
        $data = [
                'travaux'  =>  $this->categoryModel->findAllCategories(),
                'stravaux' => $this->souscategoryModel->findAllSousCategories()
            ];

        $this->view('index', $data);
    }

    public function about() {
        $data = [
            'pageName ' => 'about page'
        ];
        $this->view('pages/about', $data);
    }

    public function posts() {
        $data = [
            'pageName ' => 'posts page'
        ];
        $this->view('pages/blogs', $data);
    } 

    public function dashboard() {
        $data = [
            'pageName ' => 'posts page'
        ];
        $this->view('pages/dashboard', $data);
    }

}
