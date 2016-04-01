<?php
//ini_set('display_errors','0');	//to be set active when site goes live
ini_set('date.timezone','Asia/Kolkata');
// core file must be include in all pages

date_default_timezone_set('Asia/Kolkata');

//include 'dbms/dbms_imp.php';
//include_once "functions/";
include_once 'functions/islogin.func.php';
include_once 'functions/validate.func.php';
include_once 'functions/netutralize.func.php';
include_once 'functions/refresh.func.php';
include_once 'functions/timer1.func.php';



spl_autoload_register(function ($class) 
{
    include 'class/'.$class.'.class.php';
});

ob_start();

// for debuging
	$debug=true;

session_start();

$current_file=@$_SERVER['SCRIPT_NAME'];
$http_referer=@$_SERVER['HTTP_REFERER'];
	//default values
	
	//echo $current_file;

	$userid=@$_SESSION['user'];

// time for the event defination 

	//Start time of the contest in the format 'YYYY-MM-DD HH:MM:SS'
	$startTime = date_create('2016-04-01 10:20:00');

	//End time of the contest in the format 'YYYY-MM-DD HH:MM:SS'
	$endTime = date_create('2016-04-01 10:30:00');

	//Interval between refreshes of the leaderboard (milliseconds)
	$getLeaderInterval = 10000;

	//You can use the variable $running to determine if the contest is running or not
	$time = date_create();
	$running = false;
	if($time >= $startTime && $time <= $endTime)
		$running = true;

	// trigerring the timer.php
	//include_once 'timer.php';
?>