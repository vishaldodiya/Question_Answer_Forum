<?php session_start(); ?>
<htmL>
    
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">

    </head>

    <body>
        <div style="height:20px;">
            <?php
                include "nav_bar.php";
            ?>
        </div>
        <div class="container">
            
             
                <div style="margin-top:5%;">
                     <div class="row">
                         <div style="margin-bottom:2%;">
                           <center><label><b><h1>Change password</h1></b></label></center> 
                        </div>
                    </div>
                    
                    <form role="form" method="post" action="php/php-change-password.php"> 
                     	<div class="col col-sm-12">
							<div class="row">
								<div class="form-group col-sm-6">
									
										<lable>Old Password</lable>
										<input type="password" name="txt_old_pass" style="width:95%;" placeholder="Enter old password" class="form-control" required>
									
								</div>
								<div class="form-group col-sm-6">
								</div>
							</div>
							<div class="row">        
                    
								<div class="form-group col-sm-6">
									<label>New Password</label>
									<input type="password" maxlength="30" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="txt_new_pass" id="pass" style="width:95%;" required>
								</div>

								<div class="form-group col-sm-6">
									<label>Confirm Password</label>
									<input type="password" maxlength="30" class="form-control" name="txt_new_con_pass" id="con_pass" style="width:95%;" required><span class="glyphicon glyphicon-ok" id="gly-ok"></span><span class="glyphicon glyphicon-remove" id="gly-not-ok"></span>
								</div>
							</div>
							
						</div>
						
						<div class="col col-sm-12" style="text-align:center">
								<button type="submit" class="btn btn-primary">Submit</button>

								<button type="reset" class="btn btn-primary">Reset</button>     
								
						</div>  
						<div style="color:red">
							<?php 
								
								if(!empty($_SESSION['errMsg'])){
									echo $_SESSION['errMsg'];
								}
						
								unset($_SESSION['errMsg']);
							
								
							?>
						</div>
						<div style="color:green">
							<?php
							if(!empty($_SESSION['success'])){
									echo $_SESSION['success'];
								}
								
								unset($_SESSION['success']);
							?>
						</div>
                    </form>
                    
                </div>

            
        
    </div>
    </body>

</htmL>