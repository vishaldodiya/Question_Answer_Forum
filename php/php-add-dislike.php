<?php 
	session_start();
	include "php-dislike.php";

	

	if(isset($_POST['ans_id'])){
		$ans_id = $_POST['ans_id'];
		//$ans_id = 4;
		
		if(previously_disliked($ans_id) == 1){
			echo "You have already disliked!!";
		}else if(previously_disliked($ans_id) == 2){
			echo "You have to be Logged in";
		}else{
			add_dislike($ans_id);
			echo "success";
		}
	}

?>