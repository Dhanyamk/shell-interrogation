<?php
	//score.class.php
	
	/*
		class to calculate the score of the user

		it shows the score of the user
	*/
	class score extends user 		
	{
		
		public $sid;			// primary index score id
		public $iid;			// userid or teamid
		public $score 			// user or team score
		private $time_updated 	// time last answer updated
		public $plenty			// number of wrong answer submitted
		/*
			no need of constructor
		function __construct(argument)
		{
			# code...
		}
		*/

		function get_rem_time($tid) 	// get the remaning time of the given team
		{
			
		}

		function get_score($id)			// get the score of a given $iid as $id
		{
			// opening the database connection
			include 'dbms/dbms_imp.php';
			
			$this->iid=$id;
			$result=$connection->query("SELECT * FROM `score` WHERE `iid`='$id'");
            $rows=$result->fetch_array();

            //close the database connection 
            mysqli_close($connection);
		}

	}
?>