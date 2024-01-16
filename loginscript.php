<?php
include ('site_includes/functions.php');
include ('site_includes/connect.php');


$_SESSION['user_id'] = $user_id;
$username = mysqli_real_escape_string($connect, $_POST['username']);
$pword = mysqli_real_escape_string($connect, md5($_POST['password']));

echo $username."<br>";
echo $pword."<br>";



if (isset($username ) && isset($pword)){

if (!empty($username) && !empty($pword)){

$query = "SELECT * FROM `membertable` WHERE `userName` = '$username' AND `passWord` = '$pword'";

$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result)>0){

$result2 = mysqli_fetch_array($result);

$user_id = $result2['user_id'];
$username = $result2['userName'];
$userlevel = $result2['userLevel'];
$_SESSION['user_id'] = $user_id;
$_SESSION['userLevel']= $userlevel;
$_SESSION['userName']= $username;

$defaultYearValue = 7;

$update = mysqli_query($connect, "UPDATE `membertable` SET `secChanger`= $defaultYearValue WHERE `user_id` = '$user_id'");

if($update){

header("Location:index.php");

}


	
}else{
header('Location:loginform.php');
exit();
}

}else{
echo "<br>All fields need to be filled!<br>";
echo "<a href='index.php'>Go back to the index page</a>";
}

}else{
header ("Location:index.php");
exit();
}

ob_end_clean();
?>