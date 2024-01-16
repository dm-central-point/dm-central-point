<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
is_admin();
?>

<?php
$id = $_GET['cid'];
$userlevel = $_GET['ulevel'];

if($userlevel == 8){
mysqli_query($connect, "UPDATE `usertable` SET `userLevel`= 7 WHERE `user_id`='$id'");
header('Location:managemembers.php');

}else if($userlevel == 7){
mysqli_query($connect, "UPDATE `usertable` SET `userLevel`= 6 WHERE `user_id`='$id'");
header('Location:managemembers.php');

}else if($userlevel == 6){
mysqli_query($connect, "UPDATE `usertable` SET `userLevel`= 5 WHERE `user_id`='$id'");
header('Location:managemembers.php');

}else if($userlevel == 5){
mysqli_query($connect, "UPDATE `usertable` SET `userLevel`= 4 WHERE `user_id`='$id'");
header('Location:managemembers.php');

}else if($userlevel == 4){

mysqli_query($connect, "UPDATE `usertable` SET `userLevel`= 3 WHERE `user_id`='$id'");
header('Location:managemembers.php');

    
}else if($userlevel == 3){

mysqli_query($connect, "UPDATE `usertable` SET `userLevel`= 2 WHERE `user_id`='$id'");
header('Location:managemembers.php');
    
}

else if($userlevel == 2){

mysqli_query($connect, "UPDATE `usertable` SET `userLevel`= 8 WHERE `user_id`='$id'");
header('Location:managemembers.php');
    
}

?>