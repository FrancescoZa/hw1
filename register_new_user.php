<?php 

include('dbConnection.php');

if(isset($_POST["Username"]) && isset($_POST["Password"])){

    $success = '';
    $error = '';

    $conn = connectDb();

    $username = mysqli_real_escape_string($conn, $_POST["Username"]); 
    $password = mysqli_real_escape_string($conn, $_POST["Password"]); 

    $query = "SELECT * FROM users WHERE Username = '$username'";
    $res = mysqli_query($conn, $query);

    if(mysqli_num_rows($res) > 0){

        $error = "This username already exists.";

    }else{

        $colours = array('#FFCCBC', '#FFE57F', '#CFD8DC', '#C8E6C9', '#D1C4E9', '#EF9A9A', '#C5CAE9', '#D7CCC8', '#FFE0B2', '#F0F4C3');
        $colour = $colours[array_rand($colours)];
        //create new user
        $query = "INSERT INTO users (Username, Password, Colour) Values ('$username', '".md5($password)."', '$colour')";
        $res = mysqli_query($conn, $query);

        $success = 'User created successfully';

    }

    mysqli_close($conn);



    $output = array(

        'success' => $success,
        'error' => $error

    );



    echo json_encode($output);

}

?>