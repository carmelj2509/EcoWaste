<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "ecowaste";


$conn = mysqli_connect($server, $username, $password, $database);



if (!$conn) {
	die("Connection error: ". mysqli_connect_error());
}


?>

