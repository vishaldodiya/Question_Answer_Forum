<?php
	session_start();

	include_once "connection.php";
	$connection = new connection();
	
	$connection->connect();


	$query = "update `logs` set `tm_log_out` = '".date("h:i:s")."' where `in_id` =".$_SESSION['usr_id']." and `tm_log_out` = '00:00:00'";
	
	echo $query;
	//die;	
	mysqli_query($connection->mycon,$query);

	unset($_SESSION['usr_id']);
	unset($_SESSION['uname']);
	unset($_SESSION['previlidge']);

	

	header("Location: http://localhost/forum/login.php");
?>