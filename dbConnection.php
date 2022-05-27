<?php

   function connectDb(){

      $conn = mysqli_connect("localhost", "root", "", "mates");
      return $conn;

   }

   

?>