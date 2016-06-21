<?php 
	
	include_once "connection.php";

	$connection = new connection();

	$connection->connect();

	$que_id = $_POST['que_id'];
	$cat_str = $_POST['que_cat'];
	$query1 = "DELETE FROM `question` WHERE `in_question_id` = $que_id";

	
	//echo $query;
	//die;
	mysqli_query($connection->mycon,$query1);
	mysqli_query($connection->mycon,"DELETE FROM `reports` WHERE `in_type_id` = $que_id and `st_type` = 'q'");
	
	
	
	$cb_category = array();
	$cb_category = explode(", ",$cat_str);

	foreach($cb_category as $value){
		$query = "update `category` set `in_category_count` = `in_category_count` - 1 where `st_category_name` = '$value'";
		
		mysqli_query($connection->mycon,$query);
		
	}


	echo "Question deleted successfully";

?>