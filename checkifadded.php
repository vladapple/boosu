<?php
function checkifadded($isbn){
    require "connection.php";
    $userid = $_SESSION['id'];
    $result = "SELECT * FROM cart where isbn='$isbn' and user_id='$userid' ";

    $test = mysqli_query($conn,$result);
    $numofrows = mysqli_num_rows($test);
    if($numofrows>=1){
        return 1;
    }else{
    return 0;
    }
}
?>