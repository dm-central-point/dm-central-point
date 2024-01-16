<?php
ob_start();
include('../site_includes/functions.php');
include('../site_includes/connect.php');
include ('../site_includes/head.php'); 
?>
<head>

    
</head>



<?php

date_default_timezone_set('Africa/Nairobi');
$lastupdate = date('d/m/Y h:i:s a', time());

if(isset($_POST['submit'])){
    
    

$date = mysqli_real_escape_string($connect, $_POST['date']);
$month = mysqli_real_escape_string($connect, $_POST['month']);
$year = mysqli_real_escape_string($connect, $_POST['year']);
$descr = mysqli_real_escape_string($connect, $_POST['description']);
$type = mysqli_real_escape_string($connect, $_POST['type']);
$income = mysqli_real_escape_string($connect, $_POST['income']);
$expenditure = mysqli_real_escape_string($connect, $_POST['expenditure']);
$yid = mysqli_real_escape_string($connect, $_POST['yearid']);
$mid = mysqli_real_escape_string($connect, $_POST['monthid']);
$postedby = $_SESSION['userName'];


    /*
    echo $date."<br>";
    echo $month."<br>";
    echo $year."<br>";
    echo $descr."<br>";
    echo $type."<br>";
    echo $income."<br>";
    echo $expenditure."<br>";
    echo $yid."<br>";
    echo $mid."<br>";
    echo $postedby."<br>"; 
    echo $lastupdate;  
    
    */
    
echo "<br><br>";

if(!empty($date) & !empty($month)& !empty($year) & !empty($descr) & !empty($type) & !empty($type)){

$insert = mysqli_query($connect, "INSERT INTO `overall_accounts`( `month_id`, `year_id`, `transactionDate`, `transactionMonth`, `transactionYear`, 
`itemDescription`, `transactionType`, `incomeAmount`, `expenditureAmount`, `recordedBy`, `lastUpdate`, `updatedBy`) 

VALUES ( '$mid', '$yid', '$date', '$month','$year', '$descr', '$type', '$income' ,'$expenditure', '$postedby','$lastupdate', '$postedby')");


if($insert){
    
    header("Refresh: 2; url=displaygeneralaccounts.php?yid=$yid&mid=$mid&page=1");
    
    echo "<div class='datamsg'>Accounts sucessfully submitted!</div>";
    
    
    
}else{
    
    echo "<div class='datamsg'>Accounts not successfully submitted!<br>";
    echo "<a href='/family_directory/familyaccounts/displayfamilyaccounts.php?yid=$yid&mid=$mid&page=1' class='backlink'>Please go back to the previous page!</a></div>";
}
}else{
    
    echo "<div class='datamsg'>All fields need to be filled!<br>";
    echo "<a href='/generalAccounts/displaygeneralaccounts.php?yid=$yid&mid=$mid&page=1' class='backlink'>Please go back to the previous page!</a></div>";
    
}
}
?>