<?php 
session_start();
include 'config.php';
if(isset($_GET['addToCart'])){
	$clickedId = $_GET['addToCart'];
	$_SESSION['counter'] +=1;
	$i=$_SESSION['counter'];
	foreach($_SESSION['product'] as $j){
		if($clickedId == $j['id']){
			$_SESSION['addTocart'][$i] = $j;
		}
	}
}
// else{
// 	session_unset();
// }

?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Products
	</title>
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
		<?php	foreach($_SESSION['product'] as $j){ ?>
			<div id= <?php echo $j['id']?> class="product">
			<img src="images/<?php echo $j["image"]?>">
			<h3 class="title"><a href="#"> <?php echo $j['productName'] ?></a></h3>
			<span>Price: $<?php echo $j["price"] ?></span>
			<a class="add-to-cart" href="?addToCart=<?php echo $j['id']  ?>">Add To Cart</a>
			</div>
			<?php } ?> 
		</div>
	</div>

	<div>
		<table style="height: 50px;border-collapse: collapse;width: 90%;margin-left: 5%;margin-right: 5%;">
			<tr style="background-color:#3e9cbf ;color: white;">
			<th style="width: 25%;">Id</th>
			<th style="width: 25%;">Name</th>
			<th style="width: 25%;">Price</th>
			<th style="width: 25%;">Quantity</th>
			</tr>
			<?php foreach($_SESSION['addTocart'] as $i){?>
			<tr style="text-align:center">
			<td style="width: 25%;"><?php echo $i['id']?></td>
			<td style="width: 25%;"><?php echo $i['productName']?></td>
			<td style="width: 25%;"><?php echo $i['price']?></td>
			<td style="width: 25%;"> 1 </td>
			</tr> <?php }?>
			
		</table>
	</div>
	<div id="footer">
		<nav>
				<?php include "footer.php"?>
		</nav>
	</div>
</body>
</html>
