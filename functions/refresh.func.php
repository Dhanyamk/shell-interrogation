<?php
	// refresh.func.php

	function refresh($sec)
	{
		$page = $_SERVER['PHP_SELF'];

		if (!(isset($sec) && !empty($sec)))
		{
			$sec = "10";
		}

		header("Refresh: $sec; url=$page");
	}
?>
