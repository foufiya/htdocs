<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if(isset($_POST["submit"]))
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$user_email = $_POST['user_email'];
		$gender = $_POST['gender'];
		$dateuser = $_POST['dateuser'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,user_email,dateuser,password) values ('$user_id','$user_name','$user_email','$dateuser','$password')";

			mysqli_query($con, $query);

			header("Location: newlogin.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}


    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="login.css" >
    <title>login</title>
</head>
<body>
<div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <p>LOGO.</p>
        </div>
        
        
        <DIV class="nav-menu-btn" >
            <i class="bx bx-menu" onclick="myMenuFunction" ></i>
        </DIV>
    </nav>    

    <!-- ................FORM ..............-->
    <div class="form-box">
       
        <!---------------------------register form--------------------------->
        
        <div class="register-container" id="register">
            <form  method="post">
            <header>Sign Up</header><br>
            <div class="two-forms" >
                
                <div class="input-box" >
                    <input type="text"  class="input-field" name="user_name" placeholder="Name" required><i class="bx bx-user" ></i>
                </div>
                <div class="input-box" >
                    <input type="datetime-local"  class="input-field" name="dateuser" placeholder="Date" required>
                    <i class="bx bx-user" ></i>
                </div>
            </div>    
            <div class="input-box" >
                <input type="text"  class="input-field" name="user_email"  placeholder="Email" required>
                <i class="bx bx-envelope" ></i>
            </div>
            <div class="input-box" >
                <input type="password"  class="input-field" name="password" placeholder="Password" required>
                <i class="bx bx-lock-alt" ></i>
            </div>
            <div class="input-box" >
                <input type="submit"  class="submit" value="Sign up" >                    
            </div>
        </form> 
            <div class="top" >
                <span>Have an account?<a href="newlogin.php">login_now</a></span>
                
            </div>
            
        </div>
        
    </div>
</div>


<script>
    function myMenuFunction(){
        var i = document.getElementById(navMenu);

        if(i.classname === "nav-menu"){
            i.className += " responsive";
            } else {
                i.className = "nav-menu";
        }
    }
</script>
<!--
<script>

    var a = document.getElementById("loginBtn");
    var b = document.getElementById("registerBtn");
    var x = document.getElementById("login");
    var y = document.getElementById("register");

    function login(){
        x.style.left='4px';
        y.style.right='-520px';
       // a.className+="white-btn";
        //b.className="btn";
        x.style.opacity= 1;
        y.style.opacity= 0;
    }

    function register(){   
        x.style.left='-510px';
        y.style.right='5px';
        //a.className="btn";
        //b.className +="white-btn";
        x.style.opacity= 0;
        y.style.opacity= 1;

    }-->
</script>

</body>
</html>