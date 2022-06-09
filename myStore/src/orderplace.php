<?php

include 'connection.php';

if(isset($_POST['firname'])){
    $u_id = 122;
    $fname = $_POST['firname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $states = $_POST['states'];
    $city = $_POST['cities'];
    $zip = $_POST['zipCode'];
    $ad1 = $_POST['add1'];
    $ad2 = $_POST['add2'];
    $finalAddress= $ad1.' '.$ad2.' '.$city.' '.$states;

    try
    { 
       $sql =  "INSERT INTO `Orders`(`user_id`, `status`, `total_amount`, `shipping_address`, `shipping_pincode`, `order_date`, `delivery_date`) 
            VALUES('$u_id','pending','30000','$finalAddress',$zip,now(),now()+INTERVAL 3 day)";
        $conn->exec($sql);
        $o_id = $conn->lastInsertId();
        $sql1="INSERT INTO Order_items(`order_id`, `product_id`,`quantity`,`related_price`)
                 VALUES('$o_id','10104','1','1888')";
        $conn->exec($sql1);
        echo 'done';
    }
    catch(PDOException $e){
        echo "Connection error :". $e->getMessage();
    }
}
?>