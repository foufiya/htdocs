<?php 
session_start();

	include("connection.php");
	include("functions.php");


	

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: dashboard.php");
						die;
					}
				}
			}
			
			$message = "wrong username or password!";
			echo "<script>alert('$message');</script>";
		}else
		{
			echo "<script>alert('$message');</script>";
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
        <!---------------------------login form--------------------------->
      
        <div class="login-container" id="login">
              <form method="post">
                <header>Log In</header>
                <div class="input-box" >
                    <input type="text"  class="input-field" name="user_name" placeholder="Username ">
                    <i class="bx bx-user" ></i>
                </div>
                <div class="input-box" >
                    <input type="password"  class="input-field"  name="password" placeholder="Password">
                    <i class="bx bx-lock-alt" ></i>
                </div>
                <div class="input-box" >
                    <input type="submit"  class="submit" value="Log in" >
                    
                </div>
           
                <div class="top" >
                    <span>Don't Have an account?<a href="newregister.php">Sign_Up</a></span>
                    
                </div>  
            </form> 
        </div>

        
        
    </div>
</div>


<!--<script>
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

    }
</script>-->

</body>
</html>