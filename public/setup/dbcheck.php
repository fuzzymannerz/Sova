<?php require "inc/header.php" ?>

<script type="text/javascript">
   	$("#loadingcontent").html("Checking MySQL connection...");
</script>

<?php use Medoo\Medoo; ?>
<main>



    <div class="container">
    <div class="section">
	      <div class="row">
	      	<p class="center flow-text">MySQL Database Connection<br></p>
		      <div class="col s12 center-align">
		        <?php

		         try {
			         $database = new Medoo([
					'database_type' => 'mysql',
					'database_name' => dbName,
					'server' => dbHost,
					'username' => dbUser,
					'password' => dbPass,
					'port' => dbPort,
					'option' => [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
					]);
		     	}
		     	catch (Exception $e) {
    				echo '<i class="large material-icons red-text">error</i><br><h4 class="center red-text">ERROR</h4><h5>' . $e->getMessage() . '</h5><p>Setup cannot continue without fixing the above error.<br>Please make sure your database settings are correct and that your user has the correct permissions.</p>';
    				exit;
				}

				?>
				
				  <i class="large material-icons green-text">done</i><br><h4 class="center green-text">SUCCESS!</h4>
		      </div>
	      </div>

	      <div class="row">
	      <p class="center"><a class="center waves-effect waves-light btn-large green" href="createdb.php">Next</a></p>
	      </div>

      </div>
     </div>


</main>


<?php include "inc/footer.php" ?>