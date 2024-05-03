<?php
session_start();
include_once('connection.php');

// if(isset($_SESSION['user_name']) && isset($_SESSION['user_email'] )){

// }
$_SESSION['user_name'];
$_SESSION['user_email'];

?>
<!doctype html>
<html lang="en">

<head>
  <title>Welcome Form</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta user_name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<style>
    .container{
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding: 15px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      
    }.container span{
        background-color: gold;
        color: white;
        padding: 15px;
        margin: 10pxpx;
        border-radius: 8px;
        font-size: 25px;
        font-weight: 600;
        letter-spacing: 5px;
        text-transform: uppercase;
    }.container p{
        margin: 20px;
    }.container .btn{
        margin-top: -30px;
        width: 250px;
        background-color: gold;
        color: white;
        font-weight: 500;
        letter-spacing: 5px;
        text-transform: uppercase;
        border-radius: 20px;
        margin-bottom: 10px;
    }.container .btn:hover{
        margin-top: -30px;
        width:350px;
        background-color: darkorange;
        font-weight: 500;
        transition: 1s;
        color: white;
    }
      .container .btn2{
        margin-top: -30px;
        width: 250px;
        background-color: gold;
        color: white;
        font-weight: 500;
        letter-spacing: 5px;
        text-transform: uppercase;
        border-radius: 20px;
        height: 40px;
        padding-left: 10px;
        padding-top: 8PX;
        margin-bottom: 10px;
    }
    .container .btn2:hover{
        margin-top: -30px;
        width:350px;
        background-color: darkorange;
        font-weight: 500;
        transition: 1s;
        color: white;
        text-align: center;
        padding-left: 10px;

    }
</style>
</head>

<body>
 



<div class="container">
<h3>Welcome,  <span><?=$_SESSION['user_name'];?></span></h3>
<p>Your Email id is : <h6><?=$_SESSION['user_email'];?></h6></p>
<a href="index.php" class="btn">LOGOUT</a><BR><br>
<a href="clients.php" class="btn2"> GO to Dashboard</a>
</div>




  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>