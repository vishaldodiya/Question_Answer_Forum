<?php

	include "connection.php";

	$connection = new connection();
	$connection->connect();


		$cat_name = $_POST['cat_name'];
		
		$query = "INSERT INTO `category`(`st_category_name`, `in_category_count`) VALUES ('$cat_name',0)";
		
		mysqli_query($connection->mycon,$query);
		
		echo "category added successfully";
		
	

?>