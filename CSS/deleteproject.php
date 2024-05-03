<?php
include 'connection.php';
if(isset($_GET['deleteid'])){
    $project_id=$_GET['deleteid'];

    $sqli="delete from project where project_id=$project_id";
    $result=mysqli_query($conn,$sqli);
    if($result){
        echo "<script>alert('Product Deleted Successfully');window.location.href='projects.php'</script>";
    }else{
        die(mysqli_error($conn));
    }
}

?>