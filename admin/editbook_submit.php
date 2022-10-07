<?php
 include_once "../connection.php";
 session_start();
    if(isset($_POST['submit'])){
        $isbn = $_POST['isbn'];
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $author = mysqli_real_escape_string($conn, $_POST['author']);
        $genre = mysqli_real_escape_string($conn, $_POST['genre']);
        $synopsis = mysqli_real_escape_string($conn, $_POST['synopsis']);
        $price = $_POST['price'];
        $status = $_POST['status'];

        $book_query = "UPDATE books SET title ='$title', author = '$author', genre = '$genre',
        synopsis = '$synopsis', price = '$price', status = '$status' WHERE isbn='$isbn'";

        mysqli_query($conn, $book_query);
        header("location: book.php");
    }
?>     