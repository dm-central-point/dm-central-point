<?php
include ('site_includes/functions.php');
include ('site_includes/connect.php');

if (isset($_POST['submit'])){
    
$username = mysqli_real_escape_string($connect, $_POST['username']);
$pword = mysqli_real_escape_string($connect, md5($_POST['password']));

if(isset($username) && isset($pword) && !empty($username) && !empty($pword)){

$query = "SELECT  `userName`, `passWord`, `user_id`, userLevel FROM `membertable` WHERE `userName` =? AND `passWord`=?";
$stmt = mysqli_prepare($connect, $query);
mysqli_stmt_bind_param($stmt, "ss", $username, $pword);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $dbusername, $dbpword, $dbuserid, $dbuserlevel);

while(mysqli_stmt_fetch($stmt)){
    
if($dbusername === $username AND $dbpword===$pword){

$defaultYearValue = 7;

$update = mysqli_query($connect, "UPDATE `membertable` SET `secChanger`= $defaultYearValue WHERE `user_id` = '$dbuserid'");

$_SESSION['userName'] = $dbusername;
$_SESSION['user_id'] = $dbuserid;
$_SESSION['userLevel']= $dbuserlevel;

header("Location:index.php");

}else{
    
header("Location:loginform.php");
} 

}

}
}
?>