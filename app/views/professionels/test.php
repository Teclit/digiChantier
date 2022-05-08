<?php

echo "<h1>test-01</h1> <hr>";
    //echo $idPro['MAX( idpro )'];
    // echo "<br>";
    // echo "<br><hr>";
    //print_r($data);
    // echo "<br><hr>";
    // echo $data['domainesEnt'];
    echo "<br><hr>";
    $data = [
        'domainesEnt'        =>"2,3,6,5,8",
        'idPro'              => 33,
    ];
    $secteuActivite = explode(",", $data['domainesEnt']);
    // var_dump($secteuActivite);
    foreach ($secteuActivite as $item) {
        $data = [
            'domainesEnt'        =>intval($item),
            'idPro'              => $data['idPro'],
        ];
        addSecteur_activité($data);
    }


    function addSecteur_activité($data){
        echo $data['domainesEnt'].'    Category<--->Professionelle    '.$data['idPro']."<br>";
    }