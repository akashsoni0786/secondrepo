<?php
session_start();
include 'connection.php';
if (isset($_SESSION['id'])) {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <?php include 'headerlink.php' ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container px-4 px-lg-5">
        <a class="navbar-brand text-primary" style="font-weight: bold;" href="index.php">Start Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
            <li class="nav-item"><a class="nav-link text-primary" aria-current="page" href="index.php">Home</a></li>
            <!-- <li class="nav-item"><a class="nav-link " href="addtocart.php">My Cart
            </a></li> -->
            <?php
            if (isset($_SESSION['id'])) {
              if ($_SESSION['id'] == 111) { ?>
                <li class="nav-item"><a class="nav-link" href="dashboard.php">Admin Dashboard</a></li>
            <?php }
            }
            ?>


            <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
            


           
          </ul>

          <a href="addtocart.php" style="text-decoration: none;color:black">
            <a href="addtocart.php" class="btn btn-outline-primary" type="submit">
              <i class="bi-cart-fill me-1"></i>
              Cart
              <span id="cartCountId" class="badge bg-danger text-white ms-1 rounded-pill">
                0</span></a>
          </a></a>
          <?php
          if (isset($_SESSION['id'])) {
          ?>

            <a href="logout.php" class="btn btn-outline-primary ms-2" type="submit">
              <i class="bi bi-door-closed-fill"></i>
              Logout
            </a>
          <?php
          } else {
          ?>
            <a href="signin.php" class="btn btn-outline-primary ms-2" type="submit">
              <i class="bi bi-door-open"></i>Signin
            </a>
          <?php
          }
          ?>
          <a href="profile.php" class="nav-item" style="list-style: none;"><i class="fas fa-user fa-fw text-primary float-end ms-4"></i></a>

          <!-- </form> -->
        </div>
      </div>
    </nav>
    <!--Main layout-->
    <main class="mt-2 pt-4">
      <div class="container wow fadeIn">

        <!-- Heading -->
        <h2 class="my-1 h2 text-center">Checkout form</h2>

        <!--Grid row-->
        <div class="row">

          <!--Grid column-->
          <div class="col-md-8 mb-4">

            <!--Card-->
            <div class="card">

              <!--Card content-->
              <form class="card-body">

                <!--Grid row-->
                <div class="row">

                  <!--Grid column-->
                  <div class="col-md-6 mb-2">

                    <!--firstName-->
                    <div class="md-form ">
                    <span id="fnameerror" style="color: red;"></span>
                      <input type="text" id="firstName" class="form-control">
                      
                      <label for="firstName" class="">First name</label>
                    </div>

                  </div>
                  <!--Grid column-->

                  <!--Grid column-->
                  <div class="col-md-6 mb-2">

                    <!--lastName-->
                    <div class="md-form">
                    <span id="lnameerror" style="color: red;"></span>
                      <input type="text" id="lastName" class="form-control">
                      <label for="lastName" class="">Last name</label>
                    </div>

                  </div>
                  <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Username-->
                <!-- <div class="md-form input-group pl-0 mb-5">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="text" class="form-control py-0" placeholder="Username" aria-describedby="basic-addon1">
              </div> -->

                <!--email-->
                <div class="md-form mb-5">
                <span id="emailerror" style="color: red;"></span>
                  <input type="text" id="email" class="form-control" placeholder="youremail@example.com">
                  <label for="email" class="">Email (optional)</label>
                </div>

                <!--address-->
                <div class="md-form mb-5">
                <span id="add1error" style="color: red;"></span>

                  <input type="text" id="address" class="form-control" placeholder="1234 Main St">
                  <label for="address" class="">Address</label>
                </div>

                <!--address-2-->
                <div class="md-form mb-5">
                <span id="add2error" style="color: red;"></span>

                  <input type="text" id="address-2" class="form-control" placeholder="Apartment or suite">
                  <label for="address-2" class="">Address 2 (optional)</label>
                </div>

                <!--Grid row-->
                <div class="row">

                  <!--Grid column-->
                  <div class="col-lg-4 col-md-6 mb-4">

                    <span id="stateerror" style="color: red;"></span>

                    <input type="text" class="form-control" id="state" placeholder="" required>
                    <label for="state">State</label>

                    <div class="invalid-feedback">
                      Zip code required.
                    </div>

                  </div>
                  <!--Grid column-->

                  <!--Grid column-->
                  <div class="col-lg-4 col-md-6 mb-4">

                    
                    <span id="cityerror" style="color: red;"></span>

                    <input type="text" class="form-control" id="city" placeholder="" required>
                    <label for="city">City</label>
                    <div class="invalid-feedback">
                      Zip code required.
                    </div>

                  </div>
                  <!--Grid column-->

                  <!--Grid column-->
                  <div class="col-lg-4 col-md-6 mb-4">

                    <span id="ziperror" style="color: red;"></span>

                    <input type="text" class="form-control" id="zip" placeholder="" required>
                    <label for="zip">Zip</label>

                    <div class="invalid-feedback">
                      Zip code required.
                    </div>

                  </div>
                  <!--Grid column-->

                </div>
                <!--Grid row-->

                <hr>

                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="same-address">
                  <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="save-info">
                  <label class="custom-control-label" for="save-info">Save this information for next time</label>
                </div>

                <hr>

                <div class="d-block my-3">
                  <div class="custom-control custom-radio">
                    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                    <label class="custom-control-label" for="credit">Credit card</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                    <label class="custom-control-label" for="debit">Debit card</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                    <label class="custom-control-label" for="paypal">Paypal</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="cc-name">Name on card</label>
                    <input type="text" class="form-control" id="cc-name" placeholder="" required>
                    <small class="text-muted">Full name as displayed on card</small>
                    <div class="invalid-feedback">
                      Name on card is required
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="cc-number">Credit card number</label>
                    <input type="text" class="form-control" id="cc-number" placeholder="" required>
                    <div class="invalid-feedback">
                      Credit card number is required
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 mb-3">
                    <label for="cc-expiration">Expiration</label>
                    <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                    <div class="invalid-feedback">
                      Expiration date required
                    </div>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="cc-expiration">CVV</label>
                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                    <div class="invalid-feedback">
                      Security code required
                    </div>
                  </div>
                </div>
                <hr class="mb-4">
                <span data-mdb-toggle="modal" data-mdb-target="#exampleModal" hidden
                 class="btn btn-primary btn-lg btn-block" id="modalCompletepaymentId"
                type="button"></span>

                <button  
                id="checkoutButton" class="btn btn-primary btn-lg btn-block" 
                type="button">Proceed to pay</button>

              </form>

            </div>
            <!--/.Card-->

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-4 mb-4">

            <!-- Heading -->
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-muted">Your cart</span>
              <span class="badge badge-secondary badge-pill" id="cartCount">3</span>
            </h4>

            <!-- Cart -->
            <ul class="list-group mb-3 z-depth-1" id="listOfCartProducts">

            </ul>
            <!-- Cart -->

            <!-- Promo code -->
            <form class="card p-2">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Promo code" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-secondary btn-md waves-effect m-0" type="button">Redeem</button>
                </div>
              </div>
            </form>
            <!-- Promo code -->

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->

      </div>
    </main>
    <!--Main layout-->

    <!-- Footer-->
    <footer class="py-5 bg-primary">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; www.startshop.com 2022</p>
      </div>
    </footer>
    <!--/.Footer-->


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header border-bottom-0">
            <a href="index.php" type="button" class="btn-close" aria-label="Close"></a>
          </div>
          <div class="modal-body text-start text-black p-4">
            <!-- <h5 class="modal-title text-uppercase mb-5" id="nameModalLabel">Akash Soni</h5> -->
            <h4 class="mb-5" style="color: #35558a;">Thanks for your order</h4>
            <p class="mb-0" style="color: #35558a;">Payment summary</p>
            <hr class="mt-2 mb-4" style="height: 0; background-color: transparent; opacity: .75; border-top: 2px dashed #9e9e9e;">
            <span id="summaryDetails"></span>
          </div>
          <div class="modal-footer d-flex justify-content-center border-top-0 py-4">
            <a href='index.php' type="button" class="btn btn-primary btn-lg mb-1">
              Continue Shopping
            </a>
          </div>
        </div>
      </div>
    </div>

    <script>
      $(document).ready(function() {
        myCart();
        cartItemsCount();

        function myCart() {
          $.ajax({
            url: "homepageserver.php",
            type: "POST",
            data: {
              myOrdersCheckout: "myorders"
            },
            success: function(result) {
              var carts = JSON.parse(result)
              var total = 0;
              var l = Object.keys(carts).length;
              console.log(carts);
              var row = '';
              for (let i = 0; i < l; i++) {
                var q = parseInt(carts[Object.keys(carts)[i]].quantity);
                var p = parseInt(carts[Object.keys(carts)[i]].price);
                var res = q * p;
                total = total + res;
                row += '<li class="list-group-item d-flex justify-content-between lh-condensed">' +
                  '<div><h6 class="my-0">' + carts[Object.keys(carts)[i]].pname + '</h6>' +
                  '<small class="text-muted">Brief description</small>' +
                  '</div><span class="text-muted">$' + res + '</span></li>';
              }
              row += '<li class="list-group-item d-flex justify-content-between">' +
                '<span>Total (USD)</span><strong>$' + total + '</strong></li>';

              $("#listOfCartProducts").html(row);
              $('#cartCount').html(l);
              total1 = 0;
              var row2 = '';
              for (let i = 0; i < l; i++) {
                var q = parseInt(carts[Object.keys(carts)[i]].quantity);
                var p = parseInt(carts[Object.keys(carts)[i]].price);
                var res = q * p;
                total1 = total + res;
                row2 += '<div class="d-flex justify-content-between">' +
                  '<p class="fw-bold mb-0">' + carts[Object.keys(carts)[i]].pname +
                  '(Qty:' + carts[Object.keys(carts)[i]].quantity + ')</p>' +
                  '<p class="text-muted mb-0">$' + res + '</p></div>';
              }
              row2 += '<div class="d-flex justify-content-between"><p class="small mb-0">Shipping</p><p class="small mb-0">$0.0</p></div>' +
                '<div class="d-flex justify-content-between pb-1"><p class="small">Tax</p><p class="small">$0.0</p></div>' +
                '<div class="d-flex justify-content-between"><p class="fw-bold">Total</p><p class="fw-bold" style="color: #35558a;">$' + total1 + '</p></div>';;

              $("#summaryDetails").html(row2);


            }
          });

        }

        function cartItemsCount() {
          $.ajax({
            url: "homepageserver.php",
            type: "POST",
            data: {
              cartLength: 'cart'
            },
            success: function(res) {
              $("#cartCountId").html(res);
              // window.location = 'index.php';
            }


          });
        }
        $('#checkoutButton').click(function() {
          var fname = $("#firstName").val();
          var lname = $("#lastName").val();
          var mail = $("#email").val();
          var state = $("#state").val();
          var city = $("#city").val();
          var zip = $("#zip").val();
          var ad1 = $("#address").val();
          var ad2 = $("#address-2").val();

          console.log(fname);
          console.log(lname);
          console.log(mail);
          console.log(state);
          console.log(city);
          console.log(zip);
          console.log(ad1);
          console.log(ad2);
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

          if (mail == "") {
            errors.push('Email field is empty');
            $("#emailerror").html('This field is empty')


          }
          if (ad1 == '') {
            errors.push('Empty field');
            $("#add1error").html('Empty field')

          }

          if (ad2 == "") {
            errors.push('Empty field');
            $("#add2error").html('Empty field')

          }
          if (state == '') {
            errors.push('This field is empty');
            $("#stateerror").html('This field is empty')

          }
          if (city == '') {
            errors.push('This field is empty');
            $("#cityerror").html('This field is empty')

          }
          if (zip == '') {
            errors.push('Please enter your pincode');
            $("#ziperror").html('Please enter your pincode')

          }
          if (zip.length < 6 || zip.length > 6) {
            errors.push('Please enter valid pincode');
            $("#ziperror").html('Please enter valid pincode')

          }
          

          if (errors.length == 0) {
            $.ajax({
              url: "homepageserver.php",
              type: "POST",
              data: {
                placingOrder: "OrderUs",
                firname: fname,
                lastname: lname,
                email: mail,
                states: state,
                cities: city,
                zipCode: zip,
                add1: ad1,
                add2: ad2
              },
              success: function(result) {
                console.log(result);
                jQuery('#modalCompletepaymentId').click();
              }
            });
          }

        });
          $("#firstName").keyup(function(){
            $("#fnameerror").html("");
          });
          $("#lastName").keyup(function(){
            $("#lnameerror").html("");
          });
          $("#email").keyup(function(){
            $("#emailerror").html("");
          });
          $("#state").keyup(function(){
            $("#stateerror").html("");
          });
          $("#city").keyup(function(){
            $("#cityerror").html("");
          });
          $("#zip").keyup(function(){
            $("#ziperror").html("");
          });
          $("#address").keyup(function(){
            $("#add1error").html("");
          });
          $("#address-2").keyup(function(){
            $("#add2error").html("");
          });


      });
    </script>
  </body>

  </html>

<?php
} else {
  echo "You are not logged in";
}
?>