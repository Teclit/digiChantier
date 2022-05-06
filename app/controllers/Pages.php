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

    public function chantier() {
        $data = [
            'pageName ' => 'posts page'
        ];
        $this->view('pages/chantier', $data);
    }

    public function category() {
        $data = [
            'pageName ' => 'posts page'
        ];
        $this->view('pages/category', $data);
    }

    public function administrateur() {
        $data = [
            'pageName ' => 'posts page'
        ];
        $this->view('pages/administrateur', $data);
    }

    public function enterprise() {
        $data = [
            'pageName ' => 'posts page'
        ];
        $this->view('pages/enterprise', $data);
    }

    public function fullpost() {
        $data = [
            'pageName ' => 'fullpost page'
        ];
        $this->view('pages/fullpost', $data);
    }
}
