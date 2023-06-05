<?php

include '../../config/database.php';

if(isset($_POST['reservation_id']) && isset($_POST['agent_id']) && isset($_POST['montant']) && isset($_POST['devise'])){
      
    $reservation_id=$_POST['reservation_id'];  
    $agent_id=$_POST['agent_id'];                
    $montant=$_POST['montant'];                
    $devise=$_POST['devise'];                

    $req=$db->prepare('INSERT INTO `paiements`(`reservation_id`, `agent_id`, `montant`, `devise`) 
    VALUES (:reservation_id,:agent_id,:montant,:devise)');
    $result=$req->execute([
        'reservation_id'=>$reservation_id,
        'agent_id'=>$agent_id,              
        'montant'=>$montant,              
        'devise'=>$devise,              
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
    // header('location:../../paiement.php');  
}

?>