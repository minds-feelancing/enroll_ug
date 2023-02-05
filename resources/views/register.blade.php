
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="form-container" style="width: 500px; height: 360px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #F5F5F5; padding: 20px;">

      <form id="wizard-form" action="{{ url('/step2/store') }}" method="post">
        <div id="step-1">

           @csrf
          <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name" required>
            <span class="invalid"></span>
          </div>
          <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name" required>
          </div>
          <div class="form-group">
            <label for="phoneNumber">Phone Number</label>
            <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Enter Phone Number" required>
          </div>

          <button type="button" id="next-step-1" class="btn btn-primary">Next</button>
        </div>

        
        <div id="step-2" style="display:none;">

          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
          </div>
          <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
            <span id="error-message" style="color: red;"></span>
          </div>
          <div class="form-group d-flex justify-content-between">
            <button type="button" id="previous-step-2" class="btn btn-primary">Previous</button>
            <button type="submit" class="btn btn-primary submit_user">Submit</button>
          </div>
        </div>
      </form>

      <script>
        const form = document.getElementById("wizard-form");
        const step1 = document.getElementById("step-1");
        const step2 = document.getElementById("step-2");

        document.getElementById("next-step-1").addEventListener("click", function() {
          step1.style.display = "none";
          step2.style.display = "block";
        });

        document.getElementById("previous-step-2").addEventListener("click", function() {
          step2.style.display = "none";
          step1.style.display = "block";
        });
      </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {


    $("#lastname").prop("disabled", true);
    $("#phonenumber").prop("disabled", true);
    $("#next-step-1").prop("disabled", true);
    $("#password").prop("disabled", true);
    $("#confirmPassword").prop("disabled", true);
    $(".submit_user").prop("disabled", true);


    $("#firstname").focusout(function() {
      if (!$("#firstname").val()) {
        $("#firstname").addClass('is-invalid');
        $("#firstname").removeClass('is-valid');
        $("#lastname").prop("disabled", true);
      } else {
        $("#firstname").removeClass('is-invalid');
        $("#firstname").addClass('is-valid');
        $("#lastname").prop("disabled", false);
      }
    });

    $("#lastname").focusout(function() {
      if (!$("#lastname").val()) {
        $("#lastname").addClass('is-invalid');
        $("#lastname").removeClass('is-valid');
        $("#phonenumber").prop("disabled", true);
      } else {
        $("#lastname").removeClass('is-invalid');
        $("#lastname").addClass('is-valid');
        $("#phonenumber").prop("disabled", false);
      }
    });

    $("#phonenumber").focusout(function() {
      if (!$("#phonenumber").val()) {
        $("#phonenumber").addClass('is-invalid');
        $("#phonenumber").removeClass('is-valid');
        $("#next-step-1").prop("disabled", true);
      } else {
        $("#phonenumber").removeClass('is-invalid');
        $("#phonenumber").addClass('is-valid');
        $("#next-step-1").prop("disabled", false);
      }
    });

    $("#email").focusout(function() {
      if (!$("#email").val()) {
        $("#email").addClass('is-invalid');
        $("#email").removeClass('is-valid');
        $("#password").prop("disabled", true);
      } else {
        $("#email").removeClass('is-invalid');
        $("#email").addClass('is-valid');
        $("#password").prop("disabled", false);
      }
    });

    $("#password").focusout(function() {
      if (!$("#password").val()) {
        $("#password").addClass('is-invalid');
        $("#password").removeClass('is-valid');
        $("#confirmPassword").prop("disabled", true);
      } else {
        $("#password").removeClass('is-invalid');
        $("#password").addClass('is-valid');
        $("#confirmPassword").prop("disabled", false);
      }
    });

    $("#confirmPassword").focusout(function() {
      if (!$("#confirmPassword").val()) {
        $("#confirmPassword").addClass('is-invalid');
        $("#confirmPassword").removeClass('is-valid');
        $(".submit_user").prop("disabled", true);
      } else {
        $.ajax({
          type: "POST",
          url: "/confirm_password",
          data: { 
                  password: $("#password").val(), 
                  confirmPassword: $("#confirmPassword").val(),
                  '_token': $('input[name=_token]').val()
          },
          success: function(response) {
            if (response == "success") {
              $("#confirmPassword").removeClass('is-invalid');
              $("#confirmPassword").addClass('is-valid');
              $(".submit_user").prop("disabled", false);
              $("#error-message").addClass("d-none");

            } else {
              $("#confirmPassword").addClass('is-invalid');
              $("#confirmPassword").removeClass('is-valid');
              $(".submit_user").prop("disabled", true);
              $("#error-message").text("The password confirmation does not match.");
            }
          }
        });
      }
    });

  });
</script>

    </div>
  </body>
</html>