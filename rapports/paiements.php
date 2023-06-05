<?php
	include '../config/database.php';
	
	$query="SELECT * FROM vpaiement";
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
    <h1>LISTE DES PAIEMENTS DES BILLETS</h1>
</center>
<table class="table table-bordered">
       <thead>
         <tr>
            <th>ID</th>                                                    
            <th>NOMS DU CLIENT</th>                                                    
            <th>CONTACT</th>                                                    
            <th>MONTANTS</th>                                                    
            <th>DEVISE</th>                                                    
            <th>AUTHOR</th>                                                    
            <th>DATE DE PAIEMENT</th>                                                                                                                
         </tr>
       </thead>
       <tbody>
       <?php foreach ($b as $item) :?>
           <tr>
                <td><?=$item->id ;?></td>
                <td><?=$item->client ;?></td>
                <td><?=$item->telephone ;?></td>
                <td><?=$item->montant ;?></td>
                <td><?=$item->devise ;?></td>
                <td><?=$item->author ;?></td>
                <td><?=$item->date_paie ;?></td>                                   
           </tr> 
           <?php endforeach ;?>         
       </tbody>                  
   </table>
   <?php include '../partials/script.php'; ?>
</body>

</html>
