<?php
	//login.php
  require 'core.php';
  if (islogin())
  {
    header('location:'.'lp.php');
  }

  $flag=@$_GET['msg'];

	$title = "Login";
	# loading all display modules
	require 'display/head.mod.php';		// <head> for the page
	require 'display/nav.mod.php';		// navagation bar for the page

	//content of this page

  $name=@$_POST['tname'];
  $pwd=@$_POST['tpwd'];
  $flags1=$flags2=NULL;

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
      $pwd=netutralize($pwd,$connection);
      mysqli_close($connection);
      $ateam=new team;
      if($ateam->team_login($name,$pwd))
      {
        header('location:'.'addscore.php');
      }
      else
      {
        $flags1="Wrong combination of Team name and Password";
      }
    }
    else
    {
      $flags2="team details are required";
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
      <form class="form-signin <?php $retvar=(isset($flags1) && !empty($flags1)) ? 'has-error':''; echo "$retvar"?>" action="<?php echo $current_file; ?>" method="POST" enctype="multipart/form-data" target="">
        <h2 class="form-signin-heading">Please Login in</h2>
        <?php  $retvar=(isset($flags1)) ? "$flags1": ""; echo "$retvar";?>
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
        <div class="jumbotron text-center">-Or-</div>
        <a href="login.php" class="btn btn-lg btn-primary btn-block" role="button">Team's Registration</a>
      </form>

    </div> <!-- /container -->
	<?php

	require 'display/footer.mod.php';	// <footer> for the page

	require 'display/script.mod.php';	// script depending on page requirment
	require 'display/eop.mod.php';		// end of page

?>
