<!DOCTYPE html>

<?php

    session_start();
    if(!isset($_SESSION['id'])){
        header("Location:login.php");  
    }

    if(isset($POST['logout'])){
        session_destroy();   
        header("Location: login.php");
    }


?>

<html>

<head>

    <link rel="stylesheet" href="home.css">
    <meta name="viewport" content="width = devide-width, initial-scale=1">
    <title>Mates - Home</title>
    <script src = "home.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



</head>



<body onload="start();">

    <section id = "menu">

        <header>

            <p id = "logo">mates</p>

        </header>

        <button onclick = "goHome()"><i class="material-icons" style="font-size: 30px">home</i> <span><b>Home</b><span></button>
        <button onclick = "toProfile()"><i class="material-icons" style="font-size: 30px">face</i> <span>Profile<span><span id = "user_id" style="display:none"><?php echo $_SESSION['id']; ?></span></button>
        <button onclick="goToEvents()"><i class="material-icons" style="font-size: 30px">event</i> <span>News<span></button>
        <button><i class="material-icons" style="font-size: 30px">favorite_border</i> <span>Liked<span></button>
        <a href = "logout.php"><i class="material-icons" style="font-size: 30px">exit_to_app</i> <span>Logout<span></span></a>

    </section>

    <section class = "headerMobile">
        <p id = "logoMobile">mates</p>
    </section>

    <section id = "contents">

       <section id = "newPost">

        <form id = "newPostForm" name = "newPostForm" enctype="multipart/form-data" action="" method="post">

            <textarea id = "newPostBar" class = "errorPostBar" name="postContent" cols="40" rows="5" placeholder="Write something here..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Write something here...'"></textarea>

            <input class = "field" type = "file" name = "imageSelector" id = "imageSelector">
            <button id = "shareBtn" name = "submit" onclick="newPost(); return false;">Share</button>

        </form>

       </section>

       <section id = "postsArea">

  

       </section>

    </section>

    <aside id = "secondary_menu">

        <div id = "search_container">

        <form name = "search" id = "searchForm" autocomplete="off" onkeyup="searchFriend()" onsubmit = "return false;">

            <input class = "searchField" type = "text" name = "searchValue" placeholder="Find new mates" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Find new mates'">
            
        </form>

        </div>

        <div id = "newFriends_container">

            <div id = "newFriendsBackground" class = "newFriendsBackground">
                    

            </div>

        </div>

        

    </aside>

    <footer>

            <button onclick = "goHome()"><i class="material-icons" style="font-size: 30px">home</i></button>
            <button onclick = "toProfile()"><i class="material-icons" style="font-size: 30px">face</i><span id = "user_id" style="display:none"><?php echo $_SESSION['id']; ?></span></button>
            <button onclick="goToEvents()"><i class="material-icons" style="font-size: 30px">event</i></button>
            <button><i class="material-icons" style="font-size: 30px">favorite_border</i></button>

    </footer>

</body>



</html>