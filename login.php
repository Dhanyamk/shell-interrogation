<?php
	//login.php

	$title = "Login";
	# loading all display modules
	require 'display/head.mod.php';		// <head> for the page
	require 'display/nav.mod.php';		// navagation bar for the page

	//content of this page

	?>

	<link href="display/signin.css" rel="stylesheet">
	
	<div class="container">

      <form class="form-signin">
        <h2 class="form-signin-heading">Please Login in</h2>
        <label for="inputEmail" class="sr-only">USN</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="USN" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <!-- not required
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>-->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login in</button>
      </form>

    </div> <!-- /container -->
	<?php

	require 'display/footer.mod.php';	// <footer> for the page

	require 'display/script.mod.php';	// script depending on page requirment
	require 'display/eop.mod.php';		// end of page

?>