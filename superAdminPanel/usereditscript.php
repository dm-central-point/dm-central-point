<?php
ob_start();
include('../site_includes/functions.php');
include ('../site_includes/connect.php');
include ('../site_includes/head.php');
?>

<head>

</head>



<?php
if(isset($_POST['submit'])){
    
        $fname = mysqli_real_escape_string($connect, $_POST['fullname']);
        $username = mysqli_real_escape_string($connect, $_POST['username']);
        $userlevel =  mysqli_real_escape_string($connect, $_POST['userlevel']);
        $uid =  mysqli_real_escape_string($connect, $_POST['userid']);
        

       


 $load = "UPDATE `membertable` SET `fullName`='$fname',`userName`='$username',`userLevel`= '$userlevel' WHERE `user_id`= $uid";
 
 

$result = mysqli_query($connect, $load);

if($result){

header("Refresh: 2; url=/superAdminPanel/manageusers.php?");
echo "<div class='datamsg'><br>Successfully changed user info<br></div>";

}else{
    
    echo "<div class='datamsg'>Failed to change user info</div>";
}

}
?>
