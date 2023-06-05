<?php

include '../../config/database.php';

if(isset($_POST['provenance']) && isset($_POST['destination']) && isset($_POST['heure_depart']) && isset($_POST['heure_arriver']) && isset($_POST['date_depart']) && isset($_POST['date_arriver']) && isset($_POST['class_id']) && isset($_POST['vol_id'])){
      
    $provenance=$_POST['provenance'];  
    $destination=$_POST['destination'];
    $heure_depart=$_POST['heure_depart'];   
    $heure_arriver=$_POST['heure_arriver'];   
    $date_depart=$_POST['date_depart'];   
    $date_arriver=$_POST['date_arriver'];   
    $class_id=$_POST['class_id'];   
    $vol_id=$_POST['vol_id'];                                                    

    $req=$db->prepare('INSERT INTO `tarifs`(`provenance`, `destination`, `heure_depart`, `heure_arriver`,`date_depart`, `date_arriver`, `class_id`, `vol_id`) 
    VALUES (:provenance,:destination,:heure_depart,:heure_arriver,:date_depart,:date_arriver,:class_id,:vol_id)');
    $result=$req->execute([
        'provenance'=>$provenance,
        'destination'=>$destination,
        'heure_depart'=>$heure_depart,
        'heure_arriver'=>$heure_arriver,
        'date_depart'=>$date_depart,
        'date_arriver'=>$date_arriver,
        'class_id'=>$class_id,
        'vol_id'=>$vol_id,                                                           
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
    // header('location:../../tarif.php');  
}

?>