<?php

include('dbConnection.php');
session_start();

if(isset($_GET['id'])){
    
    $conn = connectDb();
    $post_id = $_GET['id'];
    $query = "SELECT * FROM comments join users on (users.Id = id_user and id_post = $post_id)";

    $res = mysqli_query($conn, $query);

    $output = array();


    while($row = mysqli_fetch_array($res)){


        $output[] = array(
            'content' => $row['content'],
            'creationdateComment' => $row['creationDateComment'],
            'Username' => $row['Username'],
            'id_post' => $row['id_post']
        );
     
    }

    mysqli_close($conn);

}


echo json_encode($output);


?>