<?php

include '../../config/database.php';

if(isset($_POST['id']) && isset($_POST['reservation_id']) && isset($_POST['agent_id']) && isset($_POST['montant']) && isset($_POST['devise'])){
     
    $id=$_POST['id']; 
    $reservation_id=$_POST['reservation_id'];  
    $agent_id=$_POST['agent_id'];                
    $montant=$_POST['montant'];                
    $devise=$_POST['devise'];                

    $req=$db->prepare('UPDATE `paiements` SET reservation_id=:reservation_id,agent_id=:agent_id,montant=:montant,devise=:devise WHERE id=:id');
    $result=$req->execute([
        'reservation_id'=>$reservation_id,
        'agent_id'=>$agent_id,              
        'montant'=>$montant,              
        'devise'=>$devise, 
        'id'=>$id,              
    ]);
    if(!empty($result))
    {
        echo 'modification avec success';
    }else{
        echo 'erreur';
    }
    // header('location:../../paiement.php');  
}

?>