<?php

include '../../config/database.php';

if(isset($_POST['id']) && isset($_POST['name'])){
     
    $id=$_POST['id']; 
    $name=$_POST['name'];                 

    $req=$db->prepare('UPDATE `fonctions` SET `name`=:name WHERE id=:id');
    $result=$req->execute([
        'name'=>$name,  
        'id'=>$id,            
    ]);
    if(!empty($result))
    {
        echo 'modification avec success';
    }else{
        echo 'erreur';
    }
    header('location:../../fonction.php');  
}

?>