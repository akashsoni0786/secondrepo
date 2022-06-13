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
                        <a href="profile.php"><div class="icon user-profile">
                        </div></a>
                    </div>
                </div>
            </nav></div>
</header>


<div class="container">

    <div class="profile">
        <div class="profile-image">
            <img id="userpicid" src="" alt="">
        </div>
        <div class="profile-user-settings">
            <h1 class="profile-user-name" id="usernameid"></h1>
            <button class="btn profile-edit-btn" id="muteOrunmute">Mute</button>
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

<main>
<div class="container">

    <div class="gallery">

        <div class="gallery-item" tabindex="0">

            <img src="https://images.unsplash.com/photo-1511765224389-37f0e77cf0eb?w=500&h=500&fit=crop" class="gallery-image" alt="">

            <div class="gallery-item-info">

                <ul>
                    <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> 56</li>
                    <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 2</li>
                </ul>

            </div>

        </div>

        <div class="gallery-item" tabindex="0">

            <img src="https://images.unsplash.com/photo-1497445462247-4330a224fdb1?w=500&h=500&fit=crop" class="gallery-image" alt="">

            <div class="gallery-item-info">

                <ul>
                    <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> 89</li>
                    <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 5</li>
                </ul>

            </div>

        </div>

        <div class="gallery-item" tabindex="0">

            <img src="https://images.unsplash.com/photo-1426604966848-d7adac402bff?w=500&h=500&fit=crop" class="gallery-image" alt="">

            <div class="gallery-item-type">

                <span class="visually-hidden">Gallery</span><i class="fas fa-clone" aria-hidden="true"></i>

            </div>

            <div class="gallery-item-info">

                <ul>
                    <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> 42</li>
                    <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 1</li>
                </ul>

            </div>

        </div>

        <div class="gallery-item" tabindex="0">

            <img src="https://images.unsplash.com/photo-1502630859934-b3b41d18206c?w=500&h=500&fit=crop" class="gallery-image" alt="">

            <div class="gallery-item-type">

                <span class="visually-hidden">Video</span><i class="fas fa-video" aria-hidden="true"></i>

            </div>

            <div class="gallery-item-info">

                <ul>
                    <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> 38</li>
                    <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 0</li>
                </ul>

            </div>

        </div>

        <div class="gallery-item" tabindex="0">

            <img src="https://images.unsplash.com/photo-1498471731312-b6d2b8280c61?w=500&h=500&fit=crop" class="gallery-image" alt="">

            <div class="gallery-item-type">

                <span class="visually-hidden">Gallery</span><i class="fas fa-clone" aria-hidden="true"></i>

            </div>

            <div class="gallery-item-info">

                <ul>
                    <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> 47</li>
                    <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 1</li>
                </ul>

            </div>

        </div>

        <div class="gallery-item" tabindex="0">

            <img src="https://images.unsplash.com/photo-1515023115689-589c33041d3c?w=500&h=500&fit=crop" class="gallery-image" alt="">

            <div class="gallery-item-info">

                <ul>
                    <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> 94</li>
                    <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 3</li>
                </ul>

            </div>

        </div>

        <div class="gallery-item" tabindex="0">

            <img src="https://images.unsplash.com/photo-1504214208698-ea1916a2195a?w=500&h=500&fit=crop" class="gallery-image" alt="">

            <div class="gallery-item-type">

                <span class="visually-hidden">Gallery</span><i class="fas fa-clone" aria-hidden="true"></i>

            </div>

            <div class="gallery-item-info">

                <ul>
                    <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> 52</li>
                    <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 4</li>
                </ul>

            </div>

        </div>

        <div class="gallery-item" tabindex="0">

            <img src="https://images.unsplash.com/photo-1515814472071-4d632dbc5d4a?w=500&h=500&fit=crop" class="gallery-image" alt="">

            <div class="gallery-item-info">

                <ul>
                    <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> 66</li>
                    <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 2</li>
                </ul>

            </div>

        </div>

        <div class="gallery-item" tabindex="0">

            <img src="https://images.unsplash.com/photo-1511407397940-d57f68e81203?w=500&h=500&fit=crop" class="gallery-image" alt="">

            <div class="gallery-item-type">

                <span class="visually-hidden">Gallery</span><i class="fas fa-clone" aria-hidden="true"></i>

            </div>

            <div class="gallery-item-info">

                <ul>
                    <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> 45</li>
                    <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 0</li>
                </ul>

            </div>

        </div>

        <div class="gallery-item" tabindex="0">

            <img src="https://images.unsplash.com/photo-1518481612222-68bbe828ecd1?w=500&h=500&fit=crop" class="gallery-image" alt="">

            <div class="gallery-item-info">

                <ul>
                    <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> 34</li>
                    <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 1</li>
                </ul>

            </div>

        </div>

        <div class="gallery-item" tabindex="0">

            <img src="https://images.unsplash.com/photo-1505058707965-09a4469a87e4?w=500&h=500&fit=crop" class="gallery-image" alt="">

            <div class="gallery-item-info">

                <ul>
                    <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> 41</li>
                    <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 0</li>
                </ul>

            </div>

        </div>

        <div class="gallery-item" tabindex="0">

            <img src="https://images.unsplash.com/photo-1423012373122-fff0a5d28cc9?w=500&h=500&fit=crop" class="gallery-image" alt="">

            <div class="gallery-item-type">

                <span class="visually-hidden">Video</span><i class="fas fa-video" aria-hidden="true"></i>

            </div>

            <div class="gallery-item-info">

                <ul>
                    <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> 30</li>
                    <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 2</li>
                </ul>

            </div>

        </div>

    </div>
    <!-- End of gallery -->

    <div class="loader"></div>

</div>
</main>

<script>
    $(document).ready(function(){
        showProfilefriend();
        muteornot();
        function showProfilefriend(){
            $.ajax({
                url : "homeserver.php",
                type : "POST",
                data : {temp_profile:"Show"},
                success : function(result)
                {
                    console.log(JSON.parse(result));
                    var values = JSON.parse(result);
                    var uname = values[0]['user_name'];
                    var fullname = values[0]['fullname'];
                    var upic = values[0]['user_pic'];
                    $("#userpicid").attr('src',upic);
                    $("#usernameid").html(uname);
                    $("#fullnameid").html(fullname);
                }
            });
        }
        function muteornot(){
        var uname =  $("#muteOrunmute").prev().text();
        var mute = $("#muteOrunmute").text();
        alert(uname);
            // $.ajax({
            //     url : "homeserver.php",
            //     type : "POST",
            //     data : {mutestatus:"Show"},
            //     success : function(result)
            //     {
            //       console.log(JSON.parse(result));
                    
            //     }
            // });
        }
    $("#muteOrunmute").click(function()
    {
        var uname =  $(this).prev().text();
        var mute = $(this).text();
        // alert(mute);
        $.ajax({
            url : 'homeserver.php',
            type : "POST",
            data:{usernameforMute : uname,
                    status : mute},
            success : function(result){
                console.log(result);
            }

        });
    });
    });
</script>
</body>
</html>