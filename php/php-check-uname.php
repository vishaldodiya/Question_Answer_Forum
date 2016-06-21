<?php

	include 'connection.php';

	$connection = new connection();
    $connection->connect();
	
	if(isset($_POST["user_name"])){
		$query = "select * from registration where st_username ='".$_POST["user_name"]."'";
		
		$result = mysqli_query($connection->mycon,$query);
		if(mysqli_num_rows($result) > 0){
			echo '<span class="text-danger" id="false">Username Not Available</span>';
		}else{
			echo '<span class="text-success" id="true">Username Available</span>';
		}
	}

	if(isset($_POST["email_id"])){
		$query = "select * from registration where st_email_id ='".$_POST["email_id"]."'";
		//echo "hello";
		$result = mysqli_query($connection->mycon,$query);
		if(mysqli_num_rows($result) > 0){
			echo '<span class="text-danger" id="false">Email Id already Registered</span>';
		}else{
			//echo '<span class="text-success" id="true">Email Id Available</span>';
		}
	}
	
	

?>