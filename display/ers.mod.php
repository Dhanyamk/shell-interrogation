<?php
	// ers.mod.php     ers==error_smart ;)
if ($running)
{
  // if event running then show the this page
?>

<!--<style>
.container-fluid{
    background: black;
    color: #bdbdbd;
    padding-bottom: 600px;
}
</style>
<style>
.container-fluid{
font-family:'Pacifico',cursive;
}
</style>-->
<div class="container">
  <h1>ERROR PAGE..</h1>
<h3>DON'T BE TOOOO SMART HA!!</h3>

<img src="image/images1.jpeg"/>

<?php
}
else
{
  header('location:'.'score.php');
}
 ?>

</div>
