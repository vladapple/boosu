<?php
session_start();
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
        <div>
            <?php  
                require 'header.php';
            ?>
           <div id="bannerImage">
               <div class="container">
                   <center>
                   <div id="bannerContent">
                       <h1>Our Bestseller Books!</h1><br>
                       <a href="signin.php" class="btn btn-danger">Read Now</a>
                   </div>
                   </center>
               </div>
           </div>
           <div class="container">
               <div class="row">
                   <div class="col-xs-4">
                       <div  class="thumbnail">
                           <a href="signin.php">
                                <img src="images/10001.jpg" alt="book">
                           </a>
                           <center>
                                <div class="caption">
                                        <p id="autoResize"></p>
                                        <p><a href="signin.php" class="btn btn-danger">Read Now</a></p>
                                </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-4">
                       <div class="thumbnail">
                           <a href="signin.php">
                               <img src="images/10002.jpg" alt="book">
                           </a>
                           <center>
                                <div class="caption">
                                    <p id="autoResize"></p>
                                    <p><a href="signin.php" class="btn btn-danger">Read Now</a></p>
                                </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-4">
                       <div class="thumbnail">
                           <a href="signin.php">
                               <img src="images/10003.jpg" alt="book">
                           </a>
                           <center>
                               <div class="caption">
                                   <p id="autoResize"></p>
                                   <p><a href="signin.php" class="btn btn-danger">Read Now</a></p>
                               </div>
                           </center>
                       </div>
                   </div>
               </div>
           </div>
            <br><br> <br><br><br><br>
            <?php  
                require 'footer.php';
            ?>
        </div>        
    </body>
</html>