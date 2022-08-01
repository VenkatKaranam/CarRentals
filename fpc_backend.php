<?php
 include 'db_connection.php';
session_start();
$uname=$_POST['username'];
$pword=$_POST['password'];
$s_ques=$_POST['s_question'];
$s_ans=$_POST['s_answer'];

if (strlen($uname)==0 || strlen($pword)==0 || strlen($s_ques)==0 || strlen($s_ans)==0){
    header('location: forgetpsd_customer.php');
    die();
}
else{
    $query=mysqli_query($database,"select * from customers where username='$uname'");
    if($query){
        if(mysqli_num_rows($query)==0){
            $_SESSION['warning']='Username Not Exist';
            header('location:forgetpsd_customer.php');
        }
        else{
            $fetch=mysqli_fetch_assoc($query);
            if($fetch['username']== $uname && $fetch['s_question']==$s_ques  && $fetch['s_answer']==$s_ans){
                $update=mysqli_query($database,"update customers set password ='$pword' where username='$uname'");
                if($update){
                    $_SESSION['success']='Password Update Success';
                    header('location:loginCustomer.php');
                }
                else{
                    $_SESSION['warning']='Error! Try Again';
                    header('location:forgetpsd_customer.php');
                }
            }
            else{
                $_SESSION['warning']='Incorrect Details';
                header('location:forgetpsd_customer.php');
            }
            
        }
    }
    else{
        $_SESSION['warning']='Username Not Exist';
        header('location:forgetpsd_customer.php');
    }
}

?>