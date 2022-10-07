<?php
    include_once("connection.php");
    session_start();

    $userid = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <title>Boosu-favorites</title>
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
        <h3 class="red">My favorite books:</h3><br><br>
        
        <table class="table table-striped" style="text-align:left">
            <tr>
                <th>ISBN</th>
                <th>TITLE</th>
                <th>AUTHOR</th>
                <th>GENRE</th>
                <th>DEL</th>
            </tr>
        <?php
            $query = "SELECT f.isbn as isbn, b.title as title, b.author as author, b.genre as genre 
            FROM favorites as f
            INNER JOIN books as b 
            ON f.isbn = b.isbn
            WHERE f.user_id = '$userid'";

            $result = mysqli_query($conn, $query);
            while($favorite = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>".$favorite['isbn']."</td>";
                echo "<td>".$favorite['title']."</td>";
                echo "<td>".$favorite['author']."</td>";
                echo "<td>".$favorite['genre']."</td>";
                echo "<td>
                <a href='deletefavorite.php?isbn=$favorite[isbn]'><img src='images/Delete_Icon_16.png' alt='delete'/></a>
                </td>";
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