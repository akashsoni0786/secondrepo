<?php
session_start();
include 'connection.php';

if(isset($_SESSION['id'])){
$id = $_SESSION['id'];
if ($id == 111) {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <?php include 'headerlink.php' ?>
    <title>orders</title>
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

      .modal-dialog-full-width {
        width: 100% !important;
        height: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        max-width: none !important;

      }

      .modal-content-full-width {
        height: auto !important;
        min-height: 100% !important;
        border-radius: 0 !important;
        background-color: #ececec !important
      }

      .modal-header-full-width {
        border-bottom: 1px solid #9ea2a2 !important;
      }

      .modal-footer-full-width {
        border-top: 1px solid #9ea2a2 !important;
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
            <a href="dashboard.php" class="list-group-item list-group-item-action py-2 ripple " aria-current="true">
              <i class="fas fa-tachometer-alt fa-fw me-3 "></i><span>Main dashboard</span>
            </a>



            <a href="orders.php" class="list-group-item list-group-item-action py-2 ripple active"><i class="fas fa-chart-bar fa-fw me-3"></i><span>Orders</span></a>

            <a href="users.php" class="list-group-item list-group-item-action py-2 ripple "><i class="fas fa-users fa-fw me-3"></i><span>Users</span></a>

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
      <!-- Navbar -->
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
    <div class="modal fade" id="changeStatusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Status</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>

              <div class="mb-3">
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Change Status</label>
                  <select class="form-select" id="selectstatusId" aria-label="Default select example">
                    <option selected disabled>Select Status</option>
                    <option value="pending">Pending</option>
                    <option value="approved">Approved</option>
                    <option value="delivered">Delivered</option>
                  </select>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" id="statusChangeButtonOfModal">Change</button>
          </div>
        </div>
      </div>
    </div>


    <script>
      $(document).ready(function() {
        loadOrders();

        function loadOrders() {

          $.ajax({
            url: 'orderserver.php',
            type: 'POST',
            data: {
              orders: "Orderdetails"
            },
            success: function(result) {
              var orders = JSON.parse(result);
              var row = '<thead><tr><th scope="col">For Details</th><th scope="col">Order ID</th><th scope="col">User Id</th>' +
                '<th scope="col">Status</th><th scope="col">Address & PIN Code</th><th scope="col">Total Amount</th>' +
                '<th scope="col">Order Date</th><th scope="col">Delivery Date</th><th scope="col">Action</th></tr></thead>';
              orders.forEach(values => {
                row += '<tr><td><span class="btn badge rounded-pill bg-warning text-dark" id="rowId" href="" >Details</span></td><td id="orderID">' + values['order_id'] + '</td><td>' +
                  values['user_id'] + '</td><td id="'+values['order_id']+'"><span class="btn badge rounded-pill bg-info" id="chanheStatusID" data-bs-toggle="modal" data-bs-target="#changeStatusModal" data-bs-whatever="@getbootstrap" >' +
                  values['status'] + '</span></td><td>' +
                  values['shipping_address'] + ' ' + values['shipping_pincode'] + '</td><td>' +
                  values['total_amount'] + '</td><td>' + values['order_date'] + '</td><td>' +
                  values['delivery_date'] + '</td>' +
                  '<td id="deleteId"><span  class="btn badge rounded-pill bg-danger text-light">Delete</span></td></tr>';

              });
              $("#allOrders").html(row);

            }
          });
        }
        $(document).on('click', '#statusChangeButtonOfModal', function() {
          var order_status = $("#selectstatusId option:selected").val();

          $.ajax({
            url: 'orderserver.php',
            type: "POST",
            data: {
              order_status_change: order_status
            },
            success: function(result) {
              console.log(result);

              window.location = 'orders.php';
            }
          });
        });
        

        $("#allOrders").on('click', '#chanheStatusID', function() {
          var id = $(this).parent().attr('id');
          console.log(id);
          $.ajax({
            url: 'orderserver.php',
            type: "POST",
            data: {order_id_for_status_change_in_orderpage : id},
          });
        });
        $("#allOrders").on('click', '#rowId', function() {
          var id = $(this).parent().parent().children().eq(1).text();
          console.log(id);
          $.ajax({
            url: 'orderserver.php',
            type: "POST",
            data: {
              order_ids_next_page: id
            },
            success: function(result) {
              window.location = 'order_items.php';
            }

          });
        });
        $("#allOrders").on('click', '#deleteId', function() {
          $(this).parent().closest('tr').remove();
          var id = $(this).parent().children().eq(1).text();
          // alert(id);
          $.ajax({
            url: 'orderserver.php',
            type: 'POST',
            data: {
              order_ids: id
            }
          });
        });
      });
    </script>
  </body>

  </html>

<?php
} else {
  echo "You are not admin";
}
}
else{
  echo "Error 404";
}
?>