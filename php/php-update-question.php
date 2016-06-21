<?php 
	
	include_once "connection.php";

	$connection = new connection();
	
	$connection->connect();

	$que_id = $_POST['que_id'];
	$new_que = $_POST['new_que'];

	$query = "update `question` set `st_question` = \"$new_que\" where `in_question_id`  = $que_id";


	mysqli_query($connection->mycon,$query);

	echo "updated successfully";
?>