<?php
include 'connection.php';
if(isset($_GET['deleteid'])){
    $task_id=$_GET['deleteid'];

    $sqli="delete from tasks where task_id=$task_id";
    $result=mysqli_query($con,$sqli);
    if($result){
        echo "<script>alert('Task Deleted Successfully');window.location.href='tasks.php'</script>";
    }else{
        die(mysqli_error($con));
    }
}

?>