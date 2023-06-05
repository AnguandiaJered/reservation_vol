<?php

include '../../config/database.php';

if(isset($_POST['id']) && isset($_POST['designation']) && isset($_POST['num']) && isset($_POST['nombre_place'])){
      
    $id=$_POST['id']; 
    $designation=$_POST['designation'];  
    $num=$_POST['num'];                
    $nombre_place=$_POST['nombre_place'];                                

    $req=$db->prepare('UPDATE `vols` SET designation=:designation,num=:num,nombre_place=:nombre_place WHERE id=:id');
    $result=$req->execute([
        'designation'=>$designation,
        'num'=>$num,              
        'nombre_place'=>$nombre_place, 
        'id'=>$id,                           
    ]);
    if(!empty($result))
    {
        echo 'modification avec success';
    }else{
        echo 'erreur';
    }
    header('location:../../vol.php');  
}

?>