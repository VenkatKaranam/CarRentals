<?php
include 'db_connection.php';
$uname=$_POST['username'];
$pword=$_POST['password'];
session_start();
if(strlen($uname)==0 || strlen($pword)==0){
    header('location:loginAgency.php');
    die();
}
else{
    $query=mysqli_query($database,"select * from agency where username = '$uname'");
    if(mysqli_num_rows($query) == 0){
        $_SESSION['warning']='Username not exist';
        header('location:loginAgency.php');
    }
    else{
        $fetch=mysqli_fetch_assoc($query);
        if($uname==$fetch['username']){
            if($pword==$fetch['password']){
                $_SESSION['agency_username']=$uname;
                header('location:agencyPortal.php');
            }
            else{
                $_SESSION['warning']="Incorrect Password";
                header('location:loginAgency.php');
            }
        }
        else{
            $_SESSION['warning']='Username not exist';
            header('location:loginAgency.php');
        }
    }
}
?>
