<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');

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
                  

                   
             <div class='semidiv3 col-3'>
             <div class='semidiv2'><h3>ACCOUNTS</h3></div><br>
             <a href='volunteerform.php' class="linkv">Fill in the Volunteer form</a>
             <a href='volunteerlistall.php' class="linkv">View list of all volunteers</a>
             <a href='../three_dimension/childrencorner.php' class="linkv">All About Children </a>
             <a href='donationfeeder.php' class="linkv">Record Your Donations here</a>
             <a href='../two_dimension1/profileform.php' class="linkv">Fill Children's profiles</a>
             <a href='../two_dimension1/profilemanagement.php' class="linkv">Manage Children's profiles</a>
             <!--<a href='/two_dimension1/profilemanagement.php' class="linkv">Manage Children's updates</a>-->
            

            </div>

			 <div class='semidiv3 col-3'>
             <div class='semidiv2'><h3>GENERAL INFO</h3></div><br>
             <a href='' class="linkv">Feed Wishlist</a>
             <a href='' class="linkv">view Wishlist</a>
             <a href='' class="linkv">Feed to_do_list</a>
             <a href='' class="linkv">view to_do_list</a>
             <a href='' class="linkv">Feed Calenda</a>
             <a href='' class="linkv">view Calenda</a>
             
             </div>
        
    
			 <div class='semidiv3 col-3'>
             <div class='semidiv2'><h3>LISTS</h3></div><br>
             <a href='' class="linkv">All About Youths</a>
             <a href='' class="linkv">All About Women</a>
             <a href='' class="linkv">View Current Staff members</a>
             <a href='' class="linkv">View Volunteer Reports</a>
             <a href='' class="linkv">View list of all site members</a>
             <a href='' class="linkv">view KHM Wishlist</a>
 
            
            </div>  

        </div>
    <?php include ('../site_includes/sitefooter.php'); ?>
 
</body>
</html>
