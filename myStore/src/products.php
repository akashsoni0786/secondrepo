<?php
session_start();
include 'connection.php';

if(isset($_SESSION['id'])){
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
  <nav
       id="sidebarMenuBar"
       class="collapse d-lg-block sidebar collapse bg-white"
       >
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
           class="list-group-item list-group-item-action py-2 ripple"
           ><i class="fas fa-users fa-fw me-3"></i><span>Users</span></a
          >

        <a
           href="products.php"
           class="list-group-item list-group-item-action py-2 ripple active"
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
      </nav>
  
  
  
  <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px">
  <div class="container pt-4">

    <section class="mb-4">
      <div class="card">
      <div class="card-header text-center py-3">
          <h5 class="mb-0 float-start text-center">
            <strong>Products</strong>
          </h5>
          <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addProduct" 
        data-bs-whatever="@getbootstrap">+</button>
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


<div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
        
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Product name:</label>
            <input type="text" class="form-control" id="pname">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Product Image Link:</label>
            <input type="text" class="form-control" id="pimg">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Product Category</label>
            <select class="form-select" id="categorySelect" aria-label="Default select example">
              <option selected disabled></option>
              <option value="electronics">electronics</option>
              <option value="fashion">fashion</option>
              <option value="home appliances">home appliances</option>
              <option value="furniture">furniture</option>
              <option value="jewellery">jewellery</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Sale Price</label>
            <input type="text" class="form-control" id="saleprice">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">List Price</label>
            <input type="text" class="form-control" id="listprice">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Quantity</label>
            <input type="text" class="form-control" id="quantity">
          </div>
          

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" id="productAddButtonOfModal">Add</button>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Product Id:</label>
            <input type="text" readonly class="form-control" id="productID">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Edit Product name:</label>
            <input type="text" class="form-control" id="editproductname">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Change Category:</label>
            <div class="mb-3">
            <label for="message-text" class="col-form-label">Product Category</label>
            <select class="form-select" id="editcategory" aria-label="Default select example">
              <option selected disabled></option>
              <option value="electronics">electronics</option>
              <option value="fashion">fashion</option>
              <option value="home appliances">home appliances</option>
              <option value="furniture">furniture</option>
              <option value="jewellery">jewellery</option>
            </select>
          </div>
          
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Edit Sale Price:</label>
            <input type="text" class="form-control" id="editsaleprice">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Edit List Price:</label>
            <input type="text" class="form-control" id="editlistprice">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Edit Quantity:</label>
            <input type="text" class="form-control" id="editquantity">
          </div>
          

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" id="productEditButtonOfModal">Edit</button>
      </div>
    </div>
  </div>
</div>
<script>

$(document).ready(function(){
        loadItems();
        function loadItems(){
            $.ajax({
            url:'productserver.php',
            type:'POST',
            data : {product : "Productdetails"},
            success : function(result)
            {
            var users = JSON.parse(result);
                var row ='<thead><tr><th scope="col">Product ID</th><th scope="col">Product Name</th>'+
                  '<th scope="col">Product Category</th><th scope="col">Sale Price</th><th scope="col">List Price</th><th scope="col">Quantity</th>'+
                  '<th scope="col">Edit</th><th scope="col">Action</th></tr></thead>';
                // console.log(users);
            users.forEach(values=>{
                row += '<tr><td>'+values['product_id']+'</td><td>'+
                values['product_name']+'</td><td>'+
                values['product_category']+'</td><td>'+
                values['product_sale_price']+'</td><td>'+
                values['product_list_price']+'</td><td>'+
                values['product_quantity']+'</td><td><span href="#" class="btn badge rounded-pill bg-success text-light" data-bs-toggle="modal" data-bs-target="#editProductModal" '+
        'data-bs-whatever="@getbootstrap" id="editProductTxt" class="text-success">Edit</span></td><td id="deleteId"><span class="btn badge rounded-pill bg-danger text-light" href="#" class="text-danger">Delete</span></td></tr>';

            });
            $("#allProducts").html(row);

            }
        });
        }
        $("#allProducts").on('click','#deleteId',function(){
          $(this).parent().closest('tr').remove();
          var id = $(this).parent().children().eq(0).text();
          // alert(id);
          $.ajax({
              url : 'productserver.php',
              type: 'POST',
              data : {prp_ids : id},
              success : function(result){
                console.log(result);
                loadItems();
                window.location = 'products.php';

              }
          });
        });

        $("#allProducts").on('click','#editProductTxt',function()
        {
          var id = $(this).parent().parent().children().eq(0).text();
          var pName = $(this).parent().parent().children().eq(1).text();
          var pCat = $(this).parent().parent().children().eq(2).text();
          var pSale= $(this).parent().parent().children().eq(3).text();
          var pList= $(this).parent().parent().children().eq(4).text();
          var pQuant= $(this).parent().parent().children().eq(5).text();

          console.log(id);
          console.log(pName);
          console.log(pCat);
          console.log(pSale);
          console.log(pList);
          console.log(pQuant);

          $("#productID").val(id);
          $("#editproductname").val(pName);
          $("#editcategory").val(pCat);
          $("#editsaleprice").val(pSale);
          $("#editlistprice").val(pList);
          $("#editquantity").val(pQuant);

         
        });

        $(document).on('click','#productEditButtonOfModal',function(){
          var id = $("#productID").val();
          var pname= $("#editproductname").val();
          var pcategory = $("#editcategory").val();
          var psale = $("#editsaleprice").val();
          var plist = $("#editlistprice").val();
          var pQuan = $("#editquantity").val();
            $(this).parent().parent().remove();
            $.ajax({
              url : 'productserver.php',
              type: 'POST',
              data : {
                    edits : id,
                    name : pname,
                    category : pcategory,
                    sale : psale,
                    list : plist,
                    quantity : pQuan
            },
              success : function(result)
              {
                console.log(result);
                loadItems();
                window.location = 'products.php';

              }
          });
        });


        $("#productAddButtonOfModal").click(function()
        {

            var pro_name = $("#pname").val();
            var pro_img = $("#pimg").val();
            var pro_category =$("#categorySelect option:selected").text();
            var sale_price = $("#saleprice").val();
            var list_price = $("#listprice").val();
            var quantity = $("#quantity").val();
            $(this).parent().parent().remove();
            console.log(pro_name);
            console.log(pro_category);
            console.log(sale_price);
            console.log(list_price);
            console.log(quantity);
            $.ajax({
                url:'productserver.php',
                type : "POST",
                data : {
                    pName : pro_name,
                    pImg : pro_img,
                    pCat : pro_category,
                    pSale : sale_price,
                    pList : list_price,
                    pQuant : quantity
                },
                success : function(result)
                {
                    console.log(result);
                    window.location = 'products.php';
                    loadItems();
                }

            });

        });

        

        

    
    });
</script></body>
</html>

<?php
}
else{
  echo "You are not admin";
}
}
else{
  echo "Error 404";
}
?>