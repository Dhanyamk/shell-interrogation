<?php
	//login.php
  require 'core.php';

	$title = "Login";
	# loading all display modules
	require 'display/head.mod.php';		// <head> for the page
	require 'display/nav.mod.php';		// navagation bar for the page

	//content of this page

	?>
	<link href="display/signin.css" rel="stylesheet">
	
	<div class="jumbotron text-center">
   <h1>SHELL QUERY</h1>

   <img src="image/images.png" class="img-rounded" width="250" height="236">

  <p>TEST YOUR KNOWLEDGE HERE!!</p>
  <p class="bg-failure">Welcome to SHELL-INTERROGATION</p>
<p>Enter your team member's infomation in these forms provided below</p>
  <form class="form-inline" role="form" id="usn2">
  <div class="form-group">
    <label for="USN">USN:</label>
    <input type="name" class="form-control" id="USN" value="USN">
  </div>
  <div class="form-group" id="usn1">
    <label for="USN">USN:</label>
    <input type="name" class="form-control" id="USN" value="USN">
  </div>
</form><br/>

<form class="form-inline" role="form">
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" value="password">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" value="password">
  </div><br/><br/>
<div class="form-group">
<p>Enter your team name!!</p>
    <input type="name" class="form-control" id="name" value="TEAM NAME">
  </div><br/><br/>
  <a href="#" type="submit" class="btn btn-danger">LOGIN</a>
</form>
</div>
	<?php

	require 'display/footer.mod.php';	// <footer> for the page

	require 'display/script.mod.php';	// script depending on page requirment
	require 'display/eop.mod.php';		// end of page

?>