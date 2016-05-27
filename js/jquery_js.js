$(document).ready(function(){
                
   //question asking dialog-------------             
    $(function() {
        $("#dialog").dialog({
            width: 500,
            height: 550,
            autoOpen: false
        });
                
        $("#ask").on("click",function(){
            $( "#dialog" ).dialog("open");
        });
    });
          
    
    //answer dialog---------------------------
    
    $(function() {
        $("#answer_dialog").dialog({
            width: 500,
            height:500,
            autoOpen: false
        });
                
        $("#giv-ans").on("click",function(){
            $( "#answer_dialog" ).dialog("open");
        });
    });
    
    //comment dialog-------------------------
    $(function() {
        $("#comment_dialog").dialog({
            width: 500,
            height:250,
            autoOpen: false
        });
                
        $("#btn_comment").on("click",function(){
            $( "#comment_dialog" ).dialog("open");
        });
    });
     
    //profile picture preview
    $(function(){
        $("#avatar").change(function(){
            var reader = new FileReader();
            reader.onload = function(e){
                $("#avatar_preview").attr("style","height:100%;width:100%");
                $("#avatar_preview").attr('src',e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    }); 
                
    $(function(){
        $("#btn_like").click(function(){
              
            var c_like = parseInt($("#c_up").text());
            c_like = c_like + 1;
            $("#c_up").html(c_like);
        });    
    });
    
    $(function(){
        $("#btn_dislike").click(function(){
            var c_like = parseInt($("#c_down").text());
            c_like = c_like + 1;
            $("#c_down").html(c_like);
        });    
    });
    
               
    
});