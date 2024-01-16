<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
is_master();
?>

<?php
$id = $_GET['cid'];
$userstatus = $_GET['ustatus'];

if($userstatus == 'active'){

mysqli_query($connect, "UPDATE `usertable` SET `userStatus`='inactive' WHERE `user_id`='$id'");
header('Location:managemembers.php');

}else if($userstatus == 'inactive'){

mysqli_query($connect, "UPDATE `usertable` SET `userStatus`='active' WHERE `user_id`='$id'");
header('Location:managemembers.php');

}

?>