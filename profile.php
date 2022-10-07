<?php
 include_once "connection.php";
 session_start();
 $email = $_SESSION['email'];
 $query = "SELECT * FROM users WHERE email='$email'";
 $result = mysqli_query($conn ,$query );
 $arr = mysqli_fetch_array($result);
 $name = $arr['name'];
 $password = $arr['pass'];
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
        <h4 style="color:red;"><img src="images/user.png" alt="user"/> Profile:</h4><br>
        <form action="profile.php" method="POST" name = "form">
            <div class="form-group">
                <label for="name">Your name:</label><br>
                <input type="text" class="form-control" name="name" id = "name" value="<?php echo $name; ?>" pattern="^((\b[a-zA-Z\-\.]{2,})\s*){2,}$" required>
            </div>
            <div class="form-group">
                <label for="email">Your email:</label><br>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>" disabled>
            </div>
            <br>
            <div class="form-group">
                <label for="password">Your password can be changed here:</label><br>
                <input type="password" class="form-control" name="password" id="password" value="<?php echo $password; ?>" pattern=".{7,}" required>
                <br><img src="images/eye.png" onclick="myFunction()"/>
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
            <input type="submit" name="submit" value="Save" class="btn btn-danger">
        </form><br>
    </div>
           <br><br><br><br><br>
    <?php  
        require 'footer.php';
    ?>
    


<?php
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $password = md5(mysqli_real_escape_string($conn,$_POST['password']));
        $pass = $_POST['password'];
        $user_query = "UPDATE users SET name ='$name', password = '$password', pass = '$pass' WHERE email='$email'";

        mysqli_query($conn,$user_query);
        header('Location: sales.php');
    }

?>       
</body>
</html>