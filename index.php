<?php 
ob_start();
include_once ('site_includes/connect.php');
include_once ('site_includes/functions.php');
$page = "Home";
?>
<!DOCTYPE html>

<html>
<head>
     <title> <?php echo $page; ?> </title>      
     <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"  >
<?php 
include ('site_includes/head.php'); 
?>

</head>
    <body>
        
        
<div class ="maindiv">
<?php include ('site_includes/siteheader.php'); ?>

<img id="dynamicpics"  class="dynamicpic"/>
    

</div>

<?php include ('site_includes/sitefooter.php'); ?>

<h3> End of page</h3>
</body>
<?php
include ('site_includes/jscodes_includer.php'); 
?>


</html>