<?php
include_once("../connection.php");
session_start();

$isbn = $_GET['isbn'];

$query = "SELECT * from books WHERE isbn='$isbn' AND status='unavailable'";

$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result)==0){
    $result = mysqli_query($conn, "UPDATE books SET status = 'unavailable' WHERE isbn='$isbn'");
    header("location: book.php");
}
else{
    $result = mysqli_query($conn, "DELETE FROM books WHERE isbn='$isbn'");
    header("location: book.php");
}





?>