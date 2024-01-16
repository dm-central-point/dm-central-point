<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');

?>



<?php

if(isset($_POST['fullname'])){
    $date = $_POST['formdate'];
    $fname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $duration = $_POST['duration'];
    $country = $_POST['country'];
    $overview = $_POST['overview'];
    $challenge = $_POST['challenge'];
    $achievement = $_POST['achievement'];
    $suggestion = $_POST['suggestion'];
    $contact = $_POST['contact'];
    $seeinfo = $_POST['seeinfo'];
    $cdetails = $_POST['contactdetails'];
    $contact = $_POST['contact'];
    $recommend = $_POST['recommend'];
    $like = $_POST['like'];
    $dislike = $_POST['dislike'];
    $sumup = $_POST['sumup'];

   
   $insert = "INSERT INTO `volunteerreport`(`reportDate`, `fullName`, `Gender`, `Country`, `volunteerDuration`, `generalOverview`,`biggestChallenge`, `biggestAchievement`,  
   `suggestedSolution`,  `keepIntouch`, `otherSeeinfo`, `contactDetails`, `recommendation`, `Likes`, `Dislikes`, `sumUp`) 
 
   VALUES (
        '".mysqli_real_escape_string($connect, $date)."',
        '".mysqli_real_escape_string($connect, $fname)."',
        '".mysqli_real_escape_string($connect, $gender)."',
        '".mysqli_real_escape_string($connect, $country)."',
        '".mysqli_real_escape_string($connect, $duration)."',
        '".mysqli_real_escape_string($connect, $overview)."',
        '".mysqli_real_escape_string($connect, $challenge)."',
        '".mysqli_real_escape_string($connect, $achievement)."',
        '".mysqli_real_escape_string($connect, $suggestion)."',
        '".mysqli_real_escape_string($connect, $contact)."',
        '".mysqli_real_escape_string($connect, $seeinfo)."',
        '".mysqli_real_escape_string($connect, $cdetails)."',
        '".mysqli_real_escape_string($connect, $recommend)."',
        '".mysqli_real_escape_string($connect, $like)."',
        '".mysqli_real_escape_string($connect, $dislike)."',
        '".mysqli_real_escape_string($connect, $sumup)."')";

  
$result = mysqli_query($connect, $insert);


if($result){

  	
  	echo '<div class="div1">';
	echo '<br>';
	echo '<h2><strong>Report successfully submitted!<strong></h2><br><br>';
	
	echo '<a href="donationfeeder.php">Back to previous Page</a><br>'; 
	 echo "OR<br>";
	echo '<a href="volunteercentre.php" >Back to Volunteer Page</a><br>'; 
	echo '</div>';	
	
 header("refresh:3; url=volunteerreportform.php");	
	
	
  }else{
  	
  	echo '<div class="div1">';
	echo '<br>';
	echo '<h2><strong>Report not successfully submitted!<strong></h2><br><br>';
	
	echo '<a href="volunteerreportform.php">Back to previous Page</a><br>'; 
	 echo "OR<br>";

	}
	
   
	
}

?>