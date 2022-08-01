
<nav>
    <div class="title">
        <a class="title color_green" href="index.php">Car Rental Agency</a>
        <?php 
            if(isset($_SESSION['customer_username'])){
                echo '<a href="logout.php" class="user color_green">Logout</a>';
                echo '<h4 class="user color_green">'.$_SESSION['customer_username'].'</h4>';
              
            } 
            elseif(isset($_SESSION['agency_username'])){
                echo '<a href="logout.php" class="user color_green">Logout</a>';
                echo '<h4 class="user color_green">'.$_SESSION['agency_username'].'</h4>';
            }else{
                echo '<a href="loginCustomer.php" class="user color_green">Login</a>';
            }
        ?>
        
    </div>
    
</nav>