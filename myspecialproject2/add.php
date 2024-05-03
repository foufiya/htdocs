<?php
session_start();
include("functions.php");

include_once('connection.php');

if(isset($_POST['register']))
{
    $user_name=$_POST['user_name'];
    $user_email=$_POST['user_email'];
    $password=md5($_POST['password']);
    $dateuser=$_POST['dateuser'];
    //$dateuser=$_POST['dateuser'];
   // $user_id = random_num(20);
    $sql  ="INSERT INTO users ( user_name, user_email ,dateuser, password) VALUES ('$user_name','$user_email','$dateuser','$password')" ;
    $result = mysqli_query($con, $sql);
    //$result = $con->query($sql);

    if($result){ 
    header('location:index.php');
    echo"<script>alert('New User Register Success');</script>";   
    }else{
        die(mysqli_error($con)) ;
    }
   
}
