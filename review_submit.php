<?php

include_once "connection.php";
session_start();

if(isset($_POST['submit'])){
    $isbn = $_POST['isbn'];
    $userid = $_POST['user_id'];
    $message = mysqli_real_escape_string($conn,$_POST['message']);
    $rate = $_POST['rate'];

    $check = "SELECT * FROM reviews WHERE isbn = '$isbn' AND user_id = '$userid'";
    $result = mysqli_query($conn , $check);

    if(mysqli_num_rows($result)>0){
         echo "<script>alert('You sent the review yearlier!');
        window.location.href='sales.php';
        </script>";
    }
    
   if(mysqli_num_rows($result)==0 && isset($rate)){
        $query = "INSERT INTO reviews(isbn, user_id, message, rate)
                VALUES ('$isbn','$userid', '$message', '$rate')";
        mysqli_query($conn , $query);
        echo "<script>
        window.location.href='sales.php';
        </script>";
    }
    if(mysqli_num_rows($result)==0 && !isset($rate)){
        $query = "INSERT INTO reviews(isbn, user_id, message)
                VALUES ('$isbn','$userid', '$message')";
        mysqli_query($conn , $query);
        echo "<script>
        window.location.href='sales.php';
        </script>";
    }
}