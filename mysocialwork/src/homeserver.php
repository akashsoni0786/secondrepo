<?php
session_start();
include 'connection.php';
if(isset($_POST['showallposts']))
{
    try 
    {
        // $sql = 'SELECT * FROM `Posts` WHERE 1';
        $sql = "SELECT  Posts.post_id,Posts.post_media_type,Posts.user_id,Posts.post_img,
        Posts.post_desc,Posts.likes, 
        Users.user_pic,Users.user_name 
        FROM Posts JOIN Users on Users.user_id = Posts.user_id 
        JOIN Friends on Friends.friend_id = Posts.user_id
        ORDER BY Posts.post_id DESC" ;
        $rows = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($rows);
    } 
    catch (PDOException $e) 
    {
        echo $e;
    }
}

if(isset($_POST['showmyposts']))
{
    $uid = $_SESSION['uid'];

    try 
    {
        $sql = "SELECT  Posts.post_id,Posts.post_media_type,Posts.user_id,Posts.post_img,
        Posts.post_desc,Posts.likes, 
        Users.user_pic,Users.user_name 
        FROM Posts JOIN Users on Users.user_id = Posts.user_id 
        WHERE Posts.user_id = '$uid' ORDER BY Posts.post_id DESC";
        $rows = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($rows);
    } 
    catch (PDOException $e) {
        echo $e;
    }
}

if(isset($_POST['searchNames']))
{
    $id = $_SESSION['uid'];
    try
    {
        $sql ="SELECT Users.user_id,Users.user_name,Users.user_pic,Users.fullname 
                FROM Users where Users.user_id <> $id 
                and Users.user_id NOT IN (SELECT friend_id from Friends);";
        // $sql = 'SELECT * FROM `Users` WHERE 1';
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
    $id = $_SESSION['uid'];
    try
    {
        $sql ="SELECT * FROM `Request` WHERE `request_id` = '$id'";
        $res = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($res);
    }
    catch(PDOException $e){
        echo "Connection error :". $e->getMessage();
    }
}
 
if(isset($_POST['acceptUname']))
{
    $uname = $_POST['acceptUname'];
    $uid = $_SESSION['uid'];
    try
    {
        $usr = "SELECT * FROM `Users` WHERE `user_name` = '$uname'";
        $res = $conn->query($usr)->fetchAll(PDO::FETCH_ASSOC);
        $id = $res[0]['user_id'];
        $sql ="INSERT INTO `Friends` (`user_id`, `friend_id`, `muting`) 
                VALUES ('$uid', '$id', 'Unmute')";
        $sql2  ="INSERT INTO `Friends` (`user_id`, `friend_id`, `muting`) 
        VALUES ('$id', '$uid', 'Unmute')";

        $rem ="DELETE FROM `Request` WHERE request_id='$id'";

        $conn->query($sql);
        $conn->query($sql2);
        $conn->query($rem);
        echo "Accepted";
    }
    catch(PDOException $e)
    {
        echo "Connection error :". $e->getMessage();
    }
}
if(isset($_POST['acceptReq']))
{
    $id = $_POST['acceptReq'];
    $uid = $_SESSION['uid'];
    echo $id;
    try
    {
        $sql ="INSERT INTO `Friends` (`user_id`, `friend_id`, `muting`) 
                VALUES ('$uid', '$id', 'Unmute')";
        $sql2 ="INSERT INTO `Friends` (`user_id`, `friend_id`, `muting`) 
        VALUES ('$id', '$uid', 'Unmute')";
        $rem ="DELETE FROM Request WHERE request_id='$id'";
        
        $conn->query($sql);
        $conn->query($sql2);
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
    $sid = $_SESSION['uid'];
    try 
    {
        $sql = "SELECT * FROM `Users` WHERE user_id = '$id'";
        $rows = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $uname = $rows[0]['user_name'];
        $upic = $rows[0]['user_pic'];
        $sql2 = "SELECT * FROM `Users` WHERE user_id = '$sid'";
        $rows2 = $conn->query($sql2)->fetchAll(PDO::FETCH_ASSOC);
        $sname = $rows2[0]['user_name'];
        $spic = $rows2[0]['user_pic'];
        $sql = "INSERT INTO `Request`(`user_id`,`user_name`,`user_img`, `request_id`, `request_name`, `request_img`) 
                VALUES ('$sid','$sname','$spic', '$id','$uname','$upic');";
        $req= "SELECT * FROM Request";
        $allReq = $conn->query($req)->fetchAll(PDO::FETCH_ASSOC);
        $k = NULL;
        foreach($allReq as $i)
        {
            if($i['user_id'] == $sid && $i['request_id'] == $id)
            {
                $k = "Yes";
            }
          
        }
        if($k == NULL)
        {
            $conn->exec($sql);
            echo 'Your friend request has been sent';
        }
        else{
            echo 'Already sent';
        }
        
    } 
    catch (PDOException $e) {
        echo $e;
    }
}

if(isset($_POST['sendreq']))
{
    $usrname = $_POST['sendreq'];

    $sid = $_SESSION['uid'];
    try 
    {
        $sql = "SELECT * FROM `Users` WHERE `user_name` = '$usrname'";
        $rows = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $id = $rows[0]['user_id'];
        $uname = $rows[0]['user_name'];
        $upic = $rows[0]['user_pic'];
        
        $sql2 = "SELECT * FROM `Users` WHERE user_id = '$sid'";
        $rows2 = $conn->query($sql2)->fetchAll(PDO::FETCH_ASSOC);

        $sname = $rows2[0]['user_name'];
        $spic = $rows2[0]['user_pic'];
        

        $sql = "INSERT INTO `Request`(`user_id`,`user_name`,`user_img`, `request_id`, `request_name`, `request_img`) 
                VALUES ('$sid','$sname','$spic', '$id','$uname','$upic');";
                // print_r($sql);
                // die;
        $conn->exec($sql);
        echo 'Your friend request has been sent';
    } 
    catch (PDOException $e) {
        echo $e;
    }
}

if(isset($_POST['showProfile']))
{
    $_SESSION['temp_Id'] = $_POST['showProfile'];
    $_SESSION['request_Id_for_friend'] = $_POST['showProfile'];
    echo $_SESSION['temp_Id'];
}
if(isset($_POST["temp_profile"]))
{
    $id = $_SESSION['temp_Id'];
    $fid = $_SESSION['uid'];
    try 
    {
        $sql = "SELECT * FROM `Users` WHERE user_id = '$id'";
        $rows = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $fid = $rows[0]['user_id'];
        $user = json_encode($rows);
        $sql2 = "SELECT * FROM `Request` WHERE request_id = '$fid'";
        $req = $conn->query($sql2)->fetchAll(PDO::FETCH_ASSOC);
        $arr = array("req" => $req,'user' => $rows);
        echo json_encode($arr);
    } 
    catch (PDOException $e) 
    {
        echo $e;
    }
}

if(isset($_POST["friend_profile"]))
{
    $id = $_SESSION['temp_Id'];
    $uid = $_SESSION['uid'];
    try 
    {
        $sql = "SELECT * FROM `Users` WHERE user_id = '$id'";
        $rows = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $fid = $rows[0]['user_id'];

        $user = json_encode($rows);
        $sql2 = "SELECT * FROM `Friends` WHERE `user_id` = '$uid'";
        $f = $conn->query($sql2)->fetchAll(PDO::FETCH_ASSOC);
        $arr = array("friend" => $f,'user' => $rows);
        echo json_encode($arr);
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
    $id = $_SESSION['uid'];
    $i;
    if($status== "Mute")
    {
        $i="Unmute";
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
        $sql2 = "UPDATE `Friends` SET `muting` = '$i' 
        WHERE `Friends`.`friend_id`= '$id' AND `Friends`.`user_id` = '$userID'";
        $conn->query($sql2);
        echo 'Done';
    } 
    catch (PDOException $e) 
    {
        echo $e;
    }
}

 
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

if(isset($_POST['commentInput']))
{
    $comment = $_POST['commentInput'];
    $pid = $_POST['post_id'];
    $uid = $_SESSION['uid'];
    try{
        $sql = "INSERT INTO `Comments` (`post_id`, `user_id`, `comments`) 
                VALUES ($pid, '$uid', '$comment');";
        $conn->query($sql);
        echo 'Comment Successfull';
    }
    catch(PDOException $e){
        echo $e;
    }

}



if(isset($_POST['postIdForDetails']))
{
    $_SESSION['detailsOfPost'] = $_POST['postIdForDetails'];
}
if(isset($_POST['showsinglepost']))
{
    $pid = $_SESSION['detailsOfPost'];
    try
    {
        $sql = "SELECT  Posts.post_id,Posts.post_media_type,Posts.user_id,Posts.post_img,
        Posts.post_desc,Posts.likes, 
        Users.user_pic,Users.user_name 
        FROM Posts JOIN Users on Users.user_id = Posts.user_id 
        JOIN Friends on Friends.friend_id = Posts.user_id 
        WHERE `Posts`.`post_id`='$pid'";
        $rows = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($rows);
    }
    catch(PDOException $e)
    {
        echo $e;
    }

}

if(isset($_POST['showallComments']))
{
    $pid = $_SESSION['detailsOfPost'];

    try
    {
        $sql = "SELECT * FROM `Comments` WHERE post_id='$pid'";
        $rows = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $uid = $rows[0]['user_id'];
        $sql2 = "SELECT * FROM `Users`";
        $rows2 = $conn->query($sql2)->fetchAll(PDO::FETCH_ASSOC);
        $comuser = array('comm'=>$rows,'user'=>$rows2);
        echo json_encode($comuser);
    }
    catch(PDOException $e)
    {
        echo $e;
    }

}
?>

