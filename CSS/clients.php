<?php
session_start();
  include 'connection.php';
  if(isset($_SESSION['user_id'])){
    // L'utilisateur est connecté, vous pouvez récupérer son ID
    $user_id = $_SESSION['user_id'];
    //echo "id est:".$user_id;
}
$user_id = $_SESSION['user_id'];
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>CLIENTS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
        <style>
            btn-primar :hover {
                color: rgb(red, 67, 95);
                background-color: white;
            }
            
        </style>
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" style="background: #FBBC05;" >
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
	  		<h1><a href="welcome.php" class="logo"  style="font-size: 40px;">Bubble.</a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="welcome.php"><span class="fa fa-home mr-3"></span> Homepage</a>
          </li>
          <li>
              <a href="clients.php"><span class="fa fa-user mr-3"></span> CLIENTS</a>
          </li>
          <li>
            <a href="projects.php"><span class="fa fa-diagram-project mr-3"></span> PROJECTS</a>
          </li>
          <li>
            <a href="tasks.php"><span class="fa fa-list-check mr-3"></span> TASKS</a>
          </li>
          
          <li>
            <a href="logout.php"><span class="fa fa-paper-plane mr-3"></span> LOGOUT</a>
          </li>
        </ul>

    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <button class="btn btn-primary my-5" ><a href="add_client.php" class="text-light" >New Client</a></button> 
        <h2 class="mb-4">CLIENTS</h2>
        <table class="table">
          <thead>
            <tr>
              <!--<th scope="col">Sl no</th>-->
              <th scope="col">Client Name</th>
              <th scope="col">Phone Number</th>
              <th scope="col">client_email</th>
              <th scope="col">Address</th>
              <th scope="col">Operations</th>
            </tr>
          </thead>
          <tbody>


          <?php
          if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
          
            $query = "SELECT * FROM clients WHERE user_id = $user_id";   
            $result= mysqli_query($conn, $query);
          if($result){
            
            while($row=mysqli_fetch_assoc($result)){
              $client_id=$row['client_id'];
              $client_name=$row['client_name'];
              $num_tel=$row['num_tel'];
              $client_email=$row['client_email'];
              $address=$row['address'];
              echo '<tr>
              <!--<th scope="row">'.$client_id.'</th>-->
                <td>'.$client_name.'</td>
                <td>'.$num_tel.'</td>
                <td>'.$client_email.'</td>
                <td>'.$address.'</td>
                <td>
                  
                  <button class="button btn btn-primary"><a href="deleteclient.php?deleteid='.$client_id.'" class="text-light">Delete</a></button>
                </td>
            </tr>';
            }
          }
        }
        ?>
           
        </tbody>
      </table>
        
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>