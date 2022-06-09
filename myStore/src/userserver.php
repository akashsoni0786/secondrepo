<?php
session_start();
include 'connection.php';
$id = $_SESSION['id'];
if($id == 111)
{
  if (isset($_POST['user'])) {

    try {
      $temp = "SELECT * FROM `Users` WHERE 1";
      $res = $conn->query($temp)->fetchAll(PDO::FETCH_ASSOC);
      echo json_encode($res);
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }
  
  if (isset($_POST['ids'])) {
    $uId = $_POST['ids'];
    try {
  
      $temp = "DELETE FROM `Users` WHERE `user_id` = '$uId';";
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
  
  if (isset($_POST['edits'])) {
    $uId = $_POST['edits'];
    $uFname = $_POST['first'];
    $uLname = $_POST['last'];
    $uMail = $_POST['mail'];
    $uArea = $_POST['area'];
    $uAreaPin = $_POST['areaPin'];
    try {
  
      $sql = "UPDATE  `Users`
          SET `firstname` = '$uFname', `lastname` = '$uLname',`email`='$uMail',`address`='$uArea',`pincode`='$uAreaPin'
          WHERE `Users`.`user_id` = '$uId';";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      echo "Done";
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }
  
  
  if (isset($_POST['location'])) {
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $mails = $_POST['emails'];
    $addres = $_POST['location'];
    $pin = $_POST['pinCode'];
    $password = 1234;
    // echo $uId;
    try {
      $sql = "INSERT INTO `Users` (`user_id`, `password`, `firstname`, `lastname`, `email`, `address`, `pincode`) 
          VALUES (null, '$password', '$fname', '$lname', '$mails', '$addres', '$pin');";
  
      $temp = "SELECT `user_id` FROM `Users` WHERE `email` = '$mails'";
  
      //Code to see if Table Exists
      $res = $conn->query($temp)->fetchAll(PDO::FETCH_ASSOC);
      // $_SESSION['id'] = $res[0][0]['user_id'];
      if (count($res) == 0) {
        $conn->exec($sql);
        echo 'Data inserted successfully';
        // header('Location:signin.php');
      } else {
        echo ("User already exists");
      }
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }
  if (isset($_POST['userDboard'])) {
    try {
  
      $temp = "SELECT * FROM `Users` WHERE 1 ORDER BY `user_id` DESC LIMIT 5";
      //Code to see if Table Exists
      $res = $conn->query($temp)->fetchAll(PDO::FETCH_ASSOC);
      echo json_encode($res);
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }
}
else{
  echo "you are not admin";
}
?>