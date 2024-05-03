<?php
include_once('connection.php');
include('functions.php');

if(isset($_POST['register']))
{
    $user_email = $_POST['user_email'];
    $user_name = $_POST['user_name'];
    $dateuser=$_POST['dateuser'];
    $password = md5($_POST['password']);

    $user_id = random_num(20); // Make sure the random_num() function is defined

    $sql = "INSERT INTO `users` (`user_id`, `user_name`, `user_email`,`dateuser`, `password`) VALUES ('$user_id', '$user_name', '$user_email', '$dateuser','$password')";
    $result = mysqli_query($conn, $sql);
    
    if($result) { 
        header('location:index.php');
        echo "<script>alert('New User Registered Successfully');</script>";   
    } else {
        die(mysqli_error($conn));
    }   
}
?>