<?php
    include_once("../connection.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <title>Admin-Boosu-Cart</title>
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
        <br><br>
     <div class="container" style="text-align:center">   
        <h3 class="red">Shopping carts not paid:</h3><br><br>
        <br><br><br>
        <table class="table table-striped" style="text-align:left">
            <tr>
                <th>#</th>
                <th>ISBN</th>
                <th>USER ID</th>
                <th>CREATED AT</th>
                <th>STATUS</th>
                <th>DEL</th>
            </tr>
        <?php
            $result = mysqli_query($conn, "SELECT * FROM cart order by created asc");
            while($cart = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>".$cart['id']."</td>";
                echo "<td>".$cart['isbn']."</td>";
                echo "<td>".$cart['user_id']."</td>";
                echo "<td>".$cart['created']."</td>";
                echo "<td>".$cart['status']."</td>";
                echo "<td>
                <a href='deletecart.php?id=$cart[id]'><img src='../images/Delete_Icon_16.png' alt='delete'/></a>
                </td>";
                echo "</tr>";
            }
        ?>
        </table>
        <br><br>
        <h3 class="red">Transactions paid:</h3><br><br>
        <table class="table table-striped" style="text-align:left">
            <tr>
                <th>#</th>
                <th>ISBN</th>
                <th>USER ID</th>
                <th>PAID AT</th>
                <th>STATUS</th>
            </tr>
        <?php
            $result = mysqli_query($conn, "SELECT * FROM cartpaid order by id desc ");
            while($cartpaid = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>".$cartpaid['id']."</td>";
                echo "<td>".$cartpaid['isbn']."</td>";
                echo "<td>".$cartpaid['user_id']."</td>";
                echo "<td>".$cartpaid['paid_at']."</td>";
                echo "<td>".$cartpaid['status']."</td>";
                echo "</tr>";
            }
        ?>
        </table>
     </div>
        <br>
        <br><br><br><br><br>
    <?php  
        require 'footer.php';
    ?>
   
</body>
</html>