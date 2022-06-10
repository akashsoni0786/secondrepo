<?php
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
    $pwd = $arr['pwd'];
    $conpwd = $arr['conpwd'];
    var_dump($arr);

    try
    {
        $sql = "INSERT INTO `Users` (`user_name`, `fullname`, `email`, `mobile`, `city`, `pin`, `password`) 
        VALUES ('$username', '$name', '$email', '$mobnumber', '$city', '$pincode', '$pwd');";
        $conn->exec($sql);
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
    var_dump($arr);

    try
    {
        $sql = "SELECT `user_id` FROM `Users` 
                WHERE `user_name`='$username' AND `password`='$pwd'";
        // $conn->query($sql);
        $row = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        if(count($row) == 1){

            echo true;
        }
        else
        {
            echo false;
        }
        // echo "Successfully Inserted";
    }
    catch(PDOException $e){
        echo "Error : ".$e;
    }
}
// echo "Done";
?>