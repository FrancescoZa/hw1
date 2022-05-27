<?php

include('dbConnection.php');
session_start();

$number = '';

if(isset($_POST['comment_content'])){

    $conn = connectDb();
    $content = mysqli_real_escape_string($conn, $_POST["comment_content"]);      
    $postId = mysqli_real_escape_string($conn, $_POST["post_id"]);      
    $UserId = $_SESSION['id'];
    $query = "INSERT INTO comments(content, creationDateComment, id_user, id_post) VALUES ('$content',NOW(), '$UserId', '$postId')";
    mysqli_query($conn, $query);

    $query = "SELECT num_comments FROM posts WHERE Post_id = $postId"; //get new number of comments
    $res = mysqli_query($conn, $query);

    if(mysqli_num_rows($res) > 0){

        while($row = mysqli_fetch_assoc($res)) {
            $number = $row["num_comments"];
        }

       
    }

    mysqli_close($conn);

}

$output = array(

    'number_comments' => $number,
    "postId" => $postId
);

echo json_encode($output);

?>