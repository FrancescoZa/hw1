<?php

include('dbConnection.php');

session_start();

$number = '';
$postId = '';
$action = '';
if(isset($_GET['post_id'])){

   
    $conn = connectDb();
    $postId = mysqli_real_escape_string($conn, $_GET["post_id"]);      
    $userId = $_SESSION['id'];


    $query = "SELECT * FROM likes WHERE Post_id = '$postId' AND User_id = '$userId'";
    $res = mysqli_query($conn, $query);

    if(mysqli_num_rows($res) > 0){  //already liked

        //dislike
        $query = "DELETE FROM likes WHERE Post_id = $postId AND User_id = $userId";
        $res = mysqli_query($conn, $query);
        $action = 'dislike';

    }else{

        //like
        $query = "INSERT INTO likes(User_id, Post_id) VALUES($userId,$postId)";
        $res = mysqli_query($conn, $query);
        $action = 'like';

    }


    $query = "SELECT num_likes FROM posts WHERE Post_id = $postId"; //get new number of likes
    $res = mysqli_query($conn, $query);

    if(mysqli_num_rows($res) > 0){

        while($row = mysqli_fetch_assoc($res)) {
            $number = $row["num_likes"];
        }

       
    }

    mysqli_close($conn);

}

$output = array(

    'number' => $number,
    'action' => $action,
    'postId' => $postId
);

echo json_encode($output);

?>