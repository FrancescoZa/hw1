<?php

include('dbConnection.php');
session_start();

$userId = $_SESSION['id'];

$conn = connectDb();
$query = '';

if(isset($_GET['userId'])){
    $id = $_GET['userId'];
    $query = "SELECT  Content, Image, CreationDate, num_likes, num_comments, Username, posts.Post_id as Post_id, likes.User_id as Liked, users.Id, Colour, Profile_picture, urlNewsImage FROM (posts join users on (users.Id = posts.UserId) left join likes on (User_id = '$userId' and likes.Post_Id = posts.Post_id)) WHERE users.Id = '$id'  ORDER BY CreationDate DESC";

}else{

    $query = "SELECT  Content, Image, CreationDate, num_likes, num_comments, Username, posts.Post_id as Post_id, likes.User_id as Liked, users.Id, Colour, Profile_picture, urlNewsImage FROM (posts join users on (users.Id = posts.UserId) left join likes on (User_id = '$userId' and likes.Post_Id = posts.Post_id)) ORDER BY CreationDate DESC";

}

$result = mysqli_query($conn, $query);

$output = array();


while($row = mysqli_fetch_array($result)){

    //fill output array
    $owner = false;

    if($row['Id'] == $userId){
        $owner = true;
    }

    $output[] = array(
        'content' => $row['Content'],
        'image' => base64_encode($row['Image']),
        'creationdate' => $row['CreationDate'],
        'num_likes' => $row['num_likes'],
        'num_comments' => $row['num_comments'],
        'username' => $row['Username'],
        'postId' => $row['Post_id'],
        'liked' => $row['Liked'],
        'owner' => $owner,
        'colour' => $row['Colour'],
        'urlNewsImage' => $row['urlNewsImage'],
        'pro_pic' => base64_encode($row['Profile_picture'])

     );
     
}


echo json_encode($output);


?>