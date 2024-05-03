<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
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
			$query = "insert into users (user_id,user_name,gender,user_email,dateuser,password) values ('$user_id','$user_name','$gender','$user_email','$dateuser','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
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
		display: -ms-inline-grid;
		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
		border-radius: 8px
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}
	#gender{
		display: flex;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Create Account</div>

			<input id="text" type="text" name="user_name" placeholder="Name" required><br><br>
			<input id="text" type="text" name="user_email" placeholder="user_email" required><br><br>
			<div id="gender">
				<label for="gender">Gender:</label><br>
				<input type="radio" id="male" name="gender" value="male">
				<label for="male">Male</label><br>

				<input type="radio" id="female" name="gender" value="female">
				<label for="female">Female</label><br>

				<input type="radio" id="other" name="gender" value="other">
				<label for="other">Other</label>
			</div><br>			
			<input id="text" type="datetime-local" name="dateuser" style="width: 250px;" placeholder="Date & Time"><br><br>
			<input id="text" type="password" name="password" placeholder="Password" required><br><br>
			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>