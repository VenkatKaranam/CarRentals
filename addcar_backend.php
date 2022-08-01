<?php
include 'db_connection.php';
session_start();
if(!isset($_SESSION['agency_username'])){
    header('location:loginAgency.php');
    die();
}
$v_model=$_POST['vmodel'];
$v_number=$_POST['vnumber'];
$v_capacity=$_POST['vcapacity'];
$v_rent=$_POST['rpd'];
$v_id=uniqid();
$v_avail='yes';
$agent=$_SESSION['agency_username'];

if(strlen($v_model)==0 || strlen($v_number)==0 || strlen($v_capacity)==0 || strlen($v_rent)==0 ){
    header('location:addcar.php');
}
else{
    $query=mysqli_query($database,"insert into added_cars(car_id,car_model,car_number,capacity,rent,availability,added_agency) 
    values('$v_id','$v_model','$v_number','$v_capacity','$v_rent','$v_avail','$agent')");

    if($query){
        $_SESSION['msg']='New Car Added Successfully';
        header('location:agencyPortal.php');
    }
    else{
        $_SESSION['error']='Something Went Wrong, Try Again';
        header('location:agencyPortal.php');
    }

}

?>