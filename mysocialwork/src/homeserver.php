<?php
session_start();
include 'connection.php';
if(isset($_POST['showallposts']))
{
    try 
    {
        // $sql = 'SELECT * FROM `Posts` WHERE 1';
        $sql = 'SELECT Posts.user_id,Posts.post_img,
        Posts.post_desc,Posts.likes,Posts.post_comments, 
        Users.user_pic,Users.user_name 
        FROM Posts JOIN Users on Users.user_id = Posts.user_id 
        JOIN Friends on Friends.friend_id = Posts.user_id';
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
        // $sql ="SELECT Users.user_name,Users.user_pic,Users.fullname 
        // FROM Users, Friends where Users.user_id!='111' 
        // and Users.user_id NOT IN (SELECT friend_id from Friends);";
        $sql = 'SELECT * FROM `Users` WHERE 1';
        $res = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        ob_end_clean();
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
        
        $conn->query($sql);
        $conn->query($rem);
        echo "Accepted";
    }
    catch(PDOException $e){
        echo "Connection error :". $e->getMessage();
    }
}

if(isset($_POST['showMyfriends']))
{
    try
    {
        $sql ="SELECT Friends.friend_id,Users.fullname,Users.user_name,Users.user_id,
        Users.user_pic FROM `Friends` INNER JOIN Users on Users.user_id = Friends.friend_id 
            WHERE Friends.user_id= '111'";
        $res = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($res);
    }
    catch(PDOException $e)
    {
        echo "Connection error :". $e->getMessage();
    }
}
if(isset($_POST['viewDetails']))
{
    $id = $_POST['viewDetails'];
    try 
    {
        $sql = "SELECT * FROM `Users` WHERE user_id = '$id'";
        $rows = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $uname = $rows[0]['user_name'];
        $upic = $rows[0]['user_pic'];
        $sql = "INSERT INTO `Request`(`user_id`, `request_id`, `acceptornot`, `request_name`, `request_img`) 
                VALUES ('111', '$id', '0','$uname','$upic');";
        $conn->exec($sql);
        echo 'Done';
    } 
    catch (PDOException $e) {
        echo $e;
    }
}
if(isset($_POST['showProfile']))
{
    $_SESSION['temp_Id'] = $_POST['showProfile'];
    echo $_SESSION['temp_Id'];
}
if(isset($_POST["temp_profile"]))
{
    $id = $_SESSION['temp_Id'];
    // echo $id;
    try 
    {
        $sql = "SELECT * FROM `Users` WHERE user_id = '$id'";
        $rows = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($rows);
    } 
    catch (PDOException $e) 
    {
        echo $e;
    }
}
if(isset($_POST["usernameforMute"]))
{
    $username = $_POST['usernameforMute'];
    $status = $_POST['status'];
    $i;
    if($status== "Mute")
    {
        $i="Unute";
    }
    else
    {
        $i="Mute";
    }
    try 
    {
        $sql = "SELECT user_id FROM Users WHERE user_name= '$username'";
        $uid = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $userID = $uid[0]['user_id'];
        $sql = "UPDATE `Friends` SET `muting` = '$i' 
        WHERE `Friends`.`friend_id`= '$userID'";
        $conn->query($sql);
        echo 'Done';
    } 
    catch (PDOException $e) 
    {
        echo $e;
    }
}
// 
if(isset($_POST["mutestatus"]))
{
    $status = $_SESSION['mutestatus'];
    // echo $id;
    try 
    {
        $sql = "SELECT muting FROM `Friends` WHERE user_id = '$id'";
        $rows = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($rows);
    } 
    catch (PDOException $e) 
    {
        echo $e;
    }
}
?>

