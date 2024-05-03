<?php
 session_start();
  include 'connection.php';
 // Vérifiez si l'utilisateur est connecté en vérifiant la présence de la variable de session user_id
/*if(isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
}*/

$user_id = $_SESSION['user_id'];
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>TASKS</title>
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
	  		<h1><a href="index.html" class="logo">Project Name</a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="dashboard.php"><span class="fa fa-home mr-3"></span> Homepage</a>
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
        <button class="btn btn-primary my-5" ><a href="add_task.php" class="text-light" >New Task</a></button> 
        <h2 class="mb-4">TASKS</h2>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Sl no</th>
              <th scope="col">Task Name</th>
              <th scope="col">content</th>
              <th scope="col">Date</th>
              <th scope="col">Deadline</th>
              <th scope="col">Operations</th>
            </tr>
          </thead>
          <tbody>


          <?php
          if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
          
            $query = "SELECT * FROM tasks WHERE user_id = $user_id";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
          
            $result = $stmt->get_result();
            $clients = $result->fetch_all(MYSQLI_ASSOC);
          
            $stmt->close();
            $conn->close();
          }
        //if ($user_id) {
          //$sqli = "SELECT * FROM tasks WHERE user_id = ";
          $result = mysqli_query($conn, $query);
          if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $task_id = $row['task_id'];
                $task_name = $row['task_name'];
                $contenu = $row['contenu'];
                $datetask = $row['datetask'];
                $delai = $row['delai'];
                   echo '<tr>
                      <th scope="row">' . $task_id . '</th>
                      <td>' . $task_name . '</td>
                      <td>' . $contenu . '</td>
                      <td>' . $datetask . '</td>
                      <td>' . $delai . '</td>
                      <td>
                        <button class="button btn btn-primary"><a href="update.php" class="text-light">Update</a></button>
                        <button class="button btn btn-primary"><a href="deletetask.php?deleteid=' . $task_id . '" class="text-light">Delete</a></button>
                      </td>
                    </tr>';
            }}
          
      /*}else {
        echo "Error executing the query: " . mysqli_error($conn);
      }
    }else {
        echo "User ID not found in session.";
    }*/
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