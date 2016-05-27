<html>
    <head>
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
        <div class="container">
            
            <div style="height:100px;">
            <?php
                include "nav_bar.html";
            ?>
            </div>
            
            <div class="col col-sm-12">
                <div class="col col-sm-3">
                    <div class="profile_div">
                        <img id="avatar_preview" src="" class="img-circle" />     
                    </div>
                    <br>
                    <lable> UserName :</lable>
                    <br>
                    <lable> Firstname Lastname</lable>
                    <br>
                    <label>Likes <span class="badge">200</span></label>
                    <label>Dislikes <span class="badge">20</span></label>
                    <br>
                    <br>
                    <div class="well well-sm">
                            <b>See Categories:</b>
                        <form role="form" action="#">
                            <div class="checkbox">
                                <label><input type="checkbox" name="cb_category" value="Maths">Maths <span class="badge">40</span></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="cb_category" value="History">History <span class="badge">37</span></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="cb_category" value="Technology">Technology <span class="badge">25</span></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="cb_category" value="Science">Science <span class="badge">20</span></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="cb_category" value="Politics">Politics <span class="badge">15</span></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="cb_category" value="Animals">Animals <span class="badge">5</span></label>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Submit">
                            
                        </form>
                    </div>
                </div>

                <div class="col col-sm-9">
                    <lable><h2>Questions according to interest</h2></lable>
                    <div class="jumbotron">
                        
                            <lable><b>Question jabcajsb jabjasb ajbsab hasfbasj asjb?</b> </lable>
                            <lable>By Asker On Date at Time</lable>
                            <div class="row">
                                <div style="float:right;">
                                    <button data-toggle="collapse" class="btn btn-primary" data-target="#demo" >Answer</button>
                                    <a href="more_answer.php"><button id="more_answer" class="btn btn-default">More Answer</button></a>
                                    <button id="giv-ans" class="btn">Give Answer</button>
                                    <button id="report" class="btn btn-danger">Report +</button> 
                                </div>
                                
                            </div>
                            <div id="demo" class="collapse">
                                 <div class="row">
                                <div class="col col-sm-2">
                                    <button type="button" class="btn btn-primary" id="btn_like">Like <span class="badge" id="c_up">20</span></button>
                                    <button type="button" class="btn btn-danger" id="btn_dislike">Dislike <span class="badge" id="c_down">7</span></button>
                                </div>
                                <div class="col col-sm-10">
                                    <lable>By Answerer On Date at Time</lable><br>
                                    <lable> <h4>answer kjfkajs kbka kajsbfka kasbf kasbf kjdcbd jdbv dsvbdsbv nsd vsdb mndsvbisd d vibdsiu vds vsdbvuibsdiuv sdvusidbv sdvbudsiv sdiubvids vsduivsd </h4></lable>
                                    <div class="row">
                                        <div style="float:right;">
                                            
                                            <button id="btn_comment" class="btn">Comment</button>
                                            <button id="report" class="btn btn-danger">Report +</button> 
                                        </div>
                                    </div>
                                    <lable><h4>Comments</h4></lable><br>
                                    <div style="border-top:1px solid black">
                                        
                                        <label>By Commentator on Date at Time</label>
                                        <div style="float:right">
                                            <button id="report" class="btn btn-danger">Report +</button>
                                        </div>
                                        <lable><h4>Comment textn jdkfbjkes sjkef seke fke euibf ek</h4></lable>
                                        
                                    </div>
                                </div>
                            </div>
                            </div>
                            
                        
                    </div>
                    
                    <!--Answer dialog -->
                    
                    <div class="dialog">
                        <div id="answer_dialog" title="Answer">
                        <form role="form" action="#">
                            <div class="form-group">
                                <lable><h3>Question jaksjdak  kasnkdas kajnfk?</h3></lable>
                                <textarea name="txt_ar_ans" placeholder="Enter your Answer ?" rows="10" cols="60">
                                </textarea>
                            </div>

                           

                            <div class="row" style="text-align:center">
                                <button type="submit" class="btn btn-primary">Submit</button>

                                <button type="reset" class="btn btn-primary">Reset</button>        
                            </div>   
                        </form>
                        </div>
                    </div>
                    
                    <!-- Comment Dialog -->
                    <div class="dialog">
                        <div id="comment_dialog" title="Comment">
                        <form role="form" action="#">
                            <div class="form-group">
                                <lable>Comment</lable>
                                <input type="text" name="txt_comment" class="form-control" placeholder="Enter comment" /> 
                            </div>

                           

                            <div class="row" style="text-align:center">
                                <button type="submit" class="btn btn-primary">Submit</button>

                                <button type="reset" class="btn btn-primary">Reset</button>        
                            </div>   
                        </form>
                        </div>
                    </div>

                    
            </div>
        </div>
        
    </body>
    
</html>