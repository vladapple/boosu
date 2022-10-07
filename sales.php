<?php
 include_once "connection.php";
 include_once "checkifadded.php";
 include_once "rating.php";
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
   
            <div class="container center">
                <div class="jumbotron" style="background-color:rgba(239, 230, 209, 0.925)">
                    <h1>Welcome to our Boosu eBook Store!</h1><br>
                    <p class="green">Read, Rate, Leave Reviews, Make Your Favorite List of Our Best Bestseller Books!!!</p>
                </div>
            </div>
            <div class="container">
                <?php
                    $result = mysqli_query($conn, "SELECT * FROM books WHERE status='available' order by isbn desc");
                    
                    $row = 0;
                    echo "<div class='row'>";
                    while($book = mysqli_fetch_array($result)){
                        if($row == 4){
                            echo "</div><br><br>";
                            echo "<div class='row'>"; 
                            $row = 0;
                        }
                            
                            $isbn = $book['isbn'];
                            echo "<div class='col-md-3 col-sm-6'>";
                            echo "<div class='thumbnail'>";
                            echo "<a href='review.php?isbn=".$isbn."'><img src='images/".$isbn.".jpg' alt='Book'></a>";
                            echo "<center>";
                            echo "<div class='caption'>";
                            echo "<h4><b>".$book['title']."</b></h4>";
                            echo "<h5 class='green'>by: ".$book['author']."</h5>";
                            echo "<a href='review.php?isbn=".$isbn."'>".rating($isbn)."</a>";
                            echo "<br><p><b>$".$book['price']."</b></p>";
                            if(!isset($_SESSION['email'])){ 
                                echo "<p><a href='login.php' role='button' class='btn btn-danger btn-block'>Buy Now</a></p>";
                            }
                            else{
                                if(checkifadded($isbn)){
                                    echo '<a href="#" class=btn btn-block btn-danger disabled>Added to cart</a>';
                                }else{
                                    echo "<a href='cart_add.php?isbn=".$isbn."' class='btn btn-block btn-danger' name='add' value='add'>Add to cart</a>";
                                }
                            }
                            echo "</div></center></div></div>";
                            $row++;    
                    }
                echo "</div><br><br><br><br><br>"; 
                ?>
    
                                                       
    <?php  
        require 'footer.php';
    ?>
        
</body>
</html>