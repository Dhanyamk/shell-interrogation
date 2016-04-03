<?php
	// time.class.php

	/*
		keeps track of time for each team or user
	*/
	class time
	{
		private $tid;		// unique id of table
		private $uid;		// user or team id
		public $s_time;		// start time
		public $e_time;		// end time
		
		function add_entry_time($uid,$add_time)	// function to add the entry to the database
		{
			$this->uid=$uid;
			
			$time=date('H:i:s');			// to get surrent system time
			$date=date_create($time);		// to convert it into date formate

			$this->s_time=date_format($date,"H:i:s");	// to add as start time
			
			date_add($date,date_interval_create_from_date_string("$add_time hours"));		// to add given time in it

			$this->e_time=date_format($date,"H:i:s");	// to add end time

			include 'dbms/dbms_imp.php';

			$insert_query="INSERT INTO `etime` (`tid`, `uid`, `start`, `end`) 
				VALUES ('','$this->uid',$this->s_time','$this->e_time')";
			
			$mysql_query_run=$connection->query($insert_query);
			
			mysqli_close($connection);
		}

		function get_end_time($uid) 	// function to get end time for the mentioned user 
		{
			$this->uid=$uid;
			
			include 'dbms/dbms_imp.php';

			$result=$connection->query("SELECT `end` FROM `etime` WHERE `uid`='$uid'");
            $rows=$result->fetch_array();
			
			$this->e_time=$rows[0];

			mysqli_close($connection);

			return $this->e_time;
		}

	}
?>