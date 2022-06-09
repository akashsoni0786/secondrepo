<!DOCTYPE html>
<html lang="en">
<head>
<?php  include 'headerlink.php';?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign In</p>

                <form class="mx-1 mx-md-4">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="emailLogin" class="form-control" />
                      <span id="emailerror" style="color: red;font-size:0.8rem;"></span>
                      <label class="form-label"  for="form3Example3c">Your Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="passwordLogin" class="form-control" />
                      <label class="form-label" for="form3Example4c">Password</label>
                      <span id="passworderror" style="color: red;font-size:0.8rem;"></span>

                    </div>
                  </div>

                  

                  <!-- <div class="form-check d-flex justify-content-center">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                    <label class="form-check-label" for="form2Example3">
                    Remember Password
                    </label>
                  </div> -->

                  <div class="form-check d-flex justify-content-center mb-5">
                    <label class="form-check-label" for="form2Example3">
                    <a href="signup.php">Not yet registered ?</a>
                    </label>
                  </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button data-mdb-toggle="modal" data-mdb-target="#errorModal" 
                     type="button" id="loginButton" class="btn btn-primary btn-lg">Login</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
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
          <h5 class="modal-title text-danger mb-5" id="errorsforsignin">Error occur!</h5>
          </div>
        </div>
    </div>
  </div>
<script>
  $(document).ready(function()
  {
    
    $('#loginButton').click(function()
    {
      var emaill= $('#emailLogin').val();
      var password= $('#passwordLogin').val();
      var error = [];
      if(emaill == "")
      {
        error.push('Email field is empty');
        $("#emailerror").html('Email field is empty')

      }
      if(password  == "")
      {
        error.push('Password field is empty');
        $("#passworderror").html('Password field is empty')

      }
      if(error.length>0)
      {
        $("#errorsforsignin").html('Invalid credentials');
      }
      else{
        $.ajax({
          url : 'login.php',
          type : "POST",
          data :{
            mail :emaill,
            pass :password
          },
          success : function(result){
            if(result == 1)
            {
              window.location = 'profile.php';
            }
            else
            {
              $("#errorsforsignin").html('Invalid credentials');
            }
          }
        });
      }

    });

    $("#emailLogin").keyup(function() {
        $("#emailerror").html('')
      });
    $("#passwordLogin").keyup(function() {
        $("#passworderror").html('')
      });
  });
</script>
</body>
</html>