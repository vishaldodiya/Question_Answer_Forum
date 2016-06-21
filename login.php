<?php 
	session_start();
	if(!empty($_SESSION['usr_id'])){
		if($_SESSION['previlidge'] == 'user'){
			header("Location: http://localhost/forum/user_profile.php");
		}
		else{
			header("location: http://localhost/forum/AdminLTE-2.3.0/index2.php");
		}
	}
?>
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
            <center>
             
                <div style="margin-top:5%;">
                    <div style="margin-bottom:2%;">
                        <lab><b><h1>Login</h1></b></lab>
                    </div>
                    
                    <form role="form" method="post" action="php/php-login.php"> 
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
                        <br>
                        <label for="or">Or</label>
                        <br>
						<div style="color:red">
							<?php 
								
								if(!empty($_SESSION['errMsg'])){
									echo $_SESSION['errMsg'];
								}
						
								unset($_SESSION['errMsg']);
							?>
						</div>	
                        <br>
                    </form>
                    <a href="register.php"><button class="btn btn-primary">Register</button></a>
                </div>

            
        </center>
    </div>
    </body>

</htmL>