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
        // $test=$result;
        $data=array("message" => "reussi avec succes");
        header("Content-Type: application/json");
       echo json_encode($data);
    }else{
        echo 'erreur';
    }
    // header('location:../../classe.php');  
}

?>