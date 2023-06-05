<?php

include '../../config/database.php';

if(isset($_POST['id']) && isset($_POST['noms']) && isset($_POST['sexe']) && isset($_POST['adresse']) && isset($_POST['etatcivil']) && isset($_POST['email']) && isset($_POST['fonction_id']) && isset($_POST['contact']) && isset($_POST['nationalite'])){
      
    $id=$_POST['id']; 
    $noms=$_POST['noms'];  
    $sexe=$_POST['sexe'];
    $adresse=$_POST['adresse'];   
    $etatcivil=$_POST['etatcivil'];   
    $email=$_POST['email'];   
    $fonction_id=$_POST['fonction_id'];                  
    $contact=$_POST['contact'];                  
    $nationalite=$_POST['nationalite'];                  

    $req=$db->prepare('UPDATE `agents` SET noms=:noms,sexe=:sexe,adresse=:adresse,etatcivil=:etatcivil,email=:email,fonction_id=:fonction_id,contact=:contact,nationalite=:nationalite WHERE id=:id');
    $result=$req->execute([
        'noms'=>$noms,
        'sexe'=>$sexe,
        'adresse'=>$adresse,
        'etatcivil'=>$etatcivil,
        'email'=>$email,
        'fonction_id'=>$fonction_id,               
        'contact'=>$contact,                              
        'nationalite'=>$nationalite, 
        'id'=>$id,              
    ]);
    if(!empty($result))
    {
        echo 'modification avec success';
    }else{
        echo 'erreur';
    }
    // header('location:../../agent.php');  
}

?>