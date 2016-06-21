<?php
    include "connection.php";
	//require 'PHPMailer-master/PHPMailerAutoload.php';

	

	session_start();

    $connection = new connection();
    $connection->connect();

	$txt_uname = $_POST["txt_uname"];
	$txt_email = $_POST["txt_email"];

	


	*/
	$txt_type = 'user';
	if(!empty($_POST['txt_type'])){
		$txt_type = $_POST['txt_type'];
	}

	$txt_fname = $_POST["txt_fname"];
	$txt_lname = $_POST["txt_lname"];
	$rd_gen = $_POST["rd_gen"];
	$dt_birth = $_POST["dt_birth"];
	
	$cb_category = array();
	$cb_category = $_POST["cb_category"];
	$cb_values  = implode(", ", $cb_category);

	$txt_pass = $_POST["txt_pass"];
	$txt_con_pass = $_POST["txt_con_pass"];

	if(preg_match('/^[A-Za-z0-9]{6,}$/',$txt_uname)){
		
	}else{
		$_SESSION['errMsg'] = "Enter valid username";
		header("Location: http://localhost/forum/register.php");
	}

	if(preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/',$txt_pass)){
		
	}else{
		$_SESSION['errMsg'] = "Enter valid Password";
		header("Location: http://localhost/forum/register.php");
	}

	if(preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$/', $txt_email))
	{
	
	}
	else
	{ 
		$_SESSION['errMsg'] = 'Enter valid Email.'; 
		header("Location: http://localhost/forum/register.php");
	}

	if(preg_match('/^[A-Za-z]{1,30}$/',$txt_fname)){
		
	}else{
		$_SESSION['errMsg'] = "Enter valid firstname";
		header("Location: http://localhost/forum/register.php");
	}

	if(preg_match('/^[A-Za-z]{1,30}$/',$txt_lname)){
		
	}else{
		$_SESSION['errMsg'] = "Enter valid lastname";
		header("Location: http://localhost/forum/register.php");
	}

	if($rd_gen == 0){
		$_SESSION['errMsg'] = "Enter Gender";
		header("Location: http://localhost/forum/register.php");
	}

	if($dt_birth == 0){
		$_SESSION['errMsg'] = "please select date of birth";
		header("Location: http://localhost/forum/register.php");
	}

	if($txt_pass != $txt_con_pass){
		$_SESSION['errMsg'] = "Password Missmatch <br>";
		
		header("Location: http://localhost/forum/register.php");
	}
	else{
			if(isset($_FILES['img_profile'])){
				$file = $_FILES['img_profile'];

				//file Properities
				$file_name = $file['name'];
				$file_tmp = $file['tmp_name'];
				$file_size = $file['size'];
				$file_error = $file['error'];

				//file extension
				$file_ext = explode('.',$file_name);
				$file_ext = strtolower(end($file_ext));

				$allowed = array('jpg','jpeg','png');

				if(in_array($file_ext, $allowed)){
					if($file_error === 0){
						if($file_size <= 1048576){
							
							if((strlen($txt_uname)>0) && (strlen($txt_email)>0) && (strlen($txt_fname)>0) && (strlen($txt_lname)>0) && (strlen($rd_gen)>0) && (strlen($dt_birth)>0) && (strlen($txt_pass)>0) && (strlen($txt_con_pass)>0)){
								
								$file_name_new = uniqid('',true). '.' .$file_ext;
								$file_destination = "C:/wamp64/www/forum/images/".$file_name_new;

								if(move_uploaded_file($file_tmp,$file_destination)){
									//echo $file_destination;

								$query = "INSERT INTO `registration` (`st_email_id`, `st_username`, `st_first_name`, `st_last_name`, `st_gender`, `dt_birthdate`, `im_profile_picture`, `st_category_name`, `in_rating_up`, `in_rating_down`, `password`, `is_confirmed`,`dt_join`,`st_type`) VALUES ('$txt_email','$txt_uname','$txt_fname','$txt_lname','$rd_gen','$dt_birth','$file_name_new','$cb_values',0,0,'$txt_pass',0,'".date("y-m-d")."','$txt_type')";
								//echo "hello".$query;
								mysqli_query($connection->mycon, $query);
								$connection->close();
								
								/*if(!$mail->send()) {
    								echo 'Message could not be sent.';
    								echo 'Mailer Error: ' . $mail->ErrorInfo;
								} else {
    								echo 'The confirmation Email has been sent, check your email to Activate your account';
								}*/
								
								header("Location: http://localhost/forum/login.php");
								
							}
							else{
								$_SESSION['errMsg'] = "Please fill out all the fields<br>";
								header("Location: http://localhost/forum/register.php");
							}
							
							}
						}else{
							$_SESSION['errMsg'] = "File Size Should be less than 1MB <br>";
							$connection->close();
							header("Location: http://localhost/forum/register.php");
						}
					}
				}else{
					$_SESSION['errMsg'] = "Wrong File extension <br>";
					$connection->close();
					header("Location: http://localhost/forum/register.php");
					
				}
		}	
	}
	
	

	

?>