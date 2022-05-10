<?php
class Prixs extends Controller {

    public function __construct() {
        $this->prixModel = $this->model('Prix');
    }

    public function indexPrix(){
        $data = [ 
            'prixs' => $this->prixModel->findAllprixs(),
        ];
        $this->view('prixs/indexPrix', $data);
    }


    public function createPrix(){
        
        $data = [ 
            'codepack'    =>  '',
            'prix'        =>  '',
            'nbleads'     =>  '',

            //Error Messages
            'prixError'        =>  '',
            'codepackError'    =>  '',
            'nbleadsError'     =>   '',
            //FormAction
            'actionForm'        => 'createPrix',
            'submitBtn'         => 'Mofifier' 
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'codepack'       => trim($_POST['codepack']),
                'prix'           => trim($_POST['prix']),
                'nbleads'        => trim($_POST['nbleads']),
                
                //Error Messages
                'prixError'        =>  '',
                'codepackError'    =>  '',
                'nbleadsError'     =>   '',
                //FormAction
                'actionForm'        => 'createPrix',
                'submitBtn'         => 'Créer'
            ];

            //Validate the form
            if (empty($data['codepack'])) { 
                $data['codepackError']   = 'Veuillez saisir un code de pack ';
            } elseif (empty($data['prix'])){
                $data['prixError']   = 'Veuillez definir un prix ';
            }elseif (empty($data['nbleads'])){
                $data['nbleadsError']   = 'Veuillez saisir nombre de lead';
            }


            // Make sure that errors are empty
            if (empty($data['codepackError']) && empty($data['prixError']) && empty($data['nbleadsError'])){
                
                if ($this->prixModel->CreatePrix($data)){
                    // Redirect to index page
                    $msg= "Vous avez bien definir un nouveau prix .";
                    SessionHelper::setSession("SuccessMessage", $msg);
                    SessionHelper::redirectTo('/prixs/indexPrix');  
                } else {
                    $msg= "Vous n'avez pas definir un nouveau prix .";
                    SessionHelper::setSession("ErrorMessage", $msg);
                    SessionHelper::redirectTo('/prixs/indexPrix');
                }
            }
            $this->view('prixs/createPrix', $data);
        }

        $this->view('prixs/createPrix', $data);
    }

    public function updatePrix($idprix){
        $prix = $this->prixModel->findPrixByID($idprix);
        $data = [ 
            'idprix'      =>  $prix->idprix,
            'codepack'    =>  $prix->codepack,
            'prix'        =>  $prix->prix,
            'nbleads'     =>  $prix->nbleads,

            //Error Messages
            'prixError'        =>  '',
            'codepackError'    =>  '',
            'nbleadsError'     =>   '',
            //FormAction
            'actionForm'        => 'UpdatePrix/'.$idprix,
            'submitBtn'         => 'Mofifier' 
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'idprix'      =>  $prix->idprix,
                'codepack'       => trim($_POST['codepack']),
                'prix'           => trim($_POST['prix']),
                'nbleads'        => trim($_POST['nbleads']),
                
                //Error Messages
                'prixError'        =>  '',
                'codepackError'    =>  '',
                'nbleadsError'     =>   '',
                //FormAction
                'actionForm'        => 'UpdatePrix/'.$idprix,
                'submitBtn'         => 'Mofifier'
            ];

            //Validate the form
            if (empty($data['codepack'])) { 
                $data['codepackError']   = 'Veuillez saisir un code de pack ';
            } elseif (empty($data['prix'])){
                $data['prixError']   = 'Veuillez definir un prix ';
            }elseif (empty($data['nbleads'])){
                $data['nbleadsError']   = 'Veuillez saisir nombre de lead';
            }


            // Make sure that errors are empty
            if (empty($data['codepackError']) && empty($data['prixError']) && empty($data['nbleadsError'])){
                
                if ($this->prixModel->UpdatePrix($data)){
                    // Redirect to index page
                    $msg= "Vous avez bien Modifier le prix .";
                    SessionHelper::setSession("SuccessMessage", $msg);
                    SessionHelper::redirectTo('/prixs/indexPrix');  
                } else {
                    $msg= "Vous n'avez pas Modifier le prix .";
                    SessionHelper::setSession("ErrorMessage", $msg);
                    SessionHelper::redirectTo('/prixs/indexPrix');
                }
            }
            $this->view('prixs/UpdatePrix', $data);
        }

        $this->view('prixs/UpdatePrix', $data);
    }

    public function deletePrix($idprix){
        $prix = $this->prixModel->findPrixByID($idprix);
        $data = [ 
            'idprix'      =>  $prix->idprix,
            'codepack'    =>  $prix->codepack,
            'prix'        =>  $prix->prix,
            'nbleads'     =>  $prix->nbleads,

            //Error Messages
            'prixError'        =>  '',
            'codepackError'    =>  '',
            'nbleadsError'     =>   '',
            //FormAction
            'actionForm'        => 'deletePrix/'.$idprix,
            'submitBtn'         => 'Supprimer' 
        ];


        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'idprix'       =>  $prix->idprix,
                //FormAction
                'actionForm'   => 'deletePrix/'.$idprix,
                'submitBtn'    => 'Supprimer' 
            ];

            if ($this->prixModel->DeletePrix($data)){
                // Redirect to index page
                $msg= "Vous avez bien supprimer le prix .";
                SessionHelper::setSession("SuccessMessage", $msg);
                SessionHelper::redirectTo('/prixs/indexPrix');  
            } else {
                $msg= "Vous n'avez pas supprimer le prix .";
                SessionHelper::setSession("ErrorMessage", $msg);
                SessionHelper::redirectTo('/prixs/indexPrix');
            }
            $this->view('prixs/deletePrix', $data);
        }
        $this->view('prixs/deletePrix', $data);
    }

}
