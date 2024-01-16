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
            
    <style>
       	body{
	
		background:white;
		}
		
		.maindiv{
		border: 4px sold black; 
		width: 100%; 
		height:auto; 
		background:white; 
		margin: 0 auto; 
		text-align: center; 
		border-radius:0px;
        display:flex;
        flex-direction:row-reverse;
        justify-content:center;
        align-content:center;
        align-items:center;
        flex-flow: row-reverse wrap;
        padding:10px;
		}
		
		.linkv{
		display:block; 
		height:25px; 
		width:250px; 
		background:black; 
		margin-left:20px; 
		color:white; 
		margin-bottom:10px;  
		padding:5px; 
		line-height:20px; 
		font-size:20px;
		text-decoration: none; 
		border-radius:50px;
		}
		
		.semidiv{
		width:300px; 
		height:430px; 
		background:lightgreen; 
		float:left; 
		margin-left:20px; 
		margin-right:20px; 
		margin-top:20px; 
		border-radius:10px; 
		text-align:center;
		}
		
		.semidiv2{
		width:300px; 
		height:60px; 
		background:darkorange; 
		float:left; 
		margin-left:80px; 
		margin-top:20px; 
		border-radius:10px;
		}
		
		
		.voluinfo a{
		display:block;
		background:Bisque;
		text-decoration:none;
		margin:0 auto;
		height:auto;
		line-height:30px;
		color:black;
		width:80%;
		border:1px solid blue;
		border-radius:0px;
		margin-top:10px;
		margin-bottom:10px;
		}
		
		
		
		.voluinfo {
    	font-size:18px;
    	background:lightgreen;
    	height:500px;
    	width:40%;
    	margin: 0 auto;
    	position:relative;
        float:left;
        margin-bottom:10px;
        margin-top:10px;
        border: 1px solid blue;
        border-radius:10px;
        display:flex;
        flex-direction:column;
        align-items:center;
        align-content:center;
        flex-basis: auto;
        padding:10px;
        text-align:center;
	
		}
		
		.voluinfo h3 {
    	background:lightgreen;
    	
		}
			
		.setting{
		background:lightgreen;
		}
      
    </style>

</head>
    <body>
        
        
            <div class="titlewrapper">
                <!-- The titlebar goes here -->   
                <?php 
                include ('../site_includes/titlebar.php');
                ?>
                </div>
                

            <div class="menuwrapper1">
                <!-- The menubar goes here -->
                <?php 
                include ('../site_includes/menubar.php');
                ?>        
            </div>
            
            
            <div class="menuwrapper2">
                <!-- The menubar goes here -->
                <?php 
                include ('../site_includes/menubarmobile.php');
                ?>        
            </div>
    
    
        <div class="mainwrapper">
         <!-- The main contant goes here -->
            <div class="maindiv">
                
          	 <div class='voluinfo col-6'>
	         <div class='voluinfo2'><h3>Volunteers' corner</h3></div>
			 <a href='volunteerform.php'>Fill in the Volunteer form</a>
			 <a href='volunteerlistall.php'>View list of all volunteers</a>
			 <a href='../three_dimension/childrencorner.php'>All About Children </a>
			 <a href='volunteerreportform.php'>Fill Volunteer Report</a>
			 <a href='viewvolunteerreport.php'>View Volunteer Reports</a>
			 <a href='donationfeeder.php'>Record Your Donations here</a>
			 <a href='viewvolunteerdonation.php'>View all Donations</a>
			 <a href='../two_dimension1/profileform.php'>Fill Children's profiles</a>
			 <a href='../three_dimension/childrenprofiles.php'>View Children's profiles</a>
			 <a href='viewwishlist.php'>view KHM Wishlist</a>
			 
			
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
           </div>     
        </div> 
        
        
        <div class="mainwrapper">
            <!-- The foorwe goes here -->
            <?php 
            include ('../site_includes/footer.php');
            ?>        
        
        </div>
 
 
</body>
</html>