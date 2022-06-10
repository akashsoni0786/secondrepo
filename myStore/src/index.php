<?php
session_start();
if (!isset($_SESSION['addTocart'])) {
  $_SESSION['addTocart'] = array();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'headerlink.php' ?>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Shop Homepage - Start Bootstrap Template</title>

  <style>
    .nav-link:hover {
      /* background-color: #0d6efd; */
      color: #0d6efd;
    }
  </style>
</head>

<body>
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
      <a class="navbar-brand text-primary" style="font-weight: bold;" href="#!">Start Shop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
          <li class="nav-item"><a class="nav-link text-primary active" aria-current="page" href="#">Home</a></li>
          <!-- <li class="nav-item"><a class="nav-link " href="addtocart.php">My Cart
            </a></li> -->
          <?php
          if (isset($_SESSION['id'])) {
            if ($_SESSION['id'] == 111) { ?>
              <li class="nav-item"><a class="nav-link" href="dashboard.php">Admin Dashboard</a></li>
          <?php }
          }
          ?>



          <li><a class="nav-item"><a class="nav-link" href="about.php">About</a></li>


          <li class="nav-item dropdown">
            <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="CategoryFilterid" role="button" data-mdb-toggle="dropdown" aria-expanded="false">Category</i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="CategoryFilterid" id="categoryid">
              <li><a class="dropdown-item" href="#!">electronics</a></li>
              <li><a class="dropdown-item" href="#!">fashion</a></li>
              <li><a class="dropdown-item" href="#!">home appliances</a>
              <li><a class="dropdown-item" href="#!">furniture</a></li>
              <li><a class="dropdown-item" href="#!">jewellery</a></li>
          </li>

         
        </ul>
        </a>
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
        if (isset($_SESSION['id'])) {
        ?>
          <a href="logout.php" style="text-decoration: none;color:black">
            <a href="logout.php" class="btn btn-outline-primary ms-2" type="submit">
              <!-- <i class="bi-logout me-1"></i> -->
              <i class="bi bi-door-closed-fill"></i>
              Logout
            </a></a>
        <?php
        } 
        
        else {
        ?>
          <a href="logout.php" style="text-decoration: none;color:black">
            <a href="signin.php" class="btn btn-outline-primary ms-2" type="submit">
              <!-- <i class="bi-logout me-1"></i> -->
              <i class="bi bi-door-open"></i>Signin
            </a></a>
        <?php
        }
        ?>
        <?php
        if (isset($_SESSION['id'])) {
        ?>
        <a href="profile.php" class="nav-item" style="list-style: none;"><i class="fas fa-user fa-fw text-primary float-end ms-4"></i></a>
<?php
        }
?>
        <!-- </form> -->
      </div>
    </div>
  </nav>

  <!-- Header-->
  <header class="bg-primary py-5">
    <div class="container px-4 px-lg-5 my-5">
      <div class="text-center text-white">
        <h1 class="display-4 fw-bolder">Shop in style</h1>
        <p class="lead fw-normal text-white-50 mb-0">With this shop you can buy anything</p>
      </div>
    </div>
  </header>
  <!-- Section-->


  <div class="input-group  d-flex aligns-items-center justify-content-center mt-5">
  <div class="form-outline">
    <input type="search"  class="form-control border" id="searchTxt" />
    <label class="form-label" for="form1" >Search</label>
  </div>
  <button type="button" id="searchBarbtn" class="btn btn-primary">
    <i class="fas fa-search"></i>
  </button>
</div>


  <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
      <div id="showAllProductsHome" class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">


      </div>
    </div>
  </section>
  <!-- Footer-->
  <footer class="py-5 bg-primary">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; www.startshop.com 2022</p>
    </div>
  </footer>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script>
    $(document).ready(function() {
      loadProducts();
      cartItemsCount();
      function loadProducts() {
        $.ajax({
          url: 'homepageserver.php',
          type: "POST",
          data: {
            allProducts: "Show"
          },
          success: function(result) {
            var products = JSON.parse(result);
            var row = '';
            products.forEach(values => {
              row += '<div class="col mb-5" id="' + values['product_id'] + '">' +
                '<div class="card h-100">' +
                '<img class="card-img-top" src="' + values['product_image'] + '" alt="..." />' +
                '<div class="card-body p-4">' +
                '<div class="text-center">' +
                '<h5 class="fw-bolder text-primary">' + values['product_name'] + '</h5>' +
                '<div class="d-flex justify-content-center small text-warning mb-2">' +
                '<div class="bi-star-fill"></div>' +
                '<div class="bi-star-fill"></div>' +
                '<div class="bi-star-fill"></div>' +
                '<div class="bi-star-fill"></div>' +
                '<div class="bi-star-fill"></div>' +
                '</div><span class="text-primary">$' + values['product_sale_price'] + '</span></div></div>' +

                '<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">' +
                '<div class="text-center"><a class="btn btn-outline-primary mt-auto" id="addToCartButton">Add to cart</a></div>' +
                '</div></div> </div>';
            });
            $('#showAllProductsHome').html(row);



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
          }


        });
      }
      $(document).on('click', '#addToCartButton', function(e) {

        e.preventDefault();
        var pId = $(this).parent().parent().parent().parent()[0].id;
        var pImg = $(this).parent().parent().parent().children().eq(0)[0].src;
        var namePrice = $(this).parent().parent().parent().children().eq(1).children().eq(0).text();
        const [pName, pPrice] = namePrice.split('$');
        $.ajax({
          url: 'homepageserver.php',
          type: "POST",
          data: {
            productIdforCart: pId,
            pro_name: pName,
            pro_img: pImg,
            pro_price: pPrice
          },
          success: function(result) {
            cartItemsCount();
          }
        });
      });
      $("#categoryid").on("click", "li a", function() {
        var catValue = $(this).closest("li").children('a').text();
        console.log(catValue);
        $.ajax({
          url: 'homepageserver.php',
          type: "POST",
          data: {
            filterCategoryWise: "Show"
          },
          success: function(result) {
            var products = JSON.parse(result);
            var row = '';
            const productsfiltered = products.filter(function(cat) {
              return (cat.product_category === catValue);
            });
            productsfiltered.forEach(values => {
              row += '<div class="col mb-5" id="' + values['product_id'] + '">' +
                '<div class="card h-100">' +
                '<img class="card-img-top" src="' + values['product_image'] + '" alt="..." />' +
                '<div class="card-body p-4">' +
                '<div class="text-center">' +
                '<h5 class="fw-bolder text-primary">' + values['product_name'] + '</h5>' +
                '<div class="d-flex justify-content-center small text-warning mb-2">' +
                '<div class="bi-star-fill"></div>' +
                '<div class="bi-star-fill"></div>' +
                '<div class="bi-star-fill"></div>' +
                '<div class="bi-star-fill"></div>' +
                '<div class="bi-star-fill"></div>' +
                '</div><span class="text-primary">$' + values['product_sale_price'] + '</span></div></div>' +

                '<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">' +
                '<div class="text-center"><a class="btn btn-outline-primary mt-auto" id="addToCartButton">Add to cart</a></div>' +
                '</div></div> </div>';
            });
            $('#showAllProductsHome').html(row);



          }
        });

      });

      

       $('#searchBarbtn').click(function() {
        var searchtext = $("#searchTxt").val().toLowerCase();

        $.ajax({
          url: 'homepageserver.php',
          type: "POST",
          data: {
            searchNames: "Show"
          },
          success: function(result) {
            var products = JSON.parse(result);
            var row = '';
            const productsearched = products.filter(function(cat) {
              return (cat.product_name === searchtext);
            });
            productsearched.forEach(values => {
              row += '<div class="col mb-5" id="' + values['product_id'] + '">' +
                '<div class="card h-100">' +
                '<img class="card-img-top" src="' + values['product_image'] + '" alt="..." />' +
                '<div class="card-body p-4">' +
                '<div class="text-center">' +
                '<h5 class="fw-bolder text-primary">' + values['product_name'] + '</h5>' +
                '<div class="d-flex justify-content-center small text-warning mb-2">' +
                '<div class="bi-star-fill"></div>' +
                '<div class="bi-star-fill"></div>' +
                '<div class="bi-star-fill"></div>' +
                '<div class="bi-star-fill"></div>' +
                '<div class="bi-star-fill"></div>' +
                '</div><span class="text-primary">$' + values['product_sale_price'] + '</span></div></div>' +

                '<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">' +
                '<div class="text-center"><a class="btn btn-outline-primary mt-auto" id="addToCartButton">Add to cart</a></div>' +
                '</div></div> </div>';
            });
            $('#showAllProductsHome').html(row);



          }
        });
      });


    });
  </script>
</body>

</html>