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
                    <input type="text" class="search-box" placeholder="search">
                    <div class="nav-items">
                        <img src="img/home.PNG" class="icon" alt="">
                        <img src="img/messenger.PNG" class="icon" alt="">
                        <img src="img/add.PNG" class="icon" alt="">
                        <img src="img/explore.PNG" class="icon" alt="">
                        <img src="img/like.PNG" class="icon" alt="">
                        <a href="profile.php">
                            <div class="icon user-profile">
                            </div>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </header>


    <div class="container">

        <div class="profile">
            <div class="profile-image">
                <img id="userpicid" style="max-width: 400px;" src="" alt="">
            </div>
            <div class="profile-user-settings">
                <h1 class="profile-user-name" id="usernameid"></h1>
                <button id="requestBtn" class="btn profile-edit-btn">Send Request</button>
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
            showProfileTemp();

            function showProfileTemp() {
                $.ajax({
                    url: "homeserver.php",
                    type: "POST",
                    data: {
                        temp_profile: "Show"
                    },
                    success: function(result) {
                        console.log(result);

                        var u = JSON.parse(result);
                        var values = u['user'];
                        var req = u['req'];

                        var uid = values[0]['user_id'];
                        var uname = values[0]['user_name'];
                        var fullname = values[0]['fullname'];
                        var upic = values[0]['user_pic'];

                        $("#userpicid").attr('src', upic);
                        $("#usernameid").html(uname);
                        $("#fullnameid").html(fullname);
                        if (req.length != 0) 
                        {
                            var sent = req[0]['request_id'];
                            if (sent == uid) {
                                $("#requestBtn").html('Requsted for friend');
                            }
                        }

                    }
                });
            }

            $(document).on('click', '#requestBtn', function() {
                var uname = $(this).prev().text();
                alert(uname);
                $.ajax({
                    url: 'homeserver.php',
                    type: "POST",
                    data: {
                        sendreq: uname
                    },
                    success: function(result) {
                        alert(result);
                        showProfileTemp();
                    }
                });
            });
        });
    </script>
</body>

</html>