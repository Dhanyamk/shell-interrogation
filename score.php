<?php
	//score.php
  //scorepage
	require 'core.php';

	$title = "Leaderboard";
	# loading all display modules
	require 'display/head.mod.php';		// <head> for the page
	require 'display/nav.mod.php';		// navagation bar for the page

	//content of this page
	#definig the team

	#refresh the page in every 10 sec
	refresh('10');

#only accessable if logged in
if (islogin() || $debug)
{
	# if true then show the page or it the debugging mode
	?>

  <!--<style>
  .container-fluid{
      background: #2d2d30;
      color: #bdbdbd;
      padding-bottom: 600px;
      font-family:'Pacifico',cursive;
  }
  </style>-->
  <link href="display/signin.css" rel="stylesheet">
  <div class="container">
    <?php
      // code to access the database to get scores
      include 'dbms/dbms_imp.php';
      $query="SELECT `tid`,`tname`,`tscore` FROM `team`,`score` WHERE team.tid=score.iid ORDER BY `tscore` DESC, `time_updated` ASC";
      $mysql_query_run=$connection->query($query);
      $count=$mysql_query_run->num_rows;
      mysqli_close($connection);

    ?>
    <h1>LEADERBOARD:</h1>
    <div class="pull-right"><h3>Total number of teams:<?php echo "$count"; ?></h3></div>

    <div class="btn-group">
    <!--<a href="#" class="btn btn-info" role="button">Back</a>
    <a href="#" class="btn btn-info" role="button">Logout</a>-->
    <div class="container">
     <table class="table table-striped">
      <thead>
        <tr>
          <th>Team Name:</th>
          <th>Total Score:</th>
        </tr>
      </thead>
      <tbody>
      <?php

        while ($rows=$mysql_query_run->fetch_array())
        {
        ?>
        <tr
        <?php
          if ($rows[0]==$teamid)
          {
            echo 'class="alert alert-info"';
          }
         ?>
        ><td><?php echo "$rows[1]";?></td><td><?php echo "$rows[2]";?></td></tr>
        <?php
        }
      ?>
      </tbody>
    </table>
  </div>
  </div>
  </div>
	<?php
}
else
{
	header('location:'.'login_team.php?msg=1');
}

	require 'display/footer.mod.php';	// <footer> for the page

	require 'display/script.mod.php';	// script depending on page requirment
	require 'display/eop.mod.php';		// end of page
?>
