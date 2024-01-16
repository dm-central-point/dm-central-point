<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
is_master();
?>

<!DOCTYPE html>

<html>
<head>
     <title>masterpage</title>    
     <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<?php 
include ('../site_includes/head.php'); 
?>
            

</head>
    <body>
<div class="maindiv">
 
    <?php include ('../site_includes/siteheader.php');?>        
                  
       
         <!-- The main contant goes here -->
                
            	<div class="semidiv3 col-3">
                <div class="semidiv2"><h3>PERSONAL INFO</h3></div>    
        	    <a href="generalaccountfeeder.php" class="linkv">Feed General Accounts</a>
        	    <a href="viewgeneralincome.php" class="linkv">View General Income</a>
        	    <a href="viewgeneralexpenditure.php" class="linkv">View General Expenditure</a>
        	    <a href="viewpersonalincome.php" class="linkv">View Personal Income</a>
        	    <a href="viewpersonalexpenditure.php" class="linkv">View Personal Expenditure</a> 
        	    <a href="../admins_directory/overallaccountspage.php" class="linkv">Manage general Accounts</a>
            	</div>  
            	    
            	 
                 <div class="semidiv3 col-3">
                 <div class="semidiv2"><h3>MANAGE DONORS</h3></div>  
            	 <a href="donorregister.php" class="linkv">Register Donor</a> 
            	 <a href="viewalldonor.php" class="linkv">View all Donors</a>
            	 <a href="" class="linkv">Feed Donation Accounts</a> 
            	 <a href="" class="linkv">View Incoming Donations</a>
            	 <a href="" class="linkv">View Donation Expenditure</a> 
            	 <a href="" class="linkv">View general Accounts</a>
                <!--<a href="" class="linkv">Capacity Building Sponsors</a>
            	 <a href="" class="linkv">Building Projects Sponsors</a> 
            	 <a href="" class="linkv">Women Business Sponsors</a>
            	 <a href="" class="linkv">Capacity Building Sponsors</a> -->	 
            	</div>

                 
            	 <div class="semidiv3 col-3">
                .<div class="semidiv2"><h3>MANAGE MEMBERS</h3></div> 
            	 <a href="manageusers.php" class="linkv">Manage Site-user's info</a>
            	 <a href="../multi_dimension/memberlist.php" class="linkv">List of all site members</a> 
               	 <a href="diaryfeeder.php " class="linkv">Feed Diary</a>
            	 <a href="viewcalenda.php" class="linkv">View Diary</a> 
            	 <a href="todolistfeeder.php" class="linkv">Feed the To-do-list</a>
            	  <a href="viewtodolist.php" class="linkv">View the To-do-list </a>
            	</div>	
             
        </div>
 

 <?php include ('../site_includes/sitefooter.php'); ?>
 
</body>
</html>
