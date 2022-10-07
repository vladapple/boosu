<?php
 include_once "connection.php";
 session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
        <title>Boosu eBook Store</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
    <?php  
            require 'header.php';
    ?>
        <br><br><br>
    <div class="container">
        <h4 style="color:red;">Forgot your password? Don't worry, we will send it!</h4><br>
        <form action="forgotpassword.php" method="POST" name = "form">
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
            </div>
            
            <input type="reset" name="reset" value="Reset" class="btn btn-danger">
            <input type="submit" name="submit" value="Send" class="btn btn-danger">
        </form><br>
    </div>
           <br><br><br><br><br>
    <?php  
        require 'footer.php';
    ?>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $user_query = "SELECT email, pass FROM users WHERE email='$email'";
    $result = mysqli_query($conn ,$user_query );

    if(mysqli_num_rows($result)!= 0){
        $myarray = mysqli_fetch_array($result);
        $pass = $myarray['pass'];
        $to_email = array();
        array_push($to_email, $email);

        $subject = "BOOSU EBOOK STORE";

        //html page
        $html = '<html><head></head><body>';
        $html .= '<h3 style="color:orange;">Hi,</h3><br>';
        $html .= '<p>You asked for your password!</p>';
        $html .= '<p>Your password: <b>'.$pass.'</b></p>';
        $html .= '<p>Sincerely,<br>';
        $html .= 'BOOSU EBOOK STORE</p>';
        $html .= '</body></html>';

        $from = "boosu@gmail.com";

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();

        foreach($to_email as $item){
            if (mail($item, $subject, $html, $headers)){
                echo "<script>alert('Check your mail box for your password!');
                window.location.href='signin.php';
                </script>";
            }
            else{
                echo "<script>alert('Unknown error occured, email was not sent!');
                window.location.href='signin.php';
                </script>";
            }
        }
    }
    else{
        echo "<script>alert('Check your mail box for your password!');
        window.location.href='signin.php';
        </script>";
    }
}

?>