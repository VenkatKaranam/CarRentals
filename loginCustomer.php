<?php
 session_start();
 if(isset($_SESSION['customer_username'])){
    header('location:index.php');
    die();
 }
?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="stylesheets/login.css" >
        <script type='text/javascript' src='js_validations/login_validate.js'></script>
    </head>
    <body>
        <nav>
            <a href="index.php"><h4 class="title color_green">Car Rental Agency</h4></a>
        </nav>
        <div class="container">
            <div class="div1">
                <span class="text color_green">Car Rentals Agency... <br><span class="text color_white">Get cars for Rent </span> </span>
            </div>
            <div class="div1">
                <div class="modal">
                    <h3 class="title color_white">LOGIN AS CUSTOMER</h3>
                    <p id='warn'></p>
                    <?php 
                    
                    if(isset($_SESSION['warning'])){
                         echo' <h5 class="font error">'.$_SESSION['warning'].'</h5>';
                         unset($_SESSION['warning']);   
                    }
                    if(isset($_SESSION['success'])){
                        echo' <h4 class="font success">'.$_SESSION['success'].'</h4>';
                        unset($_SESSION['success']);   
                   }
                    ?>
                    <form name="form"  onsubmit='return validate()' method="post" action="customer_backend.php" autocomplete="off">
                        <div class="input_container">
                            <label>Username</label>
                            <input type="text" name="username">
                        </div>
                        <div class="input_container">
                            <label>Password</label>
                            <input type="password" name="password">
                        </div>
                        <input class="button submit_button" type="submit" value="Login" >
                        <a href="forgetpsd_customer.php" class="s_text color_white">Forget Password ?</a> <br>
                        </form>
                        
                        <div class="reg_link">
                            <span class="s_text color_white" >Are you a Agency?</span> <a href="loginAgency.php" class="s_text color_green">Login Here</a>
                           </div>

                       <div class="reg_link">
                        <span class="s_text color_white" >Not a User ?</span> <a href="register.php" class="s_text color_green">Register</a>
                       </div>      
                    
                </div>
            </div>
        </div>
    </body>
</html>