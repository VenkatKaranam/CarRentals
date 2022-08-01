<?php 
 session_start();
        include 'db_connection.php';
        include 'nav.php';
        if(!isset($_SESSION['agency_username'])){
            header('location:loginAgency.php');
            die();
        }
?>

<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agency Portal</title>
        <link rel="stylesheet" href="stylesheets/nav.css"/>
        <link rel="stylesheet" href="stylesheets/style.css"/>
    </head>
    <body>

        <center><h2 >Welcome to the  <span class="color_green">Car Rental Agency </span></h2></center>
            <div class="child_nav">
                <h2>Added Cars</h2>
                <div class="side_btn">
                    <a href="addcar.php" class="button">Add Car</a>
                    <a href="booked_cars.php" class="button">View Booked Cars</a>
                </div> 
            </div>
            <?php 
            if(isset($_SESSION['error'])){
                echo"<center><h5 class='font error'>".$_SESSION['error']."</h5></center>";
                unset($_SESSION['error']);
            }
            elseif(isset($_SESSION['msg'])){
                echo"<center><h5 class='font success'>".$_SESSION['msg']."</h5></center>";
                unset($_SESSION['msg']);
            }
            ?>
            
            <div class="container"> 
           
        <?php
        $user=$_SESSION['agency_username'];
        $query=mysqli_query($database,"select * from added_cars where added_agency='$user'");
        if($query){
            $noof_rows=mysqli_num_rows($query);
            if($noof_rows==0){
                echo '<center><h3 class="font error">No Cars Added</h3></center></center>';
            }
            else{
                
                while($fetch=mysqli_fetch_assoc($query)){
                    echo '  <div class="child_container">
                <label class="font">Vehical Model</label>
                <h2 class="color_green">'.$fetch['car_model'].'</h2>
                <label class="font">Vehical Number</label>
                <h2>'.$fetch['car_number'].'</h2>
                <div class="font mt">Capacity: '.$fetch['capacity'].' <span class="font price">&nbsp;'.$fetch['rent'].' </span>/-Per day </div>
                <a href="editcardetails.php?v_id='.$fetch['car_id'].'" class="button">Edit</a> 
            </div>';
                }
            }
        }
        else{
            echo'error in query';
        }
         ?>
         

      
    </body>
</html>