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
        
        $day = @$_POST['date'];
        $month = @$_POST['month'];
        $year = @$_POST['year'];
        $description = @$_POST['description'];
        $channel = @$_POST['channel'];
        $type = @$_POST['type'];
        $quantity = @$_POST['quantity'];
        $code = @$_POST['code'];
        $amount = @$_POST['amount'];
        $recordedby = $_SESSION['userName'];



if(isset ($day) && isset ($month) && isset ($year) && isset($channel) && isset($description)  && isset($type) && isset($quantity) && isset($code) && isset($amount) && isset($recordedby)){
if(!empty($day) && !empty($month) && !empty($year) && !empty($channel) && !empty($description)  && !empty($type) && !empty($quantity) && !empty($code) && !empty($amount) && !empty($recordedby)){

$insert = "INSERT INTO generalexpenditure ( Date, Month, Year,expenditureChannel, itemDescription,  itemType, Quantity, expenditureCode, Amount, recordBy) VALUES (
        '".mysqli_real_escape_string($connect, $day)."',
        '".mysqli_real_escape_string($connect, $month)."',
        '".mysqli_real_escape_string($connect, $year)."',
        '".mysqli_real_escape_string($connect, $channel)."',  
        '".mysqli_real_escape_string($connect, $description)."',
        '".mysqli_real_escape_string($connect, $type)."',
        '".mysqli_real_escape_string($connect, $quantity)."',
        '".mysqli_real_escape_string($connect, $code)."',
        '".mysqli_real_escape_string($connect, $amount)."',
        '".mysqli_real_escape_string($connect, $recordedby)."')";

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