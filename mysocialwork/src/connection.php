<?php
$servername = "mysql-server";
$username = "root";
$password = "secret";
$db = "mySocial";

try
    {
        $conn = new PDO("mysql:host=$servername;dbname=$db",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        // echo "Connection established";
    }
catch(PDOException $e)
    {
        echo "Connection error : ".$e->getMessage();
    }
?>