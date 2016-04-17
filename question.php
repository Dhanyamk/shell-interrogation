<?php
	// question.php

	require 'core.php';

	$title = "Questions";
	# loading all display modules
	require 'display/head.mod.php';		// <head> for the page
	require 'display/nav.mod.php';		// navagation bar for the page

	//content of this page
//continue this page iff team is logged in
if (!islogin())
{
	header('location:'.'login_team.php?msg=1');
}
if (!$debug)
{
	if (!$running)
	{
		header('location:'.'lp.php');
	}
}

	$qno=@$_GET['qno'];			// current question no
	$sum=@$_GET['sum'];			// check sum for question no
	$key=@$_POST['key'];		// to get the input from the form

	$checksum=md5($qno);
	$key_not_match=false;    // to check wether key match or not

	if ($debug)
 	{
    	var_dump($qno);
    	var_dump($sum);
  		var_dump($checksum);
			var_dump($key);
  }

if ($sum==$checksum || $debug)
{
	#then get and display the questions
	$ques=new ques;
	$score=new score;
	$ques->get_ques($qno);
	//$ques->get_ques($qno);
	if (isset($key) && !empty($key))
	{
		// if the key is set then manupulate it
		if ($ques->match_key($key))
		{
			$score->correct_submition($teamid);
			$qno=$qno+1;
			$sum=md5($qno);
			header('location:'."?qno=$qno&sum=$sum");
		}
		else
		{
			$score->wrong_submition($teamid);
			$key_not_match=true;
		}
	}

	if ($debug)
	{
		var_dump($key_not_match);
		echo "$n=" ;var_dump($n);
		var_dump(((int)$qno));
	}
?>

<!--<style>
.container-fluid{
    background: #2d2d30;
    color: #bdbdbd;
    padding-bottom: 600px;
	font-size:15px;
}
</style>-->
<link href="display/signin.css" rel="stylesheet">
<div class="container" ><!--Over ride this div design with the use of id if required-->
 	<div class="center-block" style="width:300px;"><h1>SHELL QUERY</h1></div>
  	<div class="jumbotron text-center">
  		<h2>Question <?php echo "$qno";?></h2>
			<h3><?php echo "$ques->title";?></h3>
  		<p><?php echo "$ques->descr";?></p>
  	</div>
  	<div class="center-block" style="width:340px;"><b>Break the barrier to reach the next stage..!!</b>
		</div>
	<br/><br/>
  	<!--<div class="form-group">
  		<label for="comment">Answer:</label>
  		<textarea class="form-control" rows="5" id="answer"></textarea>
	</div>
  	<a href="#" class="btn btn-info" role="button">NEXT</a>
   	<a href="#" class="btn btn-info" role="button">Know your position</a>-->
<?php
		// if the question already solved then don't show the form for submittion of the answer
		if (((int)$qno) < $n)
		{
  		?>
			<div class="center-block" style="width:340px;"><h3>You Nailed it </h3></br></br>
			<a href="<?php $sum=md5($n);echo "question.php?qno=$n&sum=$sum";?>" class="btn btn-info" role="button">Go to latest Question</a>
			</div>
			<?php
  	}
		else
		{
  		//show the form to take the input
?>

		<form class="form-signin" action="<?php echo $current_file."?qno=$qno&sum=$sum"; ?>" method="POST" enctype="multipart/form-data" target="">
        <!--<h2 class="form-signin-heading">Please Login in</h2>-->
        <label for="text" class="sr-only">Key or Flag</label>
        <input type="text" name="key" class="form-control" <?php if($key_not_match){ echo "id=\"inputError1\"";} ?> placeholder="Key or Flag" required autofocus>
        <!-- not required
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>-->
    	<button class="btn btn-info btn-primary btn-block" type="submit">Take me to next Question</button>
	</form>

</div>
<?php
		}
}
else
{
	include 'display/ers.mod.php';
}
?>
<?php
	require 'display/footer.mod.php';	// <footer> for the page

	require 'display/script.mod.php';	// script depending on page requirment
	require 'display/eop.mod.php';		// end of page
?>
