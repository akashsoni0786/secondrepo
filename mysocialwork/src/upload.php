<?php 
session_start();
include 'connection.php';
if(isset($_POST['contentText'])){
    $content = $_POST['contentText'];
    $desc = $_POST['desc'];
    $uid = $_SESSION['uid'];
    // echo $uid;
    try
    {
        $sql ="INSERT INTO `Posts` (`post_img`,`post_media_type`, `post_desc`, `likes`, `user_id`) 
                    VALUES ('$content','image','$desc', '0', '$uid')";
        
        $conn->exec($sql);
       
        echo "Posted";
    }
    catch(PDOException $e){
        echo "Connection error :". $e->getMessage();
    }
}

if(isset($_FILES['post_img'])) 
{
    $img = $_FILES['post_img']['name'];
    $desc = $_POST['descriptionImg'];
    $uid = $_SESSION['uid'];
    echo $uid." ".$decs.' '.$img;
    // try
    // {
    //     $sql ="INSERT INTO `Posts` (`post_img`,`post_media_type`, `post_desc`, `likes`, `user_id`) 
    //                 VALUES ('$content','$desc', '0', '$uid')";
        
    //     $conn->exec($sql);
       
    //     echo "Posted";
    // }
    // catch(PDOException $e){
    //     echo "Connection error :". $e->getMessage();
    // }
}
?>