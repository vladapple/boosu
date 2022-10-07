<?php
 include_once "../connection.php";
 session_start();

 $isbn = $_GET['isbn'];
 $query = "SELECT * FROM books WHERE isbn='$isbn'";
 $result = mysqli_query($conn ,$query);
 $arr_book = mysqli_fetch_array($result);
 $title = $arr_book['title'];
 $author = $arr_book['author'];
 $genre = $arr_book['genre'];
 $synopsis = $arr_book['synopsis'];
 $date = $arr_book['created'];
 $price = $arr_book['price'];
 $status = $arr_book['status'];

 function changeStatus($stat){
    if($stat == "unavailable"){
        return "available";
    }
    return "unavailable";
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
        <title>Admin-Boosu-Books-Update</title>
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
        <h4 style="color:red;">Edit Book:</h4>
        <form action="editbook_submit.php" method="POST" name = "form">
            <div class="form-group">
                <input type="hidden" class="form-control" name="isbn" value="<?php echo $isbn; ?>">
            </div>
            <div class="form-group">
            <label for="title">Title:</label><br>
                <input type="text" class="form-control" name="title" id = "title" value="<?php echo $title; ?>" required>
            </div>
            <div class="form-group">
                <label for="author">Author:</label><br>
                <input type="text" class="form-control" name="author" id = "author" value="<?php echo $author; ?>" required>
            </div>
            <div class="form-group">
                <label for="genre">Genre:</label><br>
                <input type="text" class="form-control" name="genre" id = "genre" value="<?php echo $genre; ?>" required>
            </div>
            <div class="form-group">
                <label for="synopsis">Synopsis:</label><br>
                <textarea class="form-control" name="synopsis" id="synopsis" required><?php echo $synopsis; ?></textarea>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="created" value="<?php echo $date; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="price">Price $ CAD:</label><br>
                <input type="text" class="form-control" name="price" id="price" value="<?php echo $price; ?>" required>
            </div>
            <br>
            <div class="form-group">
                <select name="status">
                    <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                    <option value="<?php echo changeStatus($status);?>"><?php echo changeStatus($status);?></option>
                </select>
            </div>
            <br><br>
            <input type="submit" name="submit" value="Update Book" class="btn btn-danger">
        </form><br>
    </div>
           <br><br><br><br><br>
    <?php  
        require 'footer.php';
    ?>
    
</body>
</html>