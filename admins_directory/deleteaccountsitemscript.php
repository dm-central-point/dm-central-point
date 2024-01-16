<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
include ('../site_includes/head.php');

?>

<?php
if (isset($_GET['trid']) & isset($_GET['mid']) & isset($_GET['yid']) & isset($_GET['page'])){

$id = $_GET['trid'];
$mid = $_GET['mid'];
$yid = $_GET['yid'];
$page = $_GET['page'];


if(!isset($_GET['Answer'])) {

echo "<br><br<br>";  
echo "<div class='register'>
<br><br>
Are you sure you want to delete that item with id number $id ?<br>

<a href='/adminsAccounts/deleteaccountsitemscript.php?mid=$mid&yid=$yid&trid=$id&page=$page&Answer=NO'>NO</a> &nbsp;&nbsp;<a href='/adminsAccounts/deleteaccountsitemscript.php?mid=$mid&yid=$yid&trid=$id&page=$page&Answer=YES'>YES</a>

</div>";

}



if(isset($_GET['Answer']) & $_GET['Answer']=='YES'){

$id = mysqli_real_escape_string($connect, $_GET['trid']); 


$select = mysqli_query($connect, "SELECT * FROM `overall_accounts` WHERE `transactionId`= '$id'");

if(mysqli_num_rows($select)>0){

$row = mysqli_fetch_assoc($select);

$db_id = $row['transactionId'];
$db_mid = $row['month_id'];
$db_yid = $row['year_id'];
$db_date = $row['transactionDate'];
$db_month = $row['transactionMonth'];
$db_year = $row['transactionYear'];
$db_descr = $row['itemDescription'];
$db_quality = $row['typeQuantity'];
$db_channel = $row['transactionChannel'];
$db_type = $row['transactionType'];
$db_income = $row['incomeAmount'];
$db_expenditure = $row['expenditureAmount'];
$db_recordedby = $row['recordedBy'];
$db_lastupdate = $row['lastUpdate'];
$deletedby = $_SESSION['userName'];

/*
echo $db_id ."<br>";
echo $db_mid ."<br>";
echo $db_yid ."<br>";
echo $db_date ."<br>";
echo $db_month ."<br>";
echo $db_year ."<br>";
echo $db_descr ."<br>";
echo $db_quality ."<br>";
echo $db_channel ."<br>";
echo $db_type ."<br>";
echo $db_income ."<br>";
echo $db_expenditure ."<br>";
echo $db_recordedby ."<br>";
echo $db_lastupdate ."<br>";
echo $deletedby ."<br>";  */


$insert = mysqli_query($connect, "INSERT INTO `overall_accounts_restore`(`transactionId`, `month_id`, `year_id`, `transactionDate`, `transactionMonth`, `transactionYear`, `itemDescription`, 
`typeQuantity`, `transactionChannel`, `transactionType`, `incomeAmount`, `expenditureAmount`, `recordedBy`, `lastUpdate`, `deletedBy`) VALUES 
('$db_id', '$db_mid', '$db_yid', '$db_date', '$db_month', '$db_year', '$db_descr', '$db_quality', '$db_channel', '$db_type', '$db_income', '$db_expenditure', '$db_recordedby','$db_lastupdate', '$deletedby' )");

if($insert){



$query = mysqli_query($connect, "DELETE FROM `overall_accounts` WHERE `transactionId`= '$id'");

if($query){

echo "<br><br<br>";  
echo '<div class="register"><br><br>';

header("refresh:2; url=/adminsAccounts/manageoverallaccounts.php?mid=$mid&yid=$yid&page=$page");

echo 'Successfully deleted an item!<br><br>';

echo '</div>';	


}else{
    
echo "<br><br<br>";  
echo '<div class="register"><br><br>';

echo 'Item not successfully deleted!<br>';

echo '<a href="/adminsAccounts/manageoverallaccounts.php?mid='.$mid.'&yid=$yid&page='.$page.'">Back to previous Page</a><br><br>'; 
echo "</div>";

}

}else{
   
echo "<br><br<br>";     
echo '<div class="register"><br><br>';

echo 'Data backup not successfully achieved!<br>';

echo '<a href="/adminsAccounts/manageoverallaccounts.php?mid='.$mid.'&yid='.$yid.'&page='.$page.'">Back to previous Page</a><br><br>'; 
echo "</div>";  
   
    
}


}

}else if(isset($_GET['Answer']) & $_GET['Answer']=='NO'){

header("refresh:1; url=/adminsAccounts/manageoverallaccounts.php?mid=$mid&yid=$yid&page=$page");    

}
}


?>    