<?php
# this file used to handle queries
session_start();
#include the db connection file
include('includes/db.php');


	//echo "Connected successfully";   
$result = mysql_query("SELECT * FROM homework");
	/*$result = mysql_query("SELECT `student`.`stu_id`, `student`.`SID`, GROUP_CONCAT(`homework`.`hw_name`) as `homeworks` 
FROM `student` 
JOIN `student_homework` ON `student_homework`.`stu_id` = `student`.`stu_id` 
JOIN `homework` ON `homework`.`hw_id` = `student_homework`.`hw_id`");*/

	//create an array
	$json_response = array();
	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		//printf ("%s (%s)\n",$row["hw_id"],$row["hw_due"]);
	    $row_array['hw_id'] = $row['hw_id'];
        $row_array['hw_name'] = $row['hw_name'];
        $row_array['hw_due'] = $row['hw_due'];
        $row_array['hw_question'] = $row['hw_question'];
        $row_array['hw_desc'] = $row['hw_desc'];
        $row_array['hw_subject'] = $row['hw_subject'];
       

        //push the values into the array
        array_push($json_response, $row_array);
	}

	echo json_encode($json_response);

	//close the db connection
	mysql_close();

?>