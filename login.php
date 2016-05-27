<htmL>
    
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery-1.12.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <div style="height:20px;">
            <?php
                include "nav_bar.html";
            ?>
        </div>
        <div class="container">
            <center>
             
                <div style="margin-top:5%;">
                    <div style="margin-bottom:2%;">
                        <lab><b><h1>Login</h1></b></lab>
                    </div>
                    
                    <form role="form">
                        <div class="form-group">
                            <label for="user">Username</label>
                            <input type="text" class="form-control" id="txt_uname" placeholder="Enter Your Username" style="width:50%;" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password</label>
                            <input type="password" class="form-control" id="txt_pass" placeholder="Enter Your Username" style="width:50%;" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <br>
                        <br>
                        <label for="or">Or</label>
                        <br>
                        <br>
                    </form>
                    <a href="register.php"><button class="btn btn-primary">Register</button></a>
                </div>

            
        </center>
    </div>
    </body>

</htmL>