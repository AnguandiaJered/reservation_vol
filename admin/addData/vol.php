<?php

include '../../config/database.php';

if(isset($_POST['designation']) && isset($_POST['num']) && isset($_POST['nombre_place'])){
      
    $designation=$_POST['designation'];  
    $num=$_POST['num'];                
    $nombre_place=$_POST['nombre_place'];                                

    $req=$db->prepare('INSERT INTO `vols`(`designation`, `num`, `nombre_place`) VALUES (:designation,:num,:nombre_place)');
    $result=$req->execute([
        'designation'=>$designation,
        'num'=>$num,              
        'nombre_place'=>$nombre_place,                           
    ]);
    if(!empty($result))
    {
        echo 'enregistrement avec success';
    }else{
        echo 'erreur';
    }
    header('location:../../vol.php');  
}

?>