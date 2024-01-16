<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
//is_volunteer();
?>
<!DOCTYPE html>

<html>
<head>
   <title>Wishlist-page</title>  
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
		background:#eee; 
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
        overflow-x: auto;
		}
		
        .wishlist{
        background: lightgreen; 
        padding:10px;
        border: 1px solid black; 
        margin: 0 auto; 
        width:1200px; 
        height: auto; 
        margin-top:20px; 
        bottom:50px; 
        text-align:left; 
        border-collapse:collapse;
        
        
        }
        .wishlist td{border: 1px solid black; 
        padding: 5px; 
        text-align: right; 
        background:lightgreen;
        text-align:center;
        
        }
        .wishlist th{
        background:lightgreen; 
        text-align:center; 
        border: 1px solid black;}
        
        a, strong, p{
        background:tan;
        
        }
        
        .backlink{
            display:block;
            color:blue;
        background:#eee; 
        text-align:center;
        
        }
        
        
        
        .linkwrapper{
            width:100%;
            height:40px;
            background:#eee;
            text-align:center;
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
    
    
        
        
        <div class="maindiv">
        <!-- The main contant goes here -->      
          <?php

$sql = "SELECT * FROM twigavisionwishlist ORDER BY Date ASC";

$result = mysqli_query($connect, $sql);

if($row = mysqli_num_rows($result)>0){
			echo "<br><br>
			<table class='wishlist'>
			<tr class='tr' >
			<th width='100'>Date</th>
			<th width='200'>Item Name</th>
			<th width='200'>Description</th>
			<th>Quantity</th>
			<th>Position in Priority</th>
			<th>Cost in Tsh</th>
			<th width='100'>Needed By</th>
			
			</tr>";
			


	while ($row = mysqli_fetch_assoc($result)){
	       
	        $date = $row['date'];
	      
		
			echo "<tr>";
			echo "<td>".$date."</td>";
			echo "<td>".$row['itemname']."</td>";
			echo "<td>".$row['description']."</td>";
			echo "<td>".$row['quantity']."</td>";
			echo "<td>".$row['priority']."</td>";
			echo "<td>".$row['costinTsh']."</td>";
			echo "<td>".$row['deadLine']."</td>";
			
			echo "</tr>";
	}
	
	
        echo "</table><br><br>";
 
     ?>     	 
          	
        
        </div>  
        
        <div class="linkwrapper">  
        
        <?php
        back_link_main();
        
       
        
        }else {
        echo "No data was found!";
     
         back_link_main();
        
        }
       
        ?>	
       
        </div> 
        
        
        <div class="mainwrapper">
            <!-- The foorwe goes here -->
            <?php 
            include ('../site_includes/footer.php');
            ?>        
        
        </div>
 
 
</body>
</html>