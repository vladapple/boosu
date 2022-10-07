<?php
 include_once "../connection.php";
 session_start();

 $id = $_GET['id'];
 $query = "SELECT * FROM reviews WHERE id='$id'";
 $result = mysqli_query($conn ,$query);
 $arr_review = mysqli_fetch_array($result);
 $isbn = $arr_review['isbn'];
 $user_id = $arr_review['user_id'];
 $rate = $arr_review['rate'];
 $message = $arr_review['message'];
 $date = $arr_review['created'];
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
        <title>Admin-Boosu-Reviews-Update</title>
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
        <h4 style="color:red;">Edit Review:</h4>
        <form action="editreview_submit.php" method="POST" name = "form">
            <div class="form-group">
                <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>">
            </div>
            <div class="form-group">
            <label for="isbn">ISBN:</label><br>
                <input type="text" class="form-control" name="isbn" id = "isbn" value="<?php echo $isbn; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="user_id">User id:</label><br>
                <input type="text" class="form-control" name="user_id" id = "user_id" value="<?php echo $user_id; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="rate">Book rating:</label><br>
                <input type="text" class="form-control" name="rate" id = "rate" value="<?php echo $rate; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="created">Review created/updated at:</label><br>
                <input type="text" class="form-control" name="created" id="created" value="<?php echo $date; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="message">Review:</label><br>
                <textarea class="form-control" name="message" id="message"><?php echo $message; ?></textarea>
            </div>
            <br><br>
            <input type="submit" name="submit" value="Update Review" class="btn btn-danger">
        </form><br>
    </div>
           <br><br><br><br><br>
    <?php  
        require 'footer.php';
    ?>
    
</body>
</html>