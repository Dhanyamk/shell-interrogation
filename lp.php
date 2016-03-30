<?php
	// landing page

	$title = "landing page";
	# loading all display modules
	require 'display/head.mod.php';		// <head> for the page
	require 'display/nav.mod.php';		// navagation bar for the page

	//content of this page
	echo "<div class=\"container\">
	  <h1>fluid container</h1>
	  <p>This is some text.</p>
	</div>";

	require 'display/footer.mod.php';	// <footer> for the page

	require 'display/script.mod.php';	// script depending on page requirment
	require 'display/eop.mod.php';		// end of page
?>