<?php
include_once "connection.php";
session_start();

$isbn = $_GET['isbn'];
$userid = $_SESSION['id'];

$addquery= "INSERT INTO cart(isbn, user_id) values ('$isbn', '$userid')";

mysqli_query($conn, $addquery);
header('location: sales.php');

?>