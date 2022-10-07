<?php
 include_once "../connection.php";
 session_start();
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $message = $_POST['message'];

        $review_query = "UPDATE reviews SET message ='$message' WHERE id='$id'";

        mysqli_query($conn,$review_query);
        header("location: review.php");
    }
?>