<?php 
session_start();
include 'config.php';

if(!isset($_SESSION['addTocart'] ))
{
	$_SESSION['addTocart'] = array();
}

if(!isset($_SESSION['addTocartPrint'] ))
{
	$_SESSION['addTocartPrint'] = array();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Products
	</title>
	<link href="style.css" type="text/css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
	<div id="header">
		<h1 id="logo">Logo</h1>
		<nav>
		<?php include "header.php"?>
		</nav>
	</div>
	<div id="main">
		<div id="products">
		<?php include 'config.php';?>
		<?php	foreach($_SESSION['product'] as $j){ ?>
			<div id= <?php echo $j['id']?> class="product">
			<img src="images/<?php echo $j["image"]?>">
			<h3 class="title"><a href="#" id="productName"> <?php echo $j['productName'] ?></a></h3>
			<span>Price: $</span>
			<span id="price"><?php echo $j["price"] ?></span>
			<a class="add-to-cart" id="addtocart" >Add To Cart</a>
			</div>
			<?php } ?> 
		</div>
	</div>
	<div>
		<table id="addtocartTable" 	style="text-align:center;height: 50px;width: 90%;margin-left: 5%;margin-right: 5%;">	
	
	</table>
	</div>
	<div id="footer">
		<nav>
		<?php include "footer.php"?>
		</nav>
	</div>

	<script>
		$(document).ready(function(){
			$(".add-to-cart").click(function()
			{
				var id=$(this).closest("div")[0].id;
				var name = $(this).parent().children().eq(1).text();
				var price = $(this).parent().children().eq(3).text();
				$.ajax({
					url:"server.php",
					type: "POST",
					data:{
							ids : id,
							names : name,
							prices : price,
							quantites : 1,
						},
					success:function(result){
						$("#addtocartTable").html(result);
					}
				});
			});

	$("#addtocartTable").on("click", "#delete", function(e) {
		e.preventDefault();
		var id = $(this).closest('tr').children().first().text();
		$.post('server.php',{delId : id }, function (data){
			$("#addtocartTable").html(data);
		});

     });

	
		});
	</script>
</body>
</html>