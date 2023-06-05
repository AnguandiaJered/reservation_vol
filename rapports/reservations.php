<?php
	include '../config/database.php';
	
	$query="SELECT * FROM v_reservation";
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
    <h1>LISTE DES RESERVATIONS DES BILLETS</h1>
</center>
<table class="table table-bordered">
       <thead>
         <tr>
            <th>Noms</th>                                                    
            <th>Genre</th>                                                    
            <th>Adresse</th>                                                    
            <th>Contact</th>                                                    
            <th>Nationalité</th>                                                    
            <th>DATE DE DEPART</th>                                                    
            <th>CLASSE</th>                                                    
            <th>PRIX</th>                                                    
            <th>VOL</th>                                                             
            <th>DESTINATION</th>                                                             
         </tr>
       </thead>
       <tbody>
       <?php foreach ($b as $item) :?>
           <tr>
                <td><?=$item->noms ;?></td>
                <td><?=$item->sexe ;?></td>
                <td><?=$item->adresse ;?></td>
                <td><?=$item->telephone ;?></td>
                <td><?=$item->nationalite ;?></td>
                <td><?=$item->date_depart ;?></td>
                <td><?=$item->classe ;?></td>
                <td><?=$item->prix ;?></td>                                    
                <td><?=$item->vol ;?></td>                                    
                <td><?=$item->destination ;?></td>                                    
           </tr> 
           <?php endforeach ;?>         
       </tbody>                  
   </table>
   <?php include '../partials/script.php'; ?>
</body>

</html>
