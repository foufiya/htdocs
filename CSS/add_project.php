<?php
session_start();
// Include the database connection file
    include 'connection.php';
    
// Vérifiez si l'utilisateur est connecté en vérifiant la présence de la variable de session user_id
if(isset($_SESSION['user_id'])){
  // L'utilisateur est connecté, vous pouvez récupérer son ID
  $user_id = $_SESSION['user_id'];
 // echo "id est:".$user_id;
}
if(isset($_POST['submit']))
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      
        $project_name = $_POST['project_name'];
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $date_project = $_POST['date_project'];
        $client_name = $_POST['client_name'];
        $deadline = $_POST['deadline'];

        
        $sqli = "INSERT INTO project (user_id, project_name , client_name, description, date_project ,deadline) VALUES('$user_id', '$project_name',  '$client_name',  '$description', '$date_project' ,'$deadline')";
        $result = mysqli_query($conn,$sqli);
        if($result){
            header('location:projects.php');
            echo "<script>alert('Your message has been sent');</script>";
            
        }else{
            echo "<script>alert('Something went wrong');</script>";
        }
    }

?>

<!doctype html>
<html lang="en">

<head>
  <title>New Project</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>

  <section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-2">
              <div class="row justify-content-center">
              <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">Add new Project </p>
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  

                  <form class="mx-1 mx-md-4" method="post">
                    <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-outline fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c"><i class="bi bi-envelope-at-fill"></i>Project name  </label>
                        <input type="text" id="form3Example1c" class="form-control form-control-lg py-3" name="project_name" autocomplete="off" placeholder="Enter the name of project" style="border-radius:25px ;" />

                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-outline fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example3c"><i class="bi bi-person-fill"></i>client</label>
                        <input type="text" id="form3Example3c" class="form-control form-control-lg py-3" name="client_name" autocomplete="off" placeholder="Enter the client's name" style="border-radius:25px ;" />

                      </div>
                    </div> 
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-outline fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4c"><i class="bi bi-chat-right-text"></i> Description</label>
                        <input type="TEXT" id="form3Example4c" class="form-control form-control-lg py-3" name="description" autocomplete="off" placeholder="Enter the description" style="border-radius:25px ;" />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-outline fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c"><i class="bi bi-calendar-date"></i>Date</label>
                        <input type="datetime-local" id="form3Example1c" class="form-control form-control-lg py-3" name="date_project" autocomplete="off" placeholder="Enter the Address " style="border-radius:25px ;" />

                      </div>
                    </div>
                    
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-clock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c"><i class="bi bi-calendar-date"></i> Deadline</label>
                        <input type="datetime-local" id="form3Example1c" class="form-control form-control-lg py-3" name="deadline" autocomplete="off" placeholder="enter the Deadline " style="border-radius:25px ;" />

                    </div>

                   <BR>
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <input type="submit" value="Submit"  name="submit" class="btn btn-warning btn-lg text-light my-2 py-3" style="width:100% ; border-radius: 30px; font-weight:600;" style="border-radius:25px ;" />

                    </div>

                  </form>
                  
                </div>
                <!--<div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                  

                </div>-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>