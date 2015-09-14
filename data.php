<?php
# this file used to handle queries

#include the db connection file
include('includes/db.php');

mysql_connect($host , $username, $password) or
    die("Could not connect: " . mysql_error());
	mysql_select_db($database);

	//echo "Connected successfully";   
$result = mysql_query("SELECT * FROM student_homework");
	/*$result = mysql_query("SELECT `student`.`stu_id`, `student`.`SID`, GROUP_CONCAT(`homework`.`hw_name`) as `homeworks` 
FROM `student` 
JOIN `student_homework` ON `student_homework`.`stu_id` = `student`.`stu_id` 
JOIN `homework` ON `homework`.`hw_id` = `student_homework`.`hw_id`");*/

	//create an array
	$json_response = array();
	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		//printf ("%s (%s)\n",$row["stu_id"],$row["answer"]);
	    $row_array['stuhw_id'] = $row['stuhw_id'];
        $row_array['stu_id'] = $row['stu_id'];
        $row_array['hw_id'] = $row['hw_id'];
        $row_array['answer'] = $row['answer'];
        $row_array['last_submit'] = $row['last_submit'];
       

        //push the values into the array
        array_push($json_response, $row_array);
	}

	echo json_encode($json_response);

	//close the db connection
	mysql_close();

?>