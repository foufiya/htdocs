<?php
session_start();
include_once('connection.php');

if (isset($_POST['submit'])) {

 $user_name = $_POST['user_name'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM `users` WHERE `user_name`=='$user_name' AND `password`=='$password'";
    $result = mysqli_query($con, $sql);

    if (empty($_POST['user_name']) && empty($_POST['password'])) {
        echo "<script>alert('Please Fil Username and Password');</script>";
       exit;
    } elseif (empty($_POST['password'])) {
        echo "<script>alert('Please Fill Password');</script>";
       exit;
    } elseif (empty($_POST['user_name'])) {
        echo "<script>alert('Please Fil Username);</script>";
       exit;
    } else {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $user_email = $row['user_email'];
            $user_name = $row['user_name'];
            $password = $row['password'];


            if($user_name == $ROW['user_name'] && $password == $ROW['password']) {
                header('location:welcome.php');
                $_SESSION['user_email'] = $user_email;
                $_SESSION['user_name']  =$user_name;
                $_SESSION['password'] = $password;
                
            }
        } else {
            echo "<script>alert('Invalid Username or Password');</script>";
            exit;
        }
    }

}
