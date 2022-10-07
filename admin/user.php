<?php
    include_once("../connection.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <title>Admin-Boosu-Users</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body>
        <?php  
                require 'header.php';
        ?><br><br>
     <div class="container" style="text-align:center">   
        <h3 class="red">Users:</h3><br><br>
        <form action="user.php" method="post">
        <table class="table table-striped" style="text-align:left">
            <tr>
                <th>SEND TO</th>
                <th>#</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>CREATED | UPDATED</th>
                <th>STATUS</th>
                <th>EDIT | DEL</th>
            </tr>
        <?php
        if(isset($_SESSION['email'])){
            $result = mysqli_query($conn, "SELECT * FROM users order by id");
            while($user = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td><input type='checkbox' name='emails[]' value='".$user['email']."'/></td>";
                echo "<td>".$user['id']."</td>";
                echo "<td>".$user['name']."</td>";
                echo "<td>".$user['email']."</td>";
                echo "<td>".$user['created']."</td>";
                echo "<td>".$user['status']."</td>";
                echo "<td><a href='edituser.php?id=$user[id]'><img src='../images/Edit_Icon_16.png' alt='edit'/></a>&nbsp;&nbsp; | &nbsp;&nbsp;
                <a href='deleteuser.php?id=$user[id]'><img src='../images/Delete_Icon_16.png' alt='delete'/></a></td>";
                echo "</tr>";
            }
        }
        ?>
        </table>
            <div class="form-group">
            <h4 class="red">Message:</h4>
            <textarea name="message" rows="4" cols="50"></textarea>
            </div>
            <input type="submit" name="submit" value="Send email(s)" class="btn btn-danger">
        </form>
        <br>
     </div>
        <br><br><br><br><br>

    <?php  
        require 'footer.php';
    ?>

<?php
//send email to chosen users

if(isset($_POST['submit'])){
    $to_email = $_POST['emails'];
    $text = $_POST['message'];
    
        $subject = "BOOSU EBOOK STORE";

        //html page
        $html = '<html><head></head><body>';
        $html .= '<h3 style="color:red;">Hello,</h3>';
        $html .= '<p>'.$text.'</p><br>';
        $html .= '<p>Sincerely,<br>BOOSU EBOOK STORE</p>';
        $html .= '</body></html>';

        $from = "boosu@gmail.com";

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();

        foreach($to_email as $item){
            if (mail($item, $subject, $html, $headers)){
                echo "<script>alert('Emails has been sent!');
                window.location.href='user.php';
                </script>";
            }
            else{
                echo "<script>alert('Unknown error occured, email was not sent!');
                window.location.href='user.php';
                </script>";
            }
        }
}

?>
</body>
</html>