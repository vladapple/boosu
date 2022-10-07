<?php
 include_once "connection.php";
 session_start();

 $email = mysqli_real_escape_string($conn,$_POST['email']);
 $reg_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
 if(!preg_match($reg_email , $email)){
     echo "Incorrect email";
 }

$password = md5(mysqli_real_escape_string($conn,$_POST['password']));
if(strlen($password)<7){
    echo "password should be bigger or equal to 7 char";
}

$user_query = "SELECT email FROM users WHERE email='$email'";
$result = mysqli_query($conn ,$user_query );

if(mysqli_num_rows($result)==0){
    echo "<script>alert('You are not registered yet');
        window.location.href='signup.php';
        </script>";
}
else{
    $query = "SELECT status FROM users WHERE email='$email'";
    $result = mysqli_query($conn ,$query );
    $stat = mysqli_fetch_array($result);
    $status = $stat['status'];
    if($status == 'disabled'){
        echo "<script>alert('Your account is blocked, contact us!');
        window.location.href='index.php';
        </script>";
    }

    //user will be blocked after 3 failed attempts
    $query = "SELECT attempt FROM users WHERE email='$email'";
    $result = mysqli_query($conn ,$query );
    $arr = mysqli_fetch_array($result);
    $attempt = $arr['attempt'];
    $attempt += 1;
    if($attempt > 2){
        mysqli_query($conn,"UPDATE users SET status ='disabled' WHERE email='$email'");
        echo "<script>alert('Too many failed attempts, your account has been blocked, contact us!');
        window.location.href='index.php';
        </script>";
    }
    mysqli_query($conn,"UPDATE users SET attempt ='$attempt' WHERE email='$email'");
}

$user_query = "SELECT id,email FROM users WHERE email='$email' and password='$password'";
$result = mysqli_query($conn ,$user_query );

if(mysqli_num_rows($result)==0){
    echo "<script>alert('wrong email or password');
    window.location.href='signin.php';
    </script>";
}

$user_query = "SELECT id,email FROM users WHERE email='$email' and password='$password' and status='enabled'";
$result = mysqli_query($conn ,$user_query );

if(mysqli_num_rows($result)==0){
    echo "<script>alert('Your account is blocked, please contact us!');
    window.location.href='index.php';
    </script>";
}
else{
    $myarray = mysqli_fetch_array($result);
    $_SESSION['email']=$email;
    $_SESSION['id']=$myarray['id'];

    //successful login attempt = 0
    $attempt = 0;
    mysqli_query($conn,"UPDATE users SET attempt ='$attempt' WHERE email='$email'");
    header('Location: sales.php');
}

?>