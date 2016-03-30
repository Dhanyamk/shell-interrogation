<?php
	//score.class.php
	
	/*
		class to calculate the score of the user

		it shows the score of the user
	*/
	class score extends time   		
	{
		
		public $sid;			// primary index score id
		public $iid;			// userid or teamid
		public $score; 			// user or team score
		private $time_updated; 	// time last answer updated
		public $plenty;			// number of wrong answer submitted

		function get_score($id)			// get the score of a given $iid as $id
		{
			// opening the database connection
			include 'dbms/dbms_imp.php';
			
			$this->iid=$id;
			$result=$connection->query("SELECT * FROM `score` WHERE `iid`='$id'");
            $rows=$result->fetch_array();

            $this->sid=$rows[0];
            $this->iid=$rows[1];
            $this->score=$rows[2];
            $this->time_updated=$rows[3];
            $this->plenty=$rows[4];

            //close the database connection 
            mysqli_close($connection);
		}

		function wrong_submition($uid)
		{
			get_score($uid);

			$time=date('H:i:s');			// to get surrent system time
			$date=date_create($time);		// to convert it into date formate

			$this->time_updated=date_format($date,"H:i:s");
			
			$this->plenty+=-1;

			include 'dbms/dbms_imp.php';

			$update_query="UPDATE `score` SET `ltime`='$this->time_updated',`plenty`='$this->plenty' WHERE `sid` = '$this->sid'";
			
			$mysql_query_run=$connection->query($update_query);

			//close the database connection 
            mysqli_close($connection);
		}

		function correct_submition($uid)
		{
			get_score($uid);

			$time=date('H:i:s');			// to get surrent system time
			$date=date_create($time);		// to convert it into date formate

			$this->time_updated=date_format($date,"H:i:s");
			
			$this->score+=10;

			include 'dbms/dbms_imp.php';

			$update_query="UPDATE `score` SET `score`='$this->score',`ltime`='$this->time_updated' WHERE `sid` = '$this->sid'";
			
			$mysql_query_run=$connection->query($update_query);

			//close the database connection 
            mysqli_close($connection);
		}

		function add_entry($uid)
		{
			$this->iid=$uid;

			$this->score=0;
			$this->plenty=0;

			$time=date('H:i:s');			// to get surrent system time
			$date=date_create($time);		// to convert it into date formate

			$this->time_updated=date_format($date,"H:i:s");
			
			include 'dbms/dbms_imp.php';

			$insert_query="INSERT INTO `score` (`sid`, `iid`, `score`, `time_updated`,`plenty`) 
				VALUES ('','$this->iid',$this->score','$this->time_updated','$this->plenty')";

			$mysql_query_run=$connection->query($insert_query);
			
			mysqli_close($connection);
		}
	}
?>