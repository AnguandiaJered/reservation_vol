<?php
	include '../config/database.php';
	
	$query="SELECT * FROM vagent";
	$statement=$db->prepare($query);
	$statement->execute();
	$b=$statement->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
<?php include '../partials/link.php'; ?>
<link href="../assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
</head>

<body onload="window.print();">  
<div class="container">
    <!-- <img class="image" src="{{ asset('img/coordination.jpg')}}" alt=""> -->
</div>
<br>
<center>
    <h1>LISTE DES NOS AGENTS DE CAA</h1>
</center>
<table class="table table-bordered">
       <thead>
         <tr>
            <th>Noms</th>                                                    
            <th>Genre</th>                                                    
            <th>Adresse</th>                                                    
            <th>Etat civil</th>                                                    
            <th>Mail</th>                                                    
            <th>Fonction</th>                                                    
            <th>Contact</th>                                                    
            <th>Nationalité</th>                                                             
         </tr>
       </thead>
       <tbody>
       <?php foreach ($b as $item) :?>
           <tr>
                <td><?=$item->noms ;?></td>
                <td><?=$item->sexe ;?></td>
                <td><?=$item->adresse ;?></td>
                <td><?=$item->etatcivil ;?></td>
                <td><?=$item->email ;?></td>
                <td><?=$item->fonction ;?></td>
                <td><?=$item->contact ;?></td>
                <td><?=$item->nationalite ;?></td>                                    
           </tr> 
           <?php endforeach ;?>         
       </tbody>                  
   </table>
   <?php include '../partials/script.php'; ?>
</body>

</html>
