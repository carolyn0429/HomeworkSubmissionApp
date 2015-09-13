<?php


$host = "localhost";
$username = "root";
$password = "jph2020429";

//create connection
$conn = new mysqli($host, $username, $password);

//check connection
if ($conn->conntct_error){
	die("Connection failed: ".$conn->connect_error);
}

echo "Connected successfully";

?>