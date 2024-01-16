<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
is_admin();
?>
<html>
    
<head>
        <title>GE Script</title>

    
</head>
</html>


        <?php
        
        $plandate = @$_POST['plandate'];
        $plannedevent = @$_POST['event'];
        $actiondate = @$_POST['actiondate'];
        $month = @$_POST['monthcode'];
        $year = @$_POST['yearcode'];
        $category = @$_POST['categorycode'];
        $priority = @$_POST['prioritycode'];
        $setby = $_SESSION['userName'];



if(isset ($plandate) && isset ($plannedevent) && isset ($actiondate) && isset($month) && isset($year) && isset($category) && isset($priority) && isset($setby)){
if(!empty($plandate) && !empty($plannedevent) && !empty($actiondate) && !empty($month) && !empty($year) && !empty($category) && !empty($priority) && !empty($setby)){

$insert = "INSERT INTO `mydiary`(`planDate`, `plannedActivity`, `actionDate`, `actionMonth`, `actionYear`, `eventCategory`, `priorityLevel`, `setBy`) VALUES (
        '".mysqli_real_escape_string($connect, $plandate)."',
        '".mysqli_real_escape_string($connect, $plannedevent)."',
        '".mysqli_real_escape_string($connect, $actiondate)."',
        '".mysqli_real_escape_string($connect, $month)."',
        '".mysqli_real_escape_string($connect, $year)."',
        '".mysqli_real_escape_string($connect, $category)."',
        '".mysqli_real_escape_string($connect, $priority)."',
        '".mysqli_real_escape_string($connect, $setby)."')";

$result = mysqli_query($connect, $insert);

echo "<br><br>";
if($result){
	echo '<div id="div1">';
	
	echo '<h2><strong>Data successfully inserted!</strong></h2><br><br>';
	
	echo '<a href="generalaccountfeeder.php" >Go back to the previous page form</a><br>'; 
    echo"<br>"; echo "OR<br>";
    echo '<a href="sitemastercentre.php" >Back to Sitemaster Centre</a><br>'; 
	
	echo '</div>'; 
	
  }else{
        echo '<br>';
  	echo '<div class="div1">';


	echo '<h2><strong>Data insertion was unsuccessful!<strong></h2><br><br>';

	echo '<a href="accountsfeeder.php" >Go back to accounts form</a><br>'; 
	echo '</div>';
	}
}else{
	echo "<br>";
	echo '<div class="div1">';
	echo '<br>';
	echo '<h2><strong>All fields need to be filled!<strong></h2><br><br><br>';
	echo '<a href="accountsfeeder.php" >Go back to accounts form</a><br>';
	echo '</div>';
}

}


echo "<br><br>";

?>