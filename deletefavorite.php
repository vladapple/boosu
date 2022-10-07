<?php
include_once("connection.php");
session_start();

$isbn = $_GET['isbn'];
$userid = $_SESSION['id'];



$result = mysqli_query($conn, "DELETE FROM favorites WHERE user_id = '$userid' AND isbn = '$isbn'");

header("location: favorites.php");

?>