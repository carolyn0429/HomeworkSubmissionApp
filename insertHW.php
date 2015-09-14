<?php 

#include db onnection config file
include('includes/db.php');

# variables from user input
$hw_name = mysql_real_escape_string($_POST['hwname']);
$hw_desc = mysql_real_escape_string($_POST['hwdesc']);
$hw_due = mysql_real_escape_string($_POST['hwdue']);
$hw_question = mysql_real_escape_string($_POST['hwquestion']);
$hw_subject = mysql_real_escape_string($_POST['hwsubject']);
$hw_assigned = mysql_real_escape_string($_POST['hwassigned']);

# insert query for execution
$query = "INSERT INTO homework (hw_name, hw_desc, hw_due, hw_question, hw_subject, hw_assigned) 
VALUES ($hw_name, $hw_desc, $hw_due, $hw_question, $hw_subject, $hw_assigned";

# insert record validation
if (mysql_query($query)){
	echo "Insert successfully!";
}else{
	echo "ERROR: could not execute SQL";
}

mysql_close();
?>