<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#tabs").tabs();
        });
    </script>
    <title>home</title>
</head>

<body>
    <section class="main">
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
                        </a>
                        <!-- <img src="img/like.PNG" class="icon" alt=""> -->
                        <a href="profile.php">
                            <img src="img/user.png" class="icon" alt="">

                        </a>
                    </div>
                </div>
            </nav>

            <span id="showallpostsId"></span>
            <h2></h2>
            <span id="commnetList">
                <div style="display: flex;">
                    <p><b id="commentpersonId">akash&nbsp;</b></p>
                    <p id="commentTextContent">
                        Comment Content
                    </p>
                </div>
            </span>



        </div>


        </div>
    </section>

    <script>
        $(document).ready(function() {
            function absolute_url(urls) {

                var pattern = /^https:\/\//i;
                if (pattern.test(urls)) {
                    return true;
                } else {
                    return false;
                }
            }
            allposts();

            function allposts() {

                $.ajax({
                    url: 'homeserver.php',
                    type: "POST",
                    data: {
                        showsinglepost: true
                    },
                    success: function(result) {
                        var req = JSON.parse(result);
                        var row = '';
                        req.forEach(i => {
                                var t = i['post_media_type'];
                                if (t == 'image') 
                                {
                                    
                                    row += '<div class="post"><div class="info"><div class="user">' +
                                        '<div class="profile-pic"><img src="' + i['user_pic'] + '" alt=""></div>' +
                                        '<p class="username">' + i['user_name'] + '</p></div>' +
                                        '<img src="img/option.PNG" class="options" alt=""></div>' +
                                        '<a href="showpostdetails.php"><img id="' + i['post_id'] + '" src="' + i['post_img'] + '" class="post-image clickOnpicShowDetails" alt=""></a><div class="post-content">' +
                                        '<div class="reaction-wrapper">' +
                                        '<img src="img/like.PNG" class="icon" alt="">' +
                                        '<img src="img/comment.PNG" class="icon" alt="">' +
                                        '<img src="img/send.PNG" class="icon" alt="">' +
                                        '<img src="img/save.PNG" class="save icon" alt="">' +
                                        '</div><p class="likes">' + i['likes'] + " " + ' likes</p>' +
                                        '<p class="description"><span>' + i['user_name'] + ' </span>' + i["post_desc"] + '</p>' +
                                        '<p class="post-time">2 minutes ago</p></div>' +
                                        '<div class="comment-wrapper">' +
                                        '<img src="img/smile.PNG" class="icon" alt="">' +
                                        '<input type="text" id="commentInputText" class="comment-box" placeholder="Add a comment">' +
                                        '<button id="submitCommentBtn" class="comment-btn">post</button><input hidden value="' + i['post_id'] + '"/></div></div>';


                                }

                                if (t == 'text') {
                                    row += '<div class="post"><div class="info"><div class="user">' +
                                        '<div class="profile-pic"><img src="' + i['user_img'] + '" alt=""></div>' +
                                        '<p class="username">' + i['user_name'] + '</p></div>' +
                                        '<img src="img/option.PNG" class="options" alt=""></div>' +
                                        '<a style="text-decoration:none;" href="showpostdetails.php"><div id="' + i['post_id'] + '" class="clickOnpicShowDetails" style="padding:2%;">' + i['post_img'] + '</div></a><div class="post-content">' +
                                        '<div class="reaction-wrapper">' +
                                        '<img src="img/like.PNG" class="icon" alt="">' +
                                        '<img src="img/comment.PNG" class="icon" alt="">' +
                                        '<img src="img/send.PNG" class="icon" alt="">' +
                                        '<img src="img/save.PNG" class="save icon" alt="">' +
                                        '</div><p class="likes">1,012 likes</p>' +
                                        '<p class="description"><span>' + i['user_name'] + ' </span>' + i["post_desc"] + '</p>' +
                                        '<p class="post-time">2 minutes ago</p></div>' +
                                        '<div class="comment-wrapper">' +
                                        '<img src="img/smile.PNG" class="icon" alt="">' +
                                        '<input id="commentInputText" type="text" class="comment-box" placeholder="Add a comment">' +
                                        '<button id="submitCommentBtn" class="comment-btn">post</button><input hidden value="' + i['post_id'] + '"/></div></div>';

                                }

                                if (t == 'video') {
                                    row += '<div class="post"><div class="info"><div class="user">' +
                                        '<div class="profile-pic"><img src="' + i['user_pic'] + '" alt=""></div>' +
                                        '<p class="username">' + i['user_name'] + '</p></div>' +
                                        '<img src="img/option.PNG" class="options" alt=""></div>' +
                                        '<a href="showpostdetails.php"><video  width="100%" heigth="240" controls><source  id="' + i['post_id'] + '" src="' + i['post_img'] + '" class="post-image clickOnpicShowDetails" alt=""type="video/mp4"></video></a><div class="post-content">' +
                                        '<div class="reaction-wrapper">' +
                                        '<img src="img/like.PNG" class="icon" alt="">' +
                                        '<img src="img/comment.PNG" class="icon" alt="">' +
                                        '<img src="img/send.PNG" class="icon" alt="">' +
                                        '<img src="img/save.PNG" class="save icon" alt="">' +
                                        '</div><p class="likes">' + i['likes'] + " " + ' likes</p>' +
                                        '<p class="description"><span>' + i['user_name'] + ' </span>' + i["post_desc"] + '</p>' +
                                        '<p class="post-time">2 minutes ago</p></div>' +
                                        '<div class="comment-wrapper">' +
                                        '<img src="img/smile.PNG" class="icon" alt="">' +
                                        '<input type="text" id="commentInputText" class="comment-box" placeholder="Add a comment">' +
                                        '<button id="submitCommentBtn" class="comment-btn">post</button><input hidden value="' + i['post_id'] + '"/></div></div>';

                                }
                            });
                        $("#showallpostsId").html(row);
                    }
                });

            }
            allComments();

            function allComments() {
                $.ajax({
                    url: "homeserver.php",
                    type: "POST",
                    data: {
                        showallComments: true
                    },
                    success: function(result) {
                        var arr = JSON.parse(result);
                        user = arr['user'];
                        comment = arr['comm'];
                        console.log(comment);
                        console.log(user);
                        var row = '';
                        comment.forEach(i => {
                            user.forEach(j => {
                                if (j['user_id'] == i['user_id']) {
                                    console.log(j['user_name']);
                                    row += '<br><div style="display: flex;">' +
                                        '<p><b id="commentpersonId">' +
                                        j['user_name'] +
                                        ' : &nbsp;</b></p>' +
                                        '<p id="commentTextContent">' +
                                        i['comments'] +
                                        '</p></div>';
                                }
                            });


                        });
                        $('#commnetList').html(row);
                    }
                });
            }

            $(document).on('click', '#submitCommentBtn', function() {
                var comment = $(this).prev().val();
                var postId = $(this).next().val();
                // alert(postId);
                $.ajax({
                    url: 'homeserver.php',
                    type: 'POST',
                    data: {
                        commentInput: comment,
                        post_id: postId
                    },
                    success: function(result) {
                        $("#commentInputText").val('');
                        allComments();
                    }
                })
            });

        });
    </script>
</body>

</html>