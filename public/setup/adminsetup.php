<?php require "inc/header.php" ?>

<script type="text/javascript">
   	$("#loadingcontent").html("Loading...");
</script>

<main>



    <div class="container">
    <div class="section">
	      <div class="row">

			<p class="center flow-text">Admin Login Settings<br></p>

		      <div class="col s12 center-align">
		          
		        <?php require "inc/dbconnect.php"; ?>

				<p>Please enter administrator login details. This will allow you to login and manage the system and its users.</p>


				<div class="row">
				    <form class="col s12 validatedForm" method="post" action="complete.php" id="adminsetup">
				      <div class="row">
				        <div class="input-field col s6 offset-s3">
				          <input name="adminname" id="adminname" placeholder="username" class="validate" type="text" minlength="4" required>
				          <label for="adminname">Administrator Username</label>
				        </div>
				      </div>

				      <div class="row">
				        <div class="input-field col s6 offset-s3">
				          <input name="adminemail" id="adminemail" placeholder="email address" class="validate" type="email" required>
				          <label for="adminemail">E-Mail Address</label>
				        </div>
				      </div>

				      <div class="row">
				      	<div class="input-field col s3 offset-s3">
				          <input name="adminpass" id="adminpass" type="password" placeholder="password" class="validate" minlength="5" required>
				          <label for="adminpass">Administrator Password</label>
				        </div>

				        <div class="input-field col s3">
				          <input name="adminpassconfirm" id="adminpassconfirm" class="validate" placeholder="confirm password" type="password" required>
				          <label for="adminpassconfirm">Confirm Password</label>
				        </div>

				        </div>


				      <div class="row">
				        <div class="input-field col s6 offset-s3">
				        <p>This will be required if you forget your password so pick something that you will remember!<br>
				        It can contain only letters, numbers and underscores and <strong>is CASE sensitive</strong>.<br>
				        <span class="grey-text">eg. "when_I_was_little_I_had_a_car_door_slammed_on_my_hand" or "pinkYELLOW12" etc...</span></p>
				          <input name="phrase" id="phrase" class="validate" placeholder="my_house_has_42_windows" type="text" minlength="6" required>
				          <label for="phrase">Security Phrase</label>
				        </div>

				        </div>


				      </div>

						<p class="center"><button class="center waves-effect waves-light btn-large green" type="submit">Next</button></p>
					</form>
				</div>





		      </div>
	      </div>
      </div>
     </div>


</main>



<script type="text/javascript">
$( "#adminsetup" ).validate({
	rules: {
    adminpass: "required",
    adminpassconfirm: {
      equalTo: "#adminpass"
    },
    phrase: {
    	alphanumeric: true
    }
  },
  messages: {
	adminname: {
	required: "You must enter an admin username.",
	minlength: jQuery.validator.format("You must enter a username with at least {0} characters.")
	},
	adminemail: {
	required: "You must enter an e-mail address."
	},
	phrase: {
	required: "You must enter a security phrase.",
	minlength: jQuery.validator.format("You must enter a phrase with at least {0} characters."),
	alphanumeric: "Phrase can only contain letters, numbers and underscores (\"_\")."
	},
	adminpass: {
	required: "You must enter an admin password.",
	minlength: jQuery.validator.format("The admin password needs to be at least {0} characters.")
	},
	adminpassconfirm: {
	required: "You must re-enter an admin password.",
	equalTo: "The passwords do not match."
	}
	},
    submitHandler: function(form) {
    	form.submit();
    },
  	highlight: function(element, errorClass, validClass) {
    $(element).addClass(errorClass).removeClass(validClass);
    $(element.form).find("label[for=" + element.id + "]")
    .addClass(errorClass);

  	},
  	unhighlight: function(element, errorClass, validClass) {
    $(element).removeClass(errorClass).addClass(validClass);
    $(element.form).find("label[for=" + element.id + "]")
      .removeClass(errorClass);
  	},


  	
});



$('input:password').focus(
    function(){
        $(this).val('');
    });


</script>


<?php include "inc/footer.php" ?>