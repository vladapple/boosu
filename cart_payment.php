<?php
include_once "connection.php";
session_start();

$userid = $_SESSION['id'];

$paid = $_GET['total'];

$query = "SELECT * FROM cart WHERE user_id = '$userid'";
$result = mysqli_query($conn , $query);


while($cart = mysqli_fetch_array($result)){
    $isbn = $cart['isbn'];
    mysqli_query($conn , "INSERT INTO cartpaid(isbn, user_id) values ('$isbn', '$userid')");   
}

mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$userid'");

//send email with details of payment
$to_email = $_SESSION['email'];
$subject = "BOOSU EBOOK STORE";

//html page
$html = '<html><head></head><body>';
$html .= '<h3 style="color:orange;">Hi,</h3><br>';
$html .= '<p>You have just bought eBooks in our store<br>';
$html .= 'and the total you have paid = <b>$'.$paid.' CAD</b></p><br><br>';
$html .= '<p>Sincerely,<br>';
$html .= 'BOOSU EBOOK STORE</p>';
$html .= '</body></html>';

$from = "boosu@gmail.com";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

if (mail($to_email, $subject, $html, $headers)){
    echo "<script>alert('Thank you for your payment! Check your Email!');
    window.location.href='sales.php';
    </script>"; 
}
else{
    echo "<script>alert('Email sending failed!');
    window.location.href='cart.php';
    </script>"; 
}

?>
