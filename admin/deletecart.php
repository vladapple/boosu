<?php
include_once("../connection.php");
session_start();

$id = $_GET['id'];

$result = mysqli_query($conn, "DELETE FROM cart WHERE id = '$id'");

header("location: cart.php");

?>