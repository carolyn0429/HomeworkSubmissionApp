<?php

session_start();
#include the db connection file
include('includes/db.php');

//if (isset($_POST['answer'])){
$answer = mysql_real_escape_string($_POST['answer');
	//echo "Enter the page!\n";
	//$answer = $_POST['answer'];
//$answer = mysql_real_escape_string($_POST['answer']);
//printf($answer);
//$stu_id = $_SESSION["ID"];
$sql = "INSERT INTO `answer` (`stu_id`, `hw_id`, `answer`, `last_submit`)
VALUES 
(1,1,'{$answer}',NOW())";
//$query = 'INSERT INTO `answer` '. '(stu_id, hw_id, answer, last_submit) '. 
'VALUES(1, 1, "bbbbbb", NOW())';
//"INSERT INTO answer (stu_id, hw_id, answer, last_submit) 
//VALUES (1, 1, "$answer", NOW() )";
//(SELECT student.stu_id FROM `student` INNER JOIN person WHERE person.id = student.stu_id and student.stu_id = '".$stu_id."')
# insert record validation
$result = mysql_query($sql);

if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $sql;
    die($message);
}
	
/*if (!mysql_query($sql))
  {
  die('Error: ' . mysql_error());
  }*/
echo "1 record added";


mysql_close();

?>