<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');

?>


<?php


    $date = $_POST['formdate'];
    $fname = $_POST['fname'];
    $gender = $_POST['gender'];
    $bday = $_POST['birthday'];
    $country = $_POST['country'];
    $edulevel = $_POST['edulevel'];
    $profession = $_POST['profession'];
    $image_name = strtolower($_FILES['image']['name']);
    $motive1 = $_POST['motive1'];
    $motive2 = $_POST['motive2'];
    $startdate= $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $addition = $_POST['addition'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $status = "Prospective";
    
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_name = strtolower($_FILES['image']['name']);
    $image_type = $_FILES['image']['type'];
    $image_size = $_FILES['image']['size'];
    $extension = substr($image_name, strpos($image_name, ".") + 1);
       	$max_size = 4194304; 
       	

        $location ='../uploads/';
    
    
     if(($extension ==jpg) || ($extension=jpeg) && ($image_type == image/jpeg) || ($image_type == image/jpeg) ){
	 
		 if($image_size <= $max_size){
	        
	  		 move_uploaded_file($_FILES['image']['tmp_name'], $location.$image_name); 
				
    } 
    
       
   } else{
   
   echo "File extension must be JPEG OR JPG";
   }

   
  $insert = "INSERT INTO `volunteertable` ( `Date`, `fullName`, `Gender`, `birthDay`, `Country`, `educationLevel`, 
  	`Profession`,`image`, `motive1`, `motive2`,  `startDate`, `endDate`, `additionalInfo`,`emailAddress`, `mobileNumber`,  `status`) 
   VALUES (
        '".mysqli_real_escape_string($connect, $date)."',
        '".mysqli_real_escape_string($connect, $fname)."',
        '".mysqli_real_escape_string($connect, $gender)."',
        '".mysqli_real_escape_string($connect, $bday)."',
        '".mysqli_real_escape_string($connect, $country)."',
        '".mysqli_real_escape_string($connect, $edulevel)."',
        '".mysqli_real_escape_string($connect, $profession)."',
        '".mysqli_real_escape_string($connect, $image_name)."',
        '".mysqli_real_escape_string($connect, $motive1)."',
        '".mysqli_real_escape_string($connect, $motive2)."',
        '".mysqli_real_escape_string($connect, $startdate)."',
        '".mysqli_real_escape_string($connect, $enddate)."',
        '".mysqli_real_escape_string($connect, $addition)."',
        '".mysqli_real_escape_string($connect, $email)."',
        '".mysqli_real_escape_string($connect, $mobile)."',
        '".mysqli_real_escape_string($connect, $status)."')";

  
$result = mysqli_query($connect, $insert);


if($result){

  	
  	echo '<div class="div1">';
	echo '<br>';
	echo '<h2><strong>Form successfully submitted!<strong></h2><br><br>';
	
	echo '<a href="volunteerform.php">Back to previous Page</a><br>'; 
	 echo "OR<br>";
	echo '<a href="volunteercenter.php" >Back to Volunteer Page</a><br>'; 
	echo '</div>';	
	
 header("refresh:3; url=volunteerform.php");	
	
	
  }else{
  	
  	echo '<div class="div1">';
	echo '<br>';
	echo '<h2><strong>Report not successfully submitted!<strong></h2><br><br>';
	
	echo '<a href="volunteerform.php">Back to previous Page</a><br>'; 
	 echo "OR<br>";

	}
	
   
	

?>