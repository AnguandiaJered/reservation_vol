<?php
	include '../config/database.php';
	
	// $query="SELECT * FROM vpaiement";
	// $statement=$db->prepare($query);
	// $statement->execute();
	// $b=$statement->fetchAll(PDO::FETCH_OBJ);
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $req = $db->query("SELECT * FROM vbillet WHERE id=$id");
        $req->execute();
        $st=$req->fetchAll();
        
    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
<?php include '../partials/link.php'; ?>
<link href="../assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<style rel="stylesheet">
 .vol{
    border:1px solid;
    border-radius: 20px;
 }
 </style>
</head>

<body onload="window.print();">  
<div class="container-fluid vol">
    <!-- <img class="image" src="{{ asset('img/coordination.jpg')}}" alt=""> -->

<br>
<center>
    <h1>AGENCE DE VOYAGE <img alt="CAA" src="../assets/caa.png" width="250" height="100"></h1>
    
   
</center>
<div class="">     
    <?php foreach($st as $c): ?>
        <div class="row">
            <div class="col-md-6">
                <h3>Class | Classe</h3>
                <h1><?=$c['classe'];?></h1>
            </div>           
            <div class="col-md-6">
                <img alt="CAA" src="qrcode2.png" class="offset-4" width="250" height="130">
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-5">
                <h3>Flight & Date | Vol et Date</h3>
                <h1><strong><?=$c['vol'];?> <?=$c['date_depart'];?></strong></h1>
            </div>           
            <div class="col-md-4">
                <h3>Nationalité</h3>
                <h1><strong><?=$c['nationalite'];?></strong></h1>
            </div>
            <div class="col-md-3">
                <h3>Money | Montant payer</h3>
                <h1><strong><?=$c['montant'];?><?=$c['devise'];?></strong></h1>
            </div>
        </div>
        <hr/>
        
        <div class="row">
            <div class="col-md-6">
                <h3>From | De</h3>
                <h1><strong><?=$c['provenance'];?></strong></h1>
            </div>
            <div class="col-md-6">
                <h3>To | Destination</h3>
                <h1><strong><?=$c['destination'];?></strong></h1>
            </div>           
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                <h3>Name | Nom</h3>
                <h1><strong><?=$c['noms'];?></strong></h1>
            </div>
            <div class="col-md-6">
                <h3>Airline use | A usage Interne</h3>
                <h1>Boarding time | Heure d'embarquement : <strong><?=$c['heure_depart'];?></strong></h1>
            </div>           
        </div>
        <hr/>
        <h1>Boarding Pass | Carte d'accès à bord</h1>
        <h3>musicairport.com</h3>
    </div>
    <?php endforeach; ?> 
</div>
   <?php include '../partials/script.php'; ?>
</body>

</html>
