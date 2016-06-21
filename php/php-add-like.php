<?php 
	session_start();
	include "php-like.php";

	

	if(isset($_POST['ans_id'])){
		$ans_id = $_POST['ans_id'];
		//$ans_id = 4;
		
		if(previously_liked($ans_id) == 1){
			echo "You have already liked!!";
		}else if(previously_liked($ans_id) == 2){
			echo "You have to be logged in";
		}else{
			add_like($ans_id);
			echo "success";
		}
	}

?>