<?php
	//islogin.func.php
	/*
		function to check wether user is loged in or not 
	*/

	function islogin()
	{
		if (isset($_SESSION['team']) && !empty($_SESSION['team']))
		{
			return true;
		} 
		else 
		{
			return false;
		}
		
	}
?>

