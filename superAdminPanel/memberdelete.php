<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
is_admin();
?>

<?php
$id = $_GET['cid'];
$state = $_GET['cstate'];

if($state == 'active'){

mysqli_query($connect, "UPDATE `profiles` SET `clientState`='inactive' WHERE `client_Id`='$id'");
header('Location:profiles.php');

}else if($state == 'inactive'){

mysqli_query($connect, "UPDATE `profiles` SET `clientState`='active' WHERE `client_Id`='$id'");
header('Location:profiles.php');

}

?>