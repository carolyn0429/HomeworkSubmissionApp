<?php

session_start();
include "includes/db.php";

if (count($_POST)>0){
	$result = mysql_query("SELECT * FROM person WHERE pid='".$_POST['id']."' and pwd = '".$_POST['pwd']."'");
	if($result === FALSE) { 
    	die(mysql_error()); 
	}

	/*testing purpose
	while($row = mysql_fetch_array($result))
	{
	    echo $row['permission'];
	}*/
	$row = mysql_fetch_array($result);
	
	if (is_array($row)){

		$_SESSION['flower']='green';
		$_SESSION["PID"] = $row['pid'];
		$_SESSION["ID"] = $row['id'];
		$_SESSION["permission"] = $row['permission'];
		$_SESSION["PWD"] = $row['pwd'];
		
	}else{
		$message = "Invalid username or password!";
		echo $message;
	}
}// end if
if ($_SESSION["permission"]==2){
	header("Location: student.html");
}elseif($_SESSION["permission"]==1){
	header("Location: index.html");
}else{
	unset($_SESSION["ID"]);
	echo "<li>Login Info - Username
	/Password:  Incorrect Combination try again</li>";
}//end if


/* working codes
$id = $_POST['id'];
$pwd = $_POST['pwd'];
if($id=="teacher" && $pwd == "123")
{
$_SESSION["id"] = $id;
header("Location: index.html"); // redirects
}elseif($id=="student" && $pwd == "123"){
	$_SESSION["id"] = $id;
header("Location: student.html"); // redirects
}else{
unset($_SESSION["id"]);
echo "<li>Login Info - Username
/Password:  Incorrect Combination try again</li>";
}
*/
?>