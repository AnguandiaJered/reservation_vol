<?php

include '../../config/database.php';

if(isset($_POST['id']) && isset($_POST['tarif_id']) && isset($_POST['noms']) && isset($_POST['sexe']) && isset($_POST['adresse']) && isset($_POST['telephone']) && isset($_POST['nationalite']) && isset($_POST['date_depart'])){
      
    $id=$_POST['id']; 
    $tarif_id=$_POST['tarif_id'];  
    $noms=$_POST['noms'];
    $sexe=$_POST['sexe'];   
    $adresse=$_POST['adresse'];   
    $telephone=$_POST['telephone'];   
    $nationalite=$_POST['nationalite'];                  
    $date_depart=$_POST['date_depart'];                                   

    $req=$db->prepare('UPDATE `reservations` SET tarif_id=:tarif_id,noms=:noms,sexe=:sexe,telephone=:adresse,telephone=:telephone,nationalite=:nationalite,date_depart=:date_depart WHERE id=:id');
    $result=$req->execute([
        'tarif_id'=>$tarif_id,
        'noms'=>$noms,
        'sexe'=>$sexe,
        'adresse'=>$adresse,
        'telephone'=>$telephone,
        'nationalite'=>$nationalite,               
        'date_depart'=>$date_depart, 
        'id'=>$id,                                             
    ]);
    if(!empty($result))
    {
        echo 'modification avec success';
    }else{
        echo 'erreur';
    }
    header('location:../../reservation.php');  
}

?>