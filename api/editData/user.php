<?php

include '../../config/database.php';

if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password'])){
     
    $id=$_POST['id']; 
    $name=$_POST['name'];  
    $email=$_POST['email'];                
    $phone=$_POST['phone'];                
    $password=$_POST['password'];                

    $req=$db->prepare('UPDATE `users` SET name=:name,email=:email,phone=:phone,password=:password WHERE id=:id');
    $result=$req->execute([
        'name'=>$name,
        'email'=>$email,              
        'phone'=>$phone,              
        'password'=>$password, 
        'id'=>$id,              
    ]);
    if(!empty($result))
    {
        echo 'modification avec success';
    }else{
        echo 'erreur';
    }
    // header('location:../../users.php');  
}

?>