<div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title">Login</h4>
	 </div>
	<form role="form" method="post" action="php/php-login.php">
		<div class="modal-body">
			<center>
				<div class="form-group">
                   <label for="user">Username</label>
                   <input type="text" maxlength="30" class="form-control" pattern="[A-Za-z0-9]{6,}" name="txt_uname" placeholder="Enter Your Username" style="width:50%;" required>
               </div>
               <div class="form-group">
                   <label for="pwd">Password</label>
                   <input type="password" maxlength="30" class="form-control" name="txt_pass" placeholder="Enter Your password" style="width:50%;" required>
               </div>
				
				<button type="submit" class="btn btn-primary">Submit</button>
                      	<br>
                        <label for="or">Or</label>
                        <br>
							
                        <br>
						
    
                    <a href="register.php"><button class="btn btn-primary">Register</button></a>
		</form>		
				
			</center>
	  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			 
		  </div>	
	</form>	
							  
	</div>

</div>
</div>	







