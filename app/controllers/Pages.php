<?php
class Pages extends Controller {
    public function __construct() {
        $this->administrateursModel = $this->model('Administrateur');
        $this->categoryModel      = $this->model('Category');
        $this->souscategoryModel  = $this->model('Souscategory');
        $this->postModel          = $this->model('Post');
        $this->professionelModel  = $this->model('Professionel');
        $this->commandeModel      = $this->model('Commande');
        $this->leadModel          = $this->model('Lead');
        $this->categoryModel      = $this->model('Category');
        $this->souscategoryModel  = $this->model('Souscategory');
        
    }

    /**
     * Page d'acceuille
     *
     * @return void
     */
    public function index() {
        $data = [
                'posts'    => $this->postModel->findAllPosts(),
                'travaux'  => $this->categoryModel->findAllCategories(),
                'stravaux' => $this->souscategoryModel->findAllSousCategories(),
        ];

        $this->view('index', $data);
    }

    /**
     * Get all Posts
     *
     * @return void
     */
    public function blog() {
        $data = [
            'posts' => $this->postModel->findAllPosts(),
        ];
        $this->view('pages/blog', $data);
    }
    /**
     * Get all Posts
     *
     * @return void
     */
    public function listBlog() {
        $data = [
            'posts' => $this->postModel->findAllPosts(),
        ];
        $this->view('pages/listBlog', $data);
    }

    /**
     * Get all Posts
     *
     * @return void
     */
    public function gridBlog() {
        $data = [
            'posts' => $this->postModel->findAllPosts(),
        ];
        $this->view('pages/gridBlog', $data);
    }

    /**
     * Page Full post 
     *
     * @param int $idpost
     * @return void
     */
    public function fullpost(int $idpost) {
        $data = [
                'post'    => $this->postModel->findPostById($idpost)
            ];

        $this->view('pages/fullpost', $data);
    }


    /**
     * Page about
     *
     * @return void
     */
    public function about() {
        $data = [
            'pageName ' => 'about page'
        ];
        $this->view('pages/about', $data);
    }


    /**
     * Page dashbord
     *
     * @return void
     */
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
