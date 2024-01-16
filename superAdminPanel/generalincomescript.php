<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
is_admin();

?>
<html>


</html>


        <?php
        
        $day = @$_POST['date'];
        $month = @$_POST['month'];
        $year = @$_POST['year'];
        $source = @$_POST['source'];
        $purpose = @$_POST['purpose'];
        $type = @$_POST['type'];
        $code = @$_POST['code'];
        $amount = @$_POST['amount'];
        $recordedby = $_SESSION['userName'];



if(isset ($day) && isset ($month) && isset ($year) && isset($source) && isset($purpose) && isset($type) && isset($code)    && isset($amount) && isset($recordedby)){
if(!empty($day) && !empty($month) && !empty($year) && !empty($source) && !empty($purpose) && !empty($type) && !empty($code) && !empty($amount) && !empty($recordedby)){

$insert = "INSERT INTO generalincome ( Date, Month, Year, incomeSource, incomePurpose, incomeType, incomeCode, Amount, recordBy) VALUES (
        '".mysqli_real_escape_string($connect, $day)."',
        '".mysqli_real_escape_string($connect, $month)."',
        '".mysqli_real_escape_string($connect, $year)."',
        '".mysqli_real_escape_string($connect, $source)."',
        '".mysqli_real_escape_string($connect, $purpose)."',
        '".mysqli_real_escape_string($connect, $type)."',
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