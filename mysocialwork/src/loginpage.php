<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <style>
    .gradient-custom-2 {
      /* fallback for old browsers */
      background: #fccb90;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    }

    @media (min-width: 768px) {
      .gradient-form {
        height: 100vh !important;
      }
    }

    @media (min-width: 769px) {
      .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;
      }
    }
  </style>
  <title>Login</title>
</head>

<body>
  <section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-6" id="signinDiv">
                <div class="card-body p-md-5 mx-md-4">

                  <div class="text-center">
                    <img src="img/instagram.png" style="width: 80px;" alt="logo">
                    <h4 class="mt-1 mb-5 pb-1">Instagram</h4>
                  </div>

                  <form id="signinid">
                    <p>Please login to your account</p>

                    <div class="form-outline mb-4">
                      <input class="form-control" id="usernamesignin" name="usernamesignin" type="text" placeholder="Username">


                      <label class="form-label" for="form2Example11">Username</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input class="form-control" id="passwordsignin" name="passwordsignin" type="password" placeholder="Password">

                      <label class="form-label" for="form2Example22">Password</label>
                    </div>

                    <div class="text-center pt-1 mb-5 pb-1">
                      <button id="signinbtn" type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">Log
                        in</button>
                    </div>



                  </form>
                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <button id="pagetosignup" type="button" class="btn btn-outline-danger">Create new</button>
                  </div>

                </div>
              </div>


              <div hidden class="col-lg-6" id="signupDiv">
                <div class="card-body p-md-5 mx-md-4">

                  <div class="text-center">
                    <img src="img/instagram.png" style="width: 80px;" alt="logo">
                    <h4 class="mt-1 mb-5 pb-1">Instagram</h4>
                  </div>

                  <form action="loginserver.php" id="signupform" method="POST">
                    <p>Signup </p>

                    <div class="form-outline mb-4">
                      <input class="form-control" id="fullname" name="fullname" type="text" placeholder="Username">

                      <label class="form-label" for="form2Example11">Full Name</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input class="form-control" id="username" name="username" type="text" placeholder="Full name">

                      <label class="form-label" for="form2Example11">Username</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input class="form-control" id="email" name="email" type="email" placeholder="Email">

                      <label class="form-label" for="form2Example11">Email</label>
                    </div>


                    <div class="form-outline mb-4">
                      <input class="form-control" id="mobilenumber" name="mobilenumber" type="text" placeholder="Mobile">

                      <label class="form-label" for="form2Example11">Mobile No.</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input class="form-control" id="city" name="city" type="text" placeholder="City">

                      <label class="form-label" for="form2Example11">City</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input class="form-control" id="pincode" name="pincode" type="text" placeholder="PIN Code">

                      <label class="form-label" for="form2Example11">PIN Code</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input class="form-control" id="password" name="passwords" type="password" placeholder="Password">
                      <label class="form-label" for="form2Example22">Password</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input class="form-control" id="confirmpassword" name="confirmpassword" type="text" placeholder="Confirm password">
                      <label class="form-label" for="form2Example22">Confirm Password</label>
                    </div>

                    <div class="text-center pt-1 mb-5 pb-1">
                      <button id="signupbtn" type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">Signup</button>
                      <a id="gotologinpage" class="text-muted" href="">Already have account</a>
                    </div>



                  </form>

                </div>
              </div>

              <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                  <h4 class="mb-4">We are more than just a company</h4>
                  <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    $(document).ready(function() {
      $("#pagetosignup").click(function() {

        $("#signupDiv").attr('hidden', false);
        $("#signinDiv").attr('hidden', true);

      });
      $("#gotologinpage").click(function() {

        $("#signupDiv").attr('hidden', true);
        $("#signinDiv").attr('hidden', falseF);

      });
      // for signup
      $("#signupform").on('submit', function(e) {
        e.preventDefault();
        var name = $('#fullname').val();
        var username = $('#username').val();
        var email = $('#email').val();
        var mobnumber = $('#mobilenumber').val();
        var city = $('#city').val();
        var pincode = $('#pincode').val();
        var pwd = $('#password').val();
        var conpwd = $('#confirmpassword').val();
        var formdata = JSON.stringify($(this).serialize());
        console.log(formdata);
        $.ajax({
          url: "loginserver.php",
          type: "POST",
          data: {
            formdata
          },
          success: function(result) {
            console.log(result);
            window.location = "loginpage.php"
          }
        });

      });
      // for  signin
      $("#signinid").on('submit', function(e) {
        e.preventDefault();
        var username = $('#usernamesignin').val();
        var pwd = $('#passwordsignin').val();

        if (username == '' || pwd == '') {
          alert("Error");
        } else {
          var signindata = JSON.stringify($(this).serialize());
          $.ajax({
            url: "loginserver.php",
            type: "POST",
            data: {
              signindata
            },
            success: function(result) {
              console.log(result);
              if (result == "Done") {
                window.location = "home.php";
              }
              if (result == "Not exist") {
                window.location = "loginpage.php";
              }
            }
          });
        }


      });

    });
  </script>
</body>

</html>