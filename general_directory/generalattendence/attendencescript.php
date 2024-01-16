<?php
include ('../../site_includes/connect.php');
include ('../../site_includes/functions.php');
include ('../../site_includes/titlebar.php');
include ('../../site_includes/menubar.php');
?>

	<style>
	*{
	margin:0px; 
	background:lightblue;
	}
    .div1{width:600px; 
    height:350px;
   	background:yellow; 
  	margin: 0 auto; 
   	margin-top:100px; 
  	20px;font-size:30; 
   	text-align:center;
   }
   
	#div1{
	width:800px; 
	height:400px; 
	background:yellow; 
	margin: 0 auto; 
	margin-top:100px; 
	20px;font-size:30; 
	text-align:center;
	}
	
	h2{
	text-align: center; 
	margin-top:50px; 
	background:yellow; 
	color: black;
	}
	
	</style>

	</html>


<?php

	$date = $_POST['date'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$group = $_POST['group'];
	$name = $_POST['teachername'];
	$boys = $_POST['boysnum'];
	$girls = $_POST['girlsnum'];                             
	$total = $_POST['total'];
	$sponsored = $_POST['sponsored'];
	$lunchtakers = $_POST['lunchtakers'];
	$comment = $_POST['comment'];
	$mid = $_POST['mid'];
	$yid = $_POST['yid'];
	$recordby = $_SESSION['userName'];   



if(isset($_POST['submit'])){
    		
if(!empty($mid) &&!empty($yid) && !empty($date) && !empty($month) && !empty($year) && !empty($group) && !empty($name) && !empty($boys) && !empty($girls) && !empty($total) && 
!empty($sponsored) && !empty($lunchtakers) && !empty($comment) && !empty($recordby)) {

	$insert = "INSERT INTO `khm_attendence_table` (  `month_id`, `year_id`, `date`, `month`, `year`, `groupName`, `teachersFullName`, `numberBoys`, 
	`numberGirls`, `totalNumber`, `sponsoredChildren`, `lunchTakers`, `teachersComment`, `addedBy`) VALUES (

        '".mysqli_real_escape_string($connect, $mid)."',
        '".mysqli_real_escape_string($connect, $yid)."',
        '".mysqli_real_escape_string($connect, $date)."',
        '".mysqli_real_escape_string($connect, $month)."',
        '".mysqli_real_escape_string($connect, $year)."',
        '".mysqli_real_escape_string($connect, $group)."',
        '".mysqli_real_escape_string($connect, $name)."',
        '".mysqli_real_escape_string($connect, $boys)."',
        '".mysqli_real_escape_string($connect, $girls)."',
        '".mysqli_real_escape_string($connect, $total)."', 
        '".mysqli_real_escape_string($connect, $sponsored)."',
        '".mysqli_real_escape_string($connect, $lunchtakers)."', 
        '".mysqli_real_escape_string($connect, $comment)."',
        '".mysqli_real_escape_string($connect, $recordby)."')";

  
$result = mysqli_query($connect, $insert);

echo "<br><br>";
if($result){
    
    
	       echo '<div class="register">
	       
	       <br><br>';
        	
        	header("Refresh: 2; url=/multi_dimension/generalattendence/displaygeneralattendence.php?yid=$yid&mid=$mid&page=1");
   
        echo'Data successfully inserted!
        	<br>
        	<br>
            
        	</div>'; 
	
  }else{
  
  	echo '<br><br>
  	      <div class="register">
	<br>
	    Data insertion was unsuccessful!
	<br>
	<a href="/multi_dimension/generalattendence/displaygeneralattendence.php?yid=$yid&mid=$mid&page=1">Back to previous Page</a>
	<br><br>
	</div>'; 

	}	
	
 }else{
	echo "<br><br>
	<div class='register'>
	<br>
	All fields need to be filled!
	<br>
	<a href='/multi_dimension/generalattendence/displaygeneralattendence.php?yid=$yid&mid=$mid&page=1'>Back to previous Page</a>
	<br>
	</div>"; 

	}



echo "<br><br>";
}

?>