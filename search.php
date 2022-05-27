<?php

    include('dbConnection.php');

    session_start();

    if(isset($_GET['value'])){

        $conn = connectDb();
        $name = mysqli_real_escape_string($conn, $_GET['value']);  
        $current_id = $_SESSION['id'];

        $query = "SELECT Username, Profile_picture, Id, Colour FROM users WHERE Username LIKE '$name%' AND Id <> '$current_id' LIMIT 10";
        $res = mysqli_query($conn, $query);

        $output = array();

        if(mysqli_num_rows($res) != 0){
            while($row = mysqli_fetch_array($res)){

            $output[] = array(
            'username' => $row['Username'],
            'proPic' =>  base64_encode($row['Profile_picture']),
            'id' => $row['Id'],
            'colour' => $row['Colour']
            );
        
            }
        }
        

        mysqli_close($conn);
        echo json_encode($output);


    }


?>