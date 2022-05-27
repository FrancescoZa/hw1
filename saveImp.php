<?php
session_start();

include('dbConnection.php');

    if(isset($_POST['bioContent'])){

    $conn = connectDb();
    $bio = mysqli_real_escape_string($conn, $_POST["bioContent"]);   
    $id = $_SESSION['id'];
    $success = 'success';

    if(isset($_FILES['image'])){

    //image
    
    $file = $_FILES['image'];

    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowedExt = array('jpg', 'jpeg', 'png');
    $query = '';
    
    if(in_array($fileActualExt, $allowedExt)){

        if($fileError === 0){

            if($fileSize < 1000000){  //less than 1000Kb
            
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                //$fileDestination = 'upload/'.$fileNameNew;
                //move_uploaded_file($fileTmpName, $fileDestination);

                $success = 'Image loaded correctly';

            }else{
                $error = "Your file is too big.";
            }
        }else{
            $error = "There was an error.";
        }

    }else{
        $error = 'You cannot upload files of this type.';
    }

    $blobFile = addslashes(file_get_contents($fileTmpName));

    
    //image

    $query = "UPDATE users SET Bio = '$bio', Profile_picture = '$blobFile' WHERE Id = '$id'";  //image query

    }else{
    $query = "UPDATE users SET Bio = '$bio' WHERE Id = '$id'";
    }

    $res = mysqli_query($conn, $query);

    $output = array(
            
        'success' => $success
    
    );

    
    mysqli_close($conn);

    }
    echo json_encode($output);

?>