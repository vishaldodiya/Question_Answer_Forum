<html>
    <head>
        <title>Discussion</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
       	
		
	  
    
        
    </head>

    <body>
           
        <div class="container">
            <div style="height:100px;">
            <?php
				session_start();
                include "nav_bar.php";
				
				
            ?>
        </div>
            <div class="col-sm-12">
                <div class="col-sm-3">
                    <div class="well well-sm">
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
                            <input type="submit" class="btn btn-primary" name="cat_sbm">
                            
                        </form>
                    </div>
                </div>
				
				
				
				
				
				<?php
				
					include "php/php-que-ans.php";
					if(isset($_POST['cat_sbm'],$_POST['cb_category'])){
						$cb_category = array();
						$cb_category = $_POST["cb_category"];
						
						
						
						display_question($cb_category);
						//setcookie('category_cookie',json_encode($cb_category), time()+3600);
					}else{
						display_question();
					}
					
					
				
					
				?>
				  
                        
                    
                    
                </div>
               
            </div>
        </div>
    </body>
</html>    
    