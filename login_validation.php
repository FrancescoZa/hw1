<?php

//likes relazione n n. creo tab con id utente e id post

include('dbConnection.php');

session_start();

if(isset($_POST["Username"]) && isset($_POST["Password"])){

    $success = '';
    $invalid_credential_error = '';

    //connect to database
    $conn = connectDb();

    $username = mysqli_real_escape_string($conn, $_POST["Username"]);         
    $password = mysqli_real_escape_string($conn, md5($_POST["Password"]));

    //find user with these credentials
    $query = "SELECT Id FROM users WHERE Username = '$username' AND Password = '$password' ";
    $res = mysqli_query($conn, $query);

    if(mysqli_num_rows($res) > 0){

        $success = 'success';

        while($row = mysqli_fetch_assoc($res)) {
            $_SESSION['id'] = $row["Id"];     //GIUSTO
        }

       
    }else{

        $invalid_credential_error = 'Invalid Credentials';

    }

    mysqli_close($conn);

   
    $output = array(

        'success' => $success,
        'invalid_credential_error' => $invalid_credential_error

    );

    echo json_encode($output);
    

}

?>