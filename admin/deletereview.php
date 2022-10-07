<?php
include_once("../connection.php");
session_start();

$id = $_GET['id'];

$result = mysqli_query($conn, "DELETE FROM reviews WHERE id = $id");

header("location: review.php");

?>