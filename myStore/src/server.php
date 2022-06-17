<?php
include 'connection.php';

try 
{
  $sql = "CREATE TABLE Users(
            user_id int(50),
            username varchar(100),
            password varchar(100),
            firstname varchar(100),
            lastname varchar(100),
            email varchar(100),
            address varchar(100),
            pincode varchar(20));";

     $temp = "SELECT TABLE_NAME FROM information_schema.tables WHERE table_schema = 'myStore'
        AND table_name = 'Users'";
    //Code to see if Table Exists
    $exists = $conn->query($temp);
    $res = $conn->query($temp)->fetchAll(PDO::FETCH_ASSOC);
    if(count($res) == 0)
    {
       $conn->exec($sql);
       echo "Users created successfully".'<br>';
    }
    else{
    //    echo("Users table exist".'<br>');

    }
    
    

    $sql = "CREATE TABLE Products(
            product_id int(50),
            product_name varchar(100),
            product_image varchar(100),
            product_category ENUM('electronics','fashion','home appliances','furniture','jewellery'),
            product_sale_price varchar(20),
            product_list_price varchar(20));";

    $temp = "SELECT TABLE_NAME FROM information_schema.tables WHERE table_schema = 'myStore'
        AND table_name = 'Products'";
    //Code to see if Table Exists
    $exists = $conn->query($temp);
    $res = $conn->query($temp)->fetchAll(PDO::FETCH_ASSOC);
    if(count($res) == 0)
    {
       $conn->exec($sql);
       echo "Products created successfully".'<br>';
    }
    else{
    //    echo("Products table exist".'<br>');

    }


    $sql = "CREATE TABLE Orders(
        order_id int(50),
        user_id int(50),
        status ENUM('pending','approved','delivered'),
        total_amount varchar(20),
        shipping_address varchar(100),
        shipping_pincode varchar(50),
        order_date datetime,
        delivery_date datetime)";

    $temp = "SELECT TABLE_NAME FROM information_schema.tables WHERE table_schema = 'myStore'
        AND table_name = 'Orders'";
    //Code to see if Table Exists
    $exists = $conn->query($temp);
    $res = $conn->query($temp)->fetchAll(PDO::FETCH_ASSOC);
    if(count($res) == 0)
    {
    $conn->exec($sql);
    echo "Orders created successfully".'<br>';
    }
    else{
    // echo("Orders table exist".'<br>');

    }

    // echo "All Done";

 
} 
catch(PDOException $e) 
{
    // echo "<SCRIPT>alert($e->getMessage());</SCRIPT>";
  echo "Connection failed: " . $e->getMessage();
}
?>