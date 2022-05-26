<?php 
session_start();
if(!isset($_SESSION['addTocart']))
{
    $_SESSION['addTocart'] = array();
}
if(!isset($_SESSION['rows']))
{
	$_SESSION['rows'] = array();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Products
	</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link href="style.css" type="text/css" rel="stylesheet">
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
		<?php	
		foreach($_SESSION['product'] as $key => $j)
		{ ?>
			<div id= <?php echo $j['id'] ?> class="product">
			<img src="images/<?php echo $j["image"]?>">
			<h3 class="title"><a href="#"> <?php echo $j['productName'] ?></a></h3>
			<span>Price: $<?php echo $j["price"] ?></span>
			<a class="add-to-cart" href="server.php?cartId=<?php echo $j['id'].'&cartName='.$j['productName'].'&cartPrice='.$j["price"].'&indexes='.$key; ?>" id="adtocartID">Add To Cart</a>
			</div>
			<?php } ?> 
		</div>
	</div>
	<div>
		<table id="addToCartTable" style="height: 50px;border-collapse: collapse;width: 90%;margin-left: 5%;margin-right: 5%;">
			<tr style="background-color:#3e9cbf ;color: white;">
			<th style="width: 20%;">Id</th>
			<th style="width: 20%;">Name</th>
			<th style="width: 20%;">Price</th>
			<th style="width: 20%;">Quantity</th>
			<th style="width: 20%;">Action</th>
			</tr>
			<?php 
			for($i=0;$i<count($_SESSION['rows']);$i++)
			{ 
				echo $_SESSION['rows'][$i];
			}
			?>
			
		</table>
	</div>
	<div id="footer">
		<nav>
			<?php include "footer.php"?>
		</nav>
	</div>
<script>
	$(document).ready(function()
	{
		$("#addToCartTable").on('click',"#deleteId",function()
		{
			
			var id = $(this).parent().children().eq(0).text();
			window.location.href = "server.php?delId="+id;
			$(this).parent().children().eq(2).remove();
		});
	});
</script>
</body>
</html>
