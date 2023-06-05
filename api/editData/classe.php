<?php

include '../../config/database.php';

if(isset($_POST['id']) && isset($_POST['designation']) && isset($_POST['prix'])){
    
    $id=$_POST['id']; 
    $designation=$_POST['designation'];  
    $prix=$_POST['prix'];                

    $req=$db->prepare('UPDATE `classes` SET designation=:designation,prix=:prix WHERE id=:id');
    $result=$req->execute([
        'designation'=>$designation,
        'prix'=>$prix, 
        'id'=>$id,              
    ]);
    if(!empty($result))
    {
        echo 'modification avec success';
    }else{
        echo 'erreur';
    }
    // header('location:../../classe.php');  
}

?>