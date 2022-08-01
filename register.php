<?php 
session_start();
if(isset($_SESSION['agency_username']) || isset($_SESSION['customer_username'])){
    header('location:index.php');
    die();
}
?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <link rel="stylesheet" href="stylesheets/login.css" >
        <script type='text/javascript' src='js_validations/register_validate.js'></script>
    </head>
    <body>
        <nav>
        <a href="index.php"><h4 class="title color_green">Car Rental Agency</h4></a>
        </nav>
        <div class="container">
            <div class="div1">
                <span class="text color_white">Rent Your Cars Here <br><span class="text color_green"> & Get cars for Rent </span> </span>
            </div>
            <div class="div1">
                <div class="modal">
                    <h3 class="title color_white">Register</h3>
                    <p id='warn'></p>
                    <?php 
                    
                    if(isset($_SESSION['warning'])){
                         echo' <h5 class="font error">'.$_SESSION['warning'].'</h5>';
                         unset($_SESSION['warning']);   
                    }
                    
                    ?>
                   
                    <form name='form' method="post" onsubmit='return validate();' action="register_backend.php" autocomplete="off">
                        <div class="input_container">
                            <label>Register As</label>
                            <div class="radio">
                                <input  type="radio" name="type" id='c' value="customer"><span class="font color_white" >Customer</span>
                                <input  type="radio" name="type" id='a' value="agency"><span class="font color_white" >Agency</span>
                            </div>
                            
                        </div>
                        <div class="input_container">
                            <label>Username</label>
                            <input type="text" name="username">
                        </div>
                       
                        <div class="input_container">
                            <label>Password</label>
                            <input type="password" name="password">
                        </div>
                        <div class="input_container">
                            <label>Confirm Password</label>
                            <input type="password" name="cpassword">
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

                        <input class="button submit_button" type="submit" value="Register" >
                        </form>
                       <div class="reg_link">
                        <span class="s_text color_white" >Already User ? &nbsp;</span> <a href="loginCustomer.php" class="s_text color_green">Login</a>
                       </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>