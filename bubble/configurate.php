<?php
$host="localhost";
$user="root";
$pass="";
$db="test";

$con=mysqli_connect($host,$user,$pass,$db);

if ($con) {
    echo "ffrfr3f";
}else{
    echo"db not connected";
}
?>