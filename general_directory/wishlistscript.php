<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
//is_teacher();
include ('../site_includes/titlebar.php');

?>

<?php

if(isset($_POST['submit'])){
    $date = $_POST['formdate'];
    $iname = $_POST['itemname'];
    $idesc = $_POST['idesc'];
    $quantity = $_POST['quantity'];
    $priority = $_POST['priority'];
    $cost = $_POST['cost'];
    $deadline = $_POST['deadline'];
    

    if(isset($date) && isset($iname) && isset($idesc) && isset($quantity) && isset($priority) && isset($cost) && isset($deadline)){
        
   if(!empty($date) && !empty($iname) && !empty($idesc) && !empty($quantity) && !empty($priority) && !empty($cost) && !empty($deadline) ){
     
     $insert = "INSERT INTO `twigavisionwishlist` (`date`, `itemname`, `description`, `quantity`, `priority`, `costinTsh`, `deadLine`) 
     VALUES (
        
        '".mysqli_real_escape_string($connect, $date)."',
        '".mysqli_real_escape_string($connect, $iname)."',
        '".mysqli_real_escape_string($connect, $idesc)."',
        '".mysqli_real_escape_string($connect, $quantity)."',
        '".mysqli_real_escape_string($connect, $priority)."',
        '".mysqli_real_escape_string($connect, $cost)."',
        '".mysqli_real_escape_string($connect, $deadline)."')";

  
$result = mysqli_query($connect, $insert);


if($result){

    echo '<div class="div1">';
	  echo '<br>';
	    echo '<h2><center><strong>Whis list successfully updated!<strong></center></h2><br><br>';
	
		    echo '</div>';

        header("refresh:3; url= feedwishlist.php");
	
  }else{
  	
  	echo '<div class="div1">';
	echo '<br>';
	echo '<h2><strong>Data insertion was unsuccessful!<strong></h2><br><br>';
	
	echo '<a href="attendencefeeder.php">Back to previous Page</a><br>'; 
	 echo "OR<br>";
	echo '<a href="khmcorner.php" >Back to KHM-corner</a><br>'; 
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

}

?>