<?php  

 function imgup()
{
  
  $url_img=basename($_FILES['photo']['name']);
  $id=$_POST['id']; 
  $provenance=$_POST['provenance'];  
  $destination=$_POST['destination'];
  $heure_depart=$_POST['heure_depart'];   
  $heure_arriver=$_POST['heure_arriver'];   
  $date_depart=$_POST['date_depart'];   
  $date_arriver=$_POST['date_arriver'];   
  $class_id=$_POST['class_id'];   
  $vol_id=$_POST['vol_id'];  

  
  
$verif_img=getimagesize($_FILES['photo']['tmp_name']);

  if (isset($_FILES['photo']) AND $_FILES['photo']['error']== 0){
if ($_FILES['photo']['size'] <= 2000000){


$infosfichier = pathinfo($_FILES['photo']['name']);
$extension_upload = $infosfichier['extension'];
$extensions_autorisees = array('jpg', 'jpeg', 'gif','png','JPG','JPEG','GIF','PNG');
// if (in_array($extension_upload,$extensions_autorisees)){
  if ($verif_img AND $verif_img[2] < 4){
if(move_uploaded_file($_FILES['photo']['tmp_name'],'../images/'.$url_img)){
   require '../../config/database.php';
  
   $req=$db->prepare('UPDATE `tarifs` SET provenance=:provenance,destination=:destination,heure_depart=:heure_depart,heure_arriver=:heure_arriver,date_depart=:date_depart,date_arriver=:date_arriver,class_id=:class_id,vol_id=:vol_id,photo=:photo WHERE id=:id');
            $req->execute(array(
            'photo' => $_FILES['photo']['name'],
            'provenance'=>$provenance,
            'destination'=>$destination,
            'heure_depart'=>$heure_depart,
            'heure_arriver'=>$heure_arriver,
            'date_depart'=>$date_depart,
            'date_arriver'=>$date_arriver,
            'class_id'=>$class_id,
            'vol_id'=>$vol_id,  
            'id'=>$id,                                                          
             ));
            
             header('location:../../tarif.php');  
return true;

}

}


      }

      else{

          unlink($_FILES['photo']['tmp_name']);
          unset($_FILES['photo']);

      }
    }
    else{
        require '../config/database.php';
  
        $req=$db->prepare('UPDATE `tarifs` SET provenance=:provenance,destination=:destination,heure_depart=:heure_depart,heure_arriver=:heure_arriver,date_depart=:date_depart,date_arriver=:date_arriver,class_id=:class_id,vol_id=:vol_id WHERE id=:id');
        $req->execute(array(
            'provenance'=>$provenance,
            'destination'=>$destination,
            'heure_depart'=>$heure_depart,
            'heure_arriver'=>$heure_arriver,
            'date_depart'=>$date_depart,
            'date_arriver'=>$date_arriver,
            'class_id'=>$class_id,
            'vol_id'=>$vol_id,  
            'id'=>$id,                                                         
         ));
        
         header('location:../../tarif.php');  
return true;

    }


}



if(imgup()){



}
// var_dump($_FILES);

?>