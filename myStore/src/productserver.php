<?php
session_start();
include 'connection.php';
if(isset($_POST['product']))
{
    try 
    {

      $temp = "SELECT * FROM `Products` WHERE 1";
        //Code to see if Table Exists
      $res = $conn->query($temp)->fetchAll(PDO::FETCH_ASSOC);
      echo json_encode($res);
    } 
    catch(PDOException $e) 
    {
      echo "Connection failed: " . $e->getMessage();
    }
}

if(isset($_POST['prp_ids']))
{
    $pId = $_POST['prp_ids'];
    try 
    {

      $temp = "DELETE FROM `Products` WHERE `Products`.`product_id` = '$pId'";
      $res = $conn->query($temp)->fetchAll(PDO::FETCH_ASSOC);
      if($res == 1){
          echo 1;
      }
      else{
          echo 0;
      }
    
    } 
    catch(PDOException $e) 
    {
      echo "Connection failed: " . $e->getMessage();
    }
}

if(isset($_POST['edits']))
{
 
    $pId = $_POST['edits'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $sale = $_POST['sale'];
    $list = $_POST['list'];
    $quantity = $_POST['quantity'];
    try 
    {
      $sql = "UPDATE  `Products`
        SET `product_id` = '$pId', `product_name` = '$name',`product_category`='$category',
        `product_sale_price`='$sale',`product_list_price`='$list',`product_quantity`= '$quantity'
        WHERE `Products`.`product_id` = '$pId';";
      $stmt= $conn->prepare($sql);
      $stmt->execute();
      echo "Done";
    } 
    catch(PDOException $e) 
    {
      echo "Connection failed: " . $e->getMessage();
    }
}


if(isset($_POST['pName']))
{
    $pname = $_POST['pName'];
    $pimg = $_POST['pImg'];
    $pcategory = $_POST['pCat'];
    // var_dump($pcategory);
    $pSalePrice = $_POST['pSale'];
    $pListPrice = $_POST['pList'];
    $quant = $_POST['pQuant'];
    try 
    {
        $sql = "INSERT INTO `Products` (`product_id`, `product_name`, `product_image`,
                `product_category`, `product_sale_price`, `product_list_price`,`product_quantity`) 
                VALUES (null, '$pname','$pimg','$pcategory', '$pSalePrice', '$pListPrice','$quant');";
                $conn->exec($sql);
                echo 'Data inserted successfully';
    } 
    catch(PDOException $e) 
    {
      echo "Connection failed: " . $e->getMessage();
    }
}


if(isset($_POST['productDboard']))
{
    try 
    {

      $temp = "SELECT * FROM `Products` WHERE 1 ORDER BY `product_id` DESC LIMIT 5";
        //Code to see if Table Exists
      $res = $conn->query($temp)->fetchAll(PDO::FETCH_ASSOC);
      echo json_encode($res);
    } 
    catch(PDOException $e) 
    {
      echo "Connection failed: " . $e->getMessage();
    }
}
?>