<?php
session_start();
// Vérifiez si l'utilisateur est connecté en vérifiant la présence de la variable de session user_id
if(isset($_SESSION['user_id'])){
    // L'utilisateur est connecté, vous pouvez récupérer son ID
    $user_id = $_SESSION['user_id'];
}
// Include the database connection file
    include 'connection.php';

    //if(isset($_POST['submit']))
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $task_name = $_POST['task_name'];
        $contenu = $_POST['contenu'];
        $datetask = $_POST['datetask'];
       

        $sqli = " INSERT INTO tasks ( user_id, task_name, contenu, datetask) VALUES( '$user_id', '$task_name', '$contenu', '$datetask')";
        $result = mysqli_query($con,$sqli);
        if($result){
            header('location:tasks.php');
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
    <title>NEW TASK</title>
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
        <h2>Add New Task</h2>
        <form method="post">
        
        <div class="form-group">
            <label for="task_name" class="form-label">task name</label>
            <input type="text" name="task_name" class="form-control" placeholder="Enter the task's name" autocomplete="off" >
         </div>
        <div class=" form-group">
            <label for="contenu" class="form-label">Contenu</label>
            <input type="text" name="contenu" class="form-control" placeholder="Enter a contenu" autocomplete="off">
        </div>
        <div class=" form-group">
            <label for="datetime-local" class="form-label">Date</label>
            <input type="datetime-local" name="datetask" class="form-control" autocomplete="off">
         </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
    
</body>
</html>