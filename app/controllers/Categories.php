<?php
class Categories extends Controller {

    public function __construct() {
        $this->categoryModel = $this->model('Category');
    }

    public function indexCtg() {
        $data = [ 'categories' =>  $this->categoryModel->findAllCategories() ];
        $this->view('categories/indexCtg', $data);
    }

    public function createCtg() {
        $data = [ 
            'nomCtg'      =>  '',
            'nomCtgError' =>  '',
            //FormAction
            'actionForm'                => '/categories/createCtg/',
            'submitBtn'                 => 'Créer' 
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
            'nomCtg'                   => trim($_POST['nomCtg']),
            // MESSAGE Error
            'nomCtgError'              => '',
            //FormAction
            'actionForm'                => '/categories/createCtg/',
            'submitBtn'                 => 'Créer' 

            ];

            //Validate the form
            if (empty($data['nomCtg'])) { 
                $data['nomCtgError']   = 'Veuillez saisir votre nom';
            } 


            // Make sure that errors are empty
            if (empty($data['nomCtgError']) ){
                
                if ($this->categoryModel->CreateCtg($data)){
                    // Redirect to index page
                    $msg= "Vous avez bien enregistrer le category.";
                    SessionHelper::setSession("SuccessMessage", $msg);
                    SessionHelper::redirectTo('/categories/indexCtg');  
                } else {
                    $msg= "Vous n'avez pas enregistrer le category.";
                    SessionHelper::setSession("ErrorMessage", $msg);
                    SessionHelper::redirectTo('/categories/indexCtg');
                }
            }
            $this->view('categories/createCtg', $data);
        }

        $this->view('categories/createCtg', $data);
    }


    public function updateCtg($idCtg) {
        $ctg = $this->categoryModel->findCategoryByID($idCtg);
        $data = [ 
            'categories'  => $ctg,
            'idCtg'       => $idCtg,
            'nomCtg'      => $ctg->ctgnom,
            'nomCtgError' =>  '',
            //FormAction
            'actionForm'                => '/categories/updateCtg/'.$idCtg,
            'submitBtn'                 => 'Modifier' 
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'idCtg'       => $idCtg,
                'nomCtg'      => trim($_POST['nomCtg']),
                //MESSAGE Error
                'nomCtgError' => '',
                //FormAction
                'actionForm'  => '/categories/updateCtg/'.$idCtg,
                'submitBtn'   => 'Modifier'  
            ];

            //Validate the form
            if (empty($data['nomCtg'])) { 
                $data['nomCtgError']   = 'Veuillez saisir votre nom';
            } 

            // Make sure that errors are empty
            if (empty($data['nomCtgError']) ){
                
                if ($this->categoryModel->UpdateCtg($data)){
                    // Redirect to index page
                    $msg= "Vous avez bien modifier le category.";
                    SessionHelper::setSession("SuccessMessage", $msg);
                    SessionHelper::redirectTo('/categories/indexCtg');  
                } else {
                    $msg= "Vous n'avez pas modifier le category.";
                    SessionHelper::setSession("ErrorMessage", $msg);
                    SessionHelper::redirectTo('/categories/indexCtg');
                }
            }
            $this->view('categories/createCtg', $data);
        }
        $this->view('categories/updateCtg', $data);
        
    }


    /**
     * Controlleur Delete Category
     *
     * @param [type] $idCtg
     * @return void
     */
    public function deleteCtg($idCtg) {
        $ctg = $this->categoryModel->findCategoryByID($idCtg);
        $data = [ 
            'categories'  =>  $ctg,
            'idCtg'       =>  $idCtg,
            'nomCtg'      =>  $ctg->ctgnom,
            'nomCtgError' =>  '',
            //FormAction
            'actionForm'  => '/categories/deleteCtg/'.$idCtg,
            'submitBtn'    => 'Supprimer' 
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'idCtg'       =>  $idCtg,
                //FormAction
                'actionForm'                => '/categories/deleteCtg/'.$idCtg,
                'submitBtn'                 => 'Supprimer' 
            ];

            if ($this->categoryModel->DeleteCtg($data) ){
                // Redirect to index page
                $msg= "Vous avez bien supprimer le category";
                SessionHelper::setSession("SuccessMessage", $msg);
                SessionHelper::redirectTo('/categories/indexCtg');  
            } else {
                //die('Something went wrong.');
                $msg= "Vous n'avez pas supprimer le category";
                SessionHelper::setSession("ErrorMessage", $msg);
                SessionHelper::redirectTo('/categories/indexCtgn');
            }
            
            $this->view('categories/deleteCtg', $data);
        }
        $this->view('categories/deleteCtg', $data);
    }

}
