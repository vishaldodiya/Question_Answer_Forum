<?php

	
	
		$que_id = $_GET["que_id"];
		?>

<html>

    <head>
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
            <div class="col col-sm-12">
                <div class="col col-sm-3">
                    <a href="index.php"><button class="btn btn-warning" id="btn_back">Back</button></a>
                </div>
                <div class="col col-sm-9">
					<?php
						include_once "php/php-utility.php";
					
						$ob = new utility();
					
						$result = $ob->question($que_id);
					
						while($arr = mysqli_fetch_array($result)){
					?>
					<!-- Displaying Question -->
							<div class="jumbotron">
							<div>
								<div style="white-space:pre-wrap;"><lable><h2><b><?php echo $arr['st_question']; ?></b></h2></lable></div>
							<?php 
								$now = time(); // or your date as well
								$your_date = strtotime($arr['dt_question']);
								$datediff = $now - $your_date;
								//echo floor($datediff/(60*60*24));
							?>
							<lable><b>By <?php echo $arr['st_username']; ?></b> <?php if(floor($datediff/(60*60*24)) == 0) echo floor($datediff/(60*60))."hour ago"; else echo floor($datediff/(60*60*24))."day ago" ?> </lable>	
                            
                            <div class="row" style="padding-bottom:10px;">
                                <div style="float:right;">
                                    
                                    
                                    
									<button type="button" data-todo="<?php echo $arr['st_question']; ?>" data-id="<?php echo $arr['in_question_id']; ?>" class="btn btn-info givans" data-toggle="modal" data-target="#AnsModal" id="ans<?php echo $arr['in_question_id']; ?>" >Give Answer</button>
                                    <button id="rep_<?php echo $arr['in_question_id']; ?>" data-toggle="modal" data-id="<?php echo $arr['in_question_id']; ?>" 
										data-type="q" data-target="#RepModal" class="btn btn-danger givrep">Report +</button> 
                                </div>
                                
                            </div>
					<!-- Displaying Answer -->				
                            <div id="<?php echo $arr['in_question_id']; ?>" class="collapse in">
                                 
									<?php
									//fetching answer according to question
										include_once "php/php-utility.php";

										$ob_ans = new utility();
										$arr_answer = $ob_ans->more_answer($arr['in_question_id']);
									
										while($arr_ans = mysqli_fetch_array($arr_answer)){
										//print_r($arr_ans);
									?>
										<div class="row" style="border-top:5px double grey;padding-top:10px;">
                               				<div class="col col-sm-2">
									 		 
												
												<button type="button" data-id = "<?php echo $arr_ans['in_reply_id']; ?>" class="btn btn-primary btn_like" id="like_<?php echo $arr_ans['in_reply_id']; ?>"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;<span class="badge" id="span_like<?php echo $arr_ans['in_reply_id']; ?>" ><?php echo $arr_ans['in_like']; ?></span></button>
												<button type="button" data-id = "<?php echo $arr_ans['in_reply_id']; ?>" class="btn btn-danger btn_dislike" id="dislike_<?php echo $arr_ans['in_reply_id']; ?>"><span class="glyphicon glyphicon-thumbs-down"></span>&nbsp;<span class="badge" id="span_dislike<?php echo $arr_ans['in_reply_id']; ?>"><?php echo $arr_ans['in_dislike']; ?></span></button>
											</div>
											<div class="col col-sm-10">
												<?php 
													$now = time(); // or your date as well
													$your_date = strtotime($arr_ans['dt_reply']);
													$datediff = $now - $your_date;
													//echo floor($datediff/(60*60*24));
												?>
											<lable><b>By <?php echo $arr_ans['st_username']; ?></b> <?php if(floor($datediff/(60*60*24)) == 0) echo floor($datediff/(60*60))."hour ago"; else echo floor($datediff/(60*60*24))."day ago" ?> </lable><br>
												
                                    		<div style="white-space:pre-wrap;"> <h4><?php echo $arr_ans['st_reply']; ?></h4></div>
												
											<div class="row">
                                        		<div style="float:right;">
                                            
                                            		<button id="btn_comment" data-id="<?php echo $arr_ans['in_reply_id']; ?>" data-target="#ComModal"  data-toggle="modal" class="btn givcom"><span class="glyphicon glyphicon-comment"></span></button>
                                            		<button id="rep_<?php echo $arr['in_question_id']; ?>" data-toggle="modal" data-id="<?php echo $arr_ans['in_reply_id']; ?>" 
										data-type="a" data-target="#RepModal" class="btn btn-danger givrep">Report +</button>
                                        		</div>
                                    		</div>
									<!-- Displaying Comment -->	
										<lable><h4>Comments</h4></lable>
										<?php
											include_once "php/php-utility.php";
											
											$ob_com = new utility();
											$arr_comment = $ob_com->display_comment($arr_ans['in_reply_id'],$arr['in_question_id']);
											
											while($arr_com = mysqli_fetch_array($arr_comment)){
										?>
											<div style="border-top:1px solid black;padding-top:10px;">

												<?php 
													$now = time(); // or your date as well
													$your_date = strtotime($arr_com['dt_reply']);
													$datediff = $now - $your_date;
													//echo floor($datediff/(60*60*24));
												?>
												<lable><b>By <?php echo $arr_com['st_username']; ?></b> <?php if(floor($datediff/(60*60*24)) == 0) echo floor($datediff/(60*60))."hour ago"; else echo floor($datediff/(60*60*24))."day ago" ?> </lable>
												
												<div style="float:right">
													<button id="rep_<?php echo $arr_com['in_reply_id']; ?>" data-toggle="modal" data-id="<?php echo $arr['in_question_id']; ?>" 
										data-type="c" data-target="#RepModal" class="btn btn-danger givrep">Report +</button> 
												</div>
												<lable><h4><?php echo $arr_com['st_reply']; ?></h4></lable>

											</div>	
												
										<?php		
												
											}
										?>
											
									</div>
								</div>				
									<?php
										}
									?>
									
                                
                            
                            </div>
                            
                        </div>
                    </div>
					<?php
						}	
					
					?>
				</div>	
				<!--Answer dialog -->
					
					<!-- Modal -->
						<div id="AnsModal" class="modal fade" role="dialog">
							<?php
								if(empty($_SESSION['usr_id'])){
									include "login-dialog.php";
								}else{
									include_once "answer-dialog.php";
								}
							?>
						</div> 
						
					
                
                    
                    <!-- Comment Dialog -->
					
					<div id="ComModal" class="modal fade" role="dialog">
						  <?php
								if(empty($_SESSION['usr_id'])){
									include "login-dialog.php";
								}else{
									include_once "comment-dialog.php";
								}
							?>
					
                    
            		</div>
				
					<!-- Report Dialog -->
					
					<div id="RepModal" class="modal fade" role="dialog">
						  <?php
								if(empty($_SESSION['usr_id'])){
									include "login-dialog.php";
								}else{
									include_once "report-dialog.php";
								}
							?>
					
                    
            		</div>
                 
                    
            
            </div>
            
       
        
    </body>
</html>



<?php
		
	
?>
