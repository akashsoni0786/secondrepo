<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'headerlink.php'; ?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

  <section class="p-5" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">

            <div class="card-body p-md-5">

              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                  <form class="mx-1 mx-md-4">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="firstName" name="firstName" class="form-control" />
                        <span id="fnameerror" style="color: red;font-size:0.8rem;"></span>
                        <label class="form-label" for="form3Example1c">First Name</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="lastName" name="lastName" class="form-control" />
                        <span id="lnameerror" style="color: red;font-size:0.8rem;"></span>
                        <label class="form-label" for="form3Example3c">Last Name</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="email" name="email" class="form-control" />
                        <span id="emailerror" style="color: red;font-size:0.8rem;"></span>

                        <label class="form-label" for="form3Example3c">Enter Email</label>
                      </div>
                    </div>


                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="address" name="address" class="form-control" />
                        <span id="addresserror" style="color: red;font-size:0.8rem;"></span>

                        <label class="form-label" for="form3Example3c">Enter Address</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="pinCode" name="pinCode" class="form-control" />
                        <span id="pinerror" style="color: red;font-size:0.8rem;"></span>

                        <label class="form-label" for="form3Example3c">Enter PIN Code</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" id="password" name="password" class="form-control" />
                        <span id="passworderror" style="color: red;font-size:0.8rem;"></span>

                        <label class="form-label" for="form3Example4c">Password</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="confirmPassword" name="confirmPassword" class="form-control" />
                        <span id="password2error" style="color: red;font-size:0.8rem;"></span>

                        <label class="form-label" for="form3Example4cd">Repeat your password</label>
                      </div>
                    </div>

                    <div class="form-check d-flex justify-content-center mb-5">
                      <input class="form-check-input me-2" type="checkbox" value="" id="termsandconditions" />
                      <label class="form-check-label" for="form2Example3">
                        I agree all statements in <a href="#!">Terms of service</a>
                      </label>
                    </div>
<span type="button" data-mdb-toggle="modal" data-mdb-target="#errorModal" id="invalidcredentials"></span>
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="button" id="registerButton" name="registerButton" class="btn btn-primary btn-lg">Register</button>
                    </div>

                  </form>

                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" class="img-fluid" alt="Sample image">

                </div>
                <br>
                <label class="form-check-label" for="form2Example3">
                  <a href="signin.php">Already registered ?</a>
                </label>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>

  </section>


  <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-start text-black p-4">
          <h5 class="modal-title text-danger mb-5" id="exampleModalLabel">User already exist!</h5>
          <!-- <h4 class="mb-5" style="color: #35558a;">Errors</h4> -->
          <!-- <span id="errorsforsignup"></span> -->
          <!-- <hr class="mt-2 mb-4"
                  style="height: 0; background-color: transparent; opacity: .75; border-top: 2px dashed #9e9e9e;"> -->
        </div>
        <!-- <div class="modal-footer d-flex justify-content-center border-top-0 py-4">
              </div> -->
      </div>
    </div>
  </div>


  <script>
    $(document).ready(function() {
      $("#registerButton").click(function() {
        var fname = $("#firstName").val();
        var lname = $("#lastName").val();
        var email = $("#email").val();
        var addres = $("#address").val();
        var pincode = $("#pinCode").val();
        var password = $("#password").val();
        var conpass = $("#confirmPassword").val();
        var conditions = $("#termsandconditions").is(':checked');
        var errors = [];

        if (!isNaN(fname)) {
          errors.push('Please enter real name');
          $("#fnameerror").html('This field is not a number')
        }
        if (fname == "") {
          errors.push('First name field is empty');
          $("#fnameerror").html('This field is empty')
        }
        if (!isNaN(lname)) {
          errors.push('Please enter real  surname');
          $("#lnameerror").html('This field is not a number')
        }
        if (lname == "") {
          errors.push('Last name field is empty');
          $("#lnameerror").html('This field is empty')
        }

        if (email == "") {
          errors.push('Email field is empty');
          $("#emailerror").html('This field is empty')


        }
        if (addres == '') {
          errors.push('Please enter your address');
          $("#addresserror").html('Please enter your address')

        }
        if (addres.length < 10) {
          errors.push('Please enter complete address');
          $("#addresserror").html('Please enter complete address')

        }
        if (pincode == '') {
          errors.push('Please enter your pincode');
          $("#pinerror").html('Please enter your pincode')

        }
        if (pincode.length < 6 || pincode.length > 6) {
          errors.push('Please enter valid pincode');
          $("#pinerror").html('Please enter valid pincode')

        }
        if (isNaN(pincode)) {
          errors.push('Please enter valid pincode');
          $("#pinerror").html('Please enter valid pincode')

        }
        if (password == '') {
          errors.push('Please enter your password');
          $("#passworderror").html('Please enter your password')

        }
        if (password !== conpass) {
          errors.push('Passwords are not mateching');
          $("#password2error").html('Passwords are not mateching')

        }

        if (conditions == false) {
          errors.push('Unchecked');
        }
        // if(errors.length>0)
        // {
        //   var er = '';
        //     for(let i=0;i<errors.length;i++){
        //         er += '<p class="mb-0" style="color: #35558a;">'+errors[i]+'</p>';
        //     }


        //   $("#errorsforsignup").html(re);

        // }
        if (errors.length == 0) {
          $("#firstName").val('');
          $("#lastName").val('');
          $("#email").val('');
          $("#address").val('');
          $("#pinCode").val('');
          $("#password").val('');
          $("#confirmPassword").val('');
          $("#termsandconditions").is('unhecked');
          $.ajax({
            url: 'login.php',
            type: "POST",
            data: {
              firstName: fname,
              lastName: lname,
              emails: email,
              address: addres,
              pin: pincode,
              passwrd: password,
            },
            success: function(result) {
              if (result == 1) 
              {
                window.location = 'signin.php';
              } 
              else 
              {
                // er = '<p class="mb-0" style="color: #35558a;">' + result + '</p>';
                // $("#errorsforsignup").html("User already exist");
                $('#invalidcredentials').click();

              }


            }
          });
        }


      });


      $("#firstName").keyup(function() {
        $("#fnameerror").html('')
      });
      $("#lastName").keyup(function() {
        $("#lnameerror").html('')
      });
      $("#email").keyup(function() {
        $("#emailerror").html('')
      });
      $("#address").keyup(function() {
        $("#addresserror").html('')
      });
      $("#pinCode").keyup(function() {
        $("#pinerror").html('')
      });
      $("#password").keyup(function() {
        $("#passworderror").html('')
      });
      $("#confirmPassword").keyup(function() {
        $("#password2error").html('')
      });


    });
  </script>
</body>

</html>