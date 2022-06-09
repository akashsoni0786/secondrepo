<?php
session_start();
include 'connection.php';
if(isset($_POST['allProducts']))
{
    try
    {
        $sql ='SELECT * FROM `Products` WHERE 1';
        $res = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($res);
    }
    catch(PDOException $e){
        echo "Connection error :". $e->getMessage();
    }
}
if(isset($_POST['cartLength'])){
   $len = count($_SESSION['addTocart']);
   echo $len;
}

if(isset($_POST['productIdforCart']))
{
   $pId = $_POST['productIdforCart'];
   $pName = $_POST['pro_name'];
   $pImg = $_POST['pro_img'];
   $pPrice = $_POST['pro_price'];
   $quantity =1;

    if(array_key_exists($pId,$_SESSION['addTocart']))
    {
      $_SESSION['addTocart'][$pId]['quantity'] = $_SESSION['addTocart'][$pId]['quantity'] +1;
    }
    else
    {
      $_SESSION['addTocart'][$pId] = array('id'=>$pId,'pname'=>$pName,'pimage'=>$pImg,
            'price'=>$pPrice,'quantity'=>$quantity);
    }
}

if(isset($_POST['myOrders']))
{
  echo json_encode($_SESSION['addTocart']);
}

if(isset($_POST['increaseValue']))
{
   $pId = $_POST['pid'];
   $quantity =$_POST['increaseValue'];
   $_SESSION['addTocart'][$pId]['quantity'] = $quantity;      
}

if(isset($_POST['decreaseValue']))
{
   $pId = $_POST['pid'];
   $quantity =$_POST['decreaseValue'];
   $_SESSION['addTocart'][$pId]['quantity'] = $quantity;      
}


if(isset($_POST['onkeyupvalues']))
{
   $pId = $_POST['pid'];
   $quantity =$_POST['onkeyupvalues'];
   $_SESSION['addTocart'][$pId]['quantity'] = $quantity;      
}
if(isset($_POST['deleteCart']))
{
   $pId = $_POST['deleteCart'];
   unset($_SESSION['addTocart'][$pId]);      
   echo "Deleted";
}


if(isset($_POST['myOrdersCheckout']))
{
  echo json_encode($_SESSION['addTocart']);
}


if(isset($_POST['placingOrder'])){
   $u_id = $_SESSION['id'];
   $fname = $_POST['firname'];
   $lname = $_POST['lastname'];
   $email = $_POST['email'];
   $states = $_POST['states'];
   $city = $_POST['cities'];
   $zip = $_POST['zipCode'];
   $ad1 = $_POST['add1'];
   $ad2 = $_POST['add2'];
   $finalAddress= $ad1.' '.$ad2.' '.$city.' '.$states;
   $total = 0;
   foreach($_SESSION['addTocart'] as $i)
   {
      $p = (int)$i['price'];
      $q = (int)$i['quantity'];
      $total = $total + $p*$q;
   }
   try
   { 
      $sql =  "INSERT INTO `Orders`(`user_id`, `status`, `total_amount`, `shipping_address`, `shipping_pincode`, `order_date`, `delivery_date`) 
           VALUES('$u_id','pending','$total','$finalAddress',$zip,now(),now()+INTERVAL 3 day)";
       $conn->exec($sql);
       $o_id = $conn->lastInsertId();

       foreach($_SESSION['addTocart'] as $i)
      {
         $id =$i['id'];
         $price = (int)$i['price'];
         $quantity = (int)$i['quantity'];
         $relatedPrice = $quantity*$price;
         $sql1="INSERT INTO Order_items(`order_id`, `product_id`,`quantity`,`related_price`)
                VALUES('$o_id','$id','$quantity','$relatedPrice')";
         $conn->exec($sql1);
      }
      $_SESSION['addTocart']= array();
       echo 'done';
   }
   catch(PDOException $e){
       echo "Connection error :". $e->getMessage();
   }
}



if(isset($_POST['filterCategoryWise']))
{
    try
    {
        $sql ='SELECT * FROM `Products` WHERE 1';
        $res = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($res);
    }
    catch(PDOException $e){
        echo "Connection error :". $e->getMessage();
    }
}
if(isset($_POST['searchNames']))
{
    try
    {
        $sql ='SELECT * FROM `Products` WHERE 1';
        $res = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($res);
    }
    catch(PDOException $e){
        echo "Connection error :". $e->getMessage();
    }
}
?>