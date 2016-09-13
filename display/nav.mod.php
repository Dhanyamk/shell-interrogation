<?php
	// navigation bar

  $team= new team;
  $team->get_team($teamid);
?>
<body>

	<!-- Custom styles for this template -->
    <!--<link href="display/navbar-fixed-top.css" rel="stylesheet">-->

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Shell Query</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <?php
              if (islogin())
              {
                ?>
            <li class="active"><a href="lp.php"><?php echo "$team->tname";?></a></li>
                <?php
              }
            ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Questions <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <?php
                  $scored = new score;
                  $scored->get_score($teamid);
                  $n=($scored->score)/10;
                  for ($i=0; $i <=$n ; $i++)
                  {
                    $sum=md5($i);
                  ?>
                  <li><a href="<?php echo "question.php?qno=$i&sum=$sum";?>"><?php echo "Question $i";?></a></li>
                  <?php
                  }
                ?>
              </ul>
            </li>
            <li><a href="score.php">Leaderboards</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <?php
              if ($debug && false)
              {
                var_dump($time);
                var_dump($startTime);
                var_dump($endTime);
              }

              if ($endTime <= $time)
              {
                ?>
                <li><a href=""><?php echo "Times Up";?></a></li>
                <li><a href="">Event over</a></li>
                <?php
              }
              elseif ($time >= $startTime && $time <= $endTime)
              {
                $dstart = date_format($endTime,"Y-m-d H:i:s");  // converting startdate
                $cdate = date_format(date_create(date("Y-m-d H:i:s")),"Y-m-d H:i:s");    //current datetime
                $start_date = new DateTime($dstart);
                $duration = $start_date->diff(new DateTime($cdate));  // calculating the time left to end of the evet
                $sec=(($duration->h*60*60)+($duration->i*60)+($duration->s));   // calculating time left
                refresh($sec);    // to refresh current page
                ?>
                <li><a href=""><?php timer($duration->h,$duration->i,$duration->s,"newtime",0);?></a></li>
                <li><a href="">Time left for the event to End</a></li>
                <?php
              }
              elseif($time <= $startTime)
              {
                //$startTime = date_create('2016-04-01 10:20:00');
                $dstart = date_format($startTime,"Y-m-d H:i:s");  // converting startdate
                $cdate = date_format(date_create(date("Y-m-d H:i:s")),"Y-m-d H:i:s");    //current datetime
                $start_date = new DateTime($cdate);
                $duration = $start_date->diff(new DateTime($dstart));  // calculating the time left to start of the event
                $sec=(($duration->h*60*60)+($duration->i*60)+($duration->s));   // calculating time left
                refresh($sec);    // to refresh current page
                ?>
                <li><a href=""><?php timer($duration->h,$duration->i,$duration->s,"newtime",0);?></a></li>
                <li><a href="">Time left for the event to Start</a></li>
                <?php
              }

              if (islogin())
              {
            ?>
            <li class="active"><a href="logout.php">Quit the game<span class="sr-only">(current)</span></a></li>
            <?php
              }
            ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
