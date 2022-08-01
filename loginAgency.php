<?php 
session_start();
if(isset($_SESSION['agency_username'])){
    header('location:agencyPortal.php');
}?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <span class="text color_white">Car Rental Agency... <br><span class="text color_green"> Rent Your Car Here </span> </span>
            </div>
            <div class="div1">
                <div class="modal">
                    <h3 class="title color_white">LOGIN AS AGENCY</h3>
                     <p id='warn'></p>
                    <?php 
                    if(isset($_SESSION['warning'])){
                         echo' <h5 class="font error">'.$_SESSION['warning'].'</h5>';
                         unset($_SESSION['warning']);   
                    }
                    if(isset($_SESSION['success'])){
                        echo' <h5 class="font success">'.$_SESSION['success'].'</h5>';
                        unset($_SESSION['success']);   
                   }
                    ?>
                    <form name="form" onsubmit='return validate();' method="post" action="agency_backend.php" autocomplete="off">
                        <div class="input_container">
                            <label>Username</label>
                            <input type="text" name="username">
                        </div>
                        <div class="input_container">
                            <label>Password</label>
                            <input type="password" name="password">
                        </div>
                        <input class="button submit_button" type="submit" value="Login" >
                        <a href="forgetpsd_agency.php" class="s_text color_white">Forget Password ?</a> <br>
                        
                        <div class="reg_link">
                            <span class="s_text color_white" >Are you a Customer?</span> <a href="loginCustomer.php" class="s_text color_green">Login Here</a>
                           </div>

                       <div class="reg_link">
                        <span class="s_text color_white" >Not a User ?</span> <a href="register.php" class="s_text color_green">Register</a>
                       </div>

                       
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>