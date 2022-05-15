<?php
class Pages extends Controller {
    public function __construct() {
        $this->categoryModel     = $this->model('Category');
        $this->souscategoryModel = $this->model('Souscategory');
        $this->postModel         = $this->model('Post');
    }

    public function index() {
        $data = [
                'posts'    => $this->postModel->findAllPosts(),
                'travaux'  =>  $this->categoryModel->findAllCategories(),
                'stravaux' => $this->souscategoryModel->findAllSousCategories()
            ];
        $this->view('index', $data);
    }

    public function blog() {
        $data = ['posts'    => $this->postModel->findAllPosts(), ];
        $this->view('pages/blog', $data);
    }

    public function fullpost($idpost) {
        $data = [
                'post'    => $this->postModel->findPostById($idpost)
            ];

        $this->view('pages/fullpost', $data);
    }


    public function about() {
        $data = [
            'pageName ' => 'about page'
        ];
        $this->view('pages/about', $data);
    }

    

    public function dashboard() {
        $data = [
            'pageName ' => 'posts page'
        ];
        $this->view('pages/dashboard', $data);
    }

}
