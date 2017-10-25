<?php require '../../php/dbconnect.php'; require "inc/dashheader.php";?>
<main>



  <!-- Temporary Password Message -->
  <div id="temporarypass" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">lock_open</i> TEMPORARY PASSWORD</h4>
      <p class="flow-text">The system has detected that you logged in with a temporary password.<br>
      Be sure to change it in the admin account settings before you logout.</p>
    </div>
    <div class="modal-footer">
      <a href="#adminsettings" class="modal-action modal-close waves-effect waves-green btn-flat">OK</a>
    </div>
  </div>




<!-- Tab Navigation Section -->
<div class="container">

  <div class="row">
    <div class="col s12">
      <ul class="tabs z-depth-2">
        <li class="tab col s3 offset-s1"><a href="#users"><i class="material-icons">person</i> User Management</a></li>
        <li class="tab col s3"><a href="#sovasettings"><i class="material-icons">settings</i> Sova Settings</a></li>
        <li class="tab col s3"><a href="#adminsettings" class="active"><i class="material-icons">verified_user</i> Admin Account Settings</a></li>
      </ul>
    </div>

</div>



<!-- User Section -->
<div id="users" class="col s12 hide">

<div class="container">
  <div class="section">
      <div class="row">
      <h3 class="center">User Management</h3>
      </div>
  </div>
</div>

</div>









<!-- Sova Settings Section -->
<div id="sovasettings" class="col s12 hide">

<div class="container">
  <div class="section">
      <div class="row">
      <h3 class="center">Sova Settings</h3>
      </div>

        <div class="row">
        <p class="center">Site Name is the only required setting. All others are optional.<br>
        If you wish to clear a setting, simply set it to "notset" and then save it.</p>
        <table class="dashlisting" >
        <tbody>
          <tr>
            <td class="right"><strong>Site Name:</strong></td>
            <td><?php dbSiteGet("sitename"); ?></td>
            <td><a class="waves-effect waves-light btn green" href="#editsitename">Edit Site Name</a></td>
          </tr>
          <tr>
            <td class="right"><strong>Tagline:</strong></td>
            <td><?php dbSiteGet("tagline"); ?></td>
            <td><a class="waves-effect waves-light btn green" href="#edittagline">Edit Tagline</a></td>
          </tr>
            <tr>
            <td class="right"><strong>Logo:</strong></td>
            <td><?php dbSiteGet("sitelogo"); ?></td>
            <td><a class="waves-effect waves-light btn green" href="#editlogo">Edit Logo</a></td>
          </tr>
          <tr>
            <td class="right"><strong>Website:</strong></td>
            <td><?php dbSiteGet("website"); ?></td>
            <td><a class="waves-effect waves-light btn green" href="#editwebsite">Edit Website</a></td>
          </tr>
          <tr>
            <td class="right"><strong>Away Message:</strong></td>
            <td><?php dbSiteGet("awaymsg"); ?></td>
            <td><a class="waves-effect waves-light btn green" href="#editaway">Edit Away Message</a></td>
          </tr>
          <tr>
            <td class="right"><strong>E-mail Address:</strong></td>
            <td><?php dbSiteGet("email"); ?></td>
            <td><a class="waves-effect waves-light btn green" href="#editsiteemail">Edit E-mail</a></td>
          </tr>
          <tr>
            <td class="right"><strong>Phone Number:</strong></td>
            <td><?php dbSiteGet("phone"); ?></td>
            <td><a class="waves-effect waves-light btn green" href="#editsitephone">Edit Phone Number</a></td>
          </tr>
          <tr>
            <td class="right"><strong>Address:</strong></td>
            <td><?php dbSiteGet("address"); ?></td>
            <td><a class="waves-effect waves-light btn green" href="#changeaddress">Edit Address</a></td>
          </tr>
          <tr>
            <td class="right"><strong>City:</strong></td>
            <td><?php dbSiteGet("city"); ?></td>
            <td><a class="waves-effect waves-light btn green" href="#changecity">Change City</a></td>
          </tr> 
          <tr>
            <td class="right"><strong>Postcode:</strong></td>
            <td><?php dbSiteGet("postcode"); ?></td>
            <td><a class="waves-effect waves-light btn green" href="#changepostcode">Change Postcode</a></td>
          </tr>           
        </tbody>
      </table>
        </div>


  </div>
</div>

</div>




<!-- Site Name edit modal -->
  <div id="editsitename" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">assignment_ind</i> Edit Site Name</h4>
      <p>Edit your site name below.</p>
      <p>This is displayed to visitors in the header, page title and footer, among other places and is usually your business name. <span class="grey-text">eg. "Sova Hotel"</span></p>

    <form class="col s12 validatedForm" id="sitename" name="sitename" method="post" action="processchange.php">
      <div class="row">
        <div class="input-field col s6 offset-s3">
          <input name="sitename" type="text" value="<?php dbSiteGet('sitename'); ?>" class="validate" required>
          <label for="sitename">Site Name</label>
          <input name="isSetting" id="isSetting" value="true" type="hidden">
        </div>
      </div>


    <p class="center">
    <button class="modal-action waves-effect waves-green btn-flat" type="submit">UPDATE SITE NAME</button>
    <a class="modal-close modal-action waves-effect waves-green btn-flat">CANCEL</a>
    </p>
  </form>
    </div>
  </div>




  <!-- Tagline edit modal -->
  <div id="edittagline" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">assignment_ind</i> Edit Tagline</h4>
      <p>Edit your site name below.</p>
      <p>This is displayed to visitors in the header, page title and footer, among other places. <span class="grey-text">eg. "The best around in the city!"</span></p>

    <form class="col s12 validatedForm" id="tagline" name="tagline" method="post" action="processchange.php">
      <div class="row">
        <div class="input-field col s6 offset-s3">
          <input name="tagline" type="text" placeholder="The best prices in the city!" class="validate" required>
          <label for="tagline">Tagline</label>
          <input name="isSetting" id="isSetting" value="true" type="hidden">
        </div>
      </div>


    <p class="center">
    <button class="modal-action waves-effect waves-green btn-flat" type="submit">UPDATE TAGLINE</button>
    <a class="modal-close modal-action waves-effect waves-green btn-flat">CANCEL</a>
    </p>
  </form>
    </div>
  </div>



    <!-- Logo edit modal -->
  <div id="editlogo" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">assignment_ind</i> Edit Logo</h4>
      <p>Edit your site logo.</p>
      <p>This is displayed to visitors in the site header. Only PNG or JPG images are accepted.</p>

    <form enctype="multipart/form-data" class="col s12 validatedForm" id="sitelogo" name="sitelogo" method="post" action="processchange.php">
      <div class="row">
        <div class="input-field col s6 offset-s3">
          <input name="sitelogo" type="file" class="validate" required>
          <input name="isLogo" id="isLogo" value="true" type="hidden">
        </div>
      </div>


    <p class="center">
    <button class="modal-action waves-effect waves-green btn-flat" type="submit">UPDATE SITE LOGO</button>
    <a class="modal-close modal-action waves-effect waves-green btn-flat">CANCEL</a>
    </p>
  </form>
    </div>
  </div>




  <!-- Website edit modal -->
  <div id="editwebsite" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">assignment_ind</i> Edit Website</h4>
      <p>Edit your website below.</p>
      <p>This is displayed to visitors in the footer among other places.</p>

    <form class="col s12 validatedForm" id="website" name="website" method="post" action="processchange.php">
      <div class="row">
        <div class="input-field col s6 offset-s3">
          <input name="website" type="text" value="<?php dbSiteGet("website"); ?>" class="validate" required>
          <label for="website">Website</label>
          <input name="isSetting" id="isSetting" value="true" type="hidden">
        </div>
      </div>


    <p class="center">
    <button class="modal-action waves-effect waves-green btn-flat" type="submit">UPDATE WEBSITE</button>
    <a class="modal-close modal-action waves-effect waves-green btn-flat">CANCEL</a>
    </p>
  </form>
    </div>
  </div>




  <!-- Away msg edit modal -->
  <div id="editaway" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">assignment_ind</i> Edit Away Message</h4>
      <p>Edit your website below.</p>
      <p>This is displayed to visitors in the footer among other places.</p>

    <form class="col s12 validatedForm" id="awaymsg" name="awaymsg" method="post" action="processchange.php">
      <div class="row">
        <div class="input-field col s6 offset-s3">
          <textarea name="awaymsg" form="awaymsg" class="validate" required>Enter text here...</textarea>
          <label for="awaymsg">Away Message</label>
          <input name="isSetting" id="isSetting" value="true" type="hidden">
        </div>
      </div>


    <p class="center">
    <button class="modal-action waves-effect waves-green btn-flat" type="submit">UPDATE AWAY MESSAGE</button>
    <a class="modal-close modal-action waves-effect waves-green btn-flat">CANCEL</a>
    </p>
  </form>
    </div>
  </div>













<!-- Admin Settings Section -->
<?php ob_start(); getID($user); ob_end_clean(); ?>

<div id="adminsettings" class="col s12 hide">
	<div class="container">
		<div class="section">
			<div class="row">
				<h3 class="center">Admin Account Settings</h3>
			</div>
		<div class="row">





      <table class="dashlisting" >
        <tbody>
          <tr>
            <td class="right"><strong>Username:</strong></td>
            <td><?php echo $user; ?></td>
            <td><a class="waves-effect waves-light btn green" href="#editusername">Edit Username</a></td>
          </tr>
          <tr>
            <td class="right"><strong>Email:</strong></td>
            <td><?php dbGet("users", "email", $user); ?></td>
            <td><a class="waves-effect waves-light btn green" href="#editemail">Edit E-mail</a></td>
          </tr>
          <tr>
            <td class="right"><strong>Password:</strong></td>
            <td id="passinfo" class="grey-text">[hidden]</td>
            <td><a class="waves-effect waves-light btn green" href="#changepass">Change Password</a></td>
          </tr>
          <tr>
            <td class="right"><strong>Security Phrase:</strong></td>
            <td class="grey-text">[hidden]</td>
            <td><a class="waves-effect waves-light btn green" href="#changephrase">Change Security Phrase</a></td>
          </tr>          
        </tbody>
      </table>


		</div>

		</div>
	</div>
</div>





<!-- Username edit modal -->
  <div id="editusername" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">assignment_ind</i> Edit Username</h4>
      <p>Edit your username below. When saved <strong>you will be logged out</strong>, you can then log in again with your new name.</p>
      <p>Usernames can only contain letters, numbers and underscores (_) and need to be a minimum length of 5 characters.</p>

    <form class="col s12 validatedForm" id="adminusername" name="adminusername" method="post" action="processchange.php">
      <div class="row">
        <div class="input-field col s6 offset-s3">
          <input name="username" id="username" type="text" placeholder="new username" value="<?php echo $user; ?>" required minlength="5" class="validate">
          <label for="username">Username</label>
          <input name="userID" id="userID" value="<?php getID($user); ?>" type="hidden">
          <input name="isAdmin" id="isAdmin" value="true" type="hidden">
        </div>
      </div>


    <p class="center">
    <button class="modal-action waves-effect waves-green btn-flat" type="submit">UPDATE USERNAME</button>
    <a class="modal-close modal-action waves-effect waves-green btn-flat">CANCEL</a>
    </p>
  </form>
    </div>
  </div>




  <!-- E-mail edit modal -->
  <div id="editemail" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">mail</i> Edit E-mail Address</h4>
      <p>Edit your saved E-mail address below.</p>

    <form class="col s12 validatedForm" id="adminemail" name="adminemail" method="post" action="processchange.php">
      <div class="row">
        <div class="input-field col s6 offset-s3">
          <input name="email" id="email" type="email" placeholder="e-mail address" value="<?php dbGet("users", "email", $user); ?>" required class="validate">
          <label for="email">E-mail Address</label>
          <input name="userID" id="userID" value="<?php getID($user); ?>" type="hidden">
          <input name="isAdmin" id="isAdmin" value="true" type="hidden">
        </div>
      </div>


    <p class="center">
    <button class="modal-action waves-effect waves-green btn-flat" type="submit">UPDATE E-MAIL</button>
    <a class="modal-close modal-action waves-effect waves-green btn-flat">CANCEL</a>
    </p>
  </form>
    </div>
  </div>




  <!-- Password change modal -->
  <div id="changepass" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">lock</i> Change Password</h4>
      <p>Use the form below to change your pasword.</p>

    <form class="col s12 validatedForm" id="adminpass" name="adminpass" method="post" action="processchange.php">
      <div class="row">
        <div class="input-field col s6 offset-s3">
          <input name="password" id="password" type="password" placeholder="password" required minlength="5" class="validate">
          <label for="password">Password</label>
          <input name="userID" id="userID" value="<?php getID($user); ?>" type="hidden">
          <input name="isAdmin" id="isAdmin" value="true" type="hidden">
        </div>
      </div>


    <p class="center">
    <button class="modal-action waves-effect waves-green btn-flat" type="submit">CHANGE PASSWORD</button>
    <a class="modal-close modal-action waves-effect waves-green btn-flat">CANCEL</a>
    </p>
  </form>
    </div>
  </div>




    <!-- Security phrase change modal -->
  <div id="changephrase" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">lock_open</i> Change Security Phrase</h4>
      <p>Use the form below to change your security phrase.</p>
      <p>The phrase can only contain letters, numbers and underscores (_) and need to be a minimum length of 5 characters.</p>

    <form class="col s12 validatedForm" id="adminphrase" name="adminphrase" method="post" action="processchange.php">
      <div class="row">
        <div class="input-field col s6 offset-s3">
          <input name="phrase" id="phrase" type="text" placeholder="security phrase" required minlength="5" class="validate">
          <label for="phrase">Security Phrase</label>
          <input name="userID" id="userID" value="<?php getID($user); ?>" type="hidden">
          <input name="isAdmin" id="isAdmin" value="true" type="hidden">
        </div>
      </div>


    <p class="center">
    <button class="modal-action waves-effect waves-green btn-flat" type="submit">CHANGE SECURITY PHRASE</button>
    <a class="modal-close modal-action waves-effect waves-green btn-flat">CANCEL</a>
    </p>
  </form>
    </div>
  </div>


</main>




<script type="text/javascript">
	$( document ).ready(function() {
     // Initialise mobile side nav
    $(".button-collapse").sideNav();

     // Initialise all the modals
      // Site Settings
      $('#editsitename').modal();
      $('#edittagline').modal();
      $('#editlogo').modal();
      $('#editwebsite').modal();
      $('#editaway').modal();

      // Admin user settings
      $('#editusername').modal();
      $('#changepass').modal();
      $('#editemail').modal();
      $('#changephrase').modal();
    
    // Unhide sections -  (flash of content on page load fix)
    $("#adminsettings").removeClass("hide");
    $("#users").removeClass("hide");
    $("#sovasettings").removeClass("hide");
	});

	// Check for temporary password cookie
    var tempCookie = readCookie('tempPass');

    if (tempCookie) {
    	$('#temporarypass').modal('open');
      $("#passinfo").html("<span class=\"red-text\">[Temporary - Please change]</span>");
    }


</script>
<script type="text/javascript" src="inc/forms.js"></script>

<?php include "inc/adminfooter.php"; ?>