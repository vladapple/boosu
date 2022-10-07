<?php
 include_once "../connection.php";
 session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
        <title>Admin-Boosu-ADD-Book</title>
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
        <h3 style="color:red;">ADD NEW BOOK:</h3><br>
        <form action="addbook_submit.php" method="POST" name = "form">
            <div class="form-group">
                <input type="text" class="form-control" name="isbn" placeholder="ISBN"  pattern=".{5,}" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Title" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="author" placeholder="Author" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="genre" placeholder="Genre" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="synopsis" placeholder="Synopsis" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="price" placeholder="Price" required>
            </div><br><br>
            <input type="reset" name="reset" value="Reset" class="btn btn-danger">
            <input type="submit" name="submit" value="Add Book" class="btn btn-danger">
        </form><br>
    </div>
           <br><br><br><br><br>
    <?php  
        require 'footer.php';
    ?>
         
</body>
</html>