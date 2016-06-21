<?php

	class utility{
		
		public function display_category(){
			require_once("connection.php");
	
			$connection = new connection();
			$connection->connect();
			$query = "select `st_category_name` from `category` where `in_category_id` != 1";
			$result = mysqli_query($connection->mycon,$query);

			$cat = "General"; 
			while($arr = mysqli_fetch_array($result)){
				$cat .= " ".$arr["st_category_name"]; 
				
			}
			
				$cat = explode(" ",$cat);
			//print_r($cat);
			return $cat;

		}
		
		public function category_with_usage(){
			require_once("connection.php");
	
			$connection = new connection();
			$connection->connect();
			$query = "select * from `category` order by `in_category_count` DESC";
			$result = mysqli_query($connection->mycon,$query);

			return $result;
		}
		
		public function display_question($like){
			require_once("connection.php");
			$connection = new connection();
			$connection->connect();
			
			$query = "select q.in_id, q.in_question_id, q.st_question, r.st_username, q.dt_question,q.st_category_name, q.tm_question,q.bo_is_active from `question` q join `registration` r where q.st_question like '%$like%' and q.in_id = r.in_id and q.bo_is_active = 1 order by q.dt_question DESC , q.tm_question DESC ";
			
			
			$result = mysqli_query($connection->mycon,$query);
			//print_r($result);
			return $result;
			
		}
		
		
		public function display_liked_answer($que_id){
			require_once("connection.php");
			$connection = new connection();
			$connection->connect();
			
			
			
			$query = "SELECT a.`in_reply_id`,r.`st_username`, a.`dt_reply`, a.`tm_reply`, a.`in_like`, a.`in_dislike`, a.`bo_is_edited`, a.`dt_edited`, a.`bo_is_active`, a.`st_reply` FROM `answer` a join `registration` r WHERE a.`in_question_id` = $que_id and a.`in_parent_id` = 0 and a.`in_id` = r.`in_id` and a.`in_like` = ( SELECT MAX(`in_like`) FROM `answer` where `in_question_id` = $que_id and bo_is_active = 1) and a.bo_is_active = 1";
			
			$result = mysqli_query($connection->mycon,$query);
			
			return $result;
		}
		
		public function display_comment($ans_id,$que_id){
			require_once("connection.php");
			
			$connection = new connection();
			$connection->connect();
			
			$query = "SELECT a.`in_reply_id`, r.`st_username`, a.`dt_reply`, a.`tm_reply`, a.`bo_is_active`, a.`st_reply` FROM `answer` a join `registration` r WHERE a.`in_question_id` = $que_id and a.`in_parent_id` = $ans_id and a.`in_id` = r.`in_id` and a.bo_is_active = 1";
			
			$result = mysqli_query($connection->mycon,$query);
			
			return $result;
		}
		
		public function question($que_id){
			require_once("connection.php");
			$connection = new connection();
			$connection->connect();

			$query = "select q.in_question_id, q.st_question, r.st_username, q.dt_question,q.st_category_name, q.tm_question,q.bo_is_active from `question` q join `registration` r where q.in_id = r.in_id and q.in_question_id = $que_id and q.bo_is_active = 1";

			$result = mysqli_query($connection->mycon,$query);

			return $result;
		
		}
		
		public function more_answer($que_id){
			require_once("connection.php");
			$connection = new connection();
			$connection->connect();
			
			$query = "SELECT a.`in_reply_id`,r.`st_username`, a.`dt_reply`, a.`tm_reply`, a.`in_like`, a.`in_dislike`, a.`bo_is_edited`, a.`dt_edited`, a.`bo_is_active`, a.`st_reply` FROM `answer` a join `registration` r WHERE a.`in_question_id` = $que_id and a.`in_parent_id` = 0 and a.`in_id` = r.`in_id` and a.bo_is_active = 1 order by a.`in_like` DESC";
			
			$result = mysqli_query($connection->mycon,$query);
			
			return $result;
			
		}
		
	}

	
		/*
		$ob = new utility();
		
		$array = $ob->display_question(null);

		while($arr = mysqli_fetch_array($array)){
			print_r($arr);
		}
		*/		
		
		
		

?>