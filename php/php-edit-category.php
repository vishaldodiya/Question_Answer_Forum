<?php

	include_once "connection.php";

	$connection = new connection();

	$connection->connect();

	$cat_id = $_POST['cat_id'];
	$new_cat = $_POST['new_cat'];

	$query = "update `category` set `st_category_name` = '$new_cat' where `in_category_id` = $cat_id";

	mysqli_query($connection->mycon,$query);

	echo "Updated Successfully";

?>