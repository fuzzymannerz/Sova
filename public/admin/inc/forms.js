// Sends forms data from admin dashboard to be processed


$(document).ready(function() {

    // Validate the forms
    $('form').each( function() {

      $( this ).validate({
        rules: {
        username: "required",
        username: {
            alphanumeric: true
        },
        email: "required",
        password: "required",
        phrase: "required",
        phrase: {
            alphanumeric: true
        },
        sitename: "required",
        sitelogo: {
            required: true,
            extension: "jpg|png"
        },

        success: "valid",
      },
      messages: {
            username: {
            required: "You must enter a username.",
            minlength: jQuery.validator.format("You must enter a username with at least {0} characters."),
            alphanumeric: "Username can only contain letters, numbers and underscores (_).",
            },
            email: {
            required: "You must enter an e-mail address."
            },
            password: {
            required: "You must enter a password.",
            minlength: jQuery.validator.format("You must enter a password with at least {0} characters.")
            },
            phrase: {
            required: "You must enter a phrase.",
            minlength: jQuery.validator.format("You must enter a phrase with at least {0} characters."),
            alphanumeric: "Phrase can only contain letters, numbers and underscores (_).",
            },
            sitename: {
            required: "You must enter a site name."
            },
            sitelogo: {
            required: "You need to upload an image.",
            extension: "You can only upload PNG or JPG files."
            },
        },
        submitHandler: submitForm(this),

        highlight: function(element, errorClass, validClass) {
        $(element).addClass(errorClass).removeClass(validClass);
        $(element.form).find("label[for=" + element.id + "]")
        .addClass(errorClass);

        },
        unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass(errorClass).addClass(validClass);
        $(element.form).find("label[for=" + element.id + "]")
          .removeClass(errorClass);
        }

        });

     /* if (!this.valid()) {
        $("#results").html("Invalid Entry");
        exit;
      }*/

    });


    // Clear passwords fields on focus
    $('input:password').focus(
        function() {
            $(this).val('');
        });


    // Enable pause between things
    function sleep (time) {
        return new Promise((resolve) => setTimeout(resolve, time));
    }


    // Form processor

    function submitForm(form){


        $(form).submit(function() {

            $.ajax({
                type: 'POST',
                url: 'processchange.php',
                data: $(form).serialize(),
                success: function(data) {
                    if (data == "fail") {
                        $(form).trigger('reset');
                        Materialize.toast("An error occured. Please try again.", 3000);

                    } else if (data == "username") {
                        Materialize.toast('Username saved!', 2000);
                        Materialize.toast('Logging out...', 2000)
                        $('#changepass').modal('close');
                        // Wait for 2 seconds before log out
                        sleep(2400).then(() => {
                            window.location.replace("logout.php");
                        });
                
                    } else if (data == "email"){
                        Materialize.toast('E-mail saved!', 2000);
                        Materialize.toast('Reloading page...', 2000)
                        $('#editemail').modal('close');
                        // Wait for 2 seconds before reloading page
                        sleep(2400).then(() => {
                            location.reload();
                        });
                    }
                      else if (data == "password"){
                        eraseCookie("tempPass");
                        Materialize.toast('Password saved!', 2000);
                        Materialize.toast('Reloading page...', 2000)
                        $('#changepass').modal('close');
                        // Wait for 2 seconds before reloading page
                        sleep(2400).then(() => {
                            location.reload();
                        });

                    }
                      else if (data == "phrase"){
                        Materialize.toast('Security phrase updated!', 2000);
                        $('#changephrase').modal('close');
                    }

                    // Site Settings data
                      else if (data == "settings.updated"){
                        Materialize.toast('Settings updated successfully!', 2000);
                        Materialize.toast('Reloading page...', 2000)
                        // Wait for 2 seconds before reloading page
                        sleep(2400).then(() => {
                            location.reload();
                        });
                    }

                    // If successful, display message
                    else {
                        Materialize.toast("An unknown error has occured.", 5000);
                        console.log("Form error: " + data);
                    }

                },
                error: function(data) {
                    $("#results").html("<strong class=\"red-text\"\">A system error occured. Refresh the page and try again.</strong>");
                    $(form).trigger('reset');
                }

            });
            return false;
            });
    };

});