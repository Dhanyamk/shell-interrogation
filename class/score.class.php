<?php
	//score.class.php

	/*
		class to calculate the score of the user

		it shows the score of the user
	*/
	class score extends team
	{

		public $sid;						// primary index score id
		public $iid;						// userid or teamid
		public $score; 					// user or team score
		public $time_updated; 	// time last answer updated
		public $plenty;					// number of wrong answer submitted
		public $tscore;					// total effective score of the user

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
						$this->tscore=$rows[5];

            //close the database connection
            mysqli_close($connection);
		}

		function wrong_submition($uid)
		{
			$this->get_score($uid);

			$time=date('H:i:s');				// to get surrent system time
			$date=date_create($time);		// to convert it into date formate

			$this->time_updated=date_format($date,"H:i:s");
			//$this->time_updated=date('Y-m-d H:i:s');
			$this->plenty=$this->plenty-1;
			$this->tscore=$this->tscore-1;

			include 'dbms/dbms_imp.php';

			$update_query="UPDATE `score` SET `time_updated`='$this->time_updated',`plenty`='$this->plenty', `tscore`='$this->tscore' WHERE `sid` = '$this->sid'";

			$mysql_query_run=$connection->query($update_query);

			//close the database connection
      mysqli_close($connection);
		}

		function correct_submition($uid)
		{
			$this->get_score($uid);

			$time=date('H:i:s');				// to get surrent system time
			$date=date_create($time);		// to convert it into date formate

			$this->time_updated=date_format($date,"H:i:s");
			//$this->time_updated=date('Y-m-d H:i:s');
			$this->score=$this->score+10;
			$this->tscore=$this->tscore+10;

			include 'dbms/dbms_imp.php';

			$update_query="UPDATE `score` SET `score`='$this->score',`time_updated`='$this->time_updated',`tscore`='$this->tscore' WHERE `sid` = '$this->sid'";

			$mysql_query_run=$connection->query($update_query);

			//close the database connection
            mysqli_close($connection);
		}

		function add_entry_score($uid)		// to add blank entry of the score
		{
			$this->iid=$uid;

			$this->score=0;
			$this->plenty=0;
			$this->tscore=0;

			$time=date('H:i:s');			// to get surrent system time
			$date=date_create($time);		// to convert it into date formate

			$this->time_updated=date_format($date,"H:i:s");
			//$this->time_updated=date('Y-m-d H:i:s');
			if (true)
			{
				var_dump($this);
			}
			include 'dbms/dbms_imp.php';

			$insert_query="INSERT INTO `score` (`sid`, `iid`, `score`, `time_updated`, `plenty`,`tscore`)
				VALUES ('','$this->iid','$this->score','$this->time_updated','$this->plenty','$this->tscore')";

			$mysql_query_run=$connection->query($insert_query);

			if(!$mysql_query_run)
			{
				// error occurs
				echo "<br>Error in creating score</br>".mysqli_error($connection);
				mysqli_close($connection);
				return false;
			}
			mysqli_close($connection);
			return true;
		}
	}
?>
