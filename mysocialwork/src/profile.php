<?php
session_start();
include 'connection.php';
$id = $_SESSION['uid'];
try {
    $sql = "SELECT * FROM `Users` WHERE `user_id`='$id'";
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

    <?php
    foreach ($rows as $i) {
    ?>
        <div class="container">

            <div class="profile">
                <div class="profile-image">
                    <img src="<?php echo $i['user_pic'] ?>" alt="">
                </div>
                <div class="profile-user-settings">
                    <h1 class="profile-user-name"><?php echo $i['user_name'] ?></h1>
                    <button class="btn profile-edit-btn">Edit Profile</button>
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
                    <p><span class="profile-real-name"><?php echo $i['fullname'] ?></span> Lorem ipsum dolor sit, amet consectetur adipisicing elit 📷✈️🏕️</p>
                </div>
            </div>
            <!-- End of profile section -->
        </div>
        <!-- End of container -->
    <?php  } ?>
    </header>

   
</body>

</html>