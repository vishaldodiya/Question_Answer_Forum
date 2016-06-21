<?php

	include_once "connection.php";

	
		$cat_id = $_POST['cat_id'];
//$cat_name = 'physics';
		$connection = new connection();

		$connection->connect();
	
		$query ="delete from `category` where `in_category_id` ='$cat_id'";
		//echo $query;
		//die;
		mysqli_query($connection->mycon,$query);
		echo "Category Removed Successfully";
	
	
	//header("Location: http://localhost/forum/AdminLTE-2.3.0/index2.php");

?>