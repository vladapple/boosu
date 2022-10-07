<?php
function rating($isbn){
    require "connection.php";
    $query = "SELECT COUNT(isbn) as votes, sum(rate) as total FROM reviews where isbn='$isbn' and rate IS NOT NULL";
    $result = mysqli_query($conn, $query);
    $rate = mysqli_fetch_array($result);

    if($rate['votes']==0){
        echo "<img src='images/empty.png' class='star'/>
        <img src='images/empty.png' class='star'/>
        <img src='images/empty.png' class='star'/>
        <img src='images/empty.png' class='star'/>
        <img src='images/empty.png' class='star'/><br>
        <small>0.0 (0) votes</small><br>";
    }
    else{
            $votes = $rate['votes'];
            $total = $rate['total'];
            $votesF = number_format($votes, 2);
            $totalF = number_format($total, 2);
        
        $r = round($totalF/$votesF, 1);
        if($r>0 && $r<0.4){
            echo "<img src='images/empty.png' class='star'/>
            <img src='images/empty.png' class='star'/>
            <img src='images/empty.png' class='star'/>
            <img src='images/empty.png' class='star'/>
            <img src='images/empty.png' class='star'/><br>
            <small>".$r." (".$votes.") votes</small><br>";
        }
        if($r>=0.4 && $r<0.8){
            echo "<img src='images/half.png' class='star'/>
            <img src='images/empty.png' class='star'/>
            <img src='images/empty.png' class='star'/>
            <img src='images/empty.png' class='star'/>
            <img src='images/empty.png' class='star'/><br>
            <small>".$r." (".$votes.") votes</small><br>";
        }
        if($r>=0.8 && $r<1.4){
            echo "<img src='images/full.png' class='star'/>
            <img src='images/empty.png' class='star'/>
            <img src='images/empty.png' class='star'/>
            <img src='images/empty.png' class='star'/>
            <img src='images/empty.png' class='star'/><br>
            <small>".$r." (".$votes.") votes</small><br>";
        }
        if($r>=1.4 && $r<1.8){
            echo "<img src='images/full.png' class='star'/>
            <img src='images/half.png' class='star'/>
            <img src='images/empty.png' class='star'/>
            <img src='images/empty.png' class='star'/>
            <img src='images/empty.png' class='star'/><br>
            <small>".$r." (".$votes.") votes</small><br>";
        }
        if($r>=1.8 && $r<2.4){
            echo "<img src='images/full.png' class='star'/>
            <img src='images/full.png' class='star'/>
            <img src='images/empty.png' class='star'/>
            <img src='images/empty.png' class='star'/>
            <img src='images/empty.png' class='star'/><br>
            <small>".$r." (".$votes.") votes</small><br>";
        }
        if($r>=2.4 && $r<2.8){
            echo "<img src='images/full.png' class='star'/>
            <img src='images/full.png' class='star'/>
            <img src='images/half.png' class='star'/>
            <img src='images/empty.png' class='star'/>
            <img src='images/empty.png' class='star'/><br>
            <small>".$r." (".$votes.") votes</small><br>";
        }
        if($r>=2.8 && $r<3.4){
            echo "<img src='images/full.png' class='star'/>
            <img src='images/full.png' class='star'/>
            <img src='images/full.png' class='star'/>
            <img src='images/empty.png' class='star'/>
            <img src='images/empty.png' class='star'/><br>
            <small>".$r." (".$votes.") votes</small><br>";
        }
        if($r>=3.4 && $r<3.8){
            echo "<img src='images/full.png' class='star'/>
            <img src='images/full.png' class='star'/>
            <img src='images/full.png' class='star'/>
            <img src='images/half.png' class='star'/>
            <img src='images/empty.png' class='star'/><br>
            <small>".$r." (".$votes.") votes</small><br>";
        }
        if($r>=3.8 && $r<4.4){
            echo "<img src='images/full.png' class='star'/>
            <img src='images/full.png' class='star'/>
            <img src='images/full.png' class='star'/>
            <img src='images/full.png' class='star'/>
            <img src='images/empty.png' class='star'/><br>
            <small>".$r." (".$votes.") votes</small><br>";
        }
        if($r>=4.4 && $r<4.8){
            echo "<img src='images/full.png' class='star'/>
            <img src='images/full.png' class='star'/>
            <img src='images/full.png' class='star'/>
            <img src='images/full.png' class='star'/>
            <img src='images/half.png' class='star'/><br>
            <small>".$r." (".$votes.") votes</small><br>";
        }
        if($r>=4.8){
            echo "<img src='images/full.png' class='star'/>
            <img src='images/full.png' class='star'/>
            <img src='images/full.png' class='star'/>
            <img src='images/full.png' class='star'/>
            <img src='images/full.png' class='star'/><br>
            <small>".$r." (".$votes.") votes</small><br>";
        }
    }
}
?>