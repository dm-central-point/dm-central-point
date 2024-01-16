<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
include ('../site_includes/titlebar.php');

?>

<html>
    <style>
        
       *{margin:0;} 
    </style>
</html>

<?php

if(isset($_POST['formdate'])){
    $date = $_POST['formdate'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $period = $_POST['period'];
    $name = $_POST['name'];
    $summary = $_POST['summary'];
    $goal = $_POST['goal'];
    $goalreached = $_POST['goalreached'];
    $notreached = $_POST['notreached'];
    $whynot = $_POST['whynot'];
    $achievement = $_POST['achievement'];
    $challenge = $_POST['challenge'];
    $newgoals = $_POST['newgoals'];
    $strategy = $_POST['strategy'];
    $comment = $_POST['comment'];
    $type = $_POST['type'];
    
   
   $insert = "INSERT INTO `workersreporttable`(`date`, `month`, `year`, `periodcovered`, `reportername`, `reportsummary`, `goalsset`, 
                                                `goalsreached`, `goalsnotreached`, `whygoalsnotreached`, `biggestachievement`, 
                                                `biggestchallenge`, `newgoals`, `strategy`, `comment`,`type`)
 
   VALUES (
        '".mysqli_real_escape_string($connect, $date)."',
        '".mysqli_real_escape_string($connect, $month)."',
        '".mysqli_real_escape_string($connect, $year)."',
        '".mysqli_real_escape_string($connect, $period)."',
        '".mysqli_real_escape_string($connect, $name)."',
        '".mysqli_real_escape_string($connect, $summary)."',
        '".mysqli_real_escape_string($connect, $goal)."',
        '".mysqli_real_escape_string($connect, $goalreached)."',
        '".mysqli_real_escape_string($connect, $notreached)."',
        '".mysqli_real_escape_string($connect, $whynot)."',
        '".mysqli_real_escape_string($connect, $achievement)."',
        '".mysqli_real_escape_string($connect, $challenge)."',
        '".mysqli_real_escape_string($connect, $newgoals)."',
        '".mysqli_real_escape_string($connect, $strategy)."',
        '".mysqli_real_escape_string($connect, $comment)."',
        '".mysqli_real_escape_string($connect, $type)."')";

  
$result = mysqli_query($connect, $insert);


if($result){

  	
  	echo '<div class="div1">';
	echo '<br>';
	echo '<h2><strong>Report successfully submitted!<strong></h2><br><br>';
	
	echo '<a href="activityreportfeeder.ph">Back to previous Page</a><br>'; 

	echo '</div>';	
	
 header("refresh:3; url=activityreportfeeder.php");	
	
	
  }else{
  	
  	echo '<div class="div1">';
	echo '<br>';
	echo '<h2><strong>Report not successfully submitted!<strong></h2><br><br>';
	
	echo '<a href="activityreportfeeder.php">Back to previous Page</a><br>'; 
	 echo "OR<br>";

	}
	
   
	
}

?>