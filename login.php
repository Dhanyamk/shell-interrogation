<?php
	//login.php
  require 'core.php';

	$title = "Login";
	# loading all display modules
	require 'display/head.mod.php';		// <head> for the page
	require 'display/nav.mod.php';		// navagation bar for the page

	//content of this page

  //loginform data processing
  $usn1=@$_POST['usn1'];
  $pwd1=@$_POST['pwd1'];
  $usn2=@$_POST['usn2'];
  $pwd2=@$_POST['pwd2'];
  $tname=@$_POST['tname'];
  $tpwd=@$_POST['tpwd'];

  $user1=false;
  $user2=false;
  $uid1=0;
  $uid2=0;

  if ($debug) 
  {
    var_dump($usn1);
    var_dump($pwd1);
    var_dump($usn2);
    var_dump($pwd2);
    var_dump($tname);
    var_dump($tpwd);
  }

  if (isset($usn1) && isset($pwd1)) 
  {
    if (!empty($usn1) && !empty($pwd1)) 
    {
      include 'dbms/dbms_imp.php';
      $usn1=netutralize($usn1,$connection);
      mysqli_close($connection);
      $login_user1= new login;
      $user1=$login_user1->get_user($usn1,$pwd1);
      $uid1=$login_user1->get_userid($usn1);
    } 
    else 
    {
      echo "Player 1 details are required";
    }
  }

  if (isset($usn2) && isset($pwd2)) 
  {
    if (!empty($usn2) && !empty($pwd2)) 
    {
      include 'dbms/dbms_imp.php';
      $usn2=netutralize($usn2,$connection);
      mysqli_close($connection);
      $login_user2= new login;
      $user2=$login_user2->get_user($usn2,$pwd2);
      $uid2=$login_user2->get_userid($usn2);
    } 
    else 
    {
      echo "Player 2 details are required";
    }
  }

  if ($user1 && $user2) 
  {
    include 'dbms/dbms_imp.php';
    $tname=netutralize($tname,$connection);
    mysqli_close($connection);
    $team= new team;
    $sucess=$team->add_team($tname,$tpwd,$uid1,$uid2);
    if ($sucess) 
    {
      header('location:'.'login_team.php?msg=1');
    }
  }

	?>
	<link href="display/signin.css" rel="stylesheet">
	
	<div class="jumbotron text-center">
   <h1>SHELL QUERY</h1>

   <img src="image/images.png" class="img-rounded" width="250" height="236">

  <p>TEST YOUR KNOWLEDGE HERE!!</p>
  <p class="bg-failure">Welcome to SHELL-INTERROGATION</p>
  <p>Enter your team member's infomation in the forms provided below</p>
  <form class="form-signin" action="<?php echo $current_file; ?>" method="POST" enctype="multipart/form-data" target="">
    <h2 class="form-signin-heading">Player 1:</h2>
    <div class="form-group">
      <label for="USN" class="sr-only">Player 1 USN:</label>
      <input type="name" id="usn1" name="usn1" class="form-control" placeholder="Player 1 USN" required autofocus>
      <label for="inputPassword" class="sr-only">Player 1 Password:</label>
      <input type="password" class="form-control" id="pwd1" name="pwd1" placeholder="Player 1 Password" required>
    </div>
    <h2 class="form-signin-heading">Player 2:</h2>
    <div class="form-group" >
      <label for="USN" class="sr-only">Player 2 USN:</label>
      <input type="text" id="usn2" name="usn2" class="form-control" placeholder="Player 2 USN" required autofocus>
      <label for="inputPassword" class="sr-only">Player 2 Password:</label>
      <input type="password" class="form-control" id="pwd2" name="pwd2" placeholder="Player 2 Password" required>
    </div>
    <br/><br/>
    <div class="form-group">
      <h2 class="form-signin-heading">Team Details:</h2>
      <p>Set your team name and password</p>
      <label for="USN" class="sr-only">Team Name</label>
      <input type="name" class="form-control" id="name" name="tname" placeholder="Team Name" required autofocus>
      <label for="inputPassword" class="sr-only">Team Password</label>
      <input type="password" class="form-control" id="pwd2" name="tpwd" placeholder="Team Password" required>
    </div>
    <br/><br/>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Team Signup</button>
  </form>
</div>
	<?php

	require 'display/footer.mod.php';	// <footer> for the page

	require 'display/script.mod.php';	// script depending on page requirment
	require 'display/eop.mod.php';		// end of page

?>