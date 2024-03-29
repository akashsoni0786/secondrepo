<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="home.css">
    <title>profile</title>
</head>

<body>
    <header>
        <div class="wrapper">
            <nav class="navbar">
                <div class="nav-wrapper">
                    <img src="img/logo.PNG" class="brand-img" alt="">
                    <div class="nav-items">
                        <a href="home.php">
                            <img src="img/home.PNG" class="icon" alt="">
                        </a>
                        <a href="findfriends.php">
                            <img src="img/messenger.PNG" class="icon" alt="">
                        </a>
                        <!-- <a href="findfriends.php">

                        <img src="img/add.PNG" class="icon" alt=""></a> -->

                        <a href="logout.php">
                            <img src="img/explore.PNG" class="icon" alt="">
                        </a>                        <!-- <img src="img/like.PNG" class="icon" alt=""> -->
                        <a href="profile.php">
                            <img src="img/user.png" class="icon" alt="">

                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </header>


    <div class="container">

        <div class="profile">
            <div class="profile-image" >
                <img style="max-width: 400px;" id="userpicid" src="" alt="">
            </div>
            <div class="profile-user-settings">
                <h1 class="profile-user-name" id="usernameid"></h1>
                <button class="btn profile-edit-btn" id="muteOrunmute">0</button>
                <button class="btn profile-settings-btn" aria-label="profile settings">
                    <i class="fas fa-cog" aria-hidden="true"></i></button>
            </div>
            <div class="profile-stats">
                <ul>
                    <li><span class="profile-stat-count">164</span> posts</li>
                    <li><span class="profile-stat-count">188</span> followers</li>
                    <li><span class="profile-stat-count">206</span> following</li>
                </ul>
            </div>
            <div class="profile-bio">
                <p><span class="profile-real-name" id="fullnameid"></span> Lorem ipsum dolor sit, amet consectetur adipisicing elit 📷✈️🏕️</p>
            </div>
        </div>
    </div>
    </header>



    <script>
        $(document).ready(function() {
            showProfilefriend();

            function showProfilefriend() {
                $.ajax({
                    url: "homeserver.php",
                    type: "POST",
                    data: {
                        friend_profile: true
                    },
                    success: function(result) {
                        console.log(JSON.parse(result));
                        var u = JSON.parse(result);
                        values = u['user'];
                        friend = u['friend'];

                        console.log(values);
                        var uname = values[0]['user_name'];
                        var fullname = values[0]['fullname'];
                        var upic = values[0]['user_pic'];
                        var muting = friend[0]['muting'];

                        // console.log(muting);

                        $("#userpicid").attr('src', upic);
                        $("#usernameid").html(uname);
                        $("#fullnameid").html(fullname);
                        $("#muteOrunmute").html(muting);
                    }
                });
            }

        
            $("#muteOrunmute").click(function() {
                var uname = $(this).prev().text();
                var mute = $(this).text();
                alert(uname);
                $.ajax({
                    url: 'homeserver.php',
                    type: "POST",
                    data: {
                        usernameforMute: uname,
                        status: mute
                    },
                    success: function(result) {
                        console.log(result);
                        showProfilefriend();

                    }

                });
            });
        });
    </script>
</body>

</html>