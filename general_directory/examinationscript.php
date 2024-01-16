<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');

?>

   


<?php
if(isset($_POST['submit'])){
    $recorddate = $_POST['recorddate'];
    $childname = $_POST['childname'];
    $group = $_POST['group'];
    $exammonth = $_POST['exammonth'];
    $examyear = $_POST['examyear'];
    $examtype = $_POST['examtype'];
    $dateofexam = $_POST['dateofexam'];
    $totalscore = $_POST['totalscores'];
    $grade = $_POST['grade'];
    $suggestion = $_POST['suggestion'];
    $reported_by = $_SESSION['userName'];
    

    if(!empty($recorddate) && !empty($childname)  && !empty($group) && !empty($exammonth) && !empty($examyear) && !empty($examtype) && !empty($dateofexam) && !empty($totalscore)&& !empty($grade) && !empty($suggestion) && !empty($reported_by)){
       
   $insert = "INSERT INTO `examtable`(`dateOfRecord`, `childFullName`, `groupName`,`monthOfExam`, `yearOfExam`, `examType`, `dateOfExam`, `totalScores`, `gradeAverage`, `teachersComment`, `recordedBy`) 
   
   VALUES(
        '".mysqli_real_escape_string($connect, $recorddate)."',
        '".mysqli_real_escape_string($connect, $childname)."',
        '".mysqli_real_escape_string($connect, $group)."',
        '".mysqli_real_escape_string($connect, $exammonth)."',
        '".mysqli_real_escape_string($connect, $examyear)."',
        '".mysqli_real_escape_string($connect, $examtype)."',
        '".mysqli_real_escape_string($connect, $dateofexam)."',
        '".mysqli_real_escape_string($connect, $totalscore)."',
        '".mysqli_real_escape_string($connect, $grade)."',
        '".mysqli_real_escape_string($connect, $suggestion)."',
        '".mysqli_real_escape_string($connect, $reported_by)."')";

  
$result = mysqli_query($connect, $insert);


if($result){

  	
  	echo '<div class="div1">';
	echo '<br>';
	echo '<h2><strong>Examination result successfully recorded!<strong></h2><br><br>';
	
	echo '<a href="donationfeeder.php">Back to previous Page</a><br>'; 
	 echo "OR<br>";
	echo '<a href="volunteercentre.php" >Back to Volunteer Page</a><br>'; 
	echo '</div>';	
	
 header("refresh:3; url=feedexamresults.php");	
	
	
  }else{
  	
  	echo '<div class="div1">';
	echo '<br>';
	echo '<h2><strong>Examination result not successfully recorded!<strong></h2><br><br>';
	
	echo '<a href="donationfeeder.php">Back to previous Page</a><br>'; 
	 echo "OR<br>";
	echo '<a href="volunteercentre.php" >Back to volunteer Page</a><br>'; 
	echo '</div>';
	}
	
   }else{
     echo '<div class="div1">';
	echo '<br>';
	echo '<h2><strong>All fields need to be field<strong></h2><br><br>';
	echo '<a href="feedproblematicchildform.php">Please Go Back to previous Page</a><br><br>'; 
	echo '</div>';
       
       
		}
      


    
}




?>
