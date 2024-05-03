<?php
session_start();
include_once('connection.php');

    

if (isset($_POST['login'])) {

    $user_email = $_POST['user_email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM `users` WHERE `user_email`='$user_email' AND `password`='$password'";
    $result = mysqli_query($conn, $sql);

    if (empty($_POST['user_email']) && empty($_POST['password'])) {
        echo "<script>alert('Please Fill user_email and Password');</script>";
        exit;
    } elseif (empty($_POST['password'])) {
        echo "<script>alert('Please Fill Password');</script>";
        exit;
    } elseif (empty($_POST['user_email'])) {
        echo "<script>alert('Please Fill user email);</script>";
        exit;
    } else {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $user_name = $row['user_name'];
            $user_email = $row['user_email'];
            $password = $row['password'];
            $user_id = $row['user_id'];


            if ($user_email == $user_email && $password == $password) {
                $_SESSION['user_name'] = $user_name;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_email'] = $user_email;
                $_SESSION['password'] = $password;
                header('location:welcome.php');
                
               
            }
        } else {
            echo "<script>alert('Invalid user email or Password');</script>";
            exit;
        }
    }

}
