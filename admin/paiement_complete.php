<?php
include '../config/database.php';

if(isset($_POST["reservation_id"]))
{
    $reservation_id=$_POST["reservation_id"];
	$output = array();
	$statement = $db->prepare(
		"SELECT * from show_paiement 
		WHERE id = ".$reservation_id."
		LIMIT 1"
	);
    
    // $query2 = $db->query("SELECT * FROM etudiant where id_etudiant=".$id_etudiant);

	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["id"] = $row["id"];
		// $output["nbre_mois"] = $row["nbre_mois"];
		$output["destination"] = $row["destination"];
		$output["classe"] = $row["classe"];
		$output["prix"] = $row["prix"];
		// $output["unite"] = $row["unite"];
	}
	echo json_encode($output);
}
?>