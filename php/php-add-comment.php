<?php
	session_start();
	include "connection.php";
	
	$connection = new connection();
	$connection->connect();

	$ans_id = $_POST['in_ans_id'];
	$txt_com = $_POST['txt_ar_com'];
	
	$query="SELECT `in_question_id` from `answer` where `in_reply_id` = $ans_id";
	


	$result = mysqli_query($connection->mycon,$query);
	$que_id;
	if($arr = mysqli_fetch_array($result)){
		$que_id = $arr['in_question_id'];
	}
	$connection->close($connection->mycon);
	
	$connection->connect();
	
	$query_insert = "INSERT INTO `answer`(`in_question_id`, `in_parent_id`, `in_id`, `dt_reply`, `tm_reply`, `in_like`, `in_dislike`, `bo_is_edited`,`bo_is_active`, `st_reply`) VALUES ($que_id,$ans_id,".$_SESSION['usr_id'].",'".date("y-m-d")."','".date("h:i:s")."',0,0,'0','1',\"$txt_com\")";

	//echo $query_insert;
	//die;
	//echo $query_insert;
	mysqli_query($connection->mycon,$query_insert);

	echo "Comment added";
	//header("Location: http://localhost/forum/user_profile.php");

?>