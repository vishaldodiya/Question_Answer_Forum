<?php
	
	include "php-like.php";

	if(isset($_POST['ans_id'])){
		$ans_id = $_POST['ans_id'];
		
		echo like_count($ans_id);
		
	}
	
?>