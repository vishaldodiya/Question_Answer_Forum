<?php

	session_start();
	include "connection.php";

	$connection = new connection();
	$connection->connect();

	$txt_ans = mysqli_real_escape_string($connection->mycon,$_POST["txt_ar_ans"]);

	//echo str_replace("\\r\\n","<br/>", (htmlspecialchars(($txt_ans))));

	
	$que_id = $_POST["in_que_id"];
	
	$query = "INSERT INTO `answer`(`in_question_id`, `in_parent_id`, `in_id`, `dt_reply`, `tm_reply`, `in_like`, `in_dislike`, `bo_is_edited`,`bo_is_active`, `st_reply`) VALUES ($que_id,0,".$_SESSION['usr_id'].",'".date("y-m-d")."','".date("h:i:s")."',0,0,'0','1',\"$txt_ans\")";
	
	

	mysqli_query($connection->mycon,$query);

	
	//	header("Location: http://localhost/forum/more_answer.php?que_id=$que_id");
	
	echo "Answer Added successfully You can view it in More Answer section";
	
?>