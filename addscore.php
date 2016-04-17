<?php
    // add score card to db
    /*
      this page add the score card to the particular team
    */

    require 'core.php';

    if (!read_db_entry($teamid,'iid','score'))
    {
      $score = new score;
      $score->add_entry_score($teamid);
    }
    // redirect to questions page
    header('location:'.'lp.php');
?>
