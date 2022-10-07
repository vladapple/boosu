<?php
include_once "connection.php";
session_start();

$isbn = $_GET['isbn'];
$userid = $_SESSION['id'];

$check = "SELECT * FROM favorites WHERE isbn = '$isbn' AND user_id = '$userid'";
$result = mysqli_query($conn , $check);

    if(mysqli_num_rows($result)>0){
         echo "<script>
        window.location.href='sales.php';
        </script>";
    }
    else{
        $query = "INSERT INTO favorites(isbn, user_id)
                VALUES ('$isbn','$userid')";
        mysqli_query($conn , $query);
        echo "<script>alert('Added to favorites!');
        window.location.href='sales.php';
        </script>";
    }
    

?>