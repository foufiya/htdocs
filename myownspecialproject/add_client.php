<?php
session_start();
// Include the database connection file
    include 'connection.php';

    //if(isset($_POST['submit']))
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $client_name = $_POST['client_name'];
        $num_tel = $_POST['num_tel'];
        $client_email = $_POST['client_email'];
        $address = $_POST['address'];
        
        $sqli = " INSERT INTO clients ( client_name, num_tel, client_email, address) VALUES( '$client_name', '$num_tel', '$client_email', '$address')";
        $result = mysqli_query($con,$sqli);
        if($result){
            header('location:clients.php');
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
    <title>NEW Client</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
        body{
            background-color: #f2f2f2;
        }
        form{
            DISPLAY: TABLE-CAPTION;
        }
        
        .form-group {
            margin-top: 10px;
            MARGIN-LEFT: 80PX;
            
        }
       .body {
        padding: 20px;
        margin-left: 20px;
        justify-content: center;
        
       }
       label{
        height: 10PX;
        

       }
       button {
        margin-top: 10px;
        width: 300px;
       }
        
    </style>

</head>
<body>
    
    <div class="body">
        <h2>Add New Client</h2>
        <form method="post">
        
        <div class="  form-group">
            <label for="client_name" class="form-label">Client name</label>
            <input type="text" name="client_name" class="form-control" placeholder="Enter the client's name" autocomplete="off" >
         </div>
         <div class=" form-group">
            <label for="num_tel" class="form-label">Phone number</label>
            <input type="text" name="num_tel" class="form-control" placeholder="Enter the Phone Number" autocomplete="off">
        </div> 
        
        <div class=" form-group">
            <label for="client_email" class="form-label">client_email</label>
            <input type="text" name="client_email" class="form-control" placeholder="Enter the client's email" autocomplete="off">
        </div>
        <div class=" form-group">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" autocomplete="off">
         </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
    
</body>
</html>