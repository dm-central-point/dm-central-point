<?php
ob_start();
session_start();
include('../../site_includes/function.php');
include('../../site_includes/connect.php');
?>
<head>

</head>



<?php

date_default_timezone_set('Africa/Nairobi');
$lastupdate = date('d/m/Y h:i:s a', time());

if(isset($_POST['submit'])){
    
$yid = mysqli_real_escape_string($connect, $_POST['yearid']);
$mid = mysqli_real_escape_string($connect, $_POST['monthid']);
$date = mysqli_real_escape_string($connect, $_POST['date']);
$fname = mysqli_real_escape_string($connect, $_POST['fname']);
$chname = mysqli_real_escape_string($connect, $_POST['chname']);
$currmonth = mysqli_real_escape_string($connect, $_POST['currmonth']);
$monthpaid = mysqli_real_escape_string($connect, $_POST['monthpaid']);
$curryear = mysqli_real_escape_string($connect, $_POST['curryear']);
$yearpaid = mysqli_real_escape_string($connect, $_POST['yearpaid']);
$amount = mysqli_real_escape_string($connect, $_POST['amount']);
$standing = mysqli_real_escape_string($connect, $_POST['standing']);
$page = mysqli_real_escape_string($connect, $_POST['page']);
$submittedby = @$_SESSION['userName'];

/*
echo $date."<br>";
echo $fname."<br>";
echo $chname."<br>";
echo $currmonth."<br>";
echo $monthpaid."<br>";
echo $curryear."<br>";
echo $yearpaid."<br>";
echo $amount."<br>";
echo $standing."<br>";
echo $yid."<br>";
echo $mid."<br>";
echo $submittedby."<br>";
echo $lastupdate."<br>"; */


echo "<br><br>";

/*`monthId`, `yearId`, `date`, `payerFullName`, `childName`, `currentMonth`, `monthPaidFor`, `currentYear`, `yearPaidFor`, `amountPaid`, `outStanding`, `submittedBy`, `updatedBy`, `lastUpdated` */


if(!empty($mid) & !empty($yid) & !empty($date) & !empty($fname) & !empty($chname) & !empty($currmonth)& !empty($monthpaid)& !empty($curryear)& !empty($yearpaid) & !empty($amount) ){

$insert = mysqli_query($connect, "INSERT INTO `khm_schoolfees_table`(`monthId`, `yearId`, `date`, `payerFullName`, `childName`, `currentMonth`, `monthPaidFor`,
`currentYear`, `yearPaidFor`, `amountPaid`, `outStanding`, `submittedBy`, `updatedBy`, `lastUpdated`)

VALUES ( '$mid', '$yid', '$date','$fname','$chname', '$currmonth','$monthpaid','$curryear','$yearpaid', '$amount','$standing', '$submittedby', '$submittedby',  '$lastupdate')");


if($insert){
    
    header("Refresh: 2; url=/two_dimension1/accountsnewformats/displayfees.php?yid=$yid&mid=$mid&page=$page");
    
    echo "<div class='datamsg'>Expenses sucessfully added!</div>";
    
    
    
}else{
    
    echo "<div class='datamsg'>Expenses not successfully added!<br>";
    echo "<a href='displayfees.php?yid=$yid&mid=$mid&page=$page' class='backlink'>Please go back to the previous page!</a></div>";
}
}else{
    
    echo "<div class='datamsg'>All fields need to be filled!<br>";
    echo "<a href='displayfees.php?yid=$yid&mid=$mid&page=$page' class='backlink'>Please go back to the previous page!</a></div>";
    
}
}
?>