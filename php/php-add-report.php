<?php
	session_start();
	include_once "connection.php";
	$connection = new connection();
	$connection->connect();
	
	$rep_id = $_POST['rep_id'];
	$rep_type = $_POST['rep_type'];

	$flag = previously_reported($rep_id,$rep_type,$_SESSION['usr_id']);

	if($flag == 1){
		echo "You have previously Reported";
	}else{
		$connection = new connection();
		$connection->connect();
		$query = "INSERT INTO `reports`(`in_type_id`, `st_type`, `in_id`, `dt_report`,`bo_active`) VALUES ($rep_id,'$rep_type',".$_SESSION['usr_id'].",'".date("y-m-d")."',1)";
		//echo $query;
		//die;
		mysqli_query($connection->mycon,$query);
		echo "Report added sucessfully";
	}


	function previously_reported($rep_id,$rep_type,$usr_id){
		
		$connection = new connection();
		$connection->connect();
		
		$query = "select count(*) from `reports` where `in_type_id` = $rep_id and `st_type` = '$rep_type' and `in_id` = $usr_id";
		//echo $query;
		$result = mysqli_query($connection->mycon,$query);
		$flag;
		if($arr = mysqli_fetch_array($result)){
			if($arr['count(*)'] == 0){
				$flag = 0;
			}else{
				$flag = 1;
			}
			
			return $flag;
		}
		
		
	}

?>