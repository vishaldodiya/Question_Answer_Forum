<?php
	session_start();
	include "connection.php";

	$connection = new connection();

	$connection->connect();

	$old_pass = $_POST['txt_old_pass'];
	$new_pass = $_POST['txt_new_pass'];
	$con_pass = $_POST['txt_new_con_pass'];

	if($new_pass != $con_pass){
		$_SESSION['errMsg'] = "Password Missmatch <br>";
		
		header("Location: http://localhost/forum/change_password.php");
	}

	$query = "select * from `registration` where `in_id` =".$_SESSION['usr_id']." and `password` = '$old_pass'";
	
	$result = mysqli_query($connection->mycon,$query);
	$flag;
	if(mysqli_num_rows($result) > 0){
		$flag = 1;
	}else{
		$flag = 0;
	}

	
	if($flag == 1){
		if((strlen($old_pass)>0) && (strlen($new_pass)>0) && (strlen($con_pass)>0)){
			
			$query1 = "update `registration` set `password` = '$new_pass' where `in_id` = ".$_SESSION['usr_id'];
			mysqli_query($connection->mycon,$query1);	
			
			$_SESSION['success'] = "Password Updated successfully";
			header("Location: http://localhost/forum/change_password.php");
			
		}else{
			$_SESSION['errMsg'] = "Please Enter all fields <br>";
		header("Location: http://localhost/forum/change_password.php");
		}
		
		
	}else{
		$_SESSION['errMsg'] = "Enter valid old password <br>";
		header("Location: http://localhost/forum/change_password.php");
	}

?>