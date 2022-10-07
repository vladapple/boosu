<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin-Boosu</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/style.css" type="text/css">
    </head>
    <body>
        <div>
            <?php  
                require 'header.php';
            ?>
                <br><br>
               <div class="container" style="text-align:center">
                   
                       <h3>welcome <small class="red"><?php echo $_SESSION['email'];?></small></h3><br><br>
                       <img src="../images/admin.png" alt="admin" width="30%"/>
                  
               </div>
            <br><br> <br><br><br><br>
            <?php  
                require 'footer.php';
            ?>
        </div>
    </body>
</html>