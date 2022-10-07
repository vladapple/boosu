<?php
include_once "connection.php";
session_start();

$name = mysqli_real_escape_string($conn,$_POST['name']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$reg_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
if(!preg_match($reg_email , $email)){
    echo "Incorrect email";
}

$password = md5(mysqli_real_escape_string($conn,$_POST['password']));
$pass = $_POST['pass'];


$check = "SELECT id FROM users WHERE email = '$email'";
$result = mysqli_query($conn , $check);

if(mysqli_num_rows($result)>0){
  echo "<script>alert('The email: $email already exists!');
        window.location.href='signin.php';
        </script>";
}else{
    if($_POST['password'] != $_POST['pass']){
        echo "<script>alert('The Second password does not match your first password! Try again!');
        window.location.href='signup.php';
        </script>";
    }
    else{
        $user_query = "INSERT INTO users(name, email, password, pass)
                    VALUES ('$name','$email','$password','$pass')";

        mysqli_query($conn , $user_query);
        echo "<script>alert('You have been registered!!!');
        window.location.href='signin.php';
        </script>";
        
    }

}


?>