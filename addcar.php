<?php 
session_start();
include 'nav.php';
         if(!isset($_SESSION['agency_username'])){
            header('location:loginAgency.php');
            die();
        }?>
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
       

        <!-- <center><h2 class="font">Welcome to the  <span class="color_green">Car Rental Agency </span></h2></center> -->
            <div class="child_nav">
                <h2 class="font">Add Car Details</h2>
                <div class="side_btn">
                    <a href="agencyPortal.php" class="button">View Added Cars</a>
                    <a href="booked_cars.php" class="button">View Booked Cars</a>
                </div> 
            </div>
            <div class="parent">
                <div class="container">
                
                <div class="input_container">
                <p id="warn"></p>
                </div>
                 <form name="form" onsubmit='return validate();' method="post" action="addcar_backend.php">
                        
                        <div class="input_container">
                            <label>Vehicle Model</label>
                            <input type="text" name="vmodel">
                        </div>
                       
                        <div class="input_container">
                            <label>Vehicle Number</label>
                            <input type="text" name="vnumber">
                        </div>
                        <div class="input_container">
                            <label>Vehical Capacity</label>
                            <input type="number" name="vcapacity">
                        </div>
                        
                        <div class="input_container">
                            <label>Rent per Day</label>
                            <input type="text" name="rpd">
                        </div>

                        <input class="button submit_button" type="submit" value="Add" >
                </div>
            </div>

           

    </body>
</html>