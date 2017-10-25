<?php require "inc/header.php" ?>

<script type="text/javascript">
   	$("#loadingcontent").html("Creating MySQL tables...");
</script>

<main>

    <div class="container">
    <div class="section">
	      <div class="row">

		      <div class="col s12 center-align">
		        <?php

		        require "inc/dbconnect.php";

				// Create the users table
				try {
					$database->query(
						"CREATE TABLE IF NOT EXISTS users(
						id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
						username VARCHAR(30) NOT NULL UNIQUE,
						password VARCHAR(255) NOT NULL,
						phrase VARCHAR(255) NOT NULL,
						ref VARCHAR(10) NOT NULL UNIQUE,
						perm VARCHAR(5) NOT NULL,
						email VARCHAR(255) NOT NULL)");
					}
		     	catch (Exception $e) {
    				echo '<i class="large material-icons red-text">error</i><br><h4 class="center red-text">ERROR</h4><h5>' . $e->getMessage() . '</h5><p>Setup cannot continue without fixing the above error.</p>';
    				exit;
				}

				// Create site settings table
				try {
					$database->query(
						"CREATE TABLE IF NOT EXISTS settings(
						id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
						sitename VARCHAR(255) NOT NULL,
						tagline VARCHAR(255),
						sitelogo VARCHAR(255),
						address VARCHAR(255),
						city VARCHAR(255),
						postcode VARCHAR(10),
						website VARCHAR(253),
						phone INT(20),
						email VARCHAR(255),
						awaymsg VARCHAR(255))");
					}
		     	catch (Exception $e) {
    				echo '<i class="large material-icons red-text">error</i><br><h4 class="center red-text">ERROR</h4><h5>' . $e->getMessage() . '</h5><p>Setup cannot continue without fixing the above error.</p><br><p class="center"><a class="center waves-effect waves-light btn-large grey" onclick="window.history.back();" style="cursor: pointer;">Go back a step</a></p>';
    				exit;
				}


				// Insert data into the settings table so it can be "updated" from the admin dashboard
		          	try{
		              $database->insert("settings", [
					    	"sitename" => "Sova Check In",
					    	"tagline" => "notset",
					    	"sitelogo" => "notset",
					    	"address" => "notset",
					    	"city" => "notset",
					    	"postcode" => "notset",
					    	"website" => (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]",
					    	"phone" => "0",
					    	"email" => "notset",
					    	"awaymsg" => "notset",
					    ]);
		              	}
					catch (Exception $e) {
				    	echo '<i class="large material-icons red-text">error</i><br><h4 class="center red-text">ERROR</h4><h5>' . $e->getMessage() . '</h5><p>Setup cannot continue without fixing the above error.</p><br><p class="center"><a class="center waves-effect waves-light btn-large grey" onclick="window.history.back();" style="cursor: pointer;">Go back a step</a></p>';
				    	exit;
					}

				?>
	
				  <i class="large material-icons green-text">done</i><br><h4 class="center green-text">TABLES CREATED!</h4>

		      </div>
	      </div>
	      <div class="row">
	      <p class="center"><a class="center waves-effect waves-light btn-large green" href="adminsetup.php">Next</a></p>
	      </div>

      </div>
     </div>


</main>


<?php include "inc/footer.php" ?>