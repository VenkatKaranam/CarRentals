<?php
include 'db_connection.php';
$uname=$_POST['username'];
$pword=$_POST['password'];
session_start();
if(strlen($uname)==0 || strlen($pword)==0){
    header('location:loginCustomer.php');
}
else{
    $query=mysqli_query($database,"select * from customers where username = '$uname'");
    if(mysqli_num_rows($query) == 0){
        $_SESSION['warning']='Username not exist';
        header('location:loginCustomer.php');
    }
    else{
        $fetch=mysqli_fetch_assoc($query);
        if($uname==$fetch['username']){
            if($pword==$fetch['password']){
                $_SESSION['customer_username']=$uname;
               header('location:index.php');
            }
            else{
                $_SESSION['warning']="Incorrect Password";
                header('location:loginCustomer.php');
            }
        }
        else{
            $_SESSION['warning']='Username not exist';
            header('location:loginCustomer.php');
        }
    }
}
?>
