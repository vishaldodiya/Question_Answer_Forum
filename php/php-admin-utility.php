<?php

	include_once "connection.php";
	
	class admin_utility{
		
		public function display_log(){
			$connection = new connection();
			$connection->connect();	
			$query = "select l.in_log_id, l.in_id, r.st_username, l.ip_address_remote, l.dt_log, l.tm_log_in, l.tm_log_out from `logs` l join `registration` r where l.in_id = r.in_id";
			
			$result = mysqli_query($connection->mycon,$query);
			
			return $result;
		}
		
		public function display_user(){
			$connection = new connection();
			$connection->connect();	
			$query = "select * from `registration`";
			
			$result = mysqli_query($connection->mycon,$query);
			
			return $result;
		}
		
		public function total_user_count(){
			$connection = new connection();
			$connection->connect();	
			$query = "select count(*) from `registration`";
			
			$result = mysqli_query($connection->mycon,$query);
			
			$count;
			if($arr = mysqli_fetch_array($result)){
				$count = $arr['count(*)'];
			}
			
			return $count;
		}
		
		public function total_online_user(){
			$connection = new connection();
			$connection->connect();	
			$query = "select count(*) from `logs` where `tm_log_out` = '00:00:00'";
			
			$result = mysqli_query($connection->mycon,$query);
			$count;
			if($arr = mysqli_fetch_array($result)){
				$count = $arr['count(*)'];
			}
			
			return $count;
		}
		
		public function total_questions_per_date($date){
			$connection = new connection();
			$connection->connect();	
			$query = "select count(*) from `question` where `dt_question` = '$date'";
			
			$result = mysqli_query($connection->mycon,$query);
			
			$count;
			if($arr = mysqli_fetch_array($result)){
				$count = $arr['count(*)'];
			}
			
			return $count;
		}
		
		public function total_questions(){
			$connection = new connection();
			$connection->connect();	
			$query = "select count(*) from `question`";
			
			$result = mysqli_query($connection->mycon,$query);
			
			$count;
			if($arr = mysqli_fetch_array($result)){
				$count = $arr['count(*)'];
			}
			
			return $count;
		}
		
		public function report_count_on_date($date,$rep_id){
			$connection = new connection();
			$connection->connect();	
			
			$query = "select count(*) from `reports` where `in_report_id` = $rep_id and `dt_report` = '$date'";
			
			$result = mysqli_query($connection->mycon,$query);
			
			$count;
			if($arr = mysqli_fetch_array($result)){
				$count = $arr['count(*)'];
			}
			
			return $count;
		}
		
		public function total_report($rep_id){
			$connection = new connection();
			$connection->connect();	
			
			$query = "select count(*) from `reports` where `in_report_id` = $rep_id";
			
			$result = mysqli_query($connection->mycon,$query);
			
			$count;
			if($arr = mysqli_fetch_array($result)){
				$count = $arr['count(*)'];
			}
			
			return $count;
		}
		
		public function display_reports(){
			$connection = new connection();
			$connection->connect();	
			
			$query = "select * from `reports` order by `dt_report` DESC";
			
			$result = mysqli_query($connection->mycon,$query);
			
			return $result;
		}
		
		/*
		public function latest_question(){
			$connection = new connection();
			$connection->connect();	
			
			$query = "select * from `question` order by "
		}
		*/
	}

	//$ob = new admin_utility();
	//echo $ob->total_questions();

	

?>