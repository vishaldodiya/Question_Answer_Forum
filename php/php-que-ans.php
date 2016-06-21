<?php
	
	include_once "connection.php";
	
	
	function get_user_interest(){
		$connection = new connection();
		$connection->connect();
		
		if(isset($_SESSION['usr_id'])){
			$query = "select `st_category_name` from `registration` where `in_id` = ". $_SESSION['usr_id'];
			$result = mysqli_query($connection->mycon,$query);
			
			while($arr = mysqli_fetch_array($result)){
				$temp = $arr['st_category_name'];
			}
			
			$arr_category = array();
			$arr_category = explode(", ",$temp);
			
			return $arr_category;
			
			
		}
		
	}
	
	function display_question($arr_category_user = array(),$like = null){
		
?>
					
				<div class="col col-sm-9">
                   
							<?php
						//fetching questions
								include_once "php/php-utility.php";

								$ob_que = new utility();
								$arr_question = $ob_que->display_question($like);
								
								while($arr = mysqli_fetch_array($arr_question)){
									
									$temp = $arr['st_category_name'];
									
									$arr_category_que = array();
									$arr_category_que = explode(", ",$temp);
									
									if(empty($arr_category_user)){
										//echo "entered";
										question_content($arr);
									}
									else{
										//echo "not_eneterd";
										foreach($arr_category_user as $value){
											if(in_array($value, $arr_category_que)){
												question_content($arr);
												break;
											}
										}
									}
									
									
									
								?>
								
					
					
							<?php
								}
								
								
							
							?>
							 
							
                    
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
                 
<?php
	}

	function question_content($arr){
		
	?>
					<div class="jumbotron">
							<div>
                            <lable><h4><b><?php echo $arr['st_question']; ?></b></h4></lable>
                            <?php 
								$now = time(); // or your date as well
								$your_date = strtotime($arr['dt_question']);
								$datediff = $now - $your_date;
								//echo floor($datediff/(60*60*24));
							?>
							<lable><b>By <?php echo $arr['st_username']; ?></b> <?php if(floor($datediff/(60*60*24)) == 0) echo floor($datediff/(60*60))."hour ago"; else echo floor($datediff/(60*60*24))."day ago" ?> </lable>
                            <div class="row" style="padding-bottom:10px;">
                                <div style="float:right;">
									
                                    <button data-toggle="collapse" class="btn btn-primary" data-target="#<?php echo $arr['in_question_id']; ?>" >Answer</button>
                                    <a target="_blank" href="more_answer.php?que_id=<?php echo $arr['in_question_id']; ?>"><button name="more_answer"  class="btn btn-default">More Answer</button></a>
                                    
									<button type="button" data-todo="<?php echo $arr['st_question']; ?>" data-id="<?php echo $arr['in_question_id']; ?>" class="btn btn-info givans" data-toggle="modal" data-target="#AnsModal" id="ans<?php echo $arr['in_question_id']; ?>" >Give Answer</button>
                                    <button id="rep_<?php echo $arr['in_question_id']; ?>" data-toggle="modal" data-id="<?php echo $arr['in_question_id']; ?>" 
										data-type="q" data-target="#RepModal" class="btn btn-danger givrep">Report +</button> 
                                </div>
                                
                            </div>
					<!-- Displaying Answer -->				
                            <div id="<?php echo $arr['in_question_id']; ?>" class="collapse">
                                 <div class="row" style="border-top:1px solid black;padding-top:10px;">
                               		<div class="col col-sm-2">
									<?php
									//fetching answer according to question
										include_once "php/php-utility.php";

										$ob_ans = new utility();
										$arr_answer = $ob_ans->display_liked_answer($arr['in_question_id']);
									
										if($arr_ans = mysqli_fetch_array($arr_answer)){
									?>
									 		 
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
											
											
									<?php
										}else{
									?>
									 	</div>
									 	<div class="col col-sm-10">
											<lable> <h4>No Answer</h4></lable>
									<?php			
										}
									?>
									
                                </div>
                            </div>
                            </div>
                            
                        </div>
                    </div>
<?php
	}



?>