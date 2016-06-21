<?php
	
	include "php-dislike.php";

	if(isset($_POST['ans_id'])){
		$ans_id = $_POST['ans_id'];
		
		echo dislike_count($ans_id);
		
	}
	
?>