<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
//is_teacher();
include ('../site_includes/titlebar.php');
include ('../site_includes/menubar.php');
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
	$recordby = $_SESSION['userName'];   



if(isset($_POST['submit'])){
    		
if(!empty($date) && !empty($month) && !empty($year) && !empty($group) && !empty($name) && !empty($boys) && !empty($girls) && !empty($total) && 
!empty($sponsored) && !empty($lunchtakers) && !empty($comment) && !empty($recordby)) {

	$insert = "INSERT INTO `khmattendance`( `Date`, `Month`, `Year`, `Groupname`, `Teachersfullname`, `Numberofboys`, 
	`Numberofgirls`, `Totalnumber`, `Sponsoredchildren`, `Lunchtakers`, `Teacherscomment`, `Addedby`) VALUES (

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
	echo '<div class="div1">';
	echo '<br>';
	
	echo '<h2><strong>Data successfully inserted!</strong></h2><br><br>';
	
	echo '<a href="attendencefeeder.php">Back to previous Page</a><br>'; 
echo"<br>"; echo "OR<br>";
echo '<a href="khmcorner.php" >Back to KHM-corner</a><br>'; 
	
	echo '</div>'; 
	
  }else{
  	echo "<br><br>";
  	echo '<div class="div1">';
	echo '<br>';
	echo '<h2><strong>Data insertion was unsuccessful!<strong></h2><br><br>';
	
	echo '<a href="attendencefeeder.php">Back to previous Page</a><br>'; 
	 echo "OR<br>";
	echo '<a href="khmcorner.php" >Back to KHM-corner</a><br>'; 
	echo '</div>';
	}	
	
 }else{
	echo "<br><br>";
	echo '<div class="div1">';
	echo '<br>';
	echo '<h2><strong>All fields need to be filled!<strong></h2><br><br>';
	echo '<a href="attendencefeeder.php">Back to previous Page</a><br>'; 
	 echo "OR<br>";
	echo '<a href="khmcorner.php" >Back to KHM-corner</a><br>'; 
	echo '</div>';
	}



echo "<br><br>";
}

?>