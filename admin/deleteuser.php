<?php
include_once("../connection.php");
session_start();

$id = $_GET['id'];

$result = mysqli_query($conn, "DELETE FROM users WHERE id = $id");

header("location: user.php");

?>