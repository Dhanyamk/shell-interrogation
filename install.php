<?php
	// query to create database

	$code=$_POST['code'];

	$ccode='10000'; 	//predefined security key set to somthing complex so it cant be guess easily

if (isset($code) && !empty($code) && $code==$ccode)
{
	// excute only if the code is correct
	include_once 'dbms/dbms_imp.php';
	/*
	// user table is provide by databse sync from notice board table.
	$sql_user_table="CREATE TABLE IF NOT EXISTS `userdetail` (
		`uniqueid` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'unique id of the user for easy reference',
		  `usn` varchar(11) NOT NULL UNIQUE COMMENT 'usn for login to post',
		  `password` varchar(65) NOT NULL COMMENT 'password of the user',
		  `firstname` varchar(40) NOT NULL COMMENT 'first name',
		  `surname` varchar(40) NOT NULL COMMENT 'last name',
		  `gender` varchar(2) NOT NULL COMMENT 'gender',
		  `dob` date NOT NULL COMMENT 'dat of birth',
		  `pos` varchar(20) COMMENT 'user holding any position or not',
		  `level` varchar(10) NOT NULL DEFAULT 'user' COMMENT 'user level i.e user or admin or developer'
		) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;";

	$result_user_table=$connection->query($sql_user_table);

	if (!$result_user_table)
	{
		echo "</br>Error in creating user table  </br>".mysqli_error($connection)."</br>";
	}
	else
	{
		echo "</br>User table created.</br>";
	}

	//expanding user table
	$sql_user_table_alter1="ALTER TABLE `userdetail` ADD `img` text DEFAULT 'NULL' COMMENT 'image if any filename only'";

	$result_user_table_update=$connection->query($sql_user_table_alter1);

	if (!$result_user_table_update)
	{
		echo "</br>Error in creating user table  </br>".mysqli_error($connection)."</br>";
	}
	else
	{
		echo "</br>User table updated</br>";
	}
	*/

	$sql_ques_table="CREATE TABLE IF NOT EXISTS `ques` (
		`qid` int(10) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'hold unique id for question reference',
		  `user` varchar(200) NOT NULL COMMENT 'ssh username',
		  `key` varchar(65) NOT NULL COMMENT 'key to next level',
		  `descr` longtext NOT NULL COMMENT 'description of the question',
		  `hint` varchar(100) COMMENT 'piroity of the post'
		) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1 COMMENT='question table';";

	$result_ques_table=$connection->query($sql_ques_table);

	if (!$result_ques_table)
	{
		echo "</br>Error in creating question table  </br>".mysqli_error($connection)."</br>";
	}
	else
	{
		echo "</br>Question table created.</br>";
	}



	$sql_score_table="CREATE TABLE IF NOT EXISTS `score` (
		`sid` int(100) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'unique id to track score',
		  `iid` int(100) NOT NULL COMMENT 'user / team id ',
		  `score` int(100) NOT NULL COMMENT 'score of the user / team',
		  `time_updated` time NOT NULL COMMENT 'time on which it is last updated',
		  `plenty` int(100) NOT NULL COMMENT 'plenty i.e wrong submitions',
			`tscore` int(100) NOT NULL COMMENT 'total score of the team or user'
		) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1 COMMENT='score table';";


	$result_score_table=$connection->query($sql_score_table);

	if (!$result_score_table)
	{
		echo "</br>Error in creating score table  </br>".mysqli_error($connection)."</br>";
	}
	else
	{
		echo "</br>Score table created.</br>";
	}


	$sql_time_table="CREATE TABLE IF NOT EXISTS `etime` (
		`tid` int(100) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'unique id to track time',
		  `uid` int(100) NOT NULL COMMENT 'user / team id',
		  `start` datetime NOT NULL COMMENT 'time on which the user / team logged in',
		  `end` datetime NOT NULL COMMENT 'end time for that team'
		) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1 COMMENT='event time table';";

	$result_time_table=$connection->query($sql_time_table);

	if (!$result_time_table)
	{
		echo "</br>Error in creating time table  </br>".mysqli_error($connection)."</br>";
	}
	else
	{
		echo "</br>time table created.</br>";
	}

	$sql_team_table="CREATE TABLE IF NOT EXISTS `team` (
		`tid` int(100) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'unique id to track team',
		  `tname` varchar(40) NOT NULL COMMENT 'team name',
		  `tpwd` varchar(65) NOT NULL COMMENT 'password of the team',
		  `uid1` int(100) NOT NULL COMMENT 'user1',
		  `uid2` int(100) NOT NULL COMMENT 'user2'
		) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1 COMMENT='team table';";

	$result_team_table=$connection->query($sql_team_table);
	if (!$result_team_table)
	{
		echo "</br>Error in creating team table  </br>".mysqli_error($connection)."</br>";
	}
	else
	{
		echo "</br>time team created.</br>";
	}

	# till here modified
}
else
{
	echo "This is a simple script to config your database to automatically for this website.</br>
		Enter the security code to do the installation.</br>
		<b>If u dont know the code means you don't belong Here</b>";

	$current_file=$_SERVER['SCRIPT_NAME'];
?>
	<form action="<?php echo $current_file; ?>" method="POST" enctype="" target="">
        <fieldset>
            <legend>security code:</legend>
            <input type="text" name="code" value="">
        </fieldset>
        <input type="submit" name="install" value="install" size="20">
        </div>
    </form>

<?php
}
?>
