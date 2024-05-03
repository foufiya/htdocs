<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $user = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['role'];

   $select = " SELECT * FROM users WHERE username = '$user' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['role'] == 'administrateur'){

         $_SESSION['admin_name'] = $row['username'];
         header('location:admin_page.html');

      }elseif($row['role'] == 'charge administrative'){

         $_SESSION['user_name'] = $row['username'];
         header('location:op.html');
      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login_page</title>
    <style>
        
    body {
        margin: 100px;
        padding: 20px;
    }

    form {
        
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
   h3 {
    display: flex;
    justify-content: center;
    font-weight: bold;
    font-size: 40px;
    
   }
   label {
    margin: 8px;
    
   }

   
   fieldset{
    margin: 50px;
    display: inline;
    border: none;
    
   }
   .BUTTON {
    margin: 0 10% 0 10%;
   }
    </style>
</head>
<body>
    <form action="authentication.php" method="post">
        <h3> login now</h3>
        <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <fieldset>
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Entrer votre username" required>  
        </div><br>
        <div>
           <label for="role">Role:</label>
            <select id="role" name="role">
                <option value="1">administrateur</option>
                 <option value="1">charge administrative</option>
            </select>
         </div><br>
         <div> 
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Entrer votre password"required>
       </div>
    </fieldset> 
    
        <div class="row">
            <input class="button" type="submit" value="Se connecter" >
        </div>
      
</form>

</body>
</html>