<?php
	// login.class.php
	
	include_once 'traits/password.trait.php';
	/*
		login class extends user # hop to extends
	*/
	class login 
	{
		
		// including password trait methods
		use password;

		function get_user($usn,$password)
		{
			// add a sentizer script to neutralize the var
			if ($this->password_hash_comp($usn,$password)) 
			{
				include 'dbms/dbms_imp.php';
				$query_run=$connection-> query("SELECT `uniqueid` FROM `userdetail` WHERE `usn`='$usn'");	
				mysqli_close($connection);
				//$row=$query_run->fetch_array();

				//$user= new user;
				//$user=$row[0];
				//$_SESSION['user']=$user;
				//$GLOBALS[$user]=$_SESSION['user'];

				//redirect to userpage
				//$current_file=$_SERVER['SCRIPT_NAME'];
				//header('location:'.$current_file); 	//to redirect to current page untill userpage is not made
				//echo "Logged in";
				return true;
			} 
			else 
			{
				//echo "usn and password combination is not correct";
				return false;
			}
		}

		function get_userid($usn)
		{
			include 'dbms/dbms_imp.php';
			$query_run=$connection-> query("SELECT `uniqueid` FROM `userdetail` WHERE `usn`='$usn'");	
			mysqli_close($connection);
			$row=$query_run->fetch_array();

			return $row[0];
		}
	}
?>
