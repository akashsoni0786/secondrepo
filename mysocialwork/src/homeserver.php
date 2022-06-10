<?php
include 'connection.php';
if(isset($_POST['showallposts']))
{
    try 
    {
        $sql = 'SELECT * FROM `Posts` WHERE 1';
        $rows = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($rows);
    } 
    catch (PDOException $e) {
        echo $e;
    }
}

if(isset($_POST['searchNames']))
{
    try
    {
        $sql ="SELECT * FROM `Users`";
        $res = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($res);
    }
    catch(PDOException $e){
        echo "Connection error :". $e->getMessage();
    }
}

if(isset($_POST['showrequests']))
{
    try
    {
        $sql ="SELECT * FROM `Request`";
        $res = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($res);
    }
    catch(PDOException $e){
        echo "Connection error :". $e->getMessage();
    }
}

if(isset($_POST['acceptReq']))
{
    $id = $_POST['acceptReq'];
    echo $id;
    try
    {
        $sql ="INSERT INTO `Friends` (`user_id`, `friend_id`, `muting`) 
                VALUES ('111', '$id', '0')";
        $rem ="DELETE FROM Request WHERE request_id='$id'";
        
        // $conn->query($sql);
        // $conn->query($rem);
        echo "Accepted";
    }
    catch(PDOException $e){
        echo "Connection error :". $e->getMessage();
    }
}
?>