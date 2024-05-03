<?php include 'configurate.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>BUBBLE NEWS</title> 
    </head>
    <body>
        <div>
            <form action="" methode="POST">
                <input type="text" name="name" placeholder="Entrer Votre Nom" > <br><br>
                <input type="text" name="email" placeholder="Entrer Votre EMAIL" > <br><br>
                <input type="text" name="password" placeholder="Entrer Votre Mot de passe" > <br><br>
            
                <input type="submit" name="save_btn" value="save" > <br><br>
            </form>    
        </div>
        <?php
        if (isset($_POST['save_btn'])) {
            $name=$_POST['name'];
            $email=$_POST['email'];
            $password=$_POST['password'];

        $query="INSERT INTO admins (name,email,password) VALUES('$name', '$email', '$password')";
        $data=mysqli_query($con,$query);
            
        }
        ?>  
    </body>    
</html>
