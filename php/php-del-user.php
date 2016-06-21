<?php

	include_once "connection.php";

	$connection = new connection();

	$connection->connect();

	$usr_id = $_POST['usr_id'];

	$query = "delete from `registration` where `in_id` = $usr_id";

	mysqli_query($connection->mycon,$query);

	echo "User deleted successfully";

?>