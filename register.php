<html>
    <head>
        <title>Register</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery-1.12.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery_js.js"></script>
        
        <style>
            .profile_div{
                width: 150px;
                height: 150px;
                border-radius: 50%;
                border: 1px solid black;
                
            }
        </style>
        
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
                    <div class="row">
                         <div style="margin-bottom:2%;">
                            <label><b><h1>Registration</h1></b></label>
                        </div>
                    </div>
                    
                    <form role="form" enctype="multipart/form-data">
                        <div class="col-sm-12" style="text-align : left;">
                            <div class="row">
                            
                            <div class="form-group col-sm-6"> 
                                <label>Username</label>
                                <input type="text" class="form-control" id="txt_uname" style="width:95%;" placeholder="Enter Username" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Email</label>
                                <input type="email" class="form-control" id="txt_pass" style="width:95%;" placeholder="Enter Email Id" required>
                            </div>

                            <div class="form-group col-sm-6"> 
                                <label>FirstName</label>
                                <input type="text" class="form-control" id="txt_fname" style="width:95%;" placeholder="Enter Firstname" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>LastName</label>
                                <input type="text" class="form-control" id="txt_lname" style="width:95%;" placeholder="Enter Lastname" required>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Gender</label>
                                <div class="form-inline">
                                    <div class="radio">
                                        <label><input type="radio" name="rd_gen" value="m">Male</label>
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
                        
                       
                        <div class="well well-sm">
                            <b>Categories:</b>
                            <div class="checkbox">
                                <label><input type="checkbox" name="cb_category" value="Maths">Maths</label>
                            
                                <label><input type="checkbox" name="cb_category" value="History">History</label>
                            
                                <label><input type="checkbox" name="cb_category" value="Technology">Technology</label>
                            
                                <label><input type="checkbox" name="cb_category" value="Science">Science</label>
                            
                                <label><input type="checkbox" name="cb_category" value="Politics">Politics</label>
                            
                                <label><input type="checkbox" name="cb_category" value="Animals">Animals</label>
                            </div>
                        
                    </div>    
                            
                      <!--  
                        <div class="form-group" style="text-align:left;">
                            <label>Interested Topic</label>
                            <select multiple class="form-control" name="sel_topic" style="width:98%;">
                                <option><input type="checkbox" value="music" />Music</option>
                                <option></option>
                                <option></option>
                                <option></option>
                            </select>
                        </div>
                        -->

                    <div class="row">        
                    
                        <div class="form-group col-sm-6">
                            <label>Password</label>
                            <input type="password" class="form-control" name="txt_pass" style="width:95%;" required>
                        </div>
                        
                        <div class="form-group col-sm-6">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="txt_con_pass" style="width:95%;" required>
                        </div>
                    </div>
                            
                           
                       
                        <div class="profile_div">
                            <img id="avatar_preview" src="" class="img-circle" />     
                        </div>
                        <br>
                        <input type="file" id="avatar" />
                        
                    
                            
                       
                    <div class="row" style="text-align:center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                         
                        <button type="reset" class="btn btn-primary">Reset</button>        
                    </div>    
                        
                        
                    </div>        
                    </form>
                  
                    
                </div>
                
            </center>
                
        </div>
    
    </body>

</html>