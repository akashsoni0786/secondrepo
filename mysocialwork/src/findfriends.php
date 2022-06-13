<?php
session_start();
include 'connection.php';
try 
{
    $sql = 'SELECT * FROM `Posts` WHERE 1';
    $rows = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
} 
catch (PDOException $e) 
{
    echo $e;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>friends</title>
</head>
<body>
    <section class="main">
        <div class="wrapper">
            <nav class="navbar">
                <div class="nav-wrapper">
                    <img src="img/logo.PNG" class="brand-img" alt="">
                    <div class="nav-items">
                        <img src="img/home.PNG" class="icon" alt="">
                        <img src="img/messenger.PNG" class="icon" alt="">
                        <img src="img/add.PNG" class="icon" alt="">
                        <img src="img/explore.PNG" class="icon" alt="">
                        <img src="img/like.PNG" class="icon" alt="">
                        <a href="profile.php">
                            <div class="icon user-profile"></div>
                        </a>
                    </div>
                </div>
            </nav>
            <div class="left-col">
                <input type="text" style="padding: 1%;margin:3%" id="searchbarId" placeholder="search">
                <div id="searchresultTable"></div>
            </div>
            <div class="right-col ">
                <div class="profile-card">
                    <div class="profile-pic">
                        <img src="img/profile-pic.png" alt="">
                    </div>
                    <div>
                        <p class="username">alinalaina</p>
                        <p class="sub-text">Alina Williams</p>
                    </div>
                    <button class="action-btn">switch</button>
                </div>
                <p class="suggestion-text">You are followed by </p>
                <span id="listOfMyFriends"></span>
            </div>
        </div>
    </section>


  
    <script>
        $(document).ready(function() {
            $(document).on('keyup', "#searchbarId", function() {
                var searchtext = $("#searchbarId").val();
                $.ajax({
                    url: 'homeserver.php',
                    type: "POST",
                    data: {
                        searchNames: searchtext
                    },
                    success: function(result) {
                        var searchedpeople = JSON.parse(result);
                        console.log(searchedpeople);
                        const len = $("#searchbarId").val().length;
                        var row = '<span hidden> <div  class="profile-card"><div class="profile-pic">'+
                            '<img src="img/cover 9.png" alt=""> </div><div>'+
                            '<p class="username">modern_web_channel</p>'+
                            '<p class="sub-text">followed bu user</p>'+
                        '</div><button class="action-btn">follow</button></div></span>';
                        if(searchtext != "")
                        {
                            searchedpeople.forEach(i => {
                            if (searchtext.toLowerCase() == i['user_name'].slice(0, len)) 
                            {
                                row += '<div class="profile-card"><div class="profile-pic">' +
                                    '<img id="' + i['user_id'] + '"  src="' + i['user_pic'] 
                                    + '" alt="" class="viewDetailsTemp"></div><div>' +
                                    '<p>' + i['user_name'] + '</p>' +
                                    '<p class="sub-text">followed bu user</p></div>' +
                                    '<button type="button" class="action-btn viewDetails" id="' 
                                    + i['user_id'] + '">follow</button></div>';

                            }
                            else if (searchtext.toLowerCase() == i['email'].slice(0, len)) 
                            {
                                row += '<div class="profile-card"><div class="profile-pic">' +
                                    '<img id="' + i['user_id'] + '" src="' +
                                     i['user_pic'] + '" alt="" class="viewDetailsTemp"></div><div>' +
                                    '<p>' + i['user_name'] + '</p>' +
                                    '<p class="sub-text">followed bu user</p></div>' +
                                    '<button type="button" class="action-btn viewDetails" id="' 
                                    + i['user_id'] + '">follow</button></div>';
                            }
                            

                        });
                        $("#searchresultTable").html(row);

                        }
                        else{
                            showAllUsers();
                        }
                    }
                });
            });
            listOfFriends();
            function listOfFriends()
            {
                $.ajax({
                    url: 'homeserver.php',
                    type: "POST",
                    data: {
                        showMyfriends: "MyFriends"
                    },
                    success: function(result) 
                    {
                        var myfriends = JSON.parse(result);
                        var row = '<span hidden> <div  class="profile-card"><div class="profile-pic">'+
                            '<img src="img/cover 9.png" alt=""> </div><div>'+
                            '<p class="username">modern_web_channel</p>'+
                            '<p class="sub-text">followed bu user</p>'+
                        '</div><button class="action-btn">follow</button></div></span>';
                        myfriends.forEach(i => {
                            row += '<div class="profile-card"><div class="profile-pic">' +
                                    '<img class="viewDetailsfriends" id="' 
                                    + i['user_id'] + '"  src="' +
                                     i['user_pic']+ '" alt="" ></div><div>' +
                                    '<p>' + i['fullname'] + '</p>' +
                                    '<p class="sub-text">' + i['user_name'] + '</p></div></div>';
                        })

                        $("#listOfMyFriends").html(row);
                    }
                });

            }
            $(document).on('click','.viewDetails',function()
            {
                var id = $(this).attr('id');
                $.ajax({
                    url : 'homeserver.php',
                    type : "POST",
                    data : {viewDetails : id},
                    success : function(result)
                    {
                        console.log(result);
                    }
                });
            });
            showAllUsers();
            function showAllUsers(){
                var searchtext = $("#searchbarId").val();
                $.ajax({
                    url: 'homeserver.php',
                    type: "POST",
                    data: {
                        searchNames: "searchtext"
                    },
                    success: function(result) {
                        var allUsers = JSON.parse(result);
                        console.log(allUsers);
                        const len = $("#searchbarId").val().length;
                        var row = '<span hidden> <div  class="profile-card"><div class="profile-pic">'+
                            '<img src="img/cover 9.png" alt=""> </div><div>'+
                            '<p class="username">modern_web_channel</p>'+
                            '<p class="sub-text">followed bu user</p>'+
                        '</div><button class="action-btn">follow</button></div></span>';
                        row += '<div>Top searched..</div><br>';
                        if(searchtext == ''){
                        allUsers.forEach(i => 
                            {
                                row += '<div class="profile-card"><div class="profile-pic">' +
                                    '<img id="' + i['user_id'] + '" src="' + i['user_pic']+ '" alt="" class="viewDetailsTemp"></div><div>' +
                                    '<p>' + i['user_name'] + '</p>' +
                                    '<p class="sub-text">followed bu user</p></div>' +
                                    '<button type="button" class="action-btn viewDetails" id="' + i['user_id'] + '">follow</button></div>';

                            });
                        $("#searchresultTable").html(row);
                        }

                    }
                });
            }
        $(document).on('click','.viewDetailsTemp',function()
        {
            var id = $(this).attr('id');
            // alert(id);
            $.ajax({
                    url: 'homeserver.php',
                    type: "POST",
                    data: {
                        showProfile: id
                    },
                    success: function(result) {
                        // console.log(result);
                        // alert(result);
                        window.location = "tempprofile.php";
                    } 
                });
        });

        $(document).on('click','.viewDetailsfriends',function()
        {
            var id = $(this).attr('id');
            // alert(id);
            $.ajax({
                    url: 'homeserver.php',
                    type: "POST",
                    data: {
                        showProfile: id
                    },
                    success: function(result) 
                    {
                        // console.log(result);
                        // alert(result);
                        window.location = "friendprofile.php";
                    } 
                });
        });
        });
    </script>
</body>

</html>