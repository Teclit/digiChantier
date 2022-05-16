<?php
class Pages extends Controller {
    public function __construct() {
        $this->administrateursModel = $this->model('Administrateur');
        $this->categoryModel      = $this->model('Category');
        $this->souscategoryModel  = $this->model('Souscategory');
        $this->postModel          = $this->model('Post');
        $this->personnelModel     = $this->model('Personnel');
        $this->professionelModel  = $this->model('Professionel');
        $this->commandeModel      = $this->model('Commande');
        $this->leadModel          = $this->model('Lead');
        $this->categoryModel      = $this->model('Category');
        $this->souscategoryModel  = $this->model('Souscategory');
        
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
            'totalLeads'         => $this->leadModel->findAllLeads(),
            'totalProfessionels' => $this->professionelModel->findAllProfessionels(),
            'totalCommandes'     => $this->commandeModel->findAllCommandes(),
            'totalAdmin'         => $this->administrateursModel->findAllAdministrateurs(),
            'totalCategory'      => $this->categoryModel->findAllCategories(),
            'totalSouCategory'   => $this->souscategoryModel->findAllSousCategories(),
            'totalPosts'          => $this->postModel->findAllPosts(),
        ];
        $this->view('pages/dashboard', $data);
    }

}
