<?php
	session_start();
	include_once "../php/connection.php";



	$connection = new connection();
	$connection->connect();

	$query = "SELECT `st_email_id`, `st_username`, `st_first_name`, `st_last_name`, `st_gender`, `dt_birthdate`, `im_profile_picture`, `st_category_name` FROM `registration` WHERE `in_id` = ".$_GET['usr_id'];
	
	$result = mysqli_query($connection->mycon,$query);
	
	while($arr = mysqli_fetch_array($result)){
		$txt_uname = $arr["st_username"];
		$txt_email = $arr["st_email_id"];
		$txt_fname = $arr["st_first_name"];
		$txt_lname = $arr["st_last_name"];
		$rd_gen = $arr["st_gender"];
		$dt_birth = $arr["dt_birthdate"];
		$pic_src = $arr["im_profile_picture"];
		$arr_category = $arr["st_category_name"];
		
		$arr_cat = array();
		$arr_cat = explode(", ",$arr_category);
		
		
	}
?>

<?php

	if(isset($_POST["sbm"])){
		require_once("../php/connection.php");

		$connection = new connection();
		$connection->connect();
 		
		
		
		$n_txt_uname = $_POST["txt_uname"];
		
			$n_txt_email = $_POST["txt_email"];
			$n_txt_fname = $_POST["txt_fname"];
			$n_txt_lname = $_POST["txt_lname"];
			$n_rd_gen = $_POST["rd_gen"];
			$n_dt_birth = $_POST["dt_birth"];
			
			$cb_category = array();

				$cb_values = array();
				$cb_values  = implode(", ", $cb_category);

			if(preg_match('/^[A-Za-z0-9]{6,}$/',$n_txt_uname)){
		
			}else{
				$_SESSION['errMsg'] = "Enter valid username";
				header("Location: http://localhost/forum/admin-update-profile.php");
			}

			if(preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/',$n_txt_pass)){

			}else{
				$_SESSION['errMsg'] = "Enter valid Password";
				header("Location: http://localhost/forum/admin-update-profile.php");
			}

			if(preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$/', $n_txt_email))
			{

			}
			else
			{ 
				$_SESSION['errMsg'] = 'Enter valid Email.'; 
				header("Location: http://localhost/forum/admin-update-profile.php");
			}

			if(preg_match('/^[A-Za-z]{1,30}$/',$n_txt_fname)){

			}else{
				$_SESSION['errMsg'] = "Enter valid firstname";
				header("Location: http://localhost/forum/admin-update-profile.php");
			}

			if(preg_match('/^[A-Za-z]{1,30}$/',$n_txt_lname)){

			}else{
				$_SESSION['errMsg'] = "Enter valid lastname";
				header("Location: http://localhost/forum/admin-update-profile.php");
			}

			if($n_rd_gen == 0){
				$_SESSION['errMsg'] = "Enter Gender";
				header("Location: http://localhost/forum/admin-update-profile.php");
			}

			if($n_dt_birth == 0){
				$_SESSION['errMsg'] = "please select date of birth";
				header("Location: http://localhost/forum/admin-update-profile.php");
			}

			
		
			if(isset($_FILES['img_profile']) && $_FILES['img_profile']['error'] != 4){
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
							
							unlink("C:/wamp64/www/forum/images/".$pic_src);
							
							if(move_uploaded_file($file_tmp,$file_destination)){
								//echo $file_destination;
						
							$query = "UPDATE `registration` SET `st_email_id`= '$n_txt_email',`st_username`= '$n_txt_uname',`st_first_name`= '$n_txt_fname',`st_last_name`= '$n_txt_lname',`st_gender`= '$n_rd_gen',`dt_birthdate`= '$n_dt_birth',`im_profile_picture`= '$file_name_new',`st_category_name`= '$cb_values' WHERE `in_id`=".$_GET["usr_id"];
								//echo "hello".$query;
								
								
								mysqli_query($connection->mycon, $query);
								$connection->close();
								//echo "Profile updated successfully";
								
								header("Location: http://localhost/forum/AdminLTE-2.3.0/admin-update-user.php?usr_id=".$_GET['usr_id']);
							
							}else{
								$_SESSION['errMsg'] = "Please fill out all the fields<br>";
								header("Location: http://localhost/forum/admin-update-profile.php");
							}
							
								
							}
						}else{
							$_SESSION['errMsg'] = "File Size Should be less than 1MB <br>";
							$connection->close();
							//echo "File Size Should be less than 1MB <br>";
							
							header("Location: http://localhost/forum/AdminLTE-2.3.0/admin-update-user.php?usr_id=".$_GET['usr_id']);
						}
					}
				}else{
					$_SESSION['errMsg'] = "Wrong File extension <br>";
					$connection->close();
					//echo "Wrong File extension <br>";
					header("Location: http://localhost/forum/AdminLTE-2.3.0/admin-update-user.php?usr_id=".$_GET['usr_id']);
					
				}
		}else{
			$query = "UPDATE `registration` SET `st_email_id`= '$n_txt_email',`st_username`= '$n_txt_uname',`st_first_name`= '$n_txt_fname',`st_last_name`= '$n_txt_lname',`st_gender`= '$n_rd_gen',`dt_birthdate`= '$n_dt_birth',`im_profile_picture`= '$pic_src',`st_category_name`= '$cb_values' WHERE `in_id`=".$_GET["usr_id"];
				//echo "hello".$query;
				
				//echo "Profile updated successfully";
			mysqli_query($connection->mycon, $query);
			$connection->close();	
			header("Location: http://localhost/forum/AdminLTE-2.3.0/admin-update-user.php?usr_id=".$_GET['usr_id']);
		}

	}
?>




<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="../js/jquery_js.js"></script>
        
        <style>
            .profile_div{
                width: 150px;
                height: 150px;
                border-radius: 50%;
                border: 1px solid black;
                
            }
			
			.set_image{
				height: 100%;
				width: 100%;
			}
        </style>
        
    </head>
    
    <body>
        <div class="container">
             
                <center>
                <div style="margin-top:2%;">
                    <div class="row">
                         <div style="margin-bottom:2%;">
                            <label><b><h1>Edit Profile</h1></b></label>
                        </div>
                    </div>
                    
                    <form role="form" enctype="multipart/form-data" method="post" enctype="multipart/form-data">
                        <div class="col-sm-12" style="text-align : left;">
                            <div class="row">
                            
                            <div class="form-group col-sm-6"> 
                                <label>Username</label>
								<input type="text" maxlength="30" class="form-control" pattern="[A-Za-z0-9]{6,}" name="txt_uname" id="id_uname" style="width:95%;" value="<?php echo $txt_uname; ?>" title="Enter username of minimum 6 character and max 30" placeholder="Enter Username" required>
                               
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Email</label>
                                <input type="email" maxlength="50" class="form-control" name="txt_email" style="width:95%;" value="<?php echo $txt_email; ?>" required>
                            </div>

                            <div class="form-group col-sm-6"> 
                                <label>FirstName</label>
                                <input type="text" maxlength="30" pattern="[A-Za-z]{1,30}" title="Maximum 30 character allowed" class="form-control" name="txt_fname" style="width:95%;" value="<?php echo $txt_fname; ?>" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>LastName</label>
                                <input type="text" maxlength="30" pattern="[A-Za-z]{1,30}" title="Maximum 30 character allowed" class="form-control" name="txt_lname" style="width:95%;" value="<?php echo $txt_lname; ?>" required>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Gender</label>
                                <div class="form-inline">
                                    <div class="radio">
                                        <label><input type="radio" name="rd_gen" value="m" <?php echo ($rd_gen=='m')?'checked':'' ?>>Male</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="rd_gen" value="f" <?php echo ($rd_gen=='f')?'checked':'' ?>>Female</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="rd_gen" value="o" <?php echo ($rd_gen=='o')?'checked':'' ?>>Other</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>BirthDate</label>
                                <input type="date" class="form-control" name="dt_birth" value="<?php echo $dt_birth; ?>" style="width:95%;" required>
                            </div>
                        </div>                        
                        
                       
                        <?php
							//display category checkbox
							
							include_once "../php/php-utility.php";
							
							$ob = new utility();
							$cat_array = array();
							
							$cat_array = $ob->display_category();
							
						?>
							
						<div class="well well-sm">
                            <b>Categories:</b>
                            <div class="checkbox">
								
						<?php
								
							foreach($cat_array as $value){
							
						?>
									<label><input type='checkbox' name='cb_category[]' value='<?php echo $value; ?>' <?php echo (in_array($value,$arr_cat)) ? 'checked' : ''; ?>><?php echo $value; ?></label>	
						<?php
								
							}
							
						?>
							
						</div>
                        
                    </div> 
                            
                      
                       <div class="col col-sm-12">
							<div class="profile_div">
                            <img id="avatar_preview" src="<?php echo "../images/".$pic_src; ?>" class="img-circle set_image" />     
                        </div>
                        <br>
                        <input type="file" id="avatar" name="img_profile" />
                       
						<div style="color:red">
							<?php 
								
								if(isset($_SESSION['errMsg'])){
									echo $_SESSION['errMsg'];
								}
						
								unset($_SESSION['errMsg']);
							?>
						</div>	
					</div> 
						
							
							
                        
                        
                    
                            
                       
                    <div class="row" style="text-align:center">
                        <button type="submit" class="btn btn-primary" name="sbm">Submit</button>
                         
                        <button type="reset" class="btn btn-primary">Reset</button>        
                    </div>    
                        
                        
                    </div>        
                    </form>
                  
                    
                </div>
                
            </center>
            
        </div>
    </body>
    
</html>



