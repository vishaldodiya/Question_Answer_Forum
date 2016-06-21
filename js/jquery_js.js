
$(document).ready(function(){
            
    
    //answer dialog---------------------------
	var que_id;
	$(function(){
		$(".givans").click(function(){
			
			
			var st_que = $(this).data('todo');
			que_id = $(this).data('id');
			$('#ans_dialog_que').html(st_que);
			
		});
		
		
		
		$("#ans_btn").click(function(){
			console.log("enetred");
			var txt_ar_ans = tinymce.get('txt_ar_ans_id').getContent();
			//var txt_ar_ans = $("#txt_ar_ans").val();
			console.log("=------"+txt_ar_ans);
			$.ajax({
				url:"php/php-add-answer.php",
				method:"POST",
				data:{in_que_id:que_id,txt_ar_ans:txt_ar_ans},
				success:function(html){
					alert(html);
					location.reload(true);
				}
				
			});
		});
	
		
	});
	
	
	
	//Comment Dialog
	
	$(function(){
		var ans_id;
		$(".givcom").click(function(){
			
			ans_id = $(this).data('id');
			//console.log("clicked "+ans_id);
			//$('.modal-body #input_id_ans').val(ans_id);
			
		});
		
		$("#com_btn_dialog").click(function(){
		
			var txt_ar_com = $("#txt_ar_com_id").val();
			console.log(ans_id+"-----"+txt_ar_com);
			$.ajax({
				url:"php/php-add-comment.php",
				method:"POST",
				data:{in_ans_id:ans_id,txt_ar_com:txt_ar_com},
				success:function(html){
					alert(html);
					location.reload(true);
				},
				error:function(){
					alert("something wrong happen!!!");
				}
				
			});
		});
		
	});
	
	//Disable admin report
	
	
	
	
	
	//Report Dialog
	
	$(function(){
		var rep_id;
		var rep_type;
		$(".givrep").click(function(){
			
			rep_id = $(this).data('id');
			rep_type = $(this).data('type');
			
			//console.log(rep_id+"--"+rep_type)
			
			
		});
		
		$("#rep_btn").click(function(){
			$.ajax({
				url:"php/php-add-report.php",
				method:"POST",
				data:{rep_id:rep_id,rep_type:rep_type},
				success:function(html){
					alert(html);
				},
				error:function(){
					alert("Something wrong happen!!");
				}
			});	
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
    
	//validation confirm password
	$("#gly-ok").hide();
    $("#gly-not-ok").hide();
    $(function(){
        
        $("#con_pass").focusin(function(){
            $("#gly-ok").hide();
            $("#gly-not-ok").hide();
        });
        
       $("#con_pass").focusout(function(){
            var txt_pass = $("#pass").val();
           var txt_con_pass = $("#con_pass").val();
           //console.log(txt_pass+"  "+txt_con_pass);
			
		  
          if(txt_pass == txt_con_pass){
              $("#gly-ok").show();
          }
           else
           {
              $("#gly-not-ok").show();
          } 
       });
    });
    
    //ajax call of check availabity of username
	$(function(){
		$("#id_uname").blur(function(){
		var username = $(this).val();
			
		$.ajax({
			url:"php/php-check-uname.php",
			method:"POST",
			data:{user_name:username},
			dataType:"text",
			success:function(html){
				$("#check_avail").html(html);
			}
		});
	});
		
	});
	
	//ajax call of like button 
	
	
		$(".btn_like").on('click',function(e){
			e.preventDefault();
			var ansid = $(this).data('id');
			//console.log(ansid);
			$.ajax({
				url:"php/php-add-like.php",
				method:"POST",
				data:{ans_id:ansid},
				success:function(html){
					if(html == 'success'){
						//alert("success");
						get_like(ansid);
						get_dislike(ansid);
						//call get like function
					}else{
						alert(html);
					}
				},
				error:function(){
					alert("error");
				}
			});
		});
	
	
	
	function get_like(ansid){
		$.ajax({
			url:"php/php-get-like.php",
			method:"POST",
			data:{ans_id:ansid},
			success:function(data){
				//console.log(data);
				$("#span_like"+ansid).html(data);
			},
			error:function(){
				alert("error");
			}
		});
	};

	//ajax call dislike button
	
	$(".btn_dislike").on('click',function(e){
			e.preventDefault();
			var ansid = $(this).data('id');
			//console.log(ansid);
			$.ajax({
				url:"php/php-add-dislike.php",
				method:"POST",
				data:{ans_id:ansid},
				success:function(html){
					if(html == 'success'){
						//alert("success");
						get_dislike(ansid);
						get_like(ansid);
						//call get like function
					}else{
						alert(html);
					}
				},
				error:function(){
					alert("error");
				}
			});
		});
	
	function get_dislike(ansid){
		$.ajax({
			url:"php/php-get-dislike.php",
			method:"POST",
			data:{ans_id:ansid},
			success:function(data){
				//console.log(data);
				$("#span_dislike"+ansid).html(data);
			},
			error:function(){
				alert("error");
			}
		});
	};
	
	
	//check_login or not 
	
	
	
	
	//prevent user from entering special charracter at begining......
	/*
	$("#txt_ar_ans_id").bind('keypress', function(e) {
		console.log( e.which );
		if($("#txt_ar_ans_id").val().length == 0){
			var k = e.which;
			var ok = k >= 65 && k <= 90 || // A-Z
				k >= 97 && k <= 122 || // a-z
				k >= 48 && k <= 57; // 0-9
				
			if (!ok){
				e.preventDefault();
			}	
		}
		
	});
	*/
	$("#txt_ar_com_id").bind('keypress',function(e){
		
		if($("#txt_ar_com_id").val().length == 0){
			var k = e.which;
			var ok = k >= 65 && k <= 90 || // A-Z
				k >= 97 && k <= 122 || // a-z
				k >= 48 && k <= 57; // 0-9
				
			if (!ok){
				e.preventDefault();
			}
		}
	});
	
	
	$("#txt_ar_que_id").bind('keypress',function(e){
		
		if($("#txt_ar_que_id").val().length == 0){
			var k = e.which;
			var ok = k >= 65 && k <= 90 || // A-Z
				k >= 97 && k <= 122 || // a-z
				k >= 48 && k <= 57; // 0-9
				
			if (!ok){
				e.preventDefault();
			}
		}
	});
	
	//check username availability
	$(function(){
		$("#id_email").blur(function(){
			var email = $(this).val();
			console.log(email);
			$.ajax({
				url:"php/php-check-uname.php",
				method:"POST",
				data:{email_id:email},
				dataType:"text",
				success:function(html){
					$("#check_email_avail").html(html);	
				}
				   
			});
		});
	});
	
});