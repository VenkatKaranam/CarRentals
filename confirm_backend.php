<?php
    include 'db_connection.php';
    session_start();
    if(!isset($_SESSION['customer_username'])){
        header('location:login.php');
        die();
    }
    $v_id=$_GET['v_id'];
    $noof_days=$_POST['noofdays'];
    $s_date=$_POST['date'];
    $user=$_SESSION['customer_username'];
    if(!$_GET['v_id'] || strlen($noof_days)==0 || strlen($s_date)==0){
        header('location:index.php');
    }
    else{
        $check=mysqli_query($database,"select * from added_cars where car_id='$v_id'");
        $fetch=mysqli_fetch_assoc($check);
        if($fetch['availability']=='no'){
            $_SESSION['error']='car not available';
            header('location:index.php');
            die();
        }
        else{
            $query=mysqli_query($database,"insert into booked_cars(car_id,start_date,noof_days,booked_customer)
        values('$v_id','$s_date','$noof_days','$user')");
        if($query){
            $avail_query=mysqli_query($database,"update added_cars set availability='no' where car_id='$v_id'");
            if($avail_query){
                $_SESSION['msg']='New Car Booked Succesfully';
                header('location:mybookings.php');
            }
        }
        else{
            $_SESSION['error']='Something Went Wrong, Try Again';
            header('location:index.php');
        }
        }
        

    }



?>