<?php
	//team.class.php

	/*
		team class which holds the details of corresponding teams
	*/
	class team
	{
		public $tid; 		// team id
		public $tname; 	 	// team name
		private $tpwd;		// team password
		public $uid1;		// user1 id
		public $uid2;		// user2 id
	
		public $user1;		// user class var to hold user1 data
		public $user2; 		// user class var to hold user2 data
	
		function add_team($name,$pwd) 	  		// to add team to database
		{
			include 'dbms/dbms_imp.php';

			$this->tname=$name;
			$this->tpwd=md5($pwd);

			$insert_query="INSERT INTO `team` (`tid`, `tname`, `tpwd`, `uid1`, `uid2`) 
				VALUES ('','$this->tname','this->tpwd','$this->uid1','$this->uid2')";
			
			$mysql_query_run=$connection->query($insert_query);
			
			mysqli_close($connection);
			
			if(!$mysql_query_run)
			{
				// error occurs
				echo "<br>Error in creating team".mysqli_error($connection);
				return false;
			}
			return true;
		}

		function get_team($id)
		{
			include 'dbms/dbms_imp.php';
			$query_run=$connection-> query("SELECT * FROM `team` WHERE `tid`='$id'");	
			mysqli_close($connection);
			$row=$query_run->fetch_array();

			$this->tid=$row[0];
			$this->tname=$row[1];
			//$this->tpwd=$row[2];		// no need of password
			$this->uid1=$row[3];
			$this->uid2+$row[4];

			// get the user details
			$user1= new user;
			$user1->get_user($this->uid1);
			$user2= new user;
			$user2->get_user($this->uid2)
		}

		function team_login($name,$pwd)
		{
			include 'dbms/dbms_imp.php';
			$query_run=$connection-> query("SELECT `tid`,`tpwd` FROM `team` WHERE `tname`='$name'");	
			mysqli_close($connection);
			$row=$query_run->fetch_array();

			$this->tid=$row[0];
			$this->tpwd=$row[1];

			if($pwd==$this->tpwd)
			{
				$team=$this->tid;
				$_SESSION['team']=$team;
				$GLOBALS[$team]=$_SESSION['team'];
				return true;
			}
			else
			{
				return false;
			}

		}
	}

?>