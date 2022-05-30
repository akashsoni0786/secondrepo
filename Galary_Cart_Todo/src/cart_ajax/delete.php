<?php 

session_start();
include "config.php";
if(isset($_POST['name'])){

    $id = $_POST['name'];
    unset($_SESSION['addTocart'][$id]);

    $t='<tr style="background-color:#3e9cbf ;color: white;">
    <th style="width: 25%;">Id</th>
    <th style="width: 25%;">Name</th>
    <th style="width: 25%;">Price</th>
    <th style="width: 25%;">Quantity</th>
    <th style="width: 25%;">Action</th>
    </tr>';
    foreach($_SESSION['addTocart'] as $i => $j)
    {
      $t .= "<tr style='text-align:center'><td>".$j['id']."</td><td>".$j['price']."</td><td>".$j['productName']."</td><td id='countId' contenteditable=true>1</td><td><a  id='delete' href='#'>Delete</a></td></tr>";
    }
    echo $t;
}

?>