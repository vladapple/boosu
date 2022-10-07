<nav class="navbar navbar-inverse navabar-fixed-top">
               <div class="container">
                   <div class="navbar-header">
                       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                       </button>
                        <?php
                            if(isset($_SESSION['email'])){
                        ?>
                           <a href="dashboard.php" class="navbar-brand" style="color:red">Dashboard Boosu</a>
                        <?php
                           }else{
                        ?>
                            <a href="../index.php" class="navbar-brand">Boosu eBook Store</a>
                        <?php
                           }
                        ?>
                   </div>
                   
                   <div class="collapse navbar-collapse" id="myNavbar">
                       <ul class="nav navbar-nav navbar-right">
                           <?php
                           if(isset($_SESSION['email'])){
                           ?>
                           <li><a href="user.php">Users</a></li>
                           <li><a href="book.php">Books</a></li>
                           <li><a href="review.php">Reviews</a></li>
                           <li><a href="cart.php">Cart</a></li>
                           <li><a href="signout.php">Log out</a></li>
                           <?php
                           }else{
                            ?>
                           <?php
                           }
                           ?>
                           
                       </ul>
                   </div>
               </div>
</nav>





