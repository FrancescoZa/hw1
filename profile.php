<!DOCTYPE html>
<?php

session_start();
if(!isset($_SESSION['id'])){
    header("Location:login.php");  
}

?>

<html>

<head>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="post.css">

    <meta name="viewport" content="width = devide-width, initial-scale=1">
    <title>Mates - Profile</title>
    <script src = "profile.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>

<body onload="start()">

    <section class = "headerMobile">
        <a href="home.php"><p id = "logoMobile">mates</p></a>

    </section>

    <header id = "profile" class = "profile">

        
        <section class = "profile_pic_container">

            <div id = "profile_pic" class = "profile_pic">
                Fr
            </div>

            <?php
            if($_GET['id'] == $_SESSION['id']){
                echo "<button class = 'changePictureBtn' onclick='openSettings()'>Change picture</button>";
            }
    	    ?>
        </section>

        <section class = "profile_pic_info">
            <div>
            <span id = "username" class = "username"></span>
            <button class = "follow">Follow</button>
            <span id = "userId" style = "display:none"><?php echo $_GET['id'] ?></span>
            </div>


            <span id = "bio" class = "bio">
            </span>

            <?php

                if($_GET['id'] == $_SESSION['id']){
                    echo "
                    <button class = 'changeBio' onclick='openSettings()'>
                    Change your bio
                    </button>
                    ";
                }

            ?>

            <section class = "follow_info">

                <span class = "title">Posts:</span>
                <span id = "nPosts" class = "number"></span>

                <span class = "title">Following:</span>
                <span class = "number">2</span>

                <span class = "title">Followers:</span>
                <span class = "number">4</span>

            </section>

        </section>

  
    </header>

          

        

    <header id = "settings" class = "settings">

        <form id = "settingsForm" name = "settingsForm" enctype="multipart/form-data" action="" method="post">

            <div class = "bioContainer">
                <label>Write something interesting about yourself</label>
                <textarea id = "newBioBar" name="BioContent" cols="40" rows="5" placeholder="What do you want people to remember about you?" onfocus="this.placeholder = ''" onblur="this.placeholder = 'What do you want people to remember about you?'"></textarea>
            </div>

            <div class = "picContainer">
            <label>Choose a picture that you like</label>

            <div class = "buttonsContainer">
            <input class = "field" type = "file" name = "imageSelector" id = "imageSelector">
            <button id = "noPicture">No picture</button>
            </div>

            <div class = "buttonsContainer">
            <button id = "shareBtn" name = "submit" onclick="saveImp(); return false;">Do you like your new Profile? Confirm!</button>
            <button id = "cancelBtn" name = "cancel" onclick="back(); return false;">Back</button>
            </div>

            </div>
        </form>

    </header>
    

    <section id = "postsArea" class = "postsArea">

        <label  id = "noPostsLabel"></label>


    </section>
    
   

</body>

</html>