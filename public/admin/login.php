<?php require "inc/adminheader.php" ?>

<main>
  <!-- Main Content -->
  <div class="container">
    <p class="flow-text center">Administrator Login</p>
  </div>

  <div class="row">
    <form class="col s12 validatedForm" method="post" action="formlogin.php" id="login">
      <div class="row">
        <div class="input-field col s6 offset-s3">
          <input name="username" id="username" placeholder="username" type="text" required>
          <label for="username">Username</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s6 offset-s3">
          <input name="password" id="password" type="password" placeholder="password" required>
          <label for="password">Password</label>
        </div>
      </div>
    </div>
    <p class="center"><button class="center waves-effect waves-light btn-large green" id="submitbtn" type="submit">Login</button></p>
    <p class="center"><a href="passwordreset.php" class="grey-text">I forgot my password</a></p>
  </form>

  <div id="loginResults" class="center red-text"></div>

</div>


<!-- Javascript Files -->
<?php require_once "../../php/js.php" ?>


<!-- Form Validation -->
<script type="text/javascript">
  $( "#login" ).validate({
    messages: {
      username: {
        required: "You must enter a username."
      },
      password: {
        required: "You must enter a password."
      }
    },
    submitHandler: submitForm,
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

  function submitForm(){
    var username = $( "#username" ).val();

    $.ajax({
      type : 'POST',
      url  : 'formlogin.php',
      data : $('form').serialize(),
      success : function(data)
      {
        if(data == "fail"){
          $("#loginResults").html("<strong>Invalid username or password.</strong>");
          $("form").trigger('reset');
        }
            // If successful login, redirect user to dashboard page
            if (data == username) {
              window.location.replace("dashboard.php");
            }
          }
        });
    return false;
  }

</script>


</main>

<!-- Load page footer -->
<?php include "inc/adminfooter.php"; ?>