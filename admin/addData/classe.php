<?php

include '../../config/database.php';

if(isset($_POST['designation']) && isset($_POST['prix'])){
      
    $designation=$_POST['designation'];  
    $prix=$_POST['prix'];                

    $req=$db->prepare('INSERT INTO `classes`(`designation`, `prix`) VALUES (:designation,:prix)');
    $result=$req->execute([
        'designation'=>$designation,
        'prix'=>$prix,              
    ]);
    if(!empty($result))
    {
        echo 'enregistrement avec success';
    }else{
        echo 'erreur';
    }
    header('location:../../classe.php');  
}

?>