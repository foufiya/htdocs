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
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 100;
		margin-right: 8%;
		width:300px;
		color: white;
		background-color: blueviolet;
		border: none;
		display: flex;
		height: 35px;
		border-radius: 30px;
		justify-content: center;
	}

	#box{
		justify-content: center;
		background-color: green;
		margin: auto;
		width: 300px;
		padding: 20px;
		margin-top: 13%;
		margin-bottom: 20%;
		border-radius: 10px;
		border:solid 1px green ;
		
		

	}
	form{
		display: contents;
		justify-content: center;
		
	}
	#title{
		display: -webkit-box;
		justify-content: center;
		margin-left: 50px;
		padding-left: 40%;
			
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div id="title" style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php" style="color:greenyellow ; ">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>