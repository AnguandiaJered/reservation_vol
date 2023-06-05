<?php

include '../../config/database.php';

if(isset($_POST['name'])){
      
    $name=$_POST['name'];                 

    $req=$db->prepare('INSERT INTO `fonctions`(`name`) VALUES (:name)');
    $result=$req->execute([
        'name'=>$name,             
    ]);
    if(!empty($result))
    {
        echo 'enregistrement avec success';
    }else{
        echo 'erreur';
    }
    header('location:../../fonction.php');  
}

?>