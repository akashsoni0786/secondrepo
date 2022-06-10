
<?php
session_start();
include 'connection.php';
$id = $_SESSION['id'];
if($id == 111){
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <?php include 'headerlink.php'?>
  
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
    padding: 58px 0 0; /* Height of navbar */
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
    overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
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
          <a
             href="dashboard.php"
             class="list-group-item list-group-item-action py-2 ripple "
             aria-current="true"
             >
            <i class="fas fa-tachometer-alt fa-fw me-3 "></i
              ><span>Main dashboard</span>
          </a>
  
       
  
          <a
             href="orders.php"
             class="list-group-item list-group-item-action py-2 ripple "
             ><i class="fas fa-chart-bar fa-fw me-3"></i><span>Orders</span></a
            >
  
          <a
             href="users.php"
             class="list-group-item list-group-item-action py-2 ripple active"
             ><i class="fas fa-users fa-fw me-3"></i><span>Users</span></a
            >
  
          <a
             href="products.php"
             class="list-group-item list-group-item-action py-2 ripple"
             ><i class="fas fa-money-bill fa-fw me-3"></i><span>Products</span></a
            >
            <a
             href="index.php"
             class="list-group-item list-group-item-action py-2 ripple"
             ><i class="fas fa-home fa-fw me-3"></i><span>View home page</span></a
            >
  
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
      </nav><!-- Navbar -->
  </header>
  <!--Main Navigation-->
  
  <!--Main layout-->
  <main style="margin-top: 58px">
    <div class="container pt-4">
  
      <section class="mb-4">
        <div class="card">
          <div class="card-header text-center py-3">
            <h5 class="mb-0 float-start text-center">
              <strong>Customers</strong>
            </h5>
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addCustomer" 
          data-bs-whatever="@getbootstrap">+</button>
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
  
  
  <div class="modal fade" id="addCustomer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Cutomer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Add First name:</label>
              <input type="text" class="form-control" id="addfirstname">
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Add Last name:</label>
              <textarea class="form-control" id="addlastname"></textarea>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Add Email:</label>
              <textarea class="form-control" id="addmail"></textarea>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Add Address:</label>
              <textarea class="form-control" id="addaddress"></textarea>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Add PIN Code:</label>
              <textarea class="form-control" id="addpin"></textarea>
            </div>
            
  
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary" id="customeraAddButtonOfModal">Add</button>
        </div>
      </div>
    </div>
  </div>
  
  
  
  <div class="modal fade" id="editCustomer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Cutomer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
          <div class="mb-3">
              <label for="recipient-name" class="col-form-label">User Id:</label>
              <input type="text" readonly class="form-control" id="editID">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Edit First name:</label>
              <input type="text" class="form-control" id="editfirstname">
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Edit Last name:</label>
              <textarea class="form-control" id="editlastname"></textarea>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Edit Email:</label>
              <textarea class="form-control" id="editmail"></textarea>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Edit Address:</label>
              <textarea class="form-control" id="editaddress"></textarea>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Edit PIN Code:</label>
              <textarea class="form-control" id="editpin"></textarea>
            </div>
            
  
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="customeraEditButtonOfModal">Edit</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    
      $(document).ready(function(){
          loadItems();
          function loadItems(){
              $.ajax({
              url:'userserver.php',
              type:'POST',
              data : {user : "Userdetails"},
              success : function(result)
              {
              var users = JSON.parse(result);
                  var row ='<thead><tr><th scope="col">User ID</th><th scope="col">User Name</th>'+
                    '<th scope="col">Email</th><th scope="col">Address</th><th scope="col">PIN Code</th>'+
                    '<th scope="col">Edit</th><th scope="col">Action</th></tr></thead>';
                  // console.log(users);
              users.forEach(values=>{
                  row += '<tr><td>'+values['user_id']+'</td><td>'+
                  values['firstname']+" "+values['lastname']+'</td><td>'+
                  values['email']+'</td><td>'+
                  values['address']+'</td><td>'+
                  values['pincode']+'</td><td><span class="btn badge rounded-pill bg-success text-light" href="#" data-bs-toggle="modal" data-bs-target="#editCustomer" '+
          'data-bs-whatever="@getbootstrap" id="editUser" class="text-success">Edit</span></td><td id="deleteId"><span class="btn badge rounded-pill bg-danger text-light"  href="#" class="text-danger">Delete</span></td></tr>';
  
              });
              $("#allUsers").html(row);
  
              }
          });
          }
          $("#allUsers").on('click','#deleteId',function(){
            $(this).parent().closest('tr').remove();
            var id = $(this).parent().children().eq(0).text();
          //   alert(id);
            $.ajax({
                url : 'userserver.php',
                type: 'POST',
                data : {ids : id},
                success : function(result){
                  loadItems();
                }
            });
          });
  
          $("#allUsers").on('click','#editUser',function(){
            var id = $(this).parent().parent().children().eq(0).text();
            var fullName = $(this).parent().parent().children().eq(1).text();
            var email = $(this).parent().parent().children().eq(2).text();
            var  adress= $(this).parent().parent().children().eq(3).text();
            var  pin= $(this).parent().parent().children().eq(4).text();
            const [fname, lname] = fullName.split(' ');
  
            console.log(id);
            console.log(fname);
            console.log(lname);
            console.log(email);
            console.log(adress);
            console.log(pin);
  
            $("#editID").val(id);
            $("#editfirstname").val(fname);
            $("#editlastname").val(lname);
            $("#editmail").val(email);
            $("#editaddress").val(adress);
            $("#editpin").val(pin);
  
           
          });
  
          $(document).on('click','#customeraEditButtonOfModal',function(){
              var id = $("#editID").val();
              var fname = $("#editfirstname").val();
              var lname = $("#editlastname").val();
              var email = $("#editmail").val();
              var adress = $("#editaddress").val();
              var pin = $("#editpin").val();
              $(this).parent().parent().remove();
              $.ajax({
                url : 'userserver.php',
                type: 'POST',
                data : {
                      edits : id,
                      first : fname,
                      last : lname,
                      mail : email,
                      area : adress,
                      areaPin : pin
              },
                success : function(result)
                {
                  console.log(result);
                  loadItems();
                  window.location = 'users.php';
                }
            });
          });
  
  
          $("#customeraAddButtonOfModal").click(function(){
              var fname = $("#addfirstname").val();
              var lname = $("#addlastname").val();
              var mail = $("#addmail").val();
              var address = $("#addaddress").val();
              var pin = $("#addpin").val();
              $(this).parent().parent().remove();
              console.log(fname);
              console.log(lname);
              console.log(mail);
              console.log(address);
              console.log(pin);
              $.ajax({
                  url:'userserver.php',
                  type : "POST",
                  data : {
                      firstName : fname,
                      lastName : lname,
                      emails : mail,
                      location : address,
                      pinCode : pin
                  },
                  success : function(result)
                  {
                      console.log(result);
                      loadItems();
                      window.location = 'users.php';
                  }
  
              });
  
          });
  
          
  
          
  
      
      });
  </script>
  </body>
  </html>
<?php
}

else{
  echo "You are not admin";
}
?>