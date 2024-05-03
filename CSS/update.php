<?php
session_start();
// Include the database connection file
    include 'connection.php';

    $project_id=$_GET['updateid'];

    $sqli="select * from project where project_id=$project_id ";
    $result=mysqli_query($con,$sqli);
    $row=mysqli_fetch_assoc($result);
    $project_name=$row['project_name'];
    $client=$row['client'];
    $description=$row['description'];
    $date_project=$row['date_project'];
    
    if($isset($_POST['submit'])) {
        $project_name = $_POST['project_name'];
        $description = $_POST['description'];
        $date_project = $_POST['date_project'];
        $client = $_POST['client'];

        $sqli = "update 'project' set project_id=$project_id, project_name='$project_name', client='$client', contenu='$contenu', date_project=$date_project where project_id=$project_id ";
        $result = mysqli_query($conn,$sqli);
        if($result){
            
            echo "<script>alert('updated successfully');</script>";
            header('location:projects.php');
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
        <h2>Update Project</h2>
        <form method="post">
        
        <div class="  form-group">
            <label for="project_name" class="form-label">Project name</label>
            <input type="text" name="project_name" class="form-control" placeholder="Enter the project's name" autocomplete="off"  value=<?php echo $project_name;?>>
         </div>
         <div class=" form-group">
            <label for="client" class="form-label">Client</label>
            <input type="text" name="client" class="form-control" placeholder="Enter the client's name" autocomplete="off" value=<?php echo $client;?> >
        </div>
         <div class=" form-group">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" placeholder="Enter a description" autocomplete="off" value=<?php echo $description;?> >
        </div>
        <div class=" form-group">
            <label for="datetime-local" class="form-label">Date</label>
            <input type="datetime-local" name="date_project" class="form-control" autocomplete="off" value=<?php echo $date_project; ?> >
         </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
    
</body>
</html>