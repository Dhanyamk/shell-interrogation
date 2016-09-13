<? /*
   declare target date; source: http://us.imdb.com/ReleaseDates?0121766 ; 
  */
  $day   = 31;     // Day of the countdown
  $month = 12;      // Month of the countdown
  $year  = 2017;   // Year of the countdown
  $hour  = 23;     // Hour of the day (east coast time)
  $event = "New Year's Eve, 2016"; //event

  $calculation = ((mktime ($hour,0,0,$month,$day,$year) - time(void))/3600);
  $hours = (int)$calculation;
  $days  = (int)($hours/24);
/*
  mktime() http://www.php.net/manual/en/function.mktime.php
  time()   http://www.php.net/manual/en/function.time.php
  (int)    http://www.php.net/manual/en/language.types.integer.php
*/
?>
<ul>
<li>The date is <?php echo(date ("l, jS \of F Y g:i:s A"));?>.</li>
<li>It is <?php echo $days; ?> days until <?php echo $event;?>.</li>
<li>It is <?php echo $hours; ?> hours until <?php echo $event;?>.</li>
</ul>