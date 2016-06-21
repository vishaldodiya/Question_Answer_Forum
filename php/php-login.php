<?php
	include "connection.php";
	session_start();
	$connection = new connection();
	$connection->connect();

	$txt_uname = $_POST["txt_uname"];
	$txt_pass = $_POST["txt_pass"];


	if(preg_match('/^[A-Za-z0-9]{6,}$/',$txt_uname)){
		
	}else{
		
		$_SESSION['errMsg'] = "Enter valid username";
		header("Location: http://localhost/forum/login.php");
	}

	if(preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/',$txt_pass)){
		
	}else{
	
		$_SESSION['errMsg'] = "Enr valid Password";
		header("Location: http://localhost/forum/login.php");
	}

	$query = "SELECT `in_id`, `st_username`, `is_confirmed`,`st_type` FROM `registration` WHERE `st_username` = '$txt_uname' and `password` = '$txt_pass'";
	//echo $query;
	$result = mysqli_query($connection->mycon,$query);
	//echo mysqli_num_rows($result);
	if(mysqli_num_rows($result) > 0){
		
		while($arr = mysqli_fetch_array($result)){
			$usr_id = $arr["in_id"];
			$uname = $arr["st_username"];
			$status = $arr["is_confirmed"];
			$previlidge = $arr["st_type"];
			
		}
		//echo $status;
		if($status == '0'){
			$_SESSION['errMsg'] = "Your Email id is not confirmed, you need to first Activate your account";
			header("Location: http://localhost/forum/login.php");
		}else{
			
			if((strlen($txt_uname)>0) && (strlen($txt_pass)>0) ){
				$_SESSION["usr_id"] = $usr_id;
			$_SESSION["uname"] = $uname;
			$_SESSION["previlidge"] = $previlidge;
			
			
			
			$query = "INSERT INTO `logs` (`in_id`, `ip_address_remote`, `dt_log`, `tm_log_in`) VALUES (".$_SESSION["usr_id"].",'".$_SERVER['REMOTE_ADDR']."','".date("y-m-d")."','".date("h:i:s")."')";	
			//echo $_SERVER['REMOTE_ADDR'];
			//echo $query;
			
			mysqli_query($connection->mycon,$query);
			
			if($previlidge == "admin"){
				header("location: http://localhost/forum/AdminLTE-2.3.0/index2.php");
			}else{
				header("Location: http://localhost/forum/user_profile.php");	
			}
			
				
			}
			else{
				$_SESSION['errMsg'] = "Please fill up all the fields.";
				header("Location: http://localhost/forum/login.php");
			}
			
			
		}
		
		
	}else{
		$_SESSION['errMsg'] = "Invalid Username and Password";
		header("Location: http://localhost/forum/login.php");
	}

?>