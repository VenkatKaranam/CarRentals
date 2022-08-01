<?php
 session_start();
 if(isset($_SESSION['agency_username'])){
    header('location:index.php');
    die();
 }
?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forget Password</title>
        <link rel="stylesheet" href="stylesheets/login.css" >
        <script type="text/javascript" src="js_validations/register_validate.js"></script>
    </head>
    <body>
        <nav>
        <a href="index.php"><h4 class="title color_green">Car Rental Agency</h4></a>
        </nav>
        <div class="container">
            <div class="div1">
                <span class="text color_white">Rent Your Cars Here <br><span class="text color_green"> & Take cars for Rent </span> </span>
            </div>
            <div class="div1">
                <div class="modal">
                    <h3 class="title color_white">AGENTCY FORGET PASSWORD</h3>
                    <p id="warn"></p>
                    <?php 
                    
                    if(isset($_SESSION['warning'])){
                         echo' <h5 class="font error">'.$_SESSION['warning'].'</h5>';
                         unset($_SESSION['warning']);   
                    }
                    ?>
                    <form name="form" onsubmit="return fp_valid();" method="post" action="fpa_backend.php" autocomplete="off">
                    <div class="input_container">
                            <label>Username</label>
                            <input type="text" name="username">
                        </div>
                    <div class="input_container" >
                            <label>Security Question for password reset</label>
                            <select name="s_question">
                                <option selected>Select</option>
                                <option value="Your Nickname">Your Nickname</option>
                                <option value="Your Pet name">Your Pet name</option>
                                <option value="Your Place">Your Place</option>
                            </select>
                        </div>
                        <div class="input_container">
                            <label>Answer</label>
                            <input type="text" name="s_answer">
                        </div>
                        <div class="input_container">
                            <label>New Password</label>
                            <input type="password" name="password">
                        </div>
                        <div class="input_container">
                            <label>Confirm Password</label>
                            <input type="password" name="cpassword">
                        </div>
                        <input class="button submit_button" type="submit" value="Submit" >
                        </form>
                        
                        <div class="reg_link">
                            <span class="s_text color_white" >Want to Login?</span> <a href="loginAgency.php" class="s_text color_green">Login Here</a>
                           </div>

                       <div class="reg_link">
                        <span class="s_text color_white" >Not a User ?</span> <a href="register.php" class="s_text color_green">Register</a>
                       </div>

                       
                    
                </div>
            </div>
        </div>
    </body>
</html>