<?php 
	session_start();
	if(empty($_SESSION['usr_id'])){
		header("Location: http://localhost/forum/login.php");
	}
?>


<?php 
	
	include "php/connection.php";

	$connection = new connection();
	$connection->connect();

	$query = "select * from `registration` where `in_id` = ".$_SESSION["usr_id"];

	$result = mysqli_query($connection->mycon,$query);

	while($arr = mysqli_fetch_array($result)){
		$txt_fname = $arr["st_first_name"];
		$txt_lname = $arr["st_last_name"];
		$like = $arr["in_rating_up"];
		$dislike = $arr["in_rating_down"];
		$img_name = $arr["im_profile_picture"];
	}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
		
		

        
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
            
            <div style="height:100px;">
            <?php
                include "nav_bar.php";
            ?>
            </div>
            
            <div class="col col-sm-12">
				<!-- profile division -->	
                <div class="col col-sm-3">
                    <div class="profile_div">
                        <img id="avatar_preview" src="images/<?php echo $img_name; ?>" class="img-circle set_image" />     
                    </div>
                    <br>
                    <lable> UserName : <?php echo $_SESSION["uname"]; ?></lable>
                    <br>
                    <lable> <?php echo $txt_fname." ".$txt_lname; ?> </lable>
                    <br>
                    <label><span style="font-size:25px;" class="glyphicon glyphicon-thumbs-up"></span> <span class="badge"><?php echo $like; ?></span></label>&nbsp;&nbsp;
                    <label><span style="font-size:25px;" class="glyphicon glyphicon-thumbs-down"></span> <span class="badge"><?php echo $dislike; ?></span></label>
                    <br>
                    <br>
                    <div class="well well-sm" >
                            <b>See Categories:</b>
                        <form role="form" action="" method="post">
						<?php
							include_once "php/php-utility.php";
							
							$ob_cat = new utility();
							$arr_category = $ob_cat->category_with_usage();
							$allowed = array();
							if(!empty($_POST['cb_category'])){
								
								$allowed = $_POST['cb_category'];
								//print_r($allowed);
								//echo (in_array('Maths',$allowed)) ? 'hello' : 'bye';
								
							
							}
							while($arr = mysqli_fetch_array($arr_category)){
								
							?>	
								<div class='checkbox'>
								<label><input type='checkbox' name='cb_category[]' 
											  value=<?php echo $arr['st_category_name']; ?> <?php echo (in_array($arr['st_category_name'],$allowed)) ? 'checked' : ''; ?>>
									<?php echo $arr['st_category_name']; ?>&nbsp;<span class='badge'><?php echo $arr['in_category_count']; ?></span></label>
								</div>
						<?php	
							}
							
						?>
                            <input type="submit" class="btn btn-primary" name="cat_sbm" value="Submit">
                            
                        </form>
                    </div>
                </div>
				
				<!-- profile div over -->

				<!-- discussion division -->
               
				<?php
					include "php/php-que-ans.php";
					$temp = array();
					$temp = get_user_interest();
				
					if(isset($_POST['cat_sbm'],$_POST['cb_category'])){
						//echo "here";
						$cb_category = array();
						$cb_category = $_POST["cb_category"];
					
						display_question($cb_category,null);
					}else{
						display_question($temp,null);
					}
					
					//print_r($temp);
					
					
				?>
        </div>
			
			        
        
    </body>
    
</html>