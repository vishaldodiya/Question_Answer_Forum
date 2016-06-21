<?php
	session_start();
?>

<html>
    <head>
        <title>Register</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="../js/jquery_js.js"></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>
        
        <style>
            .profile_div{
				
                width: 150px;
                height: 150px;
                border-radius: 50%;
                border: 1px solid black;
                
            }
        </style>
		<script>
			function validateMyForm(){
				var found = document.querySelectorAll(".text-danger");
				if(found.length == 1){
					alert("Enter valid Username");
					return false;
				}else{
					var found2 = document.querySelectorAll("#false");
					
					if(found2.length == 1){
						alert("Enter valid email");
						return false;
					}else{
							var v = grecaptcha.getResponse();
						if(v.length == 0)
						{
							document.getElementById('captcha').innerHTML="You can't leave Captcha Code empty";
							return false;
						}
						if(v.length != 0)
						{
							document.getElementById('captcha').innerHTML="Captcha completed";
							return true; 
						}

					}
					
					
				}
				
			};
			
		</script>
        
    </head>
    
    <body>
      
    
        <div class="container">
        
            <center>
                <div style="margin-top:5%;">
                    <div class="row">
                         <div style="margin-bottom:2%;">
                            <label><b><h1>Registration</h1></b></label>
                        </div>
                    </div>
                    
                    <form onsubmit="return validateMyForm()" role="form" method="post" enctype="multipart/form-data" action="../php/php-register.php">
                        <div class="col-sm-12" style="text-align : left;">
                            <div class="row">
                            
                            <div class="form-group col-sm-6"> 
                                <label>Username <span id="check_avail"></span> </label>
                                <input type="text" maxlength="30" class="form-control" pattern="[A-Za-z0-9]{6,}" name="txt_uname" id="id_uname" style="width:95%;" title="Enter username of minimum 6 character and max 30" placeholder="Enter Username" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Email <span id="check_email_avail"></span></label>
                                <input type="email" maxlength="50" class="form-control" name="txt_email" id="id_email" style="width:95%;" placeholder="Enter Email Id" required>
                            </div>

                            <div class="form-group col-sm-6"> 
                                <label>FirstName</label>
                                <input type="text" maxlength="30" class="form-control" pattern="[A-Za-z]{1,30}" name="txt_fname" style="width:95%;" title="Maximum 30 character allowed" placeholder="Enter Firstname" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>LastName</label>
                                <input type="text" maxlength="30" class="form-control" pattern="[A-Za-z]{1,30}" name="txt_lname" style="width:95%;" title="Maximum 30 character allowed" placeholder="Enter Lastname" required>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Gender</label>
                                <div class="form-inline">
                                    <div class="radio">
                                        <label><input type="radio" name="rd_gen" value="m" selected>Male</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="rd_gen" value="f">Female</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="rd_gen" value="o">Other</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>BirthDate</label>
                                <input type="date" class="form-control" name="dt_birth" style="width:95%;" required>
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
								echo "<label><input type='checkbox' name='cb_category[]' value='$value' >".$value." </label>";
							}
							
						?>
							
						</div>
                        
                    </div>    
                       
					
						<div class="form-group">
							<div class="well well-sm">
								<lable>Previlidge</lable>
								<div class="form-inline">
									<div class = "radio">
										<input type = "radio" name="txt_type" value="user">User&nbsp;
									</div>
									<div class = "radio">
										<input type = "radio" name="txt_type" value="admin">Admin&nbsp;
									</div>
								</div>
							</div>
							
						</div>	
							
						
						
                  

                    <div class="row">        
                    
                        <div class="form-group col-sm-6">
                            <label>Password</label>
                            <input type="password" maxlength="30" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="txt_pass" id="pass" style="width:95%;" required>
                        </div>
                        
                        <div class="form-group col-sm-6">
                            <label>Confirm Password</label>
                            <input type="password" maxlength="30" class="form-control" name="txt_con_pass" id="con_pass" style="width:95%;" required><span class="glyphicon glyphicon-ok" id="gly-ok"></span><span class="glyphicon glyphicon-remove" id="gly-not-ok"></span>
                        </div>
                    </div>
                            
                           
                      <div class="col col-sm-6">
							<div class="profile_div">
                            <img id="avatar_preview" src="" class="img-circle" />     
                        </div>
                        <br>
                        <input type="file" id="avatar" name="img_profile" />
                       
						<div style="color:red">
							<?php 
								
								if(!empty($_SESSION['errMsg'])){
									echo $_SESSION['errMsg'];
								}
						
								unset($_SESSION['errMsg']);
							?>
						</div>	
					</div> 
						
						<div class="col col-sm-6">
							<div class="g-recaptcha" data-sitekey="6Le7VyETAAAAAEXvjZuOl0AhS_kJc6ceGfFbBt1Z"></div>
							<span id="captcha"></span>
						</div>
                        
                    	
                       
                    <div class="col col-sm-12" style="text-align:center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                         
                        <button type="reset" class="btn btn-primary">Reset</button>     
						<a href="php-mail.php">send mail</a>
                    </div>    
                       
							
							
                        
                    </div>        
                    </form>
                  
                    
                </div>
                
            </center>
                
        </div>
    
    </body>

</html>