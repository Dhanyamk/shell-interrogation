<?php
	// ques.class.php
	
	/*
		question class to fetch question from the database also to add questions in it
	
		It fetch the question based on give qusetion number i.e question id
	*/
	class ques 
	{
		
		public $qid; 		// question id i.e question number
		public $user;		// ssh username
		private $key;		// key to next level
		public $descr;		// question description 
		public $hint; 		// hint related to that question

		/*
		no need of constructor
		function __construct()
		{
			# code...
		}
		*/

		function get_ques($qid) 		// funtion to get the question from database
		{
			// opening the database connection
			include 'dbms/dbms_imp.php';
			
			$this->qid=$qid;
			$result=$connection->query("SELECT * FROM `ques` WHERE `qid`='$qid'");
            $rows=$result->fetch_array();
            $this->$user=$rows[1];
            $this->$key=$rows[2];
            $this->$descr=$rows[3];
            $this->$hint=$rows[4];

            //close the database connection 
            mysqli_close($connection);
		}

		function match_key($key)		// function to check key is correct or not
		{
			if ($this->key==$key)
				return true;
			else
				return false;
		}

		function add_ques($key)				// function to add the question
		{
			$this->key=$key;

			include 'dbms/dbms_imp.php';

			$insert_query="INSERT INTO `ques` (`qid`, `user`, `key`, `descr`, `hint`) 
				VALUES ('','$this->user','this->key','$this->descr','$this->hint')";
			
			$mysql_query_run=$connection->query($insert_query);
			
			mysqli_close($connection);
		}

		/*
			to modify question call get_ques first then call add_ques to add it back
		*/
	}
?>