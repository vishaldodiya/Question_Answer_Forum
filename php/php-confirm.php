<?php
	
	include "connection.php";

	$connection = new connection();
    $connection->connect();

	$txt_email = $_GET["email"];
	
	$query = "update registration set is_confirmed = 1 where st_email_id = $txt_email";
	//echo $query;
	mysqli_query($connection->mycon,$query);
	
	echo "<center><h3>Your Email Adrress is varified. <br> Please wait you will be redirect to login page<h3></center>";
	
	header( "refresh:2;url= http://localhost/forum/login.php" );


?>