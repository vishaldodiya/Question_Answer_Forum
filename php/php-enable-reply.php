<?php

	include "connection.php";

	
	
	if(isset($_POST['rep_id'])){
		
		$connection = new connection();
		$connection->connect();
		$rep_id = $_POST['rep_id'];
		$rep_rid = $_POST['rep_rid'];
		$rep_type = $_POST['rep_type'];
		$table;
		
		if($rep_type == 'q'){
			$table = '`question`';
		}else if($rep_type == 'a' || $rep_type == 'c'){
			$table = '`answer`';
		}
		
		$query;
		if($rep_type == 'q'){
			$query = "update $table set `bo_is_active` = 1 where `in_question_id` = $rep_rid";
			
		}else{
			$query = "update $table set `bo_is_active` = 1 where `in_reply_id` = $rep_rid";
		}
		
		//echo $query;
		
		//die;
		mysqli_query($connection->mycon,$query);
		
		mysqli_query($connection->mycon,"update `reports` set `bo_active` = 1 where `in_report_id` = $rep_id");
		
		echo "Enabled successfully";
		
		
		
	}

	

?>