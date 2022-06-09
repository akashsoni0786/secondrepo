<?php
session_start();
include 'connection.php';
if (isset($_POST['orders'])) {
  try {

    $temp = "SELECT * FROM `Orders` WHERE 1";
    $res = $conn->query($temp)->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}

if (isset($_POST['order_ids'])) {
  $oId = $_POST['order_ids'];
  try {

    $temp = "DELETE FROM `Orders` WHERE `Orders`.`order_id` = '$oId'";
    $conn->query($temp)->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}


if (isset($_POST['order_ids_next_page'])) {
  $o_id = $_POST['order_ids_next_page'];
  // var_dump($o_id);
  $_SESSION['order_id_for_products'] = $o_id;
}

if (isset($_POST['order_items_page'])) {
  $id = $_SESSION["order_id_for_products"];

  try {

    $temp = "SELECT * FROM `Order_items` WHERE `order_id` = '$id'";
    //Code to see if Table Exists
    $res = $conn->query($temp)->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}
if (isset($_POST['prp_ids'])) {
  $pId = $_POST['prp_ids'];
  try {

    $temp = "DELETE FROM `Products` WHERE `Products`.`product_id` = '$pId'";
    $res = $conn->query($temp)->fetchAll(PDO::FETCH_ASSOC);
    if ($res == 1) {
      echo 1;
    } else {
      echo 0;
    }
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}
if (isset($_POST['order_id_for_status_change_in_orderpage'])) {
  $_SESSION['o_id_for_status_change'] = $_POST['order_id_for_status_change_in_orderpage'];
}
if (isset($_POST['order_status_change'])) {

  $status = $_POST['order_status_change'];
  $id = $_SESSION['o_id_for_status_change'];
  echo $id;
  try {
    $sql = "UPDATE  `Orders`
        SET `status` = '$status'
        WHERE `Orders`.`order_id` = '$id';";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo "Done";
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}


if (isset($_POST['ordersDboard'])) {
  try {
    $temp = "SELECT * FROM `Orders` WHERE 1 ORDER BY `order_id` DESC LIMIT 5";
    $res = $conn->query($temp)->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}
