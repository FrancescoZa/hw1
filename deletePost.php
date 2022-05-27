<?php

include('dbConnection.php');
session_start();

if(isset($_POST['post_id'])){

    $conn = connectDb();
    $post_id = mysqli_real_escape_string($conn, $_POST["post_id"]);   

    $query = "DELETE FROM likes WHERE Post_id = $post_id";  //delete all likes (post id is foreign key)
    mysqli_query($conn, $query);

    $query = "DELETE FROM comments WHERE id_post = $post_id";  //delete all comments (post id is foreign key)
    mysqli_query($conn, $query);


    $query = "DELETE FROM posts WHERE Post_id = $post_id";
    mysqli_query($conn, $query);

    mysqli_close($conn);


}


?>