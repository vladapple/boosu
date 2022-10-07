<?php
    include_once("connection.php");
    session_start();

    $userid = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <title>Admin-Boosu-Reviews</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<?php  
                require 'header.php';
        ?><br><br>
     <div class="container" style="text-align:center">   
        <h3 class="red">Shopping Cart:</h3><br><br>
        
        <table class="table table-striped" style="text-align:left">
            <tr>
                <th>ISBN</th>
                <th>TITLE</th>
                <th>AUTHOR</th>
                <th>GENRE</th>
                <th>PRICE</th>
                <th>DEL</th>
            </tr>
        <?php
            $query = "SELECT c.isbn as isbn, b.title as title, b.author as author, b.genre as genre, b.price as price
            FROM cart as c
            INNER JOIN books as b 
            ON c.isbn = b.isbn
            WHERE c.user_id = '$userid'";

            $result = mysqli_query($conn, $query);
            $total = 0;
            
            while($cart = mysqli_fetch_array($result)){
                $total += $cart['price'];
                echo "<tr>";
                echo "<td>".$cart['isbn']."</td>";
                echo "<td>".$cart['title']."</td>";
                echo "<td>".$cart['author']."</td>";
                echo "<td>".$cart['genre']."</td>";
                echo "<td>".round($cart['price'], 3)."</td>";
                echo "<td>
                <a href='deletecart.php?isbn=$cart[isbn]'><img src='images/Delete_Icon_16.png' alt='delete'/></a>
                </td>";
                echo "</tr>";
            }
            $total = round($total, 2);
            $tax = round($total*0.145, 2);
            echo "<tr>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td><b>Total:</b></td>";
                echo "<td></td>";
                echo "<td><b>$".$total."</b></td>";
                echo "<td></td>";
                echo "</tr>";
        ?>
        </table>
        <br>
        <?php
            $total += $tax;
            $total = round($total, 2);
            echo "<b>$".$total." CAD (including taxes)</b><br><br><br>";
            echo "<a href='cart_payment.php?total=$total' class='btn btn-danger' name='add' value='add'>Pay</a>";
        ?>
     </div>
     
        <br><br><br><br><br>
    <?php  
        require 'footer.php';
    ?>
   
</body>
</html>