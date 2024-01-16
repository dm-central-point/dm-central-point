<?php
session_start();

include('site_includes/connect.php');

mysqli_query($connect, "DELETE FROM online_users WHERE username = '".$_SESSION['userName']."'");

session_destroy();

header('Location:loginform.php');


?>