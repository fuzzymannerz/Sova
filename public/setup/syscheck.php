<?php require "inc/header.php" ?>

<script type="text/javascript">
   	$("#loadingcontent").html("Checking system requirements...");
</script>

<main>

    <div class="container">
    <div class="section">
	      <div class="row">
	      <p class="center flow-text">System Requirements<br></p>
		      <div class="col s12 center-align">
		          <?php include "inc/sysreq.php" ?>
		      </div>
	      </div>
	      <div class="row">
	      	<p class="center"><a class="center waves-effect waves-light btn-large green" href="dbcheck.php">Next</a></p>
	      </div>
      </div>
     </div>


</main>


<?php include "inc/footer.php" ?>