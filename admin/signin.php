<?php
 include_once "../connection.php";
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
        <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body>
        <?php  
                require 'header.php';
        ?>
        <br><br><br>
        <div class="container">
        <h3 style="color:red;">LOG IN TO DASHBOARD:</h3><br>
        <form action="login_submit.php" method="POST" name = "form">
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password 7 characters" pattern=".{7,}" required>
                <br><img src="../images/eye.png" onclick="myFunction()"/>
                <script>
                    function myFunction() {
                        var x = document.getElementById("password");
                        if (x.type === "password") {
                        x.type = "text";
                        } else {
                        x.type = "password";
                        }
                    }
                </script>
            </div><br>
            <input type="reset" name="reset" value="Reset" class="btn btn-danger">
            <input type="submit" name="submit" value="Log in" class="btn btn-danger">
        </form><br>
    </div>
           <br><br><br><br><br>
    <?php  
        require 'footer.php';
    ?>
</body>
</html>