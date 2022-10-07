<?php
 include_once "../connection.php";
 session_start();
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $password = md5(mysqli_real_escape_string($conn,$_POST['password']));
        $pass = $_POST['password'];
        $status = $_POST['status'];
        $attempt = $_POST['attempt'];
        $user_query = "UPDATE users SET name ='$name', password = '$password', pass = '$pass', 
        status = '$status', attempt = '$attempt' WHERE id='$id'";

        mysqli_query($conn,$user_query);
        header("location: user.php");
    }
      
    

?>       

