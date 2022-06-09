<?php
session_start();
include 'connection.php';
$id = $_SESSION['id'];
if ($id == 111) {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <?php include 'headerlink.php' ?>

    <style>
      body {
        background-color: #fbfbfb;
      }

      @media (min-width: 991.98px) {
        main {
          padding-left: 240px;
        }
      }

      /* Sidebar */
      .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        padding: 58px 0 0;
        /* Height of navbar */
        box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
        width: 240px;
        z-index: 600;
      }

      @media (max-width: 991.98px) {
        .sidebar {
          width: 100%;
        }
      }

      .sidebar .active {
        border-radius: 5px;
        box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
      }

      .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: 0.5rem;
        overflow-x: hidden;
        overflow-y: auto;
        /* Scrollable contents if viewport is shorter than content. */
      }
    </style>
  </head>

  <body>
    <!--Main Navigation-->
    <header>
      <!-- Sidebar -->
      <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
        <div class="position-sticky">
          <div class="list-group list-group-flush mx-3 mt-4">
            <a href="dashboard.php" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true">
              <i class="fas fa-tachometer-alt fa-fw me-3 "></i><span>Main dashboard</span>
            </a>



            <a href="orders.php" class="list-group-item list-group-item-action py-2 ripple "><i class="fas fa-chart-bar fa-fw me-3"></i><span>Orders</span></a>

            <a href="users.php" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-users fa-fw me-3"></i><span>Users</span></a>

            <a href="products.php" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-money-bill fa-fw me-3"></i><span>Products</span></a>

            <a href="index.php" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-home fa-fw me-3"></i><span>View home page</span></a>

          </div>
        </div>
      </nav>
      <!-- Sidebar -->

      <!-- Navbar -->
      <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <!-- Container wrapper -->
        <div class="container-fluid">
          <!-- Toggle button -->
          <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>
          <!-- Search form -->
          <form class="d-none d-md-flex input-group w-auto my-auto">
            <a class="navbar-brand text-primary" style="font-weight: bold;" href="index.php">
              Start Shop</a>
          </form>
          <!-- Avatar -->
         
            <!-- <i class="fas fa-user fa-fw me-3 "></i> -->
        <a class="nav-item ">
          <a
             class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow"
             href="#"
             id="navbarDropdownMenuLink"
             role="button"
             data-mdb-toggle="dropdown"
             aria-expanded="false"
             >
             <i class="fas fa-user fa-fw "></i>
          </a>
          <ul
              class="dropdown-menu dropdown-menu-end"
              aria-labelledby="navbarDropdownMenuLink"
              >
            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
    </a>
       

        </div>
      </nav>
    </header>

    <main style="margin-top: 58px">
      <div class="container pt-4">

        <section class="mb-4">
          <div class="card">
            <div class="card-header text-center py-3">
              <h5 class="mb-0 text-center">
                <strong>Orders</strong>
              </h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="allOrders" class="table table-hover text-nowrap">

                </table>
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>


    <main style="margin-top: 58px">
      <div class="container pt-4">

        <section class="mb-4">
          <div class="card">
            <div class="card-header text-center py-3">
              <h5 class="mb-0 text-center">
                <strong>Products</strong>
              </h5>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="allProducts" class="table table-hover text-nowrap">
                </table>
              </div>
            </div>
          </div>
        </section>


      </div>
    </main>


    <main style="margin-top: 58px">
      <div class="container pt-4">

        <section class="mb-4">
          <div class="card">
            <div class="card-header text-center py-3">
              <h5 class="mb-0 float-start text-center">
                <strong>Customers</strong>
              </h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover text-nowrap" id="allUsers">

                </table>
              </div>
            </div>
          </div>
        </section>


      </div>
    </main>
    <script>
      $(document).ready(function() {

        loadOrders();
        loadItems();
        loadUsers();

        function loadOrders() {

          $.ajax({
            url: 'orderserver.php',
            type: 'POST',
            data: {
              ordersDboard: "Orderdetails"
            },
            success: function(result) {
              var orders = JSON.parse(result);
              console.log(orders);
              var row = '<thead><th scope="col">Order ID</th><th scope="col">User Id</th>' +
                '<th scope="col">Status</th><th scope="col">Address & PIN Code</th><th scope="col">Total Amount</th>' +
                '<th scope="col">Order Date</th><th scope="col">Delivery Date</th></tr></thead>';
              orders.forEach(values => {
                row += '<tr><td id="orderID">' + values['order_id'] + '</td><td>' +
                  values['user_id'] + '</td><td><span class="text-danger" id="chanheStatusID" data-bs-toggle="modal" data-bs-target="#changeStatusModal" data-bs-whatever="@getbootstrap" >' +
                  values['status'] + '</span></td><td>' +
                  values['shipping_address'] + ' ' + values['shipping_pincode'] + '</td><td>' +
                  values['total_amount'] + '</td><td>' + values['order_date'] + '</td><td>' +
                  values['delivery_date'] + '</td></tr>';

              });
              $("#allOrders").html(row);

            }
          });
        }

        function loadItems() {
          $.ajax({
            url: 'productserver.php',
            type: 'POST',
            data: {
              productDboard: "Productdetails"
            },
            success: function(result) {
              var users = JSON.parse(result);
              var row = '<thead><tr><th scope="col">Product ID</th><th scope="col">Product Name</th>' +
                '<th scope="col">Product Category</th><th scope="col">Sale Price</th><th scope="col">List Price</th><th scope="col">Quantity</th>' +
                '</tr></thead>';
              // console.log(users);
              users.forEach(values => {
                row += '<tr><td>' + values['product_id'] + '</td><td>' +
                  values['product_name'] + '</td><td>' +
                  values['product_category'] + '</td><td>' +
                  values['product_sale_price'] + '</td><td>' +
                  values['product_list_price'] + '</td><td>' +
                  values['product_quantity'] + '</td></tr>';

              });
              $("#allProducts").html(row);

            }
          });
        }

        function loadUsers() {
          $.ajax({
            url: 'userserver.php',
            type: 'POST',
            data: {
              userDboard: "Userdetails"
            },
            success: function(result) {
              var users = JSON.parse(result);
              var row = '<thead><tr><th scope="col">User ID</th><th scope="col">User Name</th>' +
                '<th scope="col">Email</th><th scope="col">Address</th><th scope="col">PIN Code</th>' +
                '</tr></thead>';
              // console.log(users);
              users.forEach(values => {
                row += '<tr><td>' + values['user_id'] + '</td><td>' +
                  values['firstname'] + " " + values['lastname'] + '</td><td>' +
                  values['email'] + '</td><td>' +
                  values['address'] + '</td><td>' +
                  values['pincode'] + '</td></tr>';

              });
              $("#allUsers").html(row);

            }
          });
        }






      });
    </script>
  </body>

  </html>


<?php
} else {
  echo "You are not admin";
}
?>