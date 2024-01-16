<?php 
include ('../../site_includes/connect.php');
include ('../../site_includes/functions.php');
include ('../../site_includes/accountsfunctions.php');
is_loggedin();
?>
<!DOCTYPE html>

<html>
<head>
    <title>Family-Accounts_Page</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
            
<?php 
include ('../../site_includes/head.php'); 
?>
            

</head>
    <body>
    
       
    
        <div class="titlewrapper">
         <!-- The titlebar goes here -->   
            <?php 
            include ('../../site_includes/titlebar2.php');
            ?>
         </div>

        <div class="menuwrapper2">
                <!-- The menubar goes here -->
            <?php 
            include ('../../site_includes/menubarmobile.php');
            ?> 
        </div>
      
     

        <div class="maindivtop">
            
            <div class='accountsperyears'>
                <div class='yearwrapper'>
                <div class='yearheader'><div class='inneryearheader'><a href='decreaseyearnumber.php?id=1' id=''> <<  Previous </a> 
                <a href='maintainyearnumber.php?id=1' id=''>Current || Year</a> <a href='increaseyearnumber.php?id=1' id=''>Next >></a></div></div>
                    <div class='generalbox'>
                   
                    <?php
                   
                    dispFamilyAccounts();
                    
                    ?>
                
                    </div>
            

                    
                    
            </div>  
            
          </div> 
    </div>
         <div class="linkwrapper">
       
        <a id='backlink' href='../../index.php'>Go back to the index page</a>
        
              
        </div>
                <?php 
                include ('../../site_includes/footermobile2.php');
                ?>
   


 
</body>
</html>