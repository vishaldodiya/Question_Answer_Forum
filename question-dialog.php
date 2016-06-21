					<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Question ?</h4>
							  </div>
							<form role="form" action="php/php-add-question.php" method="post">
								<div class="modal-body">
								
								<div class="form-group">
								  <label for="comment">Ask Question </label>
								  <textarea class="form-control" id ="txt_ar_que_id" name="txt_ar_que" maxlength="200" placeholder="Enter your Question ?" rows="5" id="comment"></textarea>
									<br>
									<?php
										//display category checkbox

										include_once "php/php-utility.php";

										$ob = new utility();
										$cat_array = array();

										$cat_array = $ob->display_category();

									?>

									<div class="well well-sm">
										<b>Categories:</b>
										<div class="checkbox">

									<?php

										foreach($cat_array as $value){

												echo "<label><input type='checkbox' name='cb_category[]' value='$value' >".$value."&nbsp</label>";	

										}

									?>

									</div>

								</div> 
									
								</div>
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  <button type="submit" class="btn btn-primary">Submit Question</button>
							  </div>	
							</form>	
							  
							</div>

						  </div>
						</div>