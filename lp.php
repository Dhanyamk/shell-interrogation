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
<h2>About this Game:</h2>

<ol class="list-group">
  <li >The shell games is aimed at <b>absolute beginners.</b></li>
	<li >It will teach the basics needed to use shell practically.</li>
	<li >If you notice something essential is missing or have ideas for new levels, please let us know!</li>
	<li ><h3>Note:<h3></li>
	<li >This game, is organised in levels(users). You start at user 0 and try to “beat” or “finish” it. Finishing a User (i.e. level) results in information on how to start the next user.
	<br />
	<li >The pages "question X" (link is under question tab) on this website is for “user X” contain information on how to start level X from the previous level.</li>
	<li >As you solve the questions the previous questions are added into your question tab</li>
	<br /><br />
	<li >You will encounter many situations in which you have no idea what you are supposed to do.<br /> <h4><b>Don’t panic! Don’t give up!</b></h4> <br />The purpose of this game is for you to learn the basics. Part of learning the basics, is reading a lot of new information.</li>
	<li >There are several things you can try when you are unsure how to continue:</li>
	<br />
  <li >Firstly, if you know a command, but don’t know how to use it, try using the manual (man page) </li>
  <li >Secondly, if there is no man page, the command might be a shell built-in. In that case use the “help X” command. E.g. help cd (only work in few cases)</li>
  <li >Lastly, if you are still stuck, call us we have a hint for you ;)</li>
	<br />
	<li >You’re ready to start! Wait for the Game to start ;)<br /><h4> Good luck!</h4></li>
</ol>
<?php
 	if ($running || $debug)
	{
 		?>
<a href="question.php?qno=0&sum=cfcd208495d565ef66e7dff9f98764da" class="btn btn-success" role="button">Take me to the event</a>
		<?php
 	}
	else
	{
		echo "<p>Seems Game is not started yet Check top right corner for the remining time and notifications.
		<br /> You will get a link here. When the Games starts.<p>";
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
