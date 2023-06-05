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
        // $test=$result;
        $data=array("message" => "reussi avec succes");
        header("Content-Type: application/json");
       echo json_encode($data);
    }else{
        echo 'erreur';
    }
    // header('location:../../fonction.php');  
}

?>