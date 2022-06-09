<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'headerlink.php' ?>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <style>
    .nav-link:hover {
      /* background-color: #0d6efd; */
      color: #0d6efd;
    }
  </style>
  <title>cart</title>
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
          
        
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#!">All Products</a></li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li><a class="dropdown-item" href="#!">Popular Items</a></li>
              <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
            </ul>
          </li> -->
        </ul>
        <!-- <form class="d-flex"> -->

        <a href="addtocart.php" style="text-decoration: none;color:black">
          <a href="addtocart.php" class="btn btn-outline-primary" type="submit">
            <i class="bi-cart-fill me-1"></i>
            Cart
            <span id="cartCountId" class="badge bg-danger text-white ms-1 rounded-pill">
              0</span></a>
        </a></a>
        <?php
        if(isset($_SESSION['id'])){
          ?>
         
          <a href="logout.php" class="btn btn-outline-primary ms-2" type="submit">
            <i class="bi bi-door-closed-fill"></i>
            Logout
        </a>
        <?php
        }else{
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
  <!-- <section class="h-100" style="background-color: #eee;"> -->
    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-10" id="cartItems">

          <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
            <!-- <div> -->
              <!-- <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p> -->
              <!-- <i  class="fas fa-trash fa-lg"></i> -->
            <!-- </div> -->
          </div>
        </div>
      </div>
    </div>
  <!-- </section> -->
  <!-- Footer-->
  <footer class="py-5 bg-primary " style="margin-top: 36vh;position:fixed;width:100%">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; www.startshop.com 2022</p>
    </div>
  </footer>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header border-bottom-0">
                <a href="index.php" type="button" class="btn-close"  aria-label="Close"></a>
              </div>
              <div class="modal-body text-start text-black p-4">
                <!-- <h5 class="modal-title text-uppercase mb-5" id="nameModalLabel">Akash Soni</h5> -->
                <h4 class="mb-5" style="color: red;">You are not logged in!</h4>
                <p class="mb-0" style="color: #35558a;">You have to login first then you can proceed to checkout</p>
                <span id="summaryDetails"></span>
                </div>
              <div class="modal-footer d-flex justify-content-center border-top-0 py-4">
                <a href='signin.php' type="button" class="btn btn-primary btn-lg mb-1">
                  Go to Login 
          </a>
              </div>
            </div>
          </div>
        </div>

  <script>



    $(document).ready(function() {
      myCart();

      function myCart() {
        $.ajax({
          url: "homepageserver.php",
          type: "POST",
          data: {
            myOrders: "myorders"
          },
          success: function(result) {
            var carts = JSON.parse(result)
            var l = Object.keys(carts).length;
            console.log(carts);
            // var row = '<div class="float-end">Empty Cart<i  class="fas fa-trash fa-lg"></i></div>';
            var row='';
            for (let i = 0; i < l; i++) {
              row += '<div class="card rounded-3 mb-4" id="' + carts[Object.keys(carts)[i]].id + 
                '"><div id="cardIdForAddtocart" class="card-body p-4 "><div class="row d-flex justify-content-between align-items-center">' +
                '<div class="col-md-2 col-lg-2 col-xl-2 " ><img src="' + carts[Object.keys(carts)[i]].pimage + '"' +
                'class="img-fluid rounded-3 " ></div><div class="col-md-3 col-lg-3 col-xl-3" >' +
                '<p class="lead fw-normal mb-2 ">' + carts[Object.keys(carts)[i]].pname + '</p></div><div class="col-md-3 col-lg-3 col-xl-2 d-flex">' +
                '<button class="btn btn-link px-2 " id="minusButtonCart" onclick="this.parentNode.querySelector(' + "'input[type=number]'" + ').stepDown()">' +
                '<i class="fas fa-minus"></i></button><input id="' + carts[Object.keys(carts)[i]].id + 
                '" min="0" name="quantity" value="' + carts[Object.keys(carts)[i]].quantity + '" type="number"' +
                'class="form-control form-control-sm quantityInputClass" /><button  class=" btn btn-link px-2" id="plusButtonCart"' +
                'onclick="this.parentNode.querySelector(' + "'input[type=number]'" + ').stepUp()">' +
                '<i class="fas fa-plus "></i></button></div><div class=" col-md-3 col-lg-2 col-xl-2 offset-lg-1">' +
                '<h5 class="mb-0 ">$' + carts[Object.keys(carts)[i]].price + '</h5></div>' +
                '<div class="col-md-1 col-lg-1 col-xl-1 text-end "><a id="' + carts[Object.keys(carts)[i]].id + 
                '"  class="cartC text-danger"><i  class="fas fa-trash fa-lg"></i></a></div></div></div></div>';
            }
            if(l>0){
              <?php if(isset($_SESSION['id'])){
                ?>
              row += '<div class="card"><div class="card-body ">' +
              '<a href="checkout.php"><button   type="button" class="btn btn-primary btn-block btn-lg ">Proceed to Pay</button></a>' +
              '</div></div>';
              <?php
              }else {
              ?>
              row += '<div class="card"><div class="card-body ">' +
              '<a><button data-mdb-toggle="modal" data-mdb-target="#exampleModal"   type="button" class="btn btn-primary btn-block btn-lg ">Proceed to Pay</button></a>' +
              '</div></div>';
              <?php
              }
              ?>
            }
            else{
              row = '<div class="card"><div class="card-body "><h2 class="my-5 h2 text-center">No items</h2>'+
              '<a href="index.php"><button  type="button" class="btn btn-primary btn-block btn-lg ">Continue Shopping</button></a>' +
              '</div></div>'; 
            }
            
            $("#cartItems").html(row);
            $('#cartCountId').html(l);


          }
        });
        
      }

      $("#cartItems").on('click', '#plusButtonCart', function() {
        var quan = $(this).prev().val();
        var id = $(this).parent().parent().parent().parent()[0].id;
        // alert(id);
        $.ajax({
          url: "homepageserver.php",
          type: "POST",
          data: {
            increaseValue: quan,
            pid: id
          },
          success: function(result) 
          {
            console.log(result);
          }
        });


      });
      $("#cartItems").on('click', '#minusButtonCart', function() {
        var quan = $(this).next().val();
        var id = $(this).parent().parent().parent().parent()[0].id;
        $.ajax({
          url: "homepageserver.php",
          type: "POST",
          data: {
            decreaseValue: quan,
            pid: id
          },
          success: function(result) {
            console.log(result);
          }
        });
       


      });
      $(document).on('keyup','.quantityInputClass',function(){
        var id = $(this).attr('id');
        var quan = $(this).val();
        $.ajax({
          url: "homepageserver.php",
          type: "POST",
          data: {
            onkeyupvalues: quan,
            pid: id
          },
          success: function(result) {
            console.log(result);
          }
        });
      });


      


  
      $(document).on('click','.cartC',function(){
        var id = $(this).attr('id');
        $.ajax({
          url : "homepageserver.php",
          type : "POST",
          data:{deleteCart:id},
        success:function(result){
          window.location = 'addtocart.php';
          // console.log(result);

        }});
      });
    });
  </script>
</body>

</html>