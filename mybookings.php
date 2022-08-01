<?php
session_start();
     include 'nav.php';
     include 'db_connection.php'; 
     if(!isset($_SESSION['customer_username'])){
        header('location:index.php');
        die();
    }
 ?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>My Bookings</title> 
      <link rel="stylesheet" href="stylesheets/nav.css">
      <link rel="stylesheet" href="stylesheets/bookings.css">
    </head>
    <body>
    <center><h2 class="font">My Bookings</h2> </center>
    <?php if(isset($_SESSION['msg'])){
                echo"<center><h5 class='font success'>".$_SESSION['msg']."</h5></center>";
                unset($_SESSION['msg']);
            }
     ?>
    
    <table>
            <tr>
            <th>Vehical Model</th>
            <th>Vehical number</th>
            <th>Capacity</th>
            <th>Rent per Day</th>
            </tr>
            
    <?php
        $user=$_SESSION['customer_username'];
        $query=mysqli_query($database,"select car_model, car_number, capacity, rent from added_cars,booked_cars
         where added_cars.car_id= booked_cars.car_id 
         and booked_cars.booked_customer='$user'");
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
            </tr>';
            }
            }
            

         }
        ?>   
    
            
        </table>
    </body>
</html>