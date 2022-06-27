<?php
session_start();
include 'connection.php';
if(isset($_POST['formdata']))
{
    parse_str(json_decode($_POST['formdata']),$arr);
    $name = $arr['fullname'];
    $username = $arr['username'];
    $email = $arr['email'];
    $mobnumber = $arr['mobilenumber'];
    $city = $arr['city'];
    $pincode = $arr['pincode'];
    $pwd = $arr['passwords'];
    $conpwd = $arr['confirmpassword'];
    // var_dump($arr);

    try
    {
        $sql = "INSERT INTO `Users` (`user_name`, `fullname`, `email`, `mobile`, `city`, `pin`, `password`,`user_pic`) 
        VALUES ('$username', '$name', '$email', '$mobnumber', '$city', '$pincode', '$pwd','img/user.png');";
        $conn->exec($sql);

        $id = $conn->lastInsertId();
        $selffrnd ="INSERT INTO `Friends` (`user_id`, `friend_id`, `muting`) 
        VALUES ('$id', '$id', 'Unmute')";
        $conn->exec($selffrnd);

        echo "Successfully Inserted";
    }
    catch(PDOException $e){
        echo "Error : ".$e;
    }
}

if(isset($_POST['signindata']))
{
    parse_str(json_decode($_POST['signindata']),$arr);
    $username = $arr['usernamesignin'];
    $pwd = $arr['passwordsignin'];

    try
    {
        $sql = "SELECT `user_id` FROM `Users` 
                WHERE `user_name`='$username' AND `password`='$pwd'";
        $row = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        

        if(count($row) == 1)
        {
            $_SESSION['uid'] = $row[0]['user_id'];
            echo "Done";
        }
        else
        {
            echo "Not exist";
        }
    }
    catch(PDOException $e){
        echo "Error : ".$e;
    }
}
?>