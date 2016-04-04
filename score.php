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
    <h1>LEADERBOARD:</h1>
    <div class="pull-right"><h3>Total number of teams:</h3></div>

    <div class="btn-group">
    <a href="#" class="btn btn-info" role="button">Back</a>
    <a href="#" class="btn btn-info" role="button">Logout</a>
    <div class="container">
     <table class="table table-striped">
      <thead>
        <tr>
          <th>GROUP NAME:</th>
          <th>SHELL COINS:</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>link here</td>
          <td>link here</td>
        </tr>
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
