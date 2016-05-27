<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery-1.12.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="css/jquery-ui.min.css">
        <script src="js/jquery_js.js"></script>
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
                    <a href="index.php"><button class="btn btn-warning" id="btn_back">Back</button></a>
                </div>
                <div class="col col-sm-9">
                    <div class="jumbotron">
                        <div>
                            <lable><b>Question jabcajsb jabjasb ajbsab hasfbasj asjb?</b> </lable>
                            <lable>By Asker On Date at Time</lable>
                            <lable style="text-align:center"><h4>Answer</h4></lable>
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