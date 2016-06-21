<?php 
	
	include_once "connection.php";
		$connection = new connection();
		$connection->connect();
		$usr_id;

	function dislike_count($ans_id){
		
		global $connection;
		global $usr_id;
			
		$result = mysqli_query($connection->mycon,"select `in_dislike`,`in_id` from `answer` where `in_reply_id` = $ans_id");
		$dislike_count;
		if($arr = mysqli_fetch_array($result)){
			$dislike_count = $arr['in_dislike'];
			$usr_id = $arr['in_id'];
		}
		
		return  $dislike_count;
	}


	function rem_dislike($ans_id){
		
		dislike_count($ans_id);
		global $usr_id;
		global $connection;
		
		if(isset($_SESSION['usr_id'])){
			mysqli_query($connection->mycon,"update `answer` set `in_dislike` = `in_dislike` - 1 where `in_reply_id` = $ans_id");
			mysqli_query($connection->mycon,"update `registration` set `in_rating_down` = `in_rating_down` - 1 where `in_id` = $usr_id");
			mysqli_query($connection->mycon,"delete from `dislikes` where `in_id` = ".$_SESSION['usr_id']." and `in_reply_id` = ".$ans_id);
		}
		
	}

	function add_dislike($ans_id){
		
		
		dislike_count($ans_id);
		global $usr_id;
		global $connection;
		
		include "php-like.php";
		
		if(isset($_SESSION['usr_id'])){
			if(previously_liked($ans_id) == 1){
				rem_like($ans_id);
				mysqli_query($connection->mycon,"update `answer` set `in_dislike` = `in_dislike` + 1 where `in_reply_id` = $ans_id");
				mysqli_query($connection->mycon,"update `registration` set `in_rating_down` = `in_rating_down` + 1 where `in_id` = $usr_id");
				mysqli_query($connection->mycon,"insert into `dislikes` (`in_id`,`in_reply_id`) values(".$_SESSION['usr_id'].",".$ans_id.")");
			}else{
				mysqli_query($connection->mycon,"update `answer` set `in_dislike` = `in_dislike` + 1 where `in_reply_id` = $ans_id");
				mysqli_query($connection->mycon,"update `registration` set `in_rating_down` = `in_rating_down` + 1 where `in_id` = $usr_id");
				mysqli_query($connection->mycon,"insert into `dislikes` (`in_id`,`in_reply_id`) values(".$_SESSION['usr_id'].",".$ans_id.")");	
			}
		}
		
	}

	function previously_disliked($ans_id){
		
		global $connection;
		$flag;	
		if(isset($_SESSION['usr_id'])){
			$result = mysqli_query($connection->mycon,"select count(`in_dislike_id`) from `dislikes` where `in_id` =".$_SESSION['usr_id']." and `in_reply_id` = $ans_id");
			
			//echo "select count(`in_like_id`) from `likes` where `in_id` =".$_SESSION['usr_id']." and `in_reply_id` = $ans_id";
			if($arr = mysqli_fetch_array($result)){
				if($arr['count(`in_dislike_id`)'] == 0){
					$flag = 0;
				}
				else{
					$flag = 1;
				}
			}
		}else{
			$flag = 2;
		}
		
		
		
		return $flag;
		
	}
	
	//echo add_dislike(4);

?>