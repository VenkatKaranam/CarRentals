<?php 
session_start();
        include 'nav.php'; include 'db_connection.php' ; 
        if(!isset($_SESSION['customer_username'])){
            header('location:loginCustomer.php');
            die();
        }
        $v_id=$_GET['v_id'];
       
?>

<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Car</title>
        <link rel="stylesheet" href="stylesheets/nav.css"/>
        <link rel="stylesheet" href="stylesheets/addcar.css"/>
        <script type='text/javascript' src='js_validations/addcar_form_valid.js'></script>
    </head>
    <body>
        
        <!-- <center><h2 class="font">Welcome to the  <span class="color_green">Car Rental Agency </span></h2></center> -->
            <div class="child_nav">
                <h2 class="font">Confirm Details</h2>
                <div class="side_btn">
                    <a href="mybookings.php" class="button">My bookings</a>
                </div> 
            </div>
            <?php
             if(!$_GET['v_id']){
                header('location:index.php');
            }
            else{
                $query=mysqli_query($database,"select * from added_cars where car_id = '$v_id'");
                if($query){
                    $fetch=mysqli_fetch_assoc($query);
                    echo'
            <div class="parent">
                <div class="container">
                <p id="warn"></p>
                    <div class="row">
                        <div class="input_container">
                            <label class="font">Vehical Model</label>
                            <h2 class="font color_green">'.$fetch['car_model'].'</h2>
                        </div>
                        <div class="input_container">
                            <label class="font">Vehical Number</label>
                            <h2 class="font">'.$fetch['car_number'].'</h2> 
                        </div>
                    </div>
                    
                            <div class="input_container font mt">Capacity: '.$fetch['capacity'].' </div>
                            <div><span class=" font price">&nbsp;'.$fetch['rent'].'/- </span></div>
                            <h5 class="font"> per day</h5>
               

                 <form name="cform" onsubmit="return valid();" method="post" action="confirm_backend.php?v_id='.$v_id.'">
                        <div class="row">
                            <div class="input_container">
                            <label>No of Days</label>
                            <input type="number" name="noofdays">
                        </div>
                        
                        <div class="input_container">
                            <label>Start Date</label>
                            <input type="date" name="date">
                        </div> 
                        </div>
                       

                        <center><input class="button submit_button" type="submit" value="Comfirm Booking" ></center>
                </div>
            </div>
            ';
        }
        else{
            echo'something went wrong';
        }
    }
        ?>


    </body>
</html>