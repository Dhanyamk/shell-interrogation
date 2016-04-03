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
          <a class="navbar-brand" href="#">Shell Query</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php"><?php echo "$team->tname";?></a></li>
            <!--<li><a href="#">Questions</a></li>-->
            <li><a href="#">Leaderboards</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Questions <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <?php
                  $scored= new score;
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
                <!--<li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>-->
              </ul>
            </li>
          </ul>
         
          <ul class="nav navbar-nav navbar-right">
            <!--<li id="time"><script>disptime();</script></li>-->
            <li><a href="#">Notification</a></li>
            <li><a href="#"><?php timer(00,00,10,"newtime",0);?></a></li>
            <li class="active"><a href="#">Quit the game<span class="sr-only">(current)</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
