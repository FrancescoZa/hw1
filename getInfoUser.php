<?php

session_start();
include('dbConnection.php');


if(isset($_GET['idUser'])){

    $id = $_GET['idUser'];

    $conn = connectDb();
    $query = "SELECT Username, Profile_picture, Bio, Colour,Id, COUNT(*) as n_posts FROM users join posts on (Id = posts.UserId) WHERE Id = '$id'";

    $res = mysqli_query($conn, $query);

    $row = mysqli_fetch_array($res);

    $output = array(
            
        'username' => $row['Username'],
        'colour' => $row['Colour'],
        'bio' => $row['Bio'],
        'pro_pic' => base64_encode($row['Profile_picture']),
        'n_posts' => $row['n_posts']
    
    );

    
    mysqli_close($conn);

    echo json_encode($output);


}

?>