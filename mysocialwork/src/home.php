

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>home</title>
</head>

<body>
    <section class="main">
        <div class="wrapper">
            <nav class="navbar">
                <div class="nav-wrapper">
                    <img src="img/logo.PNG" class="brand-img" alt="">
                    <input type="text" id="searchbarId" class="search-box" placeholder="search">
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


            <div class="left-col" id="showallpostsId"></div>

            <div class="right-col">


                <div class="profile-card">
                    <div class="profile-pic"><img src="img/profile-pic.png" alt=""></div>
                    <div>
                        <p class="username">modern_web_channel</p>
                        <p class="sub-text">kunaal kumar</p>
                    </div>
                    <button class="action-btn">switch</button>
                </div>

                <p class="suggestion-text">Friend requests for you</p>

                <span id="requestlist">



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

                </span>





            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            requests();
            allposts()

            function requests() {

                $.ajax({
                    url: 'homeserver.php',
                    type: "POST",
                    data: {
                        showrequests: "AllRequests"
                    },
                    success: function(result) {
                        var req = JSON.parse(result);
                        var row = '<span hidden><div class="profile-card" ><div class="profile-pic">' +
                            '<img src="img/cover 9.png" alt=""></div><div>' +
                            '<p class="username">modern_web_channel</p>' +
                            '<p class="sub-text">followed bu user</p>' +
                            '</div><button class="action-btn">follow</button></div></span>';
                        req.forEach(i => {
                            row += '<div class="profile-card"><div class="profile-pic">' +
                                '<img src="' + i['request_img'] + '" alt=""></div><div>' +
                                '<p>' + i['request_name'] + '</p></div>' +
                                '<button id="' + i["request_id"] +
                                '"  type="button" class="action-btn"><a class="acceptrequestid"  href="">accept</a></button></div>';
                        });
                        $("#requestlist").html(row);
                    }
                });

            }

            $(document).on('click', '.acceptrequestid', function() {
                var id = $(this).parent().attr('id');
                $.ajax({
                    url: "homeserver.php",
                    type: "POST",
                    data: {
                        acceptReq: id
                    },
                    success: function(result) {
                        requests();
                        console.log(result); //Accepted
                    }
                });
            });
        function absolute_url(urls) 
            {
            
            var pattern = /^https:\/\//i;
            if (pattern.test(urls)) {
                return true;
            }
            else {
                return false;
            }
        }
            function allposts() {

                $.ajax({
                    url: 'homeserver.php',
                    type: "POST",
                    data: {
                        showallposts: "AllPosts"
                    },
                    success: function(result) {
                        var req = JSON.parse(result);
                        var row = '';
                        req.forEach(i => {
                            var t = absolute_url(i['post_img']);
                            if(t == true)
                            {
                                row += '<div class="post"><div class="info"><div class="user">' +
                                '<div class="profile-pic"><img src="'+i['user_img']+'" alt=""></div>' +
                                '<p class="username">'+i['user_name']+'</p></div>' +
                                '<img src="img/option.PNG" class="options" alt=""></div>' +
                                '<img src="'+i['post_img']+'" class="post-image" alt=""><div class="post-content">' +
                                '<div class="reaction-wrapper">' +
                                '<img src="img/like.PNG" class="icon" alt="">' +
                                '<img src="img/comment.PNG" class="icon" alt="">' +
                                '<img src="img/send.PNG" class="icon" alt="">' +
                                '<img src="img/save.PNG" class="save icon" alt="">' +
                                '</div><p class="likes">1,012 likes</p>' +
                                '<p class="description"><span>'+i['user_name']+' </span>'+i["post_desc"]+'</p>' +
                                '<p class="post-time">2 minutes ago</p></div>' +
                                '<div class="comment-wrapper">' +
                                '<img src="img/smile.PNG" class="icon" alt="">' +
                                '<input type="text" class="comment-box" placeholder="Add a comment">' +
                                '<button class="comment-btn">post</button></div></div>';
                         
                            }
                            if(t == false)
                            {
                                row += '<div class="post"><div class="info"><div class="user">' +
                                '<div class="profile-pic"><img src="'+i['user_img']+'" alt=""></div>' +
                                '<p class="username">'+i['user_name']+'</p></div>' +
                                '<img src="img/option.PNG" class="options" alt=""></div>' +
                                '<div style="padding:2%">'+i['post_img']+'</div><div class="post-content">' +
                                '<div class="reaction-wrapper">' +
                                '<img src="img/like.PNG" class="icon" alt="">' +
                                '<img src="img/comment.PNG" class="icon" alt="">' +
                                '<img src="img/send.PNG" class="icon" alt="">' +
                                '<img src="img/save.PNG" class="save icon" alt="">' +
                                '</div><p class="likes">1,012 likes</p>' +
                                '<p class="description"><span>'+i['user_name']+' </span>'+i["post_desc"]+'</p>' +
                                '<p class="post-time">2 minutes ago</p></div>' +
                                '<div class="comment-wrapper">' +
                                '<img src="img/smile.PNG" class="icon" alt="">' +
                                '<input type="text" class="comment-box" placeholder="Add a comment">' +
                                '<button class="comment-btn">post</button></div></div>';
                         
                            }
                            });
                        $("#showallpostsId").html(row);
                    }
                });

            }

        });
    </script>
</body>

</html>