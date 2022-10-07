<?php
    include_once("../connection.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <title>Admin-Boosu-Reviews</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body>
        <?php  
                require 'header.php';
        ?><br><br>
     <div class="container" style="text-align:center">   
        <h3 class="red">Reviews:</h3><br><br>
        
        <table class="table table-striped" style="text-align:left">
            <tr>
                <th>#</th>
                <th>ISBN</th>
                <th>USER ID</th>
                <th>MESSAGE</th>
                <th>RATING</th>
                <th>CREATED | UPDATED</th>
                <th>EDIT | DEL</th>
            </tr>
        <?php
            $result = mysqli_query($conn, "SELECT * FROM reviews order by created desc");
            while($review = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>".$review['id']."</td>";
                echo "<td>".$review['isbn']."</td>";
                echo "<td>".$review['user_id']."</td>";
                echo "<td><small>".$review['message']."</small></td>";
                echo "<td>".$review['rate']."</td>";
                echo "<td>".$review['created']."</td>";
                echo "<td>
                <a href='editreview.php?id=$review[id]'><img src='../images/Edit_Icon_16.png' alt='edit'/></a>&nbsp;&nbsp; | &nbsp;&nbsp;
                <a href='deletereview.php?id=$review[id]'><img src='../images/Delete_Icon_16.png' alt='delete'/></a>
                </td>";
                echo "</tr>";
            }
        ?>
        </table>
        <br>
        <br><br><br><br><br>
    <?php  
        require 'footer.php';
    ?>
   
</body>
</html>