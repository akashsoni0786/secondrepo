<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'headerlink.php'?>
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
        max-width:none !important;

    }

    .modal-content-full-width  {
        height: auto !important;
        min-height: 100% !important;
        border-radius: 0 !important;
        background-color: #ececec !important 
    }

    .modal-header-full-width  {
        border-bottom: 1px solid #9ea2a2 !important;
    }

    .modal-footer-full-width  {
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
            <h5 class="mb-0 text-start">
              <strong>Order Details</strong>
            </h5>
            <!-- <select class="form-select" id="changeStatus" aria-label="Default select example">
              <option selected disabled>Change Status</option>
              <option value="pending">Pending</option>
              <option value="approved">Approved</option>
              <option value="delivered">Delivered</option>
            </select> -->
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="orderDetailTable" class="table table-hover text-nowrap">
              </table>
              <table id="orderTotalTable" style="text-align:center" class="table table-hover text-nowrap">
                  <tr>
                      <td>Total</td>
                      <td></td>
                      <td id="totalQauntity">100</td>
                      <td id="totalAmount">value</td>
                  </tr>
              </table>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>



<script>
    $(document).ready(function()
    {
        loadOrderItems();
        function loadOrderItems(){
            $.ajax({
                url : 'orderserver.php',
                type : 'POST',
                data : {order_items_page:"ORDRES"},
                success : function(result){
                    var total=0;
                    var quan =0;
                    var orderDetails = JSON.parse(result);
                    console.log(orderDetails);
                    var row ='<thead><tr><th scope="col">Order ID</th><th scope="col">Product Id</th>'+
            '<th scope="col">Quantity</th><th scope="col">Sale Price</th></tr></thead>';
              
                    orderDetails.forEach(values=>{
                        row += '<tr><td>'+values['order_id']+'</td><td>'+
                        values['product_id']+'</td><td>'+
                        values['quantity']+'</td><td>'+
                        values['related_price']+'</td></tr>';
                        total += (values['quantity']*values['related_price']);
                        quan += parseInt(values['quantity']);

            });
            console.log(total);
            
            $("#orderDetailTable").html(row);
            $("#totalQauntity").html(quan);
            $("#totalAmount").html(total);
                   
                                            

                }
            });
        }

        // $("#changeStatus").click(function(){
        //     var status = $("#changeStatus option:selected").val();
        //     console.log(status);
        //     $.ajax({
        //         url : 'orderserver.php',
        //         type : "POST",
        //         data :{changeStatus : status},
        //         success : function(result){
        //             console.log(result);
        //         }
        //     });
        // });
    });
      
      
</script>
</body>

</html>