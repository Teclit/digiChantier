<?php
class Souscategories extends Controller {

    public function __construct() {
        $this->souscategoryModel = $this->model('Souscategory');
        $this->categoryModel = $this->model('Category');
    }

    public function indexSousctg(){
        $data = [ 
            'souscategories' => $this->souscategoryModel->findAllSouscategories(),
            'categories'    =>  $this->categoryModel->findAllCategories() 
        ];
        $this->view('souscategories/indexSousctg', $data);
    }

    public function createSousctg() {
        $data = [ 
            'categories'   =>  $this->categoryModel->findAllCategories(),
            'nomSctg'      =>  '',
            'idCtg'        =>  '',
            'nomCtg'      =>   '',
            'nomSctgError' =>  '',
            'idCtgError'   =>  '',
            //FormAction
            'actionForm'                => '/souscategories/createSousctg/',
            'submitBtn'                 => 'Créer' 
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'categories'    => $this->categoryModel->findAllCategories(),
                'nomSctg'       => trim($_POST['nomSctg']),
                'idCtg'         => trim($_POST['idCtg']),
                'nomCtg'        => $this->categoryModel->findCategoryByID( trim($_POST['idCtg']))->ctgnom,
                //MESSAGE Error
                'nomSctgError'  => '',
                'nomCtgError'   => '',
                'idCtgError'    => '',
                //FormAction
                'actionForm'    => '/souscategories/createSousctg/',
                'submitBtn'     => 'Créer' 
            ];

            //Validate the form
            if (empty($data['nomSctg'])) { 
                $data['nomSctgError']   = 'Veuillez saisir nom de sous category ';
            } elseif (empty($data['nomCtg'])){
                $data['nomCtgError']   = 'Veuillez saisir nom de category ';
            }


            // Make sure that errors are empty
            if (empty($data['nomSctgError']) ){
                
                if ($this->souscategoryModel->CreateSousctg($data)){
                    // Redirect to index page
                    $msg= "Vous avez bien enregistrer le category.";
                    SessionHelper::setSession("SuccessMessage", $msg);
                    SessionHelper::redirectTo('/souscategories/indexSousctg');  
                } else {
                    $msg= "Vous n'avez pas enregistrer le category.";
                    SessionHelper::setSession("ErrorMessage", $msg);
                    SessionHelper::redirectTo('/souscategories/indexSousctg');
                }
            }
            $this->view('souscategories/createSousctg', $data);
        }

        $this->view('souscategories/createSousctg', $data);
    }


    public function updateSousctg($idSctg) {
        $sctg = $this->souscategoryModel->findSouscategoryByID($idSctg);
        $data = [ 
            'categories'   =>  $this->categoryModel->findAllCategories(),
            'nomSctg'      =>  $sctg->sctgnom,
            'idCtg'        =>  $sctg->idctg,
            'nomCtg'       =>  $this->categoryModel->findCategoryByID($sctg->idctg)->ctgnom,
            'nomSctgError' =>  '',
            'idCtgError'   =>  '',
            //FormAction
            'actionForm'                => '/souscategories/updateSousctg/'.$idSctg,
            'submitBtn'                 => 'Modifier'  
        ];
    

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'categories'    => $this->categoryModel->findAllCategories(),
                'idSctg'        => $idSctg,
                'nomSctg'       => trim($_POST['nomSctg']),
                'idCtg'         => trim($_POST['idCtg']),
                'nomCtg'        => $this->categoryModel->findCategoryByID( trim($_POST['idCtg']))->ctgnom,
                //MESSAGE Error
                'nomSctgError'  => '',
                'nomCtgError'   => '',
                'idCtgError'    => '',
            
                //MESSAGE Error
                'nomSctgError' => '',
                //FormAction
                'actionForm'  => '/souscategories/updateSousctg/'.$idSctg,
                'submitBtn'   => 'Modifier'  
            ];

            //Validate the form
            if (empty($data['nomSctg'])) { 
                $data['nomSctgError']  = 'Veuillez saisir nom de sous category';
            } elseif (empty($data['nomCtg'])){
                $data['nomCtgError']   = 'Veuillez saisir nom de category ';
            }

            // Make sure that errors are empty
            if (empty($data['nomSctgError']) ){
                
                if ($this->souscategoryModel->UpdateSousctg($data)){
                    // Redirect to index page
                    $msg= "Vous avez bien modifier le category.";
                    SessionHelper::setSession("SuccessMessage", $msg);
                    SessionHelper::redirectTo('/souscategories/indexSousctg');  
                } else {
                    $msg= "Vous n'avez pas modifier le category.";
                    SessionHelper::setSession("ErrorMessage", $msg);
                    SessionHelper::redirectTo('/souscategories/indexSousctg');
                }
            }
            $this->view('souscategories/updateSousctg', $data);
        }
        $this->view('souscategories/updateSousctg', $data);
        
    }


    /**
     * Controlleur Delete sous Category
     *
     * @param [type] $idSctg
     * @return void
     */
    public function deleteSousctg($idSctg) {
        $sctg = $this->souscategoryModel->findSouscategoryByID($idSctg);
        $data = [ 
            'categories'   =>  $this->categoryModel->findAllCategories(),
            'nomSctg'      =>  $sctg->sctgnom,
            'idCtg'        =>  $sctg->idctg,
            'nomCtg'       =>  $this->categoryModel->findCategoryByID($sctg->idctg)->ctgnom,
            'nomSctgError' =>  '',
            'idCtgError'   =>  '',
            //FormAction
            'actionForm'                => '/souscategories/deleteSousctg/'.$idSctg,
            'submitBtn'                 => 'Supprimer'  
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'idSctg'       =>  $idSctg,
                //FormAction
                'actionForm'                => '/souscategories/deleteSctg/'.$idSctg,
                'submitBtn'                 => 'Supprimer' 
            ];

            if ($this->souscategoryModel->DeleteSousctg($data) ){
                // Redirect to index page
                $msg= "Vous avez bien supprimer le category";
                SessionHelper::setSession("SuccessMessage", $msg);
                SessionHelper::redirectTo('/souscategories/indexSousctg');  
            } else {
                //die('Something went wrong.');
                $msg= "Vous n'avez pas supprimer le category";
                SessionHelper::setSession("ErrorMessage", $msg);
                SessionHelper::redirectTo('/souscategories/indexSousctg');
            }
            
            $this->view('souscategories/deleteSctg', $data);
        }
        $this->view('souscategories/deleteSousctg', $data);
    }

}
