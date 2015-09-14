<?php

$host = "localhost";
$database = "hwsubmission";
$username = "root";
$password = "jph2020429";


mysql_connect($host , $username, $password) or
    die("Could not connect: " . mysql_error());
	mysql_select_db($database);
/*//create connection
$conn = new mysqli($host, $username, $password, $database);

//check connection
if ($conn->conntct_error){
	die("Connection failed: ".$conn->connect_error);
}

echo "Connected successfully";*/

?>