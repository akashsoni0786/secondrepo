<?php
session_start();
include 'connection.php';
if(isset($_POST['firstName']))
{
  
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $email = $_POST['emails'];
    $address = $_POST['address'];
    $pin = $_POST['pin'];
    $password = $_POST['passwrd'];
    try 
    {
      $sql = "INSERT INTO `Users` (`user_id`, `password`, `firstname`, `lastname`, `email`, `address`, `pincode`) 
                VALUES (null, '$password', '$fname', '$lname', '$email', '$address', '$pin');";
      $temp = "SELECT `user_id` FROM `Users` WHERE `email` = '$email'";

        //Code to see if Table Exists
        $res = $conn->query($temp)->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['id'] = $res[0][0]['user_id'];
        if(count($res) == 0)
        {
          $conn->exec($sql);
          echo 1;
        }
        else
        {
          echo("User exists");
        }
    } 
    catch(PDOException $e) 
    {
      echo "Connection failed: " . $e->getMessage();
    }
}

if(isset($_POST['mail']))
{
  $mail = $_POST['mail'];
  $pass = $_POST['pass'];
    try 
    {

      $temp = "SELECT `user_id` FROM `Users` WHERE `email` = '$mail' AND `password`= '$pass'";
        //Code to see if Table Exists
        $exists = $conn->query($temp);      
        $res = $conn->query($temp)->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['id'] = $res[0]['user_id']; 
        if(count($res) == 1)
        {
          echo 1;
        }
        else
        {
          echo("Invalid Credentials");
        }
    } 
    catch(PDOException $e) 
    {
      echo "Connection failed: " . $e->getMessage();
    }
}
?>