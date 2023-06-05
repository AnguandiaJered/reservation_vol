<?php

include '../../config/database.php';

if(isset($_POST['noms']) && isset($_POST['sexe']) && isset($_POST['adresse']) && isset($_POST['etatcivil']) && isset($_POST['email']) && isset($_POST['fonction_id']) && isset($_POST['contact']) && isset($_POST['nationalite'])){
      
    $noms=$_POST['noms'];  
    $sexe=$_POST['sexe'];
    $adresse=$_POST['adresse'];   
    $etatcivil=$_POST['etatcivil'];   
    $email=$_POST['email'];   
    $fonction_id=$_POST['fonction_id'];                  
    $contact=$_POST['contact'];                  
    $nationalite=$_POST['nationalite'];                  

    $req=$db->prepare('INSERT INTO `agents`(`noms`, `sexe`, `adresse`, `etatcivil`, `email`, `fonction_id`, `contact`, `nationalite`) 
    VALUES (:noms,:sexe,:adresse,:etatcivil,:email,:fonction_id,:contact,:nationalite)');
    $result=$req->execute([
        'noms'=>$noms,
        'sexe'=>$sexe,
        'adresse'=>$adresse,
        'etatcivil'=>$etatcivil,
        'email'=>$email,
        'fonction_id'=>$fonction_id,               
        'contact'=>$contact,                              
        'nationalite'=>$nationalite,               
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
    // header('location:../../agent.php');  
    
}

?>