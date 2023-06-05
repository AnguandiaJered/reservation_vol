<?php
	include 'config/database.php';
  
  session_start();
  if (!isset($_SESSION['user_id'])){
	  header('location:login.php');
  }

  $query1 = $db->query("SELECT COUNT(*) as id from agents");
  $query2 = $db->query("SELECT COUNT(*) as id FROM reservations");
  $query3 = $db->query("SELECT COUNT(*) as id FROM vols");
  $query4 = $db->query("SELECT COUNT(*) as id from classes");
  $query5 = $db->query("SELECT COUNT(*) as id from users");
  $query6 = $db->query("SELECT SUM(montant) as montant from paiements");
  $query7 = $db->query("SELECT COUNT(*) as id from paiements");

// ?>
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
      <?php include 'partials/sidebar.php' ;?>       
		<div class="row page-header">
				<div class="col-lg-6 align-self-center ">
				  <h2>Dashboard</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>			
		</div>
		
        <section class="main-content">
          <div class="row w-no-padding margin-b-30">          
            <div class="col-md-3">
              <div class="widget  bg-light">
                <div class="row row-table ">
                  <div class="margin-b-30">
                  <h2 class="margin-b-5">Reservation</h2>
                  <p class="text-muted">Total reservation</p>
                  <?php while ($item = $query2->fetch()) { ?>	
                    <span class="float-right text-primary widget-r-m"><?=$item['id'] ;?></span>
                  <?php } ?>
                </div>
                <div class="progress margin-b-10  progress-mini">
                  <div style="width:50%;" class="progress-bar bg-primary"></div>
                </div>
           
              </div>
            </div>
          </div>
          
          <div class="col-md-3">
            <div class="widget  bg-light">
              <div class="row row-table ">
                <div class="margin-b-30">
                  <h2 class="margin-b-5">Classes</h2>
                  <p class="text-muted">Total classe</p>
                  <?php while ($item = $query4->fetch()) { ?>	
                    <span class="float-right text-primary widget-r-m"><?=$item['id'] ;?></span>
                  <?php } ?>
                </div>
                <div class="progress margin-b-10 progress-mini">
                  <div style="width:45%;" class="progress-bar bg-indigo"></div>
                </div>
        
              </div>
            </div>
          </div>
          
          <div class="col-md-3">
            <div class="widget  bg-light">
              <div class="row row-table ">
                <div class="margin-b-30">
                  <h2 class="margin-b-5">Personnel</h2>
                  <p class="text-muted">Total agents</p>
                  <?php while ($item = $query1->fetch()) { ?>	
                    <span class="float-right text-primary widget-r-m"><?=$item['id'] ;?></span>
                  <?php } ?>
                </div>
                <div class="progress margin-b-10 progress-mini">
                  <div style="width:85%;" class="progress-bar bg-success"></div>
                </div>
       
              </div>
            </div>
          </div>
          
          <div class="col-md-3">
            <div class="widget  bg-light">
              <div class="row row-table ">
                <div class="margin-b-30">
                  <h2 class="margin-b-5">Vol</h2>
                  <p class="text-muted">Total vols</p>
                  <?php while ($item = $query3->fetch()) { ?>	
                    <span class="float-right text-primary widget-r-m"><?=$item['id'] ;?></span>
                  <?php } ?>
                </div>
                <div class="progress margin-b-10 progress-mini">
                  <div style="width:38%;" class="progress-bar bg-warning"></div>
                </div>
             
              </div>
            </div>
          </div>
        </div> 
      </div>
      <div class="row w-no-padding margin-b-30">          
  
          <div class="col-md-3">
            <div class="widget  bg-light">
              <div class="row row-table ">
                <div class="margin-b-30">
                  <h2 class="margin-b-5">Paiements</h2>
                  <p class="text-muted">Total paiement</p>
                  <?php while ($item = $query6->fetch()) { ?>	
                    <span class="float-right text-primary widget-r-m"><?=$item['montant'] ;?>$</span>
                  <?php } ?>
                </div>
                <div class="progress margin-b-10 progress-mini">
                  <div style="width:85%;" class="progress-bar bg-success"></div>
                </div>
              
              </div>
            </div>
          </div>
          
          <div class="col-md-3">
            <div class="widget  bg-light">
              <div class="row row-table ">
                <div class="margin-b-30">
                  <h2 class="margin-b-5">Users</h2>
                  <p class="text-muted">Total Users</p>
                  <?php while ($item = $query5->fetch()) { ?>	
                    <span class="float-right text-primary widget-r-m"><?=$item['id'] ;?></span>
                  <?php } ?>
                </div>
                <div class="progress margin-b-10 progress-mini">
                  <div style="width:38%;" class="progress-bar bg-warning"></div>
                </div>
              
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="widget  bg-light">
              <div class="row row-table ">
                <div class="margin-b-30">
                  <h2 class="margin-b-5">Billets vendus</h2>
                  <p class="text-muted">Total Billets</p>
                  <?php while ($item = $query7->fetch()) { ?>	
                    <span class="float-right text-primary widget-r-m"><?=$item['id'] ;?></span>
                  <?php } ?>
                </div>
                <div class="progress margin-b-10 progress-mini">
                  <div style="width:38%;" class="progress-bar bg-warning"></div>
                </div>
              
              </div>
            </div>
          </div>
        </div> 
      </div>
      <?php include 'partials/footer.php' ?>
        </section>
        <?php include 'partials/script.php' ?>
                  
    </body>

</html>