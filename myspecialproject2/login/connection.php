<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="lsr_project";
    $conn = new mysqli($servername,$username,$password,$dbname);
    IF($conn->connect_error){
        die("Connection failed".$conn->connect_error);
    }
    echo "";
?>