<?php
include_once "../connection.php";
session_start();
if(isset($_SESSION['email'])){
$isbn = mysqli_real_escape_string($conn,$_POST['isbn']);
$title = mysqli_real_escape_string($conn,$_POST['title']);
$author = mysqli_real_escape_string($conn,$_POST['author']);
$genre = mysqli_real_escape_string($conn,$_POST['genre']);
$synopsis = mysqli_real_escape_string($conn,$_POST['synopsis']);
$price = mysqli_real_escape_string($conn,$_POST['price']);

$check = "SELECT isbn FROM books WHERE isbn = '$isbn'";
$result = mysqli_query($conn , $check);

if(mysqli_num_rows($result)>0){
  echo "<script>alert('The book with ISBN: $isbn already exists!');
        window.location.href='book.php';
        </script>";
}else{
    
    $user_query = "INSERT INTO books(isbn, title, author, genre, synopsis, price)
                    VALUES ('$isbn','$title','$author','$genre','$synopsis', '$price')";

    mysqli_query($conn , $user_query);
    echo "<script>alert('The book was added!');
    window.location.href='book.php';
    </script>";
}
}

?>