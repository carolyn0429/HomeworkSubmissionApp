<!--<div ng-app="stuapp" ng-controller="SubmitCtrl" ng-repeat="hw in homeworks1 track by $index" class="jumbotron">-->
<?php

session_start();
#include the db connection file
include('../includes/db.php');
var_dump( $_POST );
ini_set('error_reporting', E_ALL) ;

if (isset($_POST['stuans']) && !empty($_POST['stuans'])){
  $answer = $_POST['stuans'];
echo $answer;

$sql = "INSERT INTO `answer` (`stu_id`, `hw_id`, `answer`, `last_submit`)
VALUES 
(1,1,'".$answer."',NOW())";
echo $sql;
//$query = 'INSERT INTO `answer` '. '(stu_id, hw_id, answer, last_submit) '. 
//'VALUES(1, 1, "bbbbbb", NOW())';
//"INSERT INTO answer (stu_id, hw_id, answer, last_submit) 
//VALUES (1, 1, "$answer", NOW() )";
//(SELECT student.stu_id FROM `student` INNER JOIN person WHERE person.id = student.stu_id and student.stu_id = '".$stu_id."')
# insert record validation
$result = mysql_query($sql);

if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $sql;
    echo $message;
}
  
/*if (!mysql_query($sql))
  {
  die('Error: ' . mysql_error());
  }*/
echo "1 record added";
}else{
  echo "".mysql_error();
 // die('Error: ' . mysql_error());
}

mysql_close();

?>
<div ng-app="stuapp" ng-controller="SubmitCtrl" class="jumbotron">
      <h2>Submit a Homework</h2>
      <br/>
	
    <!--  
    <h5>1. Homework Information</h5>
          <label>Name:</label> <p name="{{hw.hw_name}}">{{hw.hw_name}}</p><br/> 
          <label>Description:</label> {{hw.hw_desc}}<br/> 
          <label>Due Date/Time:</label> {{hw.hw_due}} <br/> 
          <label>Student SID:</label> ch451r<br/> 
          <hr/>
           <h5>2. Answer:</h5>
           //-->
           <form class="form-horizontal" method="post" >
	<!--	<form class="form-horizontal" action="insertAnswer.php" method="post">-->
		  <div class="form-group">
		  	
		      <input name="stuans" value ="<?php if(isset($stuans)){ print $stuans; } ?>" class="form-control" rows="3"/>
		   </div>
	<!--	
  </form>

		<h5>3. Finish</h5>
           <p>Click Submit to submit<br/> 
              Click Cancel to go back
           </p>
           -->

         <a href="#/answer"><input type="submit" class="btn btn-success pull-right" name="Submit"></a>
          
          <a href="#/answer"><button type="button" class="btn btn-default pull-right">Cancel</button></a>
  </form>
</div><!--jumbptron-->


