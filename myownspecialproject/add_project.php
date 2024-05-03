<?php
session_start();
// Include the database connection file
    include 'connection.php';
    
// Vérifiez si l'utilisateur est connecté en vérifiant la présence de la variable de session user_id
if(isset($_SESSION['user_id'])){
    // L'utilisateur est connecté, vous pouvez récupérer son ID
    $user_id = $_SESSION['user_id'];
}

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $project_name = $_POST['project_name'];
        $description = $_POST['description'];
        $date_project = $_POST['date_project'];
        $client_name = $_POST['client_name'];
        //$user_id = $_SESSION['user_id'];

        //$client_name="SELECT client_name FROM clients WHERE ";

        $sqli = "INSERT INTO project (client_name,  user_id, project_name, description, date_project) VALUES('$client_name',  '$user_id','$project_name',  '$description', '$date_project')";
        $result = mysqli_query($con,$sqli);
        if($result){
            header('location:projects.php');
            echo "<script>alert('Your message has been sent');</script>";
            
        }else{
            echo "<script>alert('Something went wrong');</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEW Project</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
        body{
            background-color: #f2f2f2;
        }
        
        .form-group {
            margin-top: 10px;
        }
       .body {
        padding: 20px;
        margin-left: 20px;
        justify-content: center;

       }
       button {
        margin-top: 10px;
        width: 300px;
       }

       
        
    </style>

</head>
<body>
    
    <div class="body">
        <h2>Add New Project</h2>
        <form method="post">
       
        <div class="  form-group">
            <label for="project_name" class="form-label">Project name</label>
            <input type="text" name="project_name" class="form-control" placeholder="Enter the project's name" autocomplete="off" >
         </div>
         <div class=" form-group">
            <label for="id_lient" class="form-label">Client</label>
            <input type="text" name="client_name" class="form-control" placeholder="Enter the client's name" autocomplete="off">
        </div>
         <div class=" form-group">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" name="description" class="form-control" placeholder="Enter a description" autocomplete="off"></textarea>
        </div>
        <div class=" form-group">
            <label for="datetime-local" class="form-label">Date</label>
            <input type="datetime-local" name="date_project" class="form-control" autocomplete="off">
         </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
    
</body>
</html>