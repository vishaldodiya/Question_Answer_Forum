<?php
	session_start();
	include "connection.php";

	$connection = new connection();
	$connection->connect();
	

	$txt_que = mysqli_real_escape_string($connection->mycon,$_POST['txt_ar_que']);
	$cb_values;
	if(isset($_POST['cb_category'])){
		$cb_category = array();
		$cb_category = $_POST['cb_category'];

	

		$cb_values  = implode(", ", $cb_category);
	}else{
		$cb_values = null;
	}
	
	
	
	
	
	$query = "INSERT INTO `question`(`st_question`, `in_id`, `dt_question`, `tm_question`, `st_category_name`, `bo_is_active`) VALUES (\"$txt_que\",'".$_SESSION['usr_id']."','".date("y-m-d")."','".date("h:i:s")."','$cb_values','1')";
	//echo $query;
	
	mysqli_query($connection->mycon,$query);

	foreach($cb_category as $value){
		$query = "update `category` set `in_category_count` = `in_category_count` + 1 where `st_category_name` = '$value'";
		//echo $query;
		
		mysqli_query($connection->mycon,$query);
		
	}

	header("Location: http://localhost/forum/index.php");

?>