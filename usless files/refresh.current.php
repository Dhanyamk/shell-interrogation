<?php
	//code to refresh current page 
	$page = $_SERVER['PHP_SELF'];
	$sec = "10";
	header("Refresh: $sec; url=$page");
?>