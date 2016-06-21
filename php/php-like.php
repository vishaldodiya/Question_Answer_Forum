<?php 
	
	include_once "connection.php";
		$connection = new connection();
		$connection->connect();
		$usr_id;

	function like_count($ans_id){
		
		global $connection;
		global $usr_id;
			
		$result = mysqli_query($connection->mycon,"select `in_like`,`in_id` from `answer` where `in_reply_id` = $ans_id");
		$like_count;
		if($arr = mysqli_fetch_array($result)){
			$like_count = $arr['in_like'];
			$usr_id = $arr['in_id'];
		}
		
		return  $like_count;
	}

	function add_like($ans_id){
		
		like_count($ans_id);
		global $usr_id;
		global $connection;
		
		include "php-dislike.php";
		
		if(isset($_SESSION['usr_id'])){
			if(previously_disliked($ans_id) == 1){
				rem_dislike($ans_id);
				mysqli_query($connection->mycon,"update `answer` set `in_like` = `in_like` + 1 where `in_reply_id` = $ans_id");
				mysqli_query($connection->mycon,"update `registration` set `in_rating_up` = `in_rating_up` + 1 where `in_id` = $usr_id");
				mysqli_query($connection->mycon,"insert into `likes` (`in_id`,`in_reply_id`) values(".$_SESSION['usr_id'].",".$ans_id.")");
			}else{

				mysqli_query($connection->mycon,"update `answer` set `in_like` = `in_like` + 1 where `in_reply_id` = $ans_id");
				mysqli_query($connection->mycon,"update `registration` set `in_rating_up` = `in_rating_up` + 1 where `in_id` = $usr_id");
				mysqli_query($connection->mycon,"insert into `likes` (`in_id`,`in_reply_id`) values(".$_SESSION['usr_id'].",".$ans_id.")");
			}	
		}
		
	}

	function rem_like($ans_id){
		
		like_count($ans_id);
		global $usr_id;
		global $connection;
		
		if(isset($_SESSION['usr_id'])){
			mysqli_query($connection->mycon,"update `answer` set `in_like` = `in_like` - 1 where `in_reply_id` = $ans_id");
			mysqli_query($connection->mycon,"update `registration` set `in_rating_up` = `in_rating_up` - 1 where `in_id` = $usr_id");
			mysqli_query($connection->mycon,"delete from `likes` where `in_id` = ".$_SESSION['usr_id']." and `in_reply_id` = ".$ans_id);
		}
		
	}

	function previously_liked($ans_id){
		
		global $connection;
		$flag;	
		if(isset($_SESSION['usr_id'])){
			$result = mysqli_query($connection->mycon,"select count(`in_like_id`) from `likes` where `in_id` =".$_SESSION['usr_id']." and `in_reply_id` = $ans_id");
		
			//echo "select count(`in_like_id`) from `likes` where `in_id` =".$_SESSION['usr_id']." and `in_reply_id` = $ans_id";
			if($arr = mysqli_fetch_array($result)){
				if($arr['count(`in_like_id`)'] == 0){
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
	
	//echo rem_like(9);

?>