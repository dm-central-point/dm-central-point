<?php 
ob_start();
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
include ('../site_includes/accountsfunctions.php');
is_loggedin();
?>
<!DOCTYPE html>

<html>
<head>
    <title>Accounts Page</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
            
<?php 
include ('../site_includes/head.php'); 
?>
            

</head>
    <body>
    

        <div class="maindiv">
          
<?php include ('../site_includes/siteheader.php'); ?>
        
        
<?php 
$user_id = $_SESSION['user_id']; 
//echo $user_id;
?>

        <div class='yearwrapper'>
            <div class='yearheader'>
            <div class='inneryearheader'><a href='decreaseyearnumber.php?id=<?php echo $user_id; ?>' > <<  Previous </a>
            <a href='maintainyearnumber.php?id=<?php echo $user_id; ?>'> | CurrentYear | </a> <a href='increaseyearnumber.php?id=<?php echo $user_id; ?>' >Next >></a>
            </div>
            </div>
                
            <div class='generalbox'>
           <?php
            dispGeneralAccounts();
            ?>
            </div>
                
        </div>  
            
   
         <div class="linkwrapper">
       
        <a id='backlink' href='../index.php'>Go back to the index page</a>
        
              
        </div>
        
    </div>   

    <?php include ('../site_includes/sitefooter.php'); ?>
 
</body>
</html>