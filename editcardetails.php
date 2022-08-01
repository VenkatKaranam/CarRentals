<?php
session_start();
include 'nav.php'; include 'db_connection.php' ; 
?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Car</title>
        <link rel="stylesheet" href="stylesheets/nav.css"/>
        <link rel="stylesheet" href="stylesheets/addcar.css"/>
        <script type='text/javascript' src='js_validations/addcar_form_valid.js'></script>
        <!-- <link rel="stylesheet" href="login.css"> -->
    </head>
    <body>
        <?php
         if(!isset($_SESSION['agency_username'])){
            header('location:loginAgency.php');
            die();
        }
        $v_id=$_GET['v_id'];
        if(!$_GET['v_id']){
            header('location:agencyPortal.php');
        }
        $query=mysqli_query($database,"select * from added_cars where car_id = '$v_id'");
        if($query){
            $fetch=mysqli_fetch_assoc($query);
            echo';

        <!-- <center><h2 class="font">Welcome to the  <span class="color_green">Car Rental Agency </span></h2></center> -->
            <div class="child_nav">
                <h2 class="font">Edit Car Details</h2>
                <div class="side_btn">
                    <a href="agencyPortal.php" class="button">View Added Cars</a>
                    <a href="booked_cars.php" class="button">View Booked cars</a>
                </div> 
            </div>
            <div class="parent">
                <div class="container">
                <div class="input_container">
                <p id="warn"></p>
                </div>
                 <form name="form" onsubmit="return validate();"  method="post" action="editcar_backend.php?v_id='.$fetch['car_id'].'">
                        
                        <div class="input_container">
                            <label>Vehicle Model</label>
                            <input type="text" name="vmodel" value="'.$fetch['car_model'].'">
                        </div>
                       
                        <div class="input_container">
                            <label>Vehicle Number</label>
                            <input type="text" name="vnumber" value="'. $fetch['car_number'].'">
                        </div>
                        <div class="input_container">
                            <label>Vehical Capacity</label>
                            <input type="texts" name="vcapacity" value="'. $fetch['capacity'].'">
                        </div>
                        
                        <div class="input_container">
                            <label>Rent per Day</label>
                            <input type="text" name="rpd" value="'.$fetch['rent'].'">
                        </div>

                        <input class="button submit_button" type="submit" value="Update" >
                </div>
            </div>';

        }
        else{
            $_SESSION['error']='Something Went Wrong, Try Again';
            header('location:agencyPortal.php');
        }
        
        ?>

    </body>
</html>