<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');

?>



<?php
if(isset($_POST['submit'])){
    $date = $_POST['date'];
    $fname = $_POST['fullname'];
    $type = $_POST['type'];
    $desc = $_POST['description'];
    $value = $_POST['value'];
    $value2 = $_POST['valuelocal'];
    $target = $_POST['target'];
    $remark = $_POST['remark'];
    $document = $_POST['document'];
    $post_by = $_SESSION['userName'];
   
    
    
   if(!empty($date) && !empty($fname) && !empty($type) && !empty($desc) && !empty($value) && !empty($value2) && !empty($target) && !empty($remark) && !empty($document)){
       
   $insert = "INSERT INTO `volunteerdonationrecords`(`dateofDonation`, `donorfullName`, `typeofDonation`, `detailsfoDonation`, `estimatedValue`, `estimatedvalueinTsh`, `donorsTarget`, `donorsRemark`, `supportDocument`, `recordBy`) 
   VALUES (
        '".mysqli_real_escape_string($connect, $date)."',
        '".mysqli_real_escape_string($connect, $fname)."',
        '".mysqli_real_escape_string($connect, $type)."',
        '".mysqli_real_escape_string($connect, $desc)."',
        '".mysqli_real_escape_string($connect, $value)."',
        '".mysqli_real_escape_string($connect, $value2)."',
        '".mysqli_real_escape_string($connect, $target)."',
        '".mysqli_real_escape_string($connect, $remark)."',
        '".mysqli_real_escape_string($connect, $document)."',
        '".mysqli_real_escape_string($connect, $post_by)."')";

  
$result = mysqli_query($connect, $insert);


if($result){

  	
  	echo '<div class="div1">';
	echo '<br>';
	echo '<h2><strong>Donations successfully recorded!<strong></h2><br><br>';
	
	echo '<a href="donationfeeder.php">Back to previous Page</a><br>'; 
	 echo "OR<br>";
	echo '<a href="volunteercentre.php" >Back to Volunteer Page</a><br>'; 
	echo '</div>';	
	
 header("refresh:3; url=donationfeeder.php");	
	
	
  }else{
  	
  	echo '<div class="div1">';
	echo '<br>';
	echo '<h2><strong>Donations not successfully recorded!<strong></h2><br><br>';
	
	echo '<a href="donationfeeder.php">Back to previous Page</a><br>'; 
	 echo "OR<br>";
	echo '<a href="volunteercentre.php" >Back to volunteer Page</a><br>'; 
	echo '</div>';
	}
	
   }else{
     echo '<div class="div1">';
	echo '<br>';
	echo '<h2><strong>All fields need to be field<strong></h2><br><br>';
	echo '<a href="volunteerform.php">Please Go Back to previous Page</a><br><br>'; 
	echo '</div>';
       
       
		}
      
	
}

?>