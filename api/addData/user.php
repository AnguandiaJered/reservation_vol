<?php

include '../../config/database.php';

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password'])){
      
    $name=$_POST['name'];  
    $email=$_POST['email'];                
    $phone=$_POST['phone'];                
    $password=$_POST['password'];                

    $req=$db->prepare('INSERT INTO `users`(`name`, `email`, `phone`, `password`)
     VALUES (:name,:email,:phone,:password)');
    $result=$req->execute([
        'name'=>$name,
        'email'=>$email,              
        'phone'=>$phone,              
        'password'=>$password,              
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
    // header('location:../../users.php');  
}

?>