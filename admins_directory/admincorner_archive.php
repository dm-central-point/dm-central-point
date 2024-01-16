<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
//is_volunteer();
?>
<!DOCTYPE html>

<html>
<head>
   <title>Volunteer-page</title>  
   <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<?php 
include ('../site_includes/head.php'); 
?>
            

</head>
    <body>
          <div class="maindiv">
        
    
                
             <?php 
             include ('../site_includes/siteheader.php');
             ?>
               
          	 <div class='voluinfo col-6'>
	         <div class='voluinfo2'><h3>Admin's Corner</h3></div>
			 <a href='volunteerform.php'>Fill in the Volunteer form</a>
			 <a href='volunteerlistall.php'>View list of all volunteers</a>
			 <a href='../three_dimension/childrencorner.php'>All About Children </a>
			 <a href='donationfeeder.php'>Record Your Donations here</a>
			 <a href='../two_dimension1/profileform.php'>Fill Children's profiles</a>
			 <a href='../two_dimension1/profilemanagement.php'>Manage Children's profiles</a>
			 <a href='/two_dimension1/profilemanagement.php'>Manage Children's updates</a>
			 <a href=''>Feed Wishlist</a>
			 <a href=''>view Wishlist</a>
			 <a href=''>Feed to_do_list</a>
			 <a href=''>view to_do_list</a>
			 <a href=''>Feed Calenda</a>
			 <a href=''>view Calenda</a>
			 
			 </div>
		
	<!--
			 <div class='voluinfo col-9'>
			 <div class='voluinfo2'><h3>About Twiga Vision</h3></div>
			 <a href=''>All About Youths</a>
			 <a href=''>All About Women</a>
			 <a href='viewstaffmembers.php'>View Current Staff members</a>
			 <a href='viewvolunteerreport.php'>View Volunteer Reports</a>
			 <a href='memberlist.php'>View list of all site members</a>
			 <a href='viewwishlist.php'>view KHM Wishlist</a>
			 <a href='volunteerreportform.php'>Fill Volunteer Report</a>
			 <a href=''>View list of all current volunteers</a>
			 <a href=''>View list of all former volunteers</a>
			 <a href='viewvolunteerreport.php'>View Volunteer Reports</a>
			 <a href='donationfeeder.php'>Record Your Donations here</a>
			 <a href='viewvolunteerdonation.php'>View all Donations</a>
		    </div>  
    -->
               
            <?php 
            include ('../site_includes/footer.php');
            ?>        
        
    
 
   </div> 
</body>
</html>