<?php
class Categories extends Controller {

    public function __construct() {
        $this->categoryModel = $this->model('Category');
    }

    public function index() {
        $categories = $this->categoryModel->findAllPosts();
        $data = [ 'posts' => $categories ];
        $this->view('categories/listCategories', $data);
    }

}
