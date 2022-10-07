<nav class="navbar navbar-inverse navabar-fixed-top">
               <div class="container">
                   <div class="navbar-header">
                       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                       </button>
                        <?php
                            if(isset($_SESSION['email'])){
                        ?>
                           <a href="sales.php" class="navbar-brand">Boosu eBook Store</a>
                        <?php
                           }else{
                        ?>
                            <a href="index.php" class="navbar-brand">Boosu eBook Store</a>
                        <?php
                           }
                           ?>
                   </div>
                   
                   <div class="collapse navbar-collapse" id="myNavbar">
                       <ul class="nav navbar-nav navbar-right">
                           <?php
                           if(isset($_SESSION['email'])){
                           ?>
                           <li><a href="favorites.php"><img src="images/heart.png" alt="favorites"/> Favorites</a></li>
                           <li><a href="profile.php"><img src="images/user.png" alt="profile"/> Profile</a></li>
                           <li><a href="cart.php"><img src="images/cart.png" alt="cart"/> Cart</a></li>
                           <li><a href="signout.php"><img src="images/logout.png" alt="logout"/> Log out</a></li>
                           <?php
                           }else{
                            ?>
                            <li><a href="signin.php"><img src="images/login.png" alt="login"/> Sign In</a></li>
                            <li><a href="signup.php"><img src="images/user.png" alt="signup"/> Create Account</a></li>
                            <li><a href="admin/signin.php"><img src="images/login.png" alt="signin"/> Admin</a></li>
                           <?php
                           }
                           ?>
                           
                       </ul>
                   </div>
               </div>
</nav>





