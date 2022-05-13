<?php
class Commandes extends Controller {

    public function __construct() {
        $this->prixModel = $this->model('Prix');
        $this->CommandeModel = $this->model('Commande');
    }


    public function ajouterPanier($idLead){

        //var_dump(SessionHelper::getSession(SessionHelper::getSession("userId")));

        if(NULL != SessionHelper::getSession(SessionHelper::getSession("userId")) ){

            // echo "<hr>";
            // $panierExistant = SessionHelper::getSession(SessionHelper::getSession("userId"));
            // var_dump($panierExistant );
            // $panierExistant = json_decode($panierExistant);
            // array_push($panierExistant, $idLead);
            // echo "<hr>";
            // var_dump($panierExistant);
            // // echo  "id-lead --".$idLead;
            // // echo "<hr>";
            // // echo "Lets go !!";
            // // Add new command to session commande line
            // SessionHelper::setSession(SessionHelper::getSession("userId"), json_encode($panierExistant));
            // SessionHelper::redirectTo('/personnels/indexPerso/'.SessionHelper::getSession("userId"));  

        }else{
            $panier = [];
            array_push($panier, $idLead);

            var_dump($panier);
            // SessionHelper::setSession(SessionHelper::getSession("userId"), json_encode($panier));
            // $panierExistant = SessionHelper::getSession(SessionHelper::getSession("userId"));

            // echo "<hr> vide    ";
            // //var_dump($panierExistant );

            // $panierExistant = json_decode($panierExistant);
            // array_push($panierExistant , 5,6,3);
            // // array_push($panierExistant, $idLead);
            // // echo "<hr> exist-pan    --  ";
            // var_dump($panierExistant);

            // Add new command to session commande line
            // SessionHelper::setSession(SessionHelper::getSession("userId"), json_encode($panierExistant));
            //SessionHelper::redirectTo('/personnels/indexPerso/'.SessionHelper::getSession("userId"));  


            
        }
        
        

       // $this->view('commandes/ajouterPanier/', $data);
    }




}
