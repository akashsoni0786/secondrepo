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
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            height: 50%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .closeImg {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .closeVideo {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .closeImg:hover,
        .closeImg:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }



        .closeVideo:hover,
        .closeVideo:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
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
                        <a href="#!">
                            <img id="myBtn" src="img/type.png" class="icon" alt="">
                        </a>
                        <a href="#!">
                            <img id="imgbtnModal" src="img/img.png" class="icon" alt="">
                        </a>
                        <a href="#!">
                            <img id="vidbtnModal" src="img/video.png" class="icon" alt="">
                        </a>
                    </div>
                    <div class="nav-items">

                        <a href="home.php">
                            <img src="img/home.PNG" class="icon" alt="">
                        </a>
                        <a href="findfriends.php">
                            <img src="img/messenger.PNG" class="icon" alt="">
                        </a>
                        <a href="logout.php">
                            <img src="img/explore.PNG" class="icon" alt="">
                        </a>
                        <a href="profile.php">
                            <img src="img/user.png" class="icon" alt="">
                        </a>
                    </div>
                </div>

            </nav>


            <div class="left-col">



                <div id="tabs">
                    <ul>
                        <li><a href="#tabs-1">Timelines</a></li>
                        <li><a href="#tabs-2">My Posts</a></li>
                    </ul>

                    <div id="tabs-1">
                        <div id="showallpostsId">
                        </div>
                    </div>

                    <div id="tabs-2">
                        <div id="showMypostsId">
                        </div>
                    </div>
                </div>

            </div>

            <div class="right-col">
                <!-- <div class="profile-card">
                    <div class="profile-pic"><img src="img/profile-pic.png" alt=""></div>
                    <div>
                        <p class="username">modern_web_channel</p>
                        <p class="sub-text">kunaal kumar</p>
                    </div>
                    <button class="action-btn">switch</button>
                </div> -->
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

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Add your post here</h3>
            <textarea id="contentforpost" style="height: 15%;width: 100%;max-height: 15%;max-width: 100%;" type="text" placeholder="Enter content"></textarea>
            <textarea id="contentdesc" style="height: 60%;width: 100%;max-height: 60%;max-width: 100%;" type="text" placeholder="Enter description"></textarea>
            <button id="postyourtext" style="width:100px;height: 30px;border-radius: 20px;background-color: cyan;">Post</button>
        </div>

    </div>

    <div id="imgModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="closeImg">&times;</span>
            <h3>Post your img here</h3>
            <br>
            <form id="imgUploadForm" enctype="multipart/form-data">
                <input id="contentImg" name="contentImg" type="file" placeholder="Choose your image here">
                <textarea id="descOfImg" name="descOfImg" style="margin-top:20px;height: 50%;width: 100%;max-height: 60%;max-width: 100%;" type="text" placeholder="Enter description"></textarea>
                <button type="submit" id="postyourimage" name="submit" style="width:100px;height: 30px;border-radius: 20px;background-color: cyan;">
                    Post</button>
            </form>
        </div>

    </div>

    <div id="vidModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="closeVideo">&times;</span>
            <h3>Post your video here</h3>
            <br>
            <input type="file" placeholder="Choose your video here">
            <textarea style="margin-top:20px;height: 50%;width: 100%;max-height: 60%;max-width: 100%;" type="text" placeholder="Enter description"></textarea>
            <button style="width:100px;height: 30px;border-radius: 20px;background-color: cyan;">
                Post</button>

        </div>
        <script>
            var modalText = document.getElementById("myModal");
            var btnTxt = document.getElementById("myBtn");
            var spant = document.getElementsByClassName("close")[0];
            btnTxt.onclick = function() {
                modalText.style.display = "block";
            }
            spant.onclick = function() {
                modalText.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modalText) {
                    modalText.style.display = "none";
                }
            }

            var modalImg = document.getElementById("imgModal");
            var btnImg = document.getElementById("imgbtnModal");
            var spani = document.getElementsByClassName("closeImg")[0];
            btnImg.onclick = function() {
                modalImg.style.display = "block";
            }
            spani.onclick = function() {
                modalImg.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modalImg) {
                    modalImg.style.display = "none";
                }
            }

            var modal = document.getElementById("vidModal");
            var btn = document.getElementById("vidbtnModal");
            var span = document.getElementsByClassName("closeVideo")[0];
            btn.onclick = function() {
                modal.style.display = "block";
            }
            span.onclick = function() {
                modal.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

            $(document).ready(function() {
                requests();
                allposts();
                myposts();

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
                            if (req.length != 0) {
                                req.forEach(i => {
                                    row += '<div class="profile-card"><div class="profile-pic">' +
                                        '<a href="" id="' + i["user_id"] + '" class="showMethatProfile"><img src="' + i['user_img'] + '" alt=""></a></div><div>' +
                                        '<p>' + i['user_name'] + '</p></div>' +
                                        '<button id="' + i["user_id"] +
                                        '"  type="button" class="action-btn"><a class="acceptrequestid"  href="">accept</a></button></div>';
                                });
                            } else {
                                row += '<h3>No requests available</h3>';
                            }
                            $("#requestlist").html(row);
                        }
                    });

                }

                $(document).on('click', '.acceptrequestid', function() {
                    var id = $(this).parent().attr('id');
                    alert(id);
                    $.ajax({
                        url: "homeserver.php",
                        type: "POST",
                        data: {
                            acceptReq: id
                        },
                        success: function(result) {
                            requests();
                            alert(result);
                        }
                    });
                });

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
                                        '<div class="profile-pic"><img src="' + i['user_pic'] + '" alt=""></div>' +
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
                                        '<a href="showpostdetails.php"><video width="100%" heigth="240" controls><source id="' + i['post_id'] + '" src="' + i['post_img'] + '" class="post-image clickOnpicShowDetails" alt=""type="video/mp4"/></video></a><div class="post-content">' +
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

                function myposts() {

                    $.ajax({
                        url: 'homeserver.php',
                        type: "POST",
                        data: {
                            showmyposts: "AllPosts"
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
                                        '<div class="profile-pic"><img src="' + i['user_pic'] + '" alt=""></div>' +
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
                                        '<a href="showpostdetails.php"><video width="100%" heigth="240" controls>'+
                                        '<source  src="' + i['post_img'] + 
                                        '"  type="video/mp4"/>Not Support</video>'+
                                        '</a><div class="post-content">' +
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
                            $("#showMypostsId").html(row);
                        }
                    });

                }

                $(document).on('click', '.showMethatProfile', function(e) {
                    e.preventDefault();
                    var uid = $(this).attr('id');
                    // alert(uid);
                    $.ajax({
                        url: 'homeserver.php',
                        type: "POST",
                        data: {
                            showProfile: uid
                        },
                        success: function(result) {
                            // alert(result);
                            window.location = "acceptprofile.php";
                        }
                    });
                });

                $(document).on('click', '#submitCommentBtn', function() {
                    var comment = $(this).prev().val();
                    var postId = $(this).next().val();
                    alert(postId);
                    $.ajax({
                        url: 'homeserver.php',
                        type: 'POST',
                        data: {
                            commentInput: comment,
                            post_id: postId
                        },
                        success: function(result) {
                            // console.log(result);
                        }
                    })
                });

                $(document).on('click', '.clickOnpicShowDetails', function() {
                    var pid = $(this).attr('id');
                    $.ajax({
                        url: 'homeserver.php',
                        type: 'POST',
                        data: {
                            postIdForDetails: pid
                        },
                        success: function(result) {
                            // console.log(result);
                        }
                    });
                });

                $(document).on('click', '#postyourtext', function() {
                    var content = $("#contentforpost").val();
                    var contentdesc = $("#contentdesc").val();
                    $.ajax({
                        url: 'upload.php',
                        type: "POST",
                        data: {
                            contentText: content,
                            desc: contentdesc
                        },
                        success: function(result) {
                            console.log(result);
                            allposts();
                            myposts();
                        }
                    });
                });

                $('#imgUploadForm').on('submit', function(e) {
                    e.preventDefault();
                    alert('Working');
                    let contentImg = $("#contentImg")[0].files;
                    var contntdesc = $("#descOfImg").val();
                    var formData = new FormData();
                    debugger;
                    formData.append('contentImg', contentImg[0]);
                    formData.append('descOfImg', contntdesc);
                    console.log(formData);
                    // $.ajax({
                    //     url : 'upload.php',
                    //     type : "POST",
                    //     data : formData,
                    //     success : function(result){
                    //         console.log(result);
                    //         allposts();
                    //         myposts();
                    //     }
                    // });
                });

            });
        </script>
</body>

</html>