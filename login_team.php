<?php
	//login.php
  require 'core.php';

  $flag=@$_GET['msg'];

	$title = "Login";
	# loading all display modules
	require 'display/head.mod.php';		// <head> for the page
	require 'display/nav.mod.php';		// navagation bar for the page

	//content of this page

  $name=@$_POST['tname'];
  $pwd=@$_POST['tpwd'];

  if ($debug) 
  {
    var_dump($name);
    var_dump($pwd);
  }

  if (isset($name) && isset($pwd)) 
  {
    if (!empty($name) && !empty($pwd)) 
    {
      include 'dbms/dbms_imp.php';
      $name=netutralize($name,$connection);
      mysqli_close($connection);
      $ateam=new team;
      if($ateam->team_login($name,$pwd))
      {
        header('location:'.'lp.php');
      }
      else
      {
        echo "team details are wrong";
      }
    } 
    else 
    {
      echo "team details are required";
    }
  }

	?>
	<link href="display/signin.css" rel="stylesheet">
	
	<div class="container">

      <div class="jumbotron text-center">
        <?php
          if ($flag==1)
          {
            echo "<h2>Please Login to Continue</h2>";
          } 
          elseif ($flag==2) 
          {
            
          }
        ?>
      </div>
      <form class="form-signin" action="<?php echo $current_file; ?>" method="POST" enctype="multipart/form-data" target="">
        <h2 class="form-signin-heading">Please Login in</h2>
        <label for="inputEmail" class="sr-only">Team Name</label>
        <input type="name" id="name" class="form-control" name="tname" placeholder="Team Name" required autofocus>
        <label for="inputPassword" class="sr-only">Team Password</label>
        <input type="password" id="inputPassword" class="form-control" name="tpwd" placeholder="Team Password" required>
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