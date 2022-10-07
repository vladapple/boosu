<?php
$database = "boosu";
$server = "localhost:3307";
$user = "root";
$pass = "";

$conn = mysqli_connect($server, $user, $pass, $database) or die (mysqli_error($conn));

?>