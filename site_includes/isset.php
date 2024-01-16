<?php

header('Access-Control-Allow-Origin: *');
ob_start();
include ('connect.php');
include ('functions.php');
include ('head.php');

?>

<html>
    
<head>									
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

		
	
	<style>
        .isset{

		    width:100%; 
		    height:50px; 
		    background:tan; 
		    text-align:center; 
		    border-top:1px solid black;
		    border-bottom:1px solid black;
		    padding:5px;
		   
		   
		}
		
		.info2{
		    height:100%; 
		    background:tan; 
		    position:relative;
		    float:right;
		    text-align:center;
		    
		}
		.infocenter{
		    height:100%; 
		    background:tan;
		    position:relative;
		    float:left; 
		    text-align:center;
		    
		}

	
		.info2 p{
		    background:tan;
		    margin-top:10px;
		    
		}
		span{
		    color:black;
		    background:tan;
		    
		}
		.h3title{
		 background:tan;
		 margin-top:10px;
		color:Blue;
		    
		}
		
 .isset::after {
  content: "";
  clear: both;
  display: table;
}
	
	</style>

	<div class='isset' id='isset'>


        	   <div class='col-5 infocenter'>
            			 <?php 
            			    
            			 if(loggedin()) {
            			        echo "<h4 class = 'h3title'>Welcome <span> ". $_SESSION['userName'].  ". </span>We love you!</h4>";
            			    }else{
            
            			    }
            			  ?>
        		</div>	
        	    
	   	        <div class='col-3 info2'>
                
                        <?php 
                            $count = mysqli_query($connect, "SELECT count(*) FROM membertable WHERE userStatus ='active'"); 
                    
                             $result = mysqli_fetch_assoc($count);
                            
                            //echo "<p>Active members [".$result['count(*)']."]</p>";
                        ?>
                            
                </div>
                
        		 <div class='col-3 info2'>
        		   
        		    <?php online(); ?>
        		    
        		 </div>	  
        		 
 
	</div>

