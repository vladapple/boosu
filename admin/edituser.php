<?php
 include_once "../connection.php";
 session_start();

 $id = $_GET['id'];
 $query = "SELECT * FROM users WHERE id='$id'";
 $result = mysqli_query($conn ,$query);
 $arr_user = mysqli_fetch_array($result);
 $name = $arr_user['name'];
 $email = $arr_user['email'];
 $pass = $arr_user['pass'];
 $date = $arr_user['created'];
 $status = $arr_user['status'];
 $attempt = $arr_user['attempt'];

 function changeStatus($stat){
    if($stat == "disabled"){
        return "enabled";
    }
    return "disabled";
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
        <title>Admin-Boosu-Users-Update</title>
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
        <h4 style="color:red;"><img src="../images/user.png" alt="user"/> Edit User:</h4><br>
        <form action="edituser_submit.php" method="POST" name = "form">
            <div class="form-group">
                <input type="hidden" class="form-control" name="id" id = "id" value="<?php echo $id; ?>">
            </div>
            <div class="form-group">
                <label for="name">Name:</label><br>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>" pattern="^((\b[a-zA-Z\-\.]{2,})\s*){2,}$" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label><br>
                <input type="email" class="form-control" name="email" id = "email" value="<?php echo $email; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="created">Created/updated at:</label><br>
                <input type="text" class="form-control" name="created" id = "created" value="<?php echo $date; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="password">Password:</label><br>
                <input type="password" class="form-control" name="password" id="password" value="<?php echo $pass; ?>" pattern=".{7,}" required>
                     <img src="../images/eye.png" onclick="myFunction()"/>
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
            </div>
            <br>
            <div class="form-group">
                <label for="attempt">Bad attempts</label><br>
                <input type="text" class="form-control" name="attempt" id = "attempt" value="<?php echo $attempt; ?>" required>
            </div>
            <div class="form-group">
                <select name="status">
                    <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                    <option value="<?php echo changeStatus($status);?>"><?php echo changeStatus($status);?></option>
                </select>
            </div>
            <br><br>
            <input type="submit" name="submit" value="Update User" class="btn btn-danger">
        </form><br>
    </div>
           <br><br><br><br><br>
    <?php  
        require 'footer.php';
    ?>
    
</body>
</html>