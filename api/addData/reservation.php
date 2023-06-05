<?php

include '../../config/database.php';

if(isset($_POST['tarif_id']) && isset($_POST['noms']) && isset($_POST['sexe']) && isset($_POST['adresse']) && isset($_POST['telephone']) && isset($_POST['nationalite']) && isset($_POST['date_depart'])){
      
    $tarif_id=$_POST['tarif_id'];  
    $noms=$_POST['noms'];
    $sexe=$_POST['sexe'];   
    $adresse=$_POST['adresse'];   
    $telephone=$_POST['telephone'];   
    $nationalite=$_POST['nationalite'];                  
    $date_depart=$_POST['date_depart'];                                   

    $req=$db->prepare('INSERT INTO `reservations`(`tarif_id`, `noms`, `sexe`, `adresse`, `telephone`, `nationalite`, `date_depart`) 
    VALUES (:tarif_id,:noms,:sexe,:adresse,:telephone,:nationalite,:date_depart)');
    $result=$req->execute([
        'tarif_id'=>$tarif_id,
        'noms'=>$noms,
        'sexe'=>$sexe,
        'adresse'=>$adresse,
        'telephone'=>$telephone,
        'nationalite'=>$nationalite,               
        'date_depart'=>$date_depart,                                             
    ]);
    if(!empty($result))
    {
        // $test=$result;
        $data=array("message" => "reussi avec succes");
        header("Content-Type: application/json");
       echo json_encode($data);
    }else{
        echo 'erreur';
    }
    // header('location:../../reservation.php');  
}

?>