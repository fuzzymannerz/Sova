<?php require "inc/adminheader.php" ?>

<main>
  <!-- Main Content -->
  <div class="container">
    <p class="flow-text center" id="pagetitle">Password Reset</p>
    <p class="center" id="pageinfo">Fill in your username, e-mail address and security phrase and you will be given a temporary login password.</p>
  </div>

  <div class="row">
    <form class="col s12 validatedForm" method="post" action="resetprocess.php" id="resetpassword">
      <div class="row">
        <div class="input-field col s6 offset-s3">
          <input name="username" id="username" type="text" placeholder="username" required>
          <label for="username">Username</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s6 offset-s3">
          <input name="email" id="email" type="email" placeholder="password" required>
          <label for="email">Account E-Mail Address</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s6 offset-s3">
          <input name="phrase" id="phrase" type="text" placeholder="securty phrase" required>
          <label for="phrase">Security Phrase</label>
        </div>
      </div>



    </div>
    <p class="center"><button class="center waves-effect waves-light btn-large green" id="submitbtn" type="submit">Reset Password</button></p>
  </form>

  <div id="results" class="center"></div>

</div>





<!-- Form Validation -->
<script type="text/javascript">
  $( "#resetpassword" ).validate({
    rules: {
      phrase: {
        alphanumeric: true
      } 
    },
    messages: {
      username: {
        required: "You must enter your username."
      },
      email: {
        required: "You must enter an e-mail address."
      },
      phrase: {
        required: "You must enter your security phrase."
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

    $.ajax({
      type : 'POST',
      url  : 'resetprocess.php',
      data : $('form').serialize(),
      success : function(data){
        if(data == "fail"){
          $("#results").html("<strong class=\"red-text\"\">Invalid account information.</strong>");
          $("form").trigger('reset');
        }
        // If successful, display message and button to go back to login page
        else{
          $("form").fadeOut();
          $("#results").fadeOut();
          $("#submitbtn").fadeOut();
          $("#pageinfo").fadeOut();
          $("#pagetitle").fadeOut();
          $("#results").html("<br><span class=\"flow-text\"\">Your temporary login password is:<br><br><strong class=\"green-text\">" + data + "</strong><br><br>Use it to login and then change it to something else.</span><br><br><p class=\"center\"><a class=\"center waves-effect waves-light btn-large green\" href=\"login.php\">Back to login page</a></p>");
          $("#results").fadeIn();

          createCookie("tempPass","temp",365);
        }
      },
      error : function(data){
        $("#results").html("<strong class=\"red-text\"\">A system error occured. Refresh the page and try again.</strong>");
        $("form").trigger('reset');
      }
    });
    return false;
  }

</script>


</main>

<!-- Load page footer -->
<?php include "inc/adminfooter.php"; ?>