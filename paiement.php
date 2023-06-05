<?php
	include 'config/database.php';
	
	$query="SELECT * FROM paiements order by id desc";
	$statement=$db->prepare($query);
	$statement->execute();
	$b=$statement->fetchAll(PDO::FETCH_OBJ);
    $query1 = $db->query("SELECT * FROM reservations order by id desc");
    $query2 = $db->query("SELECT * FROM agents order by id desc");
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
        <script src="assets/jquery-3.6.0.min.js"></script>
        <script
  src="https://code.jquery.com/jquery-3.7.0.slim.js"
  integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c="
  crossorigin="anonymous"></script>
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
					<li class="breadcrumb-item active">Paiements</li>		
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
                                            <h5 id="exampleModalLabel" class="modal-title">Paramètrage des paiements</h5>
                                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body col-md-12">						
                                            <form id="forme" method="POST" action="admin/addData/paiement.php" class="form-horizontal col-md-12" autocomplete="off">	    										
                                                <div class="row">
                                                    <div class="col-md-6 mt-3">
                                                        <div class="form-group">
                                                            <label for="reservation_id">selectionner la reservation</label>
                                                            <select class="form-control" name="reservation_id" id="reservation_id">
                                                                <option selected="">Choose...</option>                                                              												
                                                                <?php while ($ligne = $query1->fetch()) { ?>												
                                                                    <option value="<?php echo($ligne['id']); ?>"><?php echo($ligne['noms']); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>  
                                                        <div class="form-group">
                                                            <label for="agent_id">selectionner author</label>
                                                            <select class="form-control" name="agent_id">
                                                                <option selected="">Choose...</option>                                                               												
                                                                <?php while ($ligne = $query2->fetch()) { ?>												
                                                                    <option value="<?php echo($ligne['id']); ?>"><?php echo($ligne['noms']); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="montant">Entré le montant</label>
                                                            <input type="number" class="form-control" name='montant' required />
                                                        </div> 
                                                        <div class="form-group">
                                                            <label for="devise">selectionner devise</label>
                                                            <select class="form-control" name="devise">
                                                                <option selected="">Choose...</option>                                                               												
                                                                <option value="$">USD</option>
                                                                <option value="fc">FC</option>
                                                            </select>
                                                        </div>                                                                                        
                                                    </div> 
                                                    <div class="col-md-6 mt-3"> 
                                                        <div class="form-group">
                                                            <label for="destination">Destination</label>
                                                            <input type="text" disabled class="form-control" name="destination" id="destination">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="classe">Classe</label>
                                                            <input type="text" disabled class="form-control" name="classe" id="classe">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="prix">Montant à payer</label>
                                                            <input type="text" disabled class="form-control" name="prix" id="prix">
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
                        <a href="rapports/paiements.php" target="_blank" rel="noopener noreferrer" class="btn btn-primary col-md-3 ml-3"><i class="fa fa-print"></i> Imprimer la liste des paiements</a>
                        <div class="card-body">
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>                                                    
                                        <th>Reservation</th>                                                    
                                        <th>Author</th>                                                    
                                        <th>Montants</th>                                                                                                       
                                        <th>Devise</th>                                                    
                                        <th>Date de paiement</th>                                                    
                                        <th>Actions</th>
                                        <th>Print billets</th>
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
                                                    <form id="forme" method="POST" action="admin/editData/paiement.php" class="form-horizontal col-md-12" autocomplete="off">										
                                                         
                                                        <div class="row">
                                                            <input type="hidden" name="id" id="id" value="<?=$item->id ;?>" class="form-control" required/> 
                                                            <div class="col-md-12 mt-3">
                                                                <div class="form-group">
                                                                    <label for="reservation_id">selectionner la reservation</label>
                                                                    <select class="form-control" name="reservation_id" value="<?=$item->reservation_id ;?>">
                                                                        <!-- <option selected="">Choose...</option>                                                              												 -->
                                                                        <option value="<?=$item->reservation_id ;?>"><?=$item->reservation_id ;?></option>
                                                                    </select>
                                                                </div>  
                                                                <div class="form-group">
                                                                    <label for="agent_id">selectionner author</label>
                                                                    <select class="form-control" name="agent_id" value="<?=$item->agent_id ;?>">
                                                                        <!-- <option selected="">Choose...</option>                                                               												 -->
                                                                        <option value="<?=$item->agent_id ;?>"><?=$item->agent_id ;?></option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="montant">Entré le montant</label>
                                                                    <input type="number" class="form-control" name='montant' value="<?=$item->montant ;?>" required />
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="devise">selectionner devise</label>
                                                                    <select class="form-control" name="devise" value="<?=$item->devise ;?>">
                                                                        <!-- <option selected="">Choose...</option>                                                               												 -->
                                                                        <option value="$">USD</option>
                                                                        <option value="fc">FC</option>
                                                                    </select>
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
                                        <td><?=$item->id ;?></td>
                                        <td><?=$item->reservation_id ;?></td>
                                        <td><?=$item->agent_id ;?></td>
                                        <td><?=$item->montant ;?></td>
                                        <td><?=$item->devise ;?></td>
                                        <td><?=$item->date_paie ;?></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#edit<?=$item->id ;?>" href="#" id="edit"><i class="fa fa-edit"></i></a>
                                            <!-- <a onclick= "return (confirm(' Voulez-vous supprimer vraiment cette information ?'));" href="admin/deleteData/deletebapteme.php?id=<?=$item->id ;?>" id="del" class="ml-3"><i class="fa fa-trash"></i></a>                                                         -->
                                        </td> 
                                        <td>                           
                                            <a href="rapports/billet.php?id=<?=$item->id ;?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-print"></i>billets</a>
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

        <script>
            $(function() {
           
            $(document).on('change', '#reservation_id', function() {
                var reservation_id = $(this).val();

                // alert(produit_id);
                $.ajax({
                    url: "admin/paiement_complete.php",
                    method: "POST",
                    data: {
                        reservation_id: reservation_id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#destination').val(data.destination)
                        $('#classe').val(data.classe);
                        $('#prix').val(data.prix);
                        console.log(data);

                    }
                });

            });

        });
    </script>

    </body>

</html>