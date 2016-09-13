<?php
	/*
	$dated=date('H:i:s');
	$time=date('H:i:s');
	echo $dated."</br>";
	echo $dated+3;

	echo "</br></br>";

	$date=date_create($time);
	$d1=date_format($date,"H:i:s");
	echo "$d1";
	echo "</br></br>";
	$add=1;
	date_add($date,date_interval_create_from_date_string("$add hours"));
	$d2=date_format($date,"Y-m-d H:i:s");
	echo "$d2";

	echo "</br>";
	$start_date = new DateTime($d1);
	$since_start = $start_date->diff(new DateTime($d2));
	echo $since_start->days.' days total<br>';
	echo $since_start->y.' years<br>';
	echo $since_start->m.' months<br>';
	echo $since_start->d.' days<br>';
	echo $since_start->h.' hours<br>';
	echo $since_start->i.' minutes<br>';
	echo $since_start->s.' seconds<br>';


	for ($i=2; $i <= 20 ; $i++)
	{
		$user='user'.$i;
		$key=md5($user);

		include 'dbms/dbms_imp.php';

		$insert_query="INSERT INTO `ques` (`qid`, `user`, `key`, `title`, `descr`, `hint`)
			VALUES ('','$user','$key','','','')";

		$mysql_query_run=$connection->query($insert_query);
	}
	*/
?>

<?php
/*
<?php

namespace BirthdayCelebration;

use Birthday\Cake as AwesomeCake;

use Brithday\Candles;

class HappyBirthday extends Birthday
{
  	public function HappyBirthday($BirthdayBoy)
  	{
  		echo "	On this special day,
							I wish you all the very best,
							all the joy you can ever have and may you be blessed abundantly today, tomorrow and the days to come!
							May you have a fantastic birthday today and many more to come... HAPPY BIRTHDAY $BirthdayBoy !!!!
							Don't Froget to cut that AwesomeCake ;-P ";
  	}
}

$gift = new HappyBirthday;
$gift->HappyBirthday("");
?>
