<?php
include 'connection.php';
if(isset($_GET['deleteid'])){
    $client_id=$_GET['deleteid'];

    $sqli="delete from clients where client_id=$client_id";
    $result=mysqli_query($con,$sqli);
    if($result){
        echo "<script>alert('Client Deleted Successfully');window.location.href='clients.php'</script>";
    }else{
        die(mysqli_error($con));
    }
}

?>