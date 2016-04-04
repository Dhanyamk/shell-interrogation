<?php
	$dated=date('H:i:s');
	$time=date('H:i:s');
	echo $dated."</br>";
	echo $dated+3;

	echo "</br></br>";
	
	$date=date_create($time);
	echo date_format($date,"H:i:s");

	echo "</br></br>";
	$add=1;
	date_add($date,date_interval_create_from_date_string("$add hours"));
	echo date_format($date,"H:i:s");
?>