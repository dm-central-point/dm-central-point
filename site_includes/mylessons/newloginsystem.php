<?php

if(isset($_POST['login_submit'])){

include ("connect.php");

$userid = $_POST["userloginid"];
$userpwd = $_POST["userpwd"];


if(empty($userid) ||  empty($userpwd)){
header("Location: ../index.php?error=emptyfields");
exit();

}else{

$sql = "SELECT * FROM users WHERE `userName`=? OR `userEmail`=?";

if(!$stmt = mysqli_prepare($connect, $sql)){

header("Location: ../index.php?error=sqlerror");
exit();

}else{
mysqli_stmt_bind_param($stmt, "ss", $userid, $userid);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if($row=mysqli_fetch_assoc($result)){


//$hashedpwd = password_hash($userpwd, PASSWORD_DEFAULT);

$pwdcheck = password_verify($userpwd, $row['userPwd']);
if($pwdcheck==false){

echo $userpwd;

//header("Location: ../index.php?error=wrongpwd");
//exit();

}elseif($pwdcheck==true){

$_SESSION['username'] = $row['userName'];
$_SESSION['userid'] = $row['userId'];

header("Location: ../signup.php?login=success");
exit();

}else{
header("Location: ../signup.php?signup=wrongaccess");
exit();
mysqli_stmt_close($stmt);
mysqli_close($connect);
}
}
}
}
}

