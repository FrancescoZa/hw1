<!DOCTYPE html>

<!DOCTYPE html>
<?php

session_start();
if(!isset($_SESSION['id'])){
    header("Location:login.php");  
}

?>

<html>

<head>
    <link rel="stylesheet" href="events.css">
    <link rel="stylesheet" href="post.css">

    <meta name="viewport" content="width = devide-width, initial-scale=1">
    <title>Mates - News</title>
    <script src = "events.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>

<body onload = "start()">

    <header>
        <a href="home.php"><label id = "logo">mates</label></a> <label = id = "pageCategory">news</label>

        <select  name="country" id="country">
            <option value="us">World</option>
            <option value="it">Italy</option>
            <option value="gb">United Kingdom</option>
            <option value="de">Germany</option>
            <option value="fr">France</option>
            <option value="tr">Turkey</option>
            <option value="ro">Romania</option>


          </select>

    </header>

<section id = "articleContainer">



</section>


</body>

</html>


