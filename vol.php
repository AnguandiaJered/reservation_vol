<?php
	include 'config/database.php';
	
	$query="SELECT * FROM vols";
	$statement=$db->prepare($query);
	$statement->execute();
	$b=$statement->fetchAll(PDO::FETCH_OBJ);
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
					<li class="breadcrumb-item active">Vols</li>		
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
                                            <h5 id="exampleModalLabel" class="modal-title">Paramètrage des vols</h5>
                                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body col-md-12">						
                                            <form id="forme" method="POST" action="admin/addData/vol.php" class="form-horizontal col-md-12" autocomplete="off">	
                                               										
                                                <div class="row">
                                                    <div class="col-md-12 mt-3">
                                                        <div class="form-group">
                                                            <label for="designation">Entré la designation</label>
                                                            <input type="text" class="form-control" name='designation' required />
                                                        </div>  
                                                        <div class="form-group">
                                                            <label for="num">Entré le num du vol</label>
                                                            <input type="text" class="form-control" name='num' required />
                                                        </div> 
                                                        <div class="form-group">
                                                            <label for="nombre_place">Entré le nombre de place</label>
                                                            <input type="number" class="form-control" name='nombre_place' required />
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
                        <!-- <a href="rapports/baptemes.php" target="_blank" rel="noopener noreferrer" class="btn btn-primary col-md-3 ml-3">Imprimer la liste des baptisés</a> -->
                        <div class="card-body">
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>                                                    
                                        <th>Designation</th>                                                    
                                        <th>Num</th>                                                                                                       
                                        <th>Nombre de Place</th>                                                                                                       
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
                                                    <form id="forme" method="POST" action="admin/editData/vol.php" class="form-horizontal col-md-12" autocomplete="off">										
                                                         
                                                        <div class="row">
                                                            <input type="hidden" name="id" id="id" value="<?=$item->id ;?>" class="form-control" required/> 
                                                            <div class="col-md-12 mt-3">
                                                                <div class="form-group">
                                                                    <label for="designation">Entré la designation</label>
                                                                    <input type="text" class="form-control" name='designation' value="<?=$item->designation ;?>" required />
                                                                </div>  
                                                                <div class="form-group">
                                                                    <label for="num">Entré le num du vol</label>
                                                                    <input type="text" class="form-control" name='num' value="<?=$item->num ;?>" required />
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="nombre_place">Entré le nombre de place</label>
                                                                    <input type="number" class="form-control" name='nombre_place' value="<?=$item->nombre_place ;?>" required />
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
                                        <td><?=$item->designation ;?></td>
                                        <td><?=$item->num ;?></td>
                                        <td><?=$item->nombre_place ;?></td>
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