<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
  		<script src="js/jquery-1.12.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
 		<script src="js/jquery_js.js"></script>
		<script src="js/tinymce/tinymce.min.js"></script>
  		<script>tinymce.init({ selector:'textarea' });</script>
	
        
        <style>
            .dialog{
                width:500px;
                height: 500px;
            }
        </style>
		<script>
			$(document).ready(function () {
        		$('.dropdown-toggle').dropdown();
    		});
		</script>
		
        
       
        
    </head>
    
    <body>
        <div class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" style="font-family:Harlow Solid Italic;color:blue;font-size:30px;" href="#">Forum</a>
            </div>
            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
               
                <li><a href="index.php" data-toggle="collapse" data-target=".navbar-collapse.in">Discussion</a></li>
                
                <li>
                    <form class="form-inline pull-xs-right" style="margin-top:10px" action="search.php" method="get">
                        <input class="form-control" type="text" style="width:500px;" name="txt_search" placeholder="Search">
                        <button class="btn btn-success-outline" name="search_btn" type="submit" data-toggle="collapse" data-target=".navbar-collapse.in">Search</button>
                    </form>      
                </li>
            
                    <li><a href="#QueModal" data-toggle="modal" >Ask Question ?</a></li>
				  <?php
				  
				  	if(isset($_SESSION['previlidge'])){
						if($_SESSION['previlidge'] == 'admin'){

					?>	
						<li><a href="http://localhost/forum/AdminLTE-2.3.0/index2.php"><button class="btn btn-danger">Admin</button></a></li>	
				<?php	
						}
				  	}
				  ?>
				   
                    <?php

						if(!empty($_SESSION['usr_id'])){

							?>
				  				<li style="margin-top:10px;">
									
									
				  				<div class="dropdown">
								  <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
								  <?php echo "Hi,".$_SESSION["uname"]; ?><span class="caret"></span></button>
								  <ul class="dropdown-menu">
									<li><a href="user_profile.php">My Profile</a></li>
									<li><a href="update_profile.php">Edit Profile</a></li>
									<li><a href="change_password.php">Change Password</a></li>  
									<li><a href="php/php-logout.php">Logout</a></li>
								  </ul>
								</div>
							
							</li>		
							
						<?php	
							}else{
							?>
							<li><a href="login.php" data-toggle="collapse" data-target=".navbar-collapse.in">Sign In</a></li>
                    		<li><a href="register.php" data-toggle="collapse" data-target=".navbar-collapse.in">Sign Up</a></li>
				  		<?php
						}

					?>
                    
                </ul>
            </div>
          </div>
        </div>
        
        <!-- Question popup form -->
        
        
					<div id="QueModal" class="modal fade" role="dialog">
						  <?php
								if(empty($_SESSION['usr_id'])){
									include "login-dialog.php";
								}else{
									include_once "question-dialog.php";
								}
							?>
		
		
		
            
        
        
    </body>

</html>