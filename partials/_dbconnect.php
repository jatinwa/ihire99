<?php
$username = "root";
$hostname = "localhost";
$password = "";
$database = "sampleproject";

$conn = mysqli_connect($hostname, $username, $password, $database);

if(!$conn){
    echo 'database connection failed';
}

?>
