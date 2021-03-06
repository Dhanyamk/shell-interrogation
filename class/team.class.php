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
		public $ip;			// user ip address
		public $user1;		// user class var to hold user1 data
		public $user2; 		// user class var to hold user2 data

		function add_team($name,$pwd,$id1,$id2) 	  		// to add team to database
		{
			include 'dbms/dbms_imp.php';

			$this->tname=$name;
			$this->tpwd=md5($pwd);
			$this->uid1=$id1;
			$this->uid2=$id2;

			$insert_query="INSERT INTO `team` (`tid`, `tname`, `tpwd`, `uid1`, `uid2`)
				VALUES ('','$this->tname','$this->tpwd','$this->uid1','$this->uid2')";

			$mysql_query_run=$connection->query($insert_query);

			if(!$mysql_query_run)
			{
				// error occurs
				echo "<br>Error in creating team".mysqli_error($connection);
				mysqli_close($connection);
				return false;
			}
			mysqli_close($connection);
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
			$this->uid2=$row[4];

			// get the user details
			$this->user1= new user;
			$this->user1->get_user($this->uid1);
			$this->user2= new user;
			$this->user2->get_user($this->uid2);
		}

		function team_login($name,$pwd1)
		{
			$pwd=md5($pwd1);
			include 'dbms/dbms_imp.php';
			$query_run=$connection-> query("SELECT `tid`,`tpwd` FROM `team` WHERE `tname`='$name'");
			mysqli_close($connection);
			$row=$query_run->fetch_array();

			$this->tid=$row[0];
			$this->tpwd=$row[1];

			if($pwd==$this->tpwd)
			{
				$team=$this->tid;
				$ip=$_SERVER['REMOTE_ADDR'];
				$port=$_SERVER['REMOTE_PORT'];
				$this->ip=$ip.':'.$port;
				include 'dbms/dbms_imp.php';
				$update_query="UPDATE `team` SET `ip`='$this->ip' WHERE `tid`='$this->tid'";
				$mysql_query_run=$connection->query($update_query);

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
