<?php 
include 'db_connection.php';
session_start();
$type=$_POST['type'];
$uname=$_POST['username'];
$pword=$_POST['password'];
$s_ques=$_POST['s_question'];
$s_ans=$_POST['s_answer'];
if(strlen($type)==0 || strlen($uname)==0 || strlen($pword)==0 || strlen($s_ques)==0 || strlen($s_ans)==0){
     header('location: register.php');

}
else{
    if($type=='customer'){
    $check=mysqli_query($database,"select * from customers where username='$uname'");

    if($check && mysqli_num_rows($check) != 0){
        
        $_SESSION['warning']='Username already exists';
        header("location: register.php");
    }
    else{
        $query=mysqli_query($database,"insert into customers(username,password,s_question,s_answer) values('$uname','$pword','$s_ques','$s_ans')");
        if($query){
            $_SESSION['success']="Registered Successfully";
            header('location:loginCustomer.php');
        }
    }
    }
    elseif($type=='agency'){
        $check=mysqli_query($database,"select * from agency where username='$uname'");
    
        if($check && mysqli_num_rows($check) != 0){
            session_start();
            $_SESSION['warning']='Username already exists';
            header('location: register.php');
        }
        else{
            $query=mysqli_query($database,"insert into agency(username,password,s_question,s_answer) values('$uname','$pword','$s_ques','$s_ans')");
            if($query){
                $_SESSION['success']="Registered Successfully";
                header('location: loginAgency.php');
            }
            else{
                echo "error query";
            }
        }
        }
    else{
        echo'error';
    }
}


?>