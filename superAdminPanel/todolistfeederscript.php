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
        
        $itemlisteddate = @$_POST['datelisted'];
        $activity = @$_POST['activity'];
        $deadline = @$_POST['deadline'];
        $priority = @$_POST['priority'];
        $belonging = @$_POST['activitybelonging'];
        $responsible = @$_POST['responsible'];
        $listedby = $_SESSION['userName'];


echo $itemlisteddate.'<br>';
echo $activity.'<br>';
echo $deadline.'<br>';
echo $priority.'<br>';
echo $belonging.'<br>';
echo $responsible.'<br>';
echo $listedby.'<br>';



if(isset ($itemlisteddate) && isset($activity) && isset($deadline) && isset($priority) && isset($belonging) && isset($responsible) && isset($listedby)){
if(!empty($itemlisteddate) && !empty($activity) && !empty($deadline) && !empty($priority) && !empty($belonging) && !empty($responsible) && !empty($listedby)){

$insert = "INSERT INTO `mytodolist`(`datelisted`, `activityname`, `deadline`, `prioritylevel`, `activitybelonging`, `responsible`, `postedby`) VALUES (
        '".mysqli_real_escape_string($connect, $itemlisteddate)."',
        '".mysqli_real_escape_string($connect, $activity)."',
        '".mysqli_real_escape_string($connect, $deadline)."',
        '".mysqli_real_escape_string($connect, $priority)."',
        '".mysqli_real_escape_string($connect, $belonging)."',
        '".mysqli_real_escape_string($connect, $responsible)."',
        '".mysqli_real_escape_string($connect, $listedby)."')";

$result = mysqli_query($connect, $insert);

echo "<br><br>";
if($result){
	echo '<div id="div1">';
	
	echo '<h2><strong>Item successfully listed</strong></h2><br><br>';
	
	echo '<a href="generalaccountfeeder.php" >Go back to the previous page form</a><br>'; 
    echo"<br>"; echo "OR<br>";
    echo '<a href="sitemastercentre.php" >Back to Sitemaster Centre</a><br>'; 
	
	echo '</div>'; 
	
  }else{
        echo '<br>';
  	echo '<div class="div1">';


	echo '<h2><strong>Item listing was unsuccessful!<strong></h2><br><br>';

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