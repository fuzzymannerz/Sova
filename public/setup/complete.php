<?php require "inc/header.php"; ?>

<script type="text/javascript">
   	$("#loadingcontent").html("Saving admin details...");
</script>

<main>



    <div class="container">
    <div class="section">
	      <div class="row">
		      <div class="col s12 center-align">
		          <?php require "inc/dbconnect.php";

		          // Save the login credentials to the the DB
		          	try{
		              $database->insert("users", [
					    	"username" => $_POST["adminname"],
					    	"password" => password_hash($_POST["adminpass"], PASSWORD_BCRYPT),
					    	"email" => $_POST["adminemail"],
					    	"phrase" => password_hash($_POST["phrase"], PASSWORD_BCRYPT),
					    	"perm" => "admin",
					    	"ref" => "adminacc"
					    ]);
		              	}
					catch (Exception $e) {
				    	echo '<i class="large material-icons red-text">error</i><br><h4 class="center red-text">ERROR</h4><h5>' . $e->getMessage() . '</h5><p>Setup cannot continue without fixing the above error.</p><br><p class="center"><a class="center waves-effect waves-light btn-large grey" onclick="window.history.back();" style="cursor: pointer;">Go back a step</a></p>';
				    	exit;
					}

		          ?>

		          <i class="large material-icons green-text">done_all</i><br>
		          <h4 class="center green-text">SETUP COMPLETE</h4>
		          <h5 class="center">Your username is: <strong class="green-text"><?php echo $_POST["adminname"];?></strong></h5>
		          <p class="center">The login details have been saved to the database.<br>
		          You may now complete the setup and login to configure Sova.</p>
		          <p class="center red-text"><strong>Please delete the "Setup" folder from your server before using Sova.</strong></p>
		          <p class="center"><a class="center waves-effect waves-light btn-large green" href="../admin">Complete Setup</a></p>
		      </div>
	      </div>
      </div>
     </div>


</main>




<?php include "inc/footer.php";
	// Append the variable for setup complete to the end of the configuration file.
	$cfgFile = "../../php/config.php";
	$cfgAppend = fopen($cfgFile, 'a') or die("There has been an error. Please make sure that \"config.php\" is writable. and restart the setup!");
	fwrite($cfgAppend, '<?php $installed = true; $sovaVersion = "v1.0"; ?>');
	fclose($cfgAppend);
?>