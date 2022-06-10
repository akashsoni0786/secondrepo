
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">	<title>Login</title>
</head>
<body>
<div id="container" class="container">
		<!-- FORM SECTION -->
		<div class="row">
			<!-- SIGN UP -->
			<div class="col align-items-center flex-col sign-up">

				<div class="form-wrapper align-items-center">
					<div class="form sign-up">
                        
                        <form action="loginserver.php" id="signupform" method="POST">
                        <div class="input-group">
							<i class='bx bxs-user'></i>
							<input id="fullname" name="fullname" type="text" placeholder="Username">
						</div>

                        <div class="input-group">
							<i class='bx bxs-user'></i>
							<input id="username" name="username" type="text" placeholder="Full name">
						</div>

                        <div class="input-group">
							<i class='bx bx-mail-send'></i>
							<input id="email" name="email" type="email" placeholder="Email">
						</div>

                        <div class="input-group">
							<i class='bx bxs-user'></i>
							<input id="mobilenumber" name="mobilenumber" type="text" placeholder="Mobile">
						</div>

                        <div class="input-group">
							<i class='bx bxs-user'></i>
							<input id="city" name="city" type="text" placeholder="City">
						</div>

						<div class="input-group">
							<i class='bx bxs-user'></i>
							<input id="pincode" name="pincode" type="text" placeholder="PIN Code">
						</div>
						
						<div class="input-group">
							<i class='bx bxs-lock-alt'></i>
							<input id="password" name="password" type="password" placeholder="Password">
						</div>

						<div class="input-group">
							<i class='bx bxs-lock-alt'></i>
							<input id="confirmpassword" name="confirmpassword" type="password" placeholder="Confirm password">
						</div>

						<button id="signupbtn" type="submit">
							Sign up
						</button>
						<p>
							<span>
								Already have an account?
							</span>
							<b onclick="toggle()" class="pointer">
								Sign in here
							</b>
						</p>

                        </form>
					</div>
				</div>
			
			</div>
			<!-- END SIGN UP -->
			<!-- SIGN IN -->
			<div class="col align-items-center flex-col sign-in">
				<div class="form-wrapper align-items-center">
					<div class="form sign-in">
                        <form id="signinid" action="#!">
						<div class="input-group">
							<i class='bx bxs-user'></i>
							<input id="usernamesignin" name="usernamesignin" type="text" placeholder="Username">
						</div>
						<div class="input-group">
							<i class='bx bxs-lock-alt'></i>
							<input id="passwordsignin" name="passwordsignin" type="password" placeholder="Password">
						</div>
						<button id="signinbtn" type="submit">
							Sign in
						</button>
						<p>
							<b>
								Forgot password?
							</b>
						</p>
						<p>
							<span>
								Don't have an account?
							</span>
							<b onclick="toggle()" class="pointer">
								Sign up here
							</b>
						</p>
                        </form></div>
				</div>
				<div class="form-wrapper">
		
				</div>
			</div>
			<!-- END SIGN IN -->
		</div>home
	</div>

<script src="script.js"></script>
<script>
    $(document).ready(function(){
        // for signup
        $("#signupform").on('submit',function(e){
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
            $.ajax({
                url : "loginserver.php",
                type : "POST",
                data : {formdata},
                success: function(result){
                    console.log(result);
                    window.location = "index.php"
                }
            });

        });
        // for  signin
        $("#signinid").on('submit',function(e){
            e.preventDefault();
            var username = $('#usernamesignin').val();
            var pwd = $('#passwordsignin').val();
            var signindata = JSON.stringify($(this).serialize());
            $.ajax({
                url : "loginserver.php",
                type : "POST",
                data : {signindata},
                success: function(result){
                     console.log(result);
                    if(result)
                    {
                        window.location = "home.php";
                    }
                    else{
                        window.location = "index.php";
                    }
                }
            });

        });
        
    });

</script>
</body>
</html>