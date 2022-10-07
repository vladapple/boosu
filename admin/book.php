<?php
    include_once("../connection.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <title>Admin-Boosu-Books</title>
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
        <h3 class="red">Books:</h3><br><br>
        <a href="addbook.php" class="green"><img src="../images/plus.png" alt="create book"/>&nbsp; Add Book</a>
        <br><br><br>
        <table class="table table-striped" style="text-align:left">
            <tr>
                <th>ISBN</th>
                <th>TITLE</th>
                <th>AUTHOR</th>
                <th>GENRE</th>
                <th>SYNOPSIS</th>
                <th>CREATED | UPDATED</th>
                <th>PRICE</th>
                <th>STATUS</th>
                <th>EDIT | DEL</th>
            </tr>
        <?php
        if(isset($_SESSION['email'])){
            $result = mysqli_query($conn, "SELECT * FROM books order by isbn desc");
            while($book = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>".$book['isbn']."</td>";
                echo "<td style='width:10%'><small>".$book['title']."</small></td>";
                echo "<td>".$book['author']."</td>";
                echo "<td>".$book['genre']."</td>";
                echo "<td style='width:30%'><small>".$book['synopsis']."</small></td>";
                echo "<td>".$book['created']."</td>";
                echo "<td>".$book['price']."</td>";
                echo "<td>".$book['status']."</td>";
                echo "<td>
                <a href='editbook.php?isbn=$book[isbn]'><img src='../images/Edit_Icon_16.png' alt='edit'/></a>&nbsp;&nbsp; | &nbsp;&nbsp;
                <a href='deletebook.php?isbn=$book[isbn]'><img src='../images/Delete_Icon_16.png' alt='delete'/></a>
                </td>";
                echo "</tr>";
            }
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