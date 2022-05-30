<?php 

session_start();

include "config.php";
if(isset($_POST['ids'])){
    $id = $_POST['ids'];
    foreach($_SESSION['product'] as $i => $j){
     if($j['id'] == $_POST['ids']){
        $obj = $j;
        }
    }

    if(array_key_exists($id,$_SESSION['addTocart'])){
        foreach($_SESSION['addTocart'] as $k => $v){
                $obj['quantity'] = $v['quantity'] + 1;
                $_SESSION['addTocart'][$id] = $obj;
        }
    }
    else{
        $obj['quantity'] = 1;
        $_SESSION['addTocart'][$id] = $obj;
    }
    $t='<tr style="background-color:#3e9cbf ;color: white;">
    <th style="width: 25%;">Id</th>
    <th style="width: 25%;">Name</th>
    <th style="width: 25%;">Price</th>
    <th style="width: 25%;">Quantity</th>
    <th style="width: 25%;">Action</th>
    </tr>';
    foreach($_SESSION['addTocart'] as $i => $j)
    {
      $t .= "<tr style='text-align:center'><td>".$j['id']."</td><td>".$j['price']."</td><td>".$j['productName']."</td><td id='countId' contenteditable=true>".$j['quantity']."</td><td><a  id='delete' href='#'>Delete</a></td></tr>";
    }
    echo $t;
}
?>