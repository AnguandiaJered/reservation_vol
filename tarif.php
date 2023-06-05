<?php
	include 'config/database.php';
	
	$query="SELECT * FROM tarifs";
	$statement=$db->prepare($query);
	$statement->execute();
	$b=$statement->fetchAll(PDO::FETCH_OBJ);
    $query1 = $db->query("SELECT * FROM classes");
    $query2 = $db->query("SELECT * FROM vols");

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
					<li class="breadcrumb-item active">Tarrif</li>		
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
                                            <h5 id="exampleModalLabel" class="modal-title">Paramètrage des tarrifs</h5>
                                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body col-md-12">						
                                            <form id="forme" method="POST" action="admin/addData/tarif.php" class="form-horizontal col-md-12" autocomplete="off">	
                                              										
                                                <div class="row">
                                                    <div class="col-md-6 mt-3">
                                                        <div class="form-group">
                                                            <label for="provenance">Entré la provenance</label>
                                                            <input type="text" class="form-control" name='provenance' required />
                                                        </div> 
                                                        <div class="form-group">
                                                            <label for="destination">Entré la destination</label>
                                                            <input type="text" class="form-control" name='destination' required />
                                                        </div> 
                                                        <div class="form-group">
                                                            <label for="heure_depart">Entré l'heure de depart</label>
                                                            <input type="time" class="form-control" name='heure_depart' required />
                                                        </div>  
                                                        <div class="form-group">
                                                            <label for="heure_arriver">Entré l'heure d'arriver</label>
                                                            <input type="time" class="form-control" name='heure_arriver' required />
                                                        </div>                                                                                                                                                
                                                    </div> 
                                                    <div class="col-md-6 mt-3">                                                       
                                                      
                                                        <div class="form-group">
                                                            <label for="class_id">selectionner la classe</label>
                                                            <select class="form-control" name="class_id">
                                                                <option selected="">Choose...</option>                                                               												
                                                                <?php while ($ligne = $query1->fetch()) { ?>												
                                                                    <option value="<?php echo($ligne['id']); ?>"><?php echo($ligne['designation']); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div> 
                                                        <div class="form-group">
                                                            <label for="vol_id">selectionner le vol</label>
                                                            <select class="form-control" name="vol_id">
                                                                <option selected="">Choose...</option>                                                               												
                                                                <?php while ($ligne = $query2->fetch()) { ?>												
                                                                    <option value="<?php echo($ligne['id']); ?>"><?php echo($ligne['designation']); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>   
                                                        <div class="form-group">
                                                            <label for="date_depart">Entré la date de depart</label>
                                                            <input type="date" class="form-control" name='date_depart' required />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="date_arriver">Entré la date d'arriver</label>
                                                            <input type="date" class="form-control" name='date_arriver' required />
                                                        </div>  
                                                        <!-- <div class="form-group">
                                                            <label for="photo">Images</label>
                                                            <input type="file" class="form-control" name='photo' required />
                                                        </div>                                                                                           -->
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
                        <div class="card-body">
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>                                                    
                                        <th>Provenance</th>                                                    
                                        <th>Destination</th>                                                    
                                        <th>Heure de depart</th>                                                    
                                        <th>Heure d'arriver</th> 
                                        <th>Date de depart</th>                                                    
                                        <th>Date d'arriver</th>                                                    
                                        <th>Classe</th>                                                    
                                        <th>Vol</th>                                                    
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php foreach ($b as $item) :?>
                                    <div id="edit<?=$item->id ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                        <div role="document" class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 id="exampleModalLabel" class="modal-title">Paramètrage des années</h5>
                                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body col-md-12">						
                                                    <form id="forme" method="POST" action="admin/editData/tarif.php" class="form-horizontal col-md-12" autocomplete="off">										
                                                     	    
                                                        <div class="row">
                                                            <input type="hidden" name="id" id="id" value="<?=$item->id ;?>" class="form-control" required/> 
                                                            <div class="col-md-6 mt-3">
                                                                <div class="form-group">
                                                                    <label for="provenance">Entré la provenance</label>
                                                                    <input type="text" class="form-control" name='provenance' value="<?=$item->provenance ;?>" required />
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="destination">Entré la destination</label>
                                                                    <input type="text" class="form-control" name='destination' value="<?=$item->destination ;?>" required />
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="heure_depart">Entré l'heure de depart</label>
                                                                    <input type="time" class="form-control" name='heure_depart' value="<?=$item->heure_depart ;?>" required />
                                                                </div>  
                                                                <div class="form-group">
                                                                    <label for="heure_arriver">Entré l'heure d'arriver</label>
                                                                    <input type="time" class="form-control" name='heure_arriver' value="<?=$item->heure_arriver ;?>" required />
                                                                </div>                                                                                                                                                
                                                            </div> 
                                                            <div class="col-md-6 mt-3">                                                       
                                                                
                                                                <div class="form-group">
                                                                    <label for="class_id">selectionner la classe</label>
                                                                    <select class="form-control" name="class_id" value="<?=$item->class_id ;?>">
                                                                        <!-- <option selected="">Choose...</option>                                                              																					 -->
                                                                        <option value="<?=$item->class_id ;?>"><?=$item->class_id ;?></option>  
                                                                    </select>
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="vol_id">selectionner le vol</label>
                                                                    <select class="form-control" name="vol_id" value="<?=$item->vol_id ;?>">
                                                                        <!-- <option selected="">Choose...</option>                                                               												 -->
                                                                        <option value="<?=$item->vol_id ;?>"><?=$item->vol_id ;?></option>  
                                                                    </select>
                                                                </div>  
                                                                <div class="form-group">
                                                                    <label for="date_depart">Entré la date de depart</label>
                                                                    <input type="date" class="form-control" name='date_depart' value="<?=$item->date_depart ;?>" required />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="date_arriver">Entré la date d'arriver</label>
                                                                    <input type="date" class="form-control" name='date_arriver' value="<?=$item->date_arriver ;?>" required />
                                                                </div> 
                                                                <!-- <div class="form-group">
                                                                    <label for="photo">Images</label>
                                                                    <input type="file" class="form-control" value="<?=$item->photo ;?>" name='photo' required />
                                                                </div>                                                                                             -->
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
                                        <td><?=$item->id ;?></td>
                                        <td><?=$item->provenance ;?></td>
                                        <td><?=$item->destination ;?></td>
                                        <td><?=$item->heure_depart ;?></td>
                                        <td><?=$item->heure_arriver ;?></td>
                                        <td><?=$item->date_depart ;?></td>
                                        <td><?=$item->date_arriver ;?></td>
                                        <td><?=$item->class_id ;?></td>
                                        <td><?=$item->vol_id ;?></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#edit<?=$item->id ;?>" href="#" id="edit"><i class="fa fa-edit"></i></a>
                                            <!-- <a onclick= "return (confirm(' Voulez-vous supprimer vraiment cette information ?'));"  href="admin/deleteData/deletepatrimoine.php?id=<?=$item->id ;?>" id="del" class="ml-3"><i class="fa fa-trash"></i></a>                                                         -->
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