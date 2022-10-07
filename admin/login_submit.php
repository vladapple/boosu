<?php
 include_once "../connection.php";
 session_start();

 $email = mysqli_real_escape_string($conn,$_POST['email']);
 $reg_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
 if(!preg_match($reg_email , $email)){
     echo "Incorrect email";
 }

$password = $_POST['password'];
if(strlen($password)<7){
    echo "password should be bigger or equal to 7 char";
}

$user_query = "SELECT id,email FROM admins WHERE email='$email' and password='$password'";
$result = mysqli_query($conn ,$user_query );

if(mysqli_num_rows($result)==0){
    echo "<script>alert('wrong email or password');
    window.location.href='signin.php';
    </script>";
}
else{
    $myarray = mysqli_fetch_array($result);
    $_SESSION['email']=$email;
    $_SESSION['id']=$myarray['id'];
    header('Location: dashboard.php');
}

?>