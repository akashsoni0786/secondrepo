<?php
session_start();
include 'connection.php';
try {
    $sql = 'SELECT * FROM `Posts` WHERE 1';
    $rows = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
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



                <div class="profile-card">
                    <div class="profile-pic">
                        <img src="img/cover 9.png" alt="">
                    </div>
                    <div>
                        <p class="username">modern_web_channel</p>
                        <p class="sub-text">followed bu user</p>
                    </div>
                    <button class="action-btn">follow</button>
                </div>



                <div class="profile-card">
                    <div class="profile-pic">
                        <img src="img/cover 10.png" alt="">
                    </div>
                    <div>
                        <p class="username">modern_web_channel</p>
                        <p class="sub-text">followed bu user</p>
                    </div>
                    <button class="action-btn">follow</button>
                </div>



                <div class="profile-card">
                    <div class="profile-pic">
                        <img src="img/cover 11.png" alt="">
                    </div>
                    <div>
                        <p class="username">modern_web_channel</p>
                        <p class="sub-text">followed bu user</p>
                    </div>
                    <button class="action-btn">follow</button>
                </div>



                <div class="profile-card">
                    <div class="profile-pic">
                        <img src="img/cover 12.png" alt="">
                    </div>
                    <div>
                        <p class="username">modern_web_channel</p>
                        <p class="sub-text">followed bu user</p>
                    </div>
                    <button class="action-btn">follow</button>
                </div>



                <div class="profile-card">
                    <div class="profile-pic">
                        <img src="img/cover 13.png" alt="">
                    </div>
                    <div>
                        <p class="username">modern_web_channel</p>
                        <p class="sub-text">followed bu user</p>
                    </div>
                    <button class="action-btn">follow</button>
                </div>



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
                        if(searchtext != ""){
                            searchedpeople.forEach(i => {
                            if (searchtext.toLowerCase() == i['user_name'].slice(0, len)) 
                            {
                                row += '<div class="profile-card"><div class="profile-pic">' +
                                    '<img src="img/cover 9.png" alt=""></div><div>' +
                                    '<p>' + i['user_name'] + '</p>' +
                                    '<p class="sub-text">followed bu user</p></div>' +
                                    '<button class="action-btn">follow</button></div>';

                            }
                            else if (searchtext.toLowerCase() == i['email'].slice(0, len)) 
                            {
                                row += '<div class="profile-card"><div class="profile-pic">' +
                                    '<img src="img/cover 9.png" alt=""></div><div>' +
                                    '<p>' + i['user_name'] + '</p>' +
                                    '<p class="sub-text">followed bu user</p></div>' +
                                    '<button class="action-btn">follow</button></div>';
                            }

                        });
                        }
                        
                        $("#searchresultTable").html(row);

                    }

                });

            });


        });
    </script>
</body>

</html>