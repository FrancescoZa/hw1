<?php

include('dbConnection.php');

session_start();

$success = '';
$error = '';

if(isset($_POST['postContent'])){


    $conn = connectDb();
    $content = mysqli_real_escape_string($conn, $_POST['postContent']); 

    //image

    if(isset($_FILES['imageSelector'])){
    
    $file = $_FILES['imageSelector'];

    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowedExt = array('jpg', 'jpeg', 'png');

    
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

    }
    //image
    $url = null;
    if(isset($_POST['urlImage'])){
        $url = mysqli_real_escape_string($conn, $_POST['urlImage']); 
    }

    $date = date('d/m/Y H:i:s');
    $id = $_SESSION['id'];

    if(isset($_FILES['imageSelector'])){

        $query = "INSERT INTO posts (Content, Image, CreationDate, UserId, urlNewsImage) VALUES ('$content', '$blobFile', NOW(), '$id', '$url')";

        $res = mysqli_query($conn, $query);
    }else{

        $query = "INSERT INTO posts (Content, Image, CreationDate, UserId, urlNewsImage) VALUES ('$content', null, NOW(), '$id', '$url')";

        $res = mysqli_query($conn, $query);

    }
    $success = 'Post created successfully at '.$date;
    

    mysqli_close($conn);
    

}else{
    $error = 'error';
}

$output = array(

    'success' => $success,
    'error' => $error

);


echo json_encode($output);

?>