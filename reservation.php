<?php
	include 'config/database.php';
	
	$query="SELECT * FROM reservations order by id desc";
	$statement=$db->prepare($query);
	$statement->execute();
	$b=$statement->fetchAll(PDO::FETCH_OBJ);
    $query1 = $db->query("SELECT * FROM tarifs order by id desc");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CAA</title>
        <!-- Common Plugins -->
        <?php include 'partials/link.php'; ?>
    </head>
    <body>
        <div class="top-bar primary-top-bar">          
          <?php include 'partials/header.php'; ?>
        </div>         
          <?php include 'partials/sidebar.php'; ?>  
        <div class="row page-header">
            <div class="col-lg-6 align-self-center ">
			    <h2>Agence de voyage CAA</h2>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">admin</a></li>
					<li class="breadcrumb-item active">Reservation</li>		
				</ol>
			</div>
		</div>
        <section class="main-content">
			<div class="row">
                <div class="col-md-12">
                    <div class="card">                    
                        <div class="col-md-12 col-sm-12 text-right">							
							<button data-toggle="modal" data-target="#myModal" class="btn btn-primary mt-3">Effectuer l'opération</button>							
							<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
							    <div role="document" class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 id="exampleModalLabel" class="modal-title">Paramètrage des reservations</h5>
                                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body col-md-12">						
                                            <form id="forme" method="POST" action="admin/addData/reservation.php" class="form-horizontal col-md-12" autocomplete="off">	
                                               										
                                                <div class="row">
                                                    <div class="col-md-6 mt-3">                                                      
                                                        <div class="form-group">
                                                            <label for="tarif_id">selectionner la destination</label>
                                                            <select class="form-control" name="tarif_id">
                                                                <option selected="">Choose...</option>                                                               												
                                                                <?php while ($ligne = $query1->fetch()) { ?>												
                                                                    <option value="<?php echo($ligne['id']); ?>"><?php echo($ligne['destination']); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div> 
                                                        <div class="form-group">
                                                            <label for="noms">Entré noms</label>
                                                            <input type="text" class="form-control" name='noms' required />
                                                        </div> 
                                                        <div class="form-group">
                                                            <label for="sexe">selectionner le genre</label>
                                                            <select class="form-control" name="sexe">
                                                                <option selected="">Choose...</option>                                                               												
                                                                <option value="M">Masculin</option>
                                                                <option value="M">Feminin</option>
                                                            </select>
                                                        </div> 
                                                        <div class="form-group">
                                                            <label for="adresse">Entré l'adresse</label>
                                                            <input type="text" class="form-control" name='adresse' required />
                                                        </div>                                                                                        
                                                    </div> 
                                                    <div class="col-md-6 mt-3">
                                                        <div class="form-group">
                                                            <label for="telephone">Entré le contact</label>
                                                            <input type="tel" class="form-control" name='telephone' required />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nationalite">Entré la nationalite</label>
                                                            <input type="text" class="form-control" name='nationalite' required />
                                                        </div> 
                                                            
                                                        <div class="form-group">
                                                            <label for="date_depart">Entré la date de depart</label>
                                                            <input type="date" class="form-control" name='date_depart' required />
                                                        </div>                                                                                             
                                                    </div>                                                               
                                                </div>
                                                <div class="form-group">                               
                                                    <input type="submit" class="btn btn-primary col-md-5 mt-2" value="Enregistrer" />
                                                </div>																							
                                            </form>
                                        </div>
                                    </div>								                        
                                </div>							
							</div>							
						</div>
                        <a href="rapports/reservations.php" target="_blank" rel="noopener noreferrer" class="btn btn-primary col-md-4 ml-3"><i class="fa fa-print"></i> Imprimer la liste des reservations</a>
                        <div class="card-body">
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                <thead>
                                    <tr class="text-center">
                                        <th>Destination</th>                                                    
                                        <th>Noms</th>                                                    
                                        <th>Genre</th>                                                    
                                        <th>Adresse</th>                                                    
                                        <th>Contact</th>                                                                                               
                                        <th>Nationalité</th>                                                    
                                        <th>Date de depart</th>                                                    
                                        <th>Date de reservation</th>                                                    
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php foreach ($b as $item) :?>
                                    <div id="edit<?=$item->id ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                        <div role="document" class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 id="exampleModalLabel" class="modal-title">Paramètrage des agents</h5>
                                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body col-md-12">						
                                                    <form id="forme" method="POST" action="admin/editData/reservation.php" class="form-horizontal col-md-12" autocomplete="off">										
                                                        <div class="row">
                                                            <div class="col-md-6 mt-3"> 
                                                            <input type="hidden" name="id" id="id" value="<?=$item->id ;?>" class="form-control" required/>                                                      
                                                                <div class="form-group">
                                                                    <label for="tarif_id">selectionner la destination</label>
                                                                    <select class="form-control" name="tarif_id" value="<?=$item->tarif_id ;?>">
                                                                        <!-- <option selected="">Choose...</option>                                                               																								 -->
                                                                        <option value="<?=$item->tarif_id ;?>"><?=$item->tarif_id ;?></option>
                                                                    </select>
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="noms">Entré noms</label>
                                                                    <input type="text" class="form-control" name='noms' value="<?=$item->noms ;?>" required />
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="sexe">selectionner le genre</label>
                                                                    <select class="form-control" name="sexe" value="<?=$item->sexe ;?>">
                                                                        <!-- <option selected="">Choose...</option>                                                               												 -->
                                                                        <option value="M">Masculin</option>
                                                                        <option value="M">Feminin</option>
                                                                    </select>
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="adresse">Entré l'adresse</label>
                                                                    <input type="text" class="form-control" name='adresse' value="<?=$item->adresse ;?>" required />
                                                                </div>                                                                                        
                                                            </div> 
                                                            <div class="col-md-6 mt-3">
                                                                <div class="form-group">
                                                                    <label for="telephone">Entré le contact</label>
                                                                    <input type="tel" class="form-control" name='telephone' value="<?=$item->telephone ;?>" required />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nationalite">Entré la nationalite</label>
                                                                    <input type="text" class="form-control" name='nationalite' value="<?=$item->nationalite ;?>" required />
                                                                </div> 
                                                                    
                                                                <div class="form-group">
                                                                    <label for="date_depart">Entré la date de depart</label>
                                                                    <input type="date" class="form-control" name='date_depart' value="<?=$item->date_depart ;?>" required />
                                                                </div>                                                                                             
                                                            </div>                                                                                                                         
                                                        </div>
                                                        <div class="form-group">                               
                                                            <input type="submit" class="btn btn-primary col-md-5 mt-2 ml-5" value="Modifier" />
                                                        </div>																							
                                                    </form>
                                                </div>
                                            </div>								                        
                                        </div>							
                                    </div>	
                                    <tr>    
                                        <div class="modal fade" id="edit<?=$item->id ;?>">
                                            <div class="modal-dialog modal-success">
                                                <div class="modal-content">
                                                    <div class="modal-header" >
                                                    <h3>Editer</h3><button class="btn btn-danger" data-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body"></div>
                                                </div>
                                            </div>
                                        </div>                                   
                                        <td><?=$item->tarif_id ;?></td>
                                        <td><?=$item->noms ;?></td>
                                        <td><?=$item->sexe ;?></td>
                                        <td><?=$item->adresse ;?></td>
                                        <td><?=$item->telephone ;?></td>
                                        <td><?=$item->nationalite ;?></td>
                                        <td><?=$item->date_depart ;?></td>
                                        <td><?=$item->date_paie ;?></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#edit<?=$item->id ;?>" href="#" id="edit"><i class="fa fa-edit"></i></a>
                                            <!-- <a onclick= "return (confirm(' Voulez-vous supprimer vraiment cette information ?'));" href="admin/deleteData/deletebapteme.php?id=<?=$item->id ;?>" id="del" class="ml-3"><i class="fa fa-trash"></i></a>                                                         -->
                                        </td>                                                    
                                    </tr>
                                    <?php endforeach ;?>                                                                                      
                                </tbody>
                            </table>              

                        </div>
                    </div>
                </div>
            </div>
            <?php include 'partials/footer.php'; ?>
        </section>
        <?php include 'partials/script.php'; ?>
    </body>

</html>