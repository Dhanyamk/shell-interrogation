<?php
	// landing page
	require 'core.php';

	$title = "landing page";
	# loading all display modules
	require 'display/head.mod.php';		// <head> for the page
	require 'display/nav.mod.php';		// navagation bar for the page

	//content of this page
	#definig the team

#only accessable if logged in
if (islogin())
{
	# if true then show the page
?>
<style>
.jumbotron{
	background: #2d2d30;
    color: #bdbdbd;
	padding-bottom:400px;
}
</style>
<style>
.list-group-item{
	height:50px;
	color:white;
}
</style>

<div class="jumbotron text-center">
<h1>GAME RULES:</h1>

<ol class="list-group">
  <li >As you solve the questions the previous questions are added into your question tab</li>
  <li class="list-group-item list-group-item-default"></li>
  <li class="list-group-item list-group-item-default"></li>
  <li class="list-group-item list-group-item-default"></li>
</ol>
<?php
 	if ($running || $debug)
	{
 		?>
<a href="question.php?qno=0&sum=cfcd208495d565ef66e7dff9f98764da" class="btn btn-success" role="button">Take me to the event</a>
		<?php
 	}
?>
</div>
<?php
}
else  					//if not loggined the page to login
{
	header('location:'.'login_team.php?msg=1');
}

	require 'display/footer.mod.php';	// <footer> for the page

	require 'display/script.mod.php';	// script depending on page requirment
	require 'display/eop.mod.php';		// end of page
?>
