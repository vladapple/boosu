<?php
include_once "connection.php";
session_start();

$isbn = $_GET['isbn'];
$userid = $_SESSION['id'];
$query = "SELECT * FROM books WHERE isbn='$isbn'";
$result = mysqli_query($conn ,$query);
$arr_book = mysqli_fetch_array($result);
$title = $arr_book['title'];
$author = $arr_book['author'];
$genre = $arr_book['genre'];
$synopsis = $arr_book['synopsis'];
?>
<!DOCTYPE html>
<html>
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
               <div class="row">
                   <div class="col-xs-4">
                       <div  class="thumbnail">
                                <img src="images/<?php echo $isbn; ?>.jpg" alt="book">
                                <center>
                                <div class="caption">
                                        <p id="autoResize"></p>
                                    <?php
                                        echo "<a href='favorite_submit.php?isbn=".$isbn."'>";
                                    ?>
                                        <h5 class="red">Add to favorites</h5>
                                        <img src="images/heart1.png" alt="book">
                                    </a>
                                </div>
                                </center>
                       </div>
                   </div>
                   <div class="col-xs-8">
                       <div class="thumbnail">              
                                <div class="caption">
                                    <p id="autoResize"></p>
                                    <h1><?php echo $title; ?></h1>
                                    <h5 class="green">By: <?php echo $author; ?></h4><br>
                                    <h4>Genre: <?php echo $genre; ?></h4><br>
                                    <h4><b>Synopsis:</b></h4>
                                    <p><?php echo $synopsis; ?></p>
                                    <form action="review_submit.php" method="POST" name = "form">
                                        <input type="hidden" name="isbn" value="<?php echo $isbn; ?>">
                                        <input type="hidden" name="user_id" value="<?php echo $userid; ?>">

                                        <div class="form-group">
                                            <label for="message">Review:</label><br>
                                            <textarea class="form-control" name="message" required></textarea>
                                        </div>
                                        <div class="form-group">
                                           <label>Rate this book:</label><br>
                                           <input type="radio" name="rate" value="1">                                         
                                           <input type="radio" name="rate" value="2">                                           
                                           <input type="radio" name="rate" value="3">
                                           <input type="radio" name="rate" value="4">
                                           <input type="radio" name="rate" value="5"><br>
                                           <span><small>(1,2,3,4,5 stars)</small></span>
                                        </div>
                                        <input type="submit" name="submit" value="Submit" class="btn btn-danger">
                                    </form><br><br>
                                    <h4 class="red">REVIEWS:</h4>
                                <?php
                                    $query = "SELECT u.name as name, r.message as message, r.created as created 
                                                FROM users as u
                                                INNER JOIN reviews as r 
                                                ON u.id = r.user_id
                                                WHERE r.isbn = '$isbn'";

                                    $result = mysqli_query($conn, $query);
                                    while($reviews = mysqli_fetch_array($result)){
                                        echo "<small class='green'>".$reviews['created']."</small>";
                                        echo "<h5><b>".$reviews['name']."</b></h5>";
                                        echo "<p>".$reviews['message']."</p>";
                                        echo "<br>";
                                    }
                                ?>
                                </div>
                       </div>
                   </div>
               </div>
           </div>
            <br><br> <br><br><br><br>
            <?php  
                require 'footer.php';
            ?>

    </body>
</html>