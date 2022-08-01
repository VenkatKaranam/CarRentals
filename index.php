<?php 

session_start();
        include 'nav.php';
        include 'db_connection.php';
?>

<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Available Cars
        </title>
        <link rel="stylesheet" href="stylesheets/style.css">
        <link rel="stylesheet" href="stylesheets/nav.css">
    </head>
    <body>
       
        
        <center><h2 >Welcome to the Car Rental Agency <span class="color_green">Here are the Available Cars for Rent</span></h2></center>
        <div class="child_nav">
            <h2></h2>
                <div class="side_btn">
                   <?php  if(isset($_SESSION['customer_username'])){echo'<a href="mybookings.php" class="button">My Bookings</a>'; }?>
                   <?php  if(isset($_SESSION['agency_username'])){echo'<a href="agencyPortal.php" class="button">View Added Cars</a>'; }?>
                </div>
        </div> 
        <?php if(isset($_SESSION['error'])){
                echo"<center><h5 class='font error'>".$_SESSION['error']."</h5></center>";
                unset($_SESSION['error']);
            }
            ?>
        <div class="container"> 
        <?php
        $query=mysqli_query($database,"select * from added_cars where availability='yes'");
        if($query){
            $noof_rows=mysqli_num_rows($query);
            if($noof_rows==0){
                echo ' <center><h2 >No Avaialable Cars</h2></center>';
            }
            else{
                
                while($fetch=mysqli_fetch_assoc($query)){
                    echo '  <div class="child_container">
                <label class="font">Vehical Model</label>
                <h2 class="color_green">'.$fetch['car_model'].'</h2>
                <label class="font">Vehical Number</label>
                <h2>'.$fetch['car_number'].'</h2>
                <div class="font mt">Capacity: '.$fetch['capacity'].' <span class="font price">&nbsp;'.$fetch['rent'].' </span>/-Per day </div>';
                if(!isset($_SESSION['agency_username'])){echo'<a href="confirm_booking.php?v_id='.$fetch['car_id'].'" class="button">Rent</a>'; } 
            echo'</div>';
                }
            }
        }
        else{
            echo'error in query';
        }
         ?>
           
           
           
        </div>

    </body>
</html>