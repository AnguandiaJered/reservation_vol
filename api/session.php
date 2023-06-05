<?php
session_start();
include '../config/database.php';

if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt=$db->prepare("SELECT * FROM users WHERE email=:email AND password=:password");
    $stmt->execute([
        'email' => $email,
        'password' => $password
    ]);
    $user=$stmt->fetch();

    if($user)
    {
        // $_SESSION['user_id']=$user['id'];
        // $_SESSION['user_name']=$user['name'];
        // $_SESSION['user_role']=$user['role'];
        // header('location:index.php');

       
        $data=array("message" => "Vous etes bien connecté sur notre application",$user);
        header("Content-Type: application/json");
       echo json_encode($data);
    }
    else
    {
        // header('location:login.php?error=1');
    }
}