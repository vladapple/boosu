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
        <h3 style="color:red;">REGISTRATION:</h3><br>
        <form action="signup_submit.php" method="POST" name = "form">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="First and Last Name" pattern="^((\b[a-zA-Z\-\.]{2,})\s*){2,}$" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password 7 characters" pattern=".{7,}" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="pass" placeholder="Repeat password" pattern=".{7,}" required>
            </div>
            <input type="reset" name="reset" value="Reset" class="btn btn-danger">
            <input type="submit" name="submit" value="Sign up" class="btn btn-danger">
        </form><br>
    </div>
           <br><br><br><br><br>
    <?php  
        require 'footer.php';
    ?>
         
</body>
</html>