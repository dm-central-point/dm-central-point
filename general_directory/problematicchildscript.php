<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');

?>



<?php
if(isset($_POST['submit'])){
    $reportdate = $_POST['reportdate'];
    $childname = $_POST['childname'];
    $groupname = $_POST['groupname'];
    $teachername = $_POST['teachername'];
    $problem = $_POST['problem'];
    $howbad = $_POST['howbad'];
    $datediscovered = $_POST['datediscovered'];
    $monthdiscovered = $_POST['monthdiscovered'];
    $yeardiscovered = $_POST['yeardiscovered'];
    $suggestion = $_POST['suggestion'];
    $reported_by = $_SESSION['userName'];

    
   
    if(!empty($reportdate) && !empty($childname) && !empty($groupname) && !empty($teachername) && !empty($problem) && !empty($howbad) && !empty($datediscovered) 
    && !empty($monthdiscovered) && !empty($yeardiscovered) && !empty($suggestion)){
       
   $insert = "INSERT INTO `problematicchildren`(`dateofReport`, `nameofChild`, `groupName`, `nameofTeacher`, `problemDiscovered`, `howSerious`, `dateDiscovered`,
   `monthDiscovered`, `yearDiscovered`, `suggestedSolution`, `reportedBy`) VALUES(
        '".mysqli_real_escape_string($connect, $reportdate)."',
        '".mysqli_real_escape_string($connect, $childname)."',
        '".mysqli_real_escape_string($connect, $groupname)."',
        '".mysqli_real_escape_string($connect, $teachername)."',
        '".mysqli_real_escape_string($connect, $problem)."',
        '".mysqli_real_escape_string($connect, $howbad)."',
        '".mysqli_real_escape_string($connect, $datediscovered)."',
        '".mysqli_real_escape_string($connect, $monthdiscovered)."',
        '".mysqli_real_escape_string($connect, $yeardiscovered)."',
        '".mysqli_real_escape_string($connect, $suggestion)."',
        '".mysqli_real_escape_string($connect, $reported_by)."')";

  
$result = mysqli_query($connect, $insert);


if($result){

  	
  	echo '<div class="div1">';
	echo '<br>';
	echo '<h2><strong>Problem successfully reported!<strong></h2><br><br>';
	
	echo '<a href="donationfeeder.php">Back to previous Page</a><br>'; 
	 echo "OR<br>";
	echo '<a href="volunteercentre.php" >Back to Volunteer Page</a><br>'; 
	echo '</div>';	
	
 header("refresh:3; url=problematicchildform.php");	
	
	
  }else{
  	
  	echo '<div class="div1">';
	echo '<br>';
	echo '<h2><strong>Problem not successfully reported!<strong></h2><br><br>';
	
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
