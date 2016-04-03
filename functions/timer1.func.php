<?php
	// timer.mod.php
	
	// $e = 0 = event;
	// $e = 1 = string;
	// $e = 2 = refresh the whole page;
	function timer($hr,$min,$sec,$trigger,$e)
	{
	?>
	<div id="hms"><?php echo "$hr:$min:$sec";?></div>

	<script type="text/javascript">
	    function count() {

	    var startTime = document.getElementById('hms').innerHTML;
	    var pieces = startTime.split(":");
	    var time = new Date();    time.setHours(pieces[0]);
	    time.setMinutes(pieces[1]);
	    time.setSeconds(pieces[2]);
	    var timedif = new Date(time.valueOf() - 1000);
	    var newtime = timedif.toTimeString().split(" ")[0];
	    //console.log(time);
	    /*
	    var timedif1 = new Date();
	    var eventtime= timedif1.toTimeString().split(" ")[0];
	    */
	    <?php
	    	if ($e==1)
	    	{
	    	?>
	    //console.log(timedif);
	    document.getElementById('hms').innerHTML=<?php echo "\"$trigger\"";?>;	
	    	<?php	
	    	}
	    	elseif ($e==0) 
	    	{
	    	?>
	    //var timedif1 = new Date(time.valueOf()-1000);
	    //var newtime1 = timedif1.toTimeString().split(" ")[0];
	    
	    //console.log(timedif1);
	    //console.log(newtime1);
	    document.getElementById('hms').innerHTML=<?php echo "$trigger";?>;	
	    	<?php	# code...
	    	}
	    	elseif ($e==2) 
	    	{
	    	?>
	    //var timedif1 = new Date(time.valueOf()-1000);
	    //var newtime1 = timedif1.toTimeString().split(" ")[0];
	    
	    //console.log(timedif1);
	    //console.log(newtime1);
	    document.getElementById('hms').innerHTML=<?php refresh(1);?>;	
	    	<?php	# code...
	    	}
	    ?>
	    setTimeout(count, 1000);
	}
	count();

	</script>
	<?php
	}
?>