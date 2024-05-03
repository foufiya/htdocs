<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "new2";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
