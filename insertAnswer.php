<?php

session_start();
include "includes/db.php";
$answer = mysql_real_escape_string($_POST['answer']);
echo $answer;

$query = "INSERT INTO answer (stu_id, hw_id, answer, last_submit) 
VALUES ((SELECT student.stu_id FROM `student` INNER JOIN person WHERE person.id = student.stu_id and student.stu_id = '".$_SESSION['ID'] . "'), '1',$answer, NOW() )";

# insert record validation
if (mysql_query($query)){
	echo "Insert successfully!";
}else{
	echo "ERROR: could not execute SQL";
}

mysql_close();

?>