<?php
include 'db_connection.php';
session_start();
if(!isset($_SESSION['agency_username'])){
    header('location:loginAgency.php');
    die();
}
$v_id=$_GET['v_id'];
$v_model=$_POST['vmodel'];
$v_number=$_POST['vnumber'];
$v_capacity=$_POST['vcapacity'];
$v_rent=$_POST['rpd'];
if(!$_GET['v_id']){
    $_SESSION['error']='Something Went Wrong, Try Again';
    header('location:agencyPortal.php');
}
else if(strlen($v_model)==0 || strlen($v_number)==0 || strlen($v_capacity)==0 || strlen($v_rent)==0 ){
    header("location:agencyportal.php");
}
else{
    $query=mysqli_query($database,"update added_cars set car_model='$v_model',car_number='$v_number'
    ,capacity='$v_capacity',
    rent='$v_rent'  where car_id = '$v_id'");

    if($query){
        $_SESSION['msg']='Details Updated Successfully';
        header('location:agencyPortal.php');
        
    }
}

?>