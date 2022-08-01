<?php
session_start();
     include 'nav.php';
     include 'db_connection.php'; 
     if(!isset($_SESSION['agency_username'])){
        header('location:loginAgency.php');
        die();
    }
 ?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Booked Cars</title> 
      <link rel="stylesheet" href="stylesheets/nav.css">
      <link rel="stylesheet" href="stylesheets/bookings.css">
    </head>
    <body>
    <center><h2 class="font">Booked Cars</h2> </center>
    <a href="agencyPortal.php" class="button float">View Added Cars</a>
    <table>
            <tr>
            <th>Vehical Model</th>
            <th>Vehical number</th>
            <th>Capacity</th>
            <th>Rent per Day</th>
            <th>Booked Customer</th>
            </tr>
    <?php
        $user=$_SESSION['agency_username'];
        $query=mysqli_query($database,"select car_model, car_number, capacity, rent,booked_customer from added_cars,booked_cars
         where added_cars.added_agency='$user' and added_Cars.availability='no' and added_cars.car_id=booked_cars.car_id");
         if($query){
            if(mysqli_num_rows($query)==0){
                echo '</table><tr><center><h4 class="font">No Cars Are Booked</h4></center></tr>';
            }
            else{
                 while($fetch=mysqli_fetch_assoc($query)){
                echo'<body>
        
            <tr>
                <td>'.$fetch['car_model'].'</td>
                <td>'.$fetch['car_number'].'</td>
                <td>'.$fetch['capacity'].'</td>
                <td>'.$fetch['rent'].'</td>
                <td>'.$fetch['booked_customer'].'</td>
            </tr>';
            }
            }
           

         }
        ?>   
    
            
        </table>
    </body>
</html>