<?php 
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
is_admin();
?>
<!DOCTYPE html>

<html>
<head>
   <title>General income</title>   
   <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<?php 
include ('../site_includes/head.php'); 
?>
            
   
</head>
    <body>
        
        
        
        <div class="titlewrapper">
         <!-- The titlebar goes here -->   
         
            <?php 
            include ('../site_includes/titlebar2.php');
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
                    
                    $sql = "SELECT * FROM generalincome ORDER BY Date ASC";
                    
                    $result = mysqli_query($connect, $sql);
                    
                    if($row = mysqli_num_rows($result)>0){
                
                    	   echo "<table class='accountstable'>
                    			<tr class='tr' >
                    			<th>DATE</th>
                    			<th>MONTH</th>
                    			<th>YEAR</th>
                    			<th>SOURCE</th>
                    			<th>PURPOSE</th>
                    			<th>TYPE</th>
                    			<th>CODE</th>
                    			<th>AMOUNT</th>
                    			</tr>";
                    	
                    
                    	while ($row = mysqli_fetch_assoc($result)){
                    	
                    			echo "<tr>";
                    			echo "<td>".$row['Date']."</td>";
                    			echo "<td>".$row['Month']."</td>";
                    			echo "<td>".$row['Year']."</td>";
                    			echo "<td>".$row['incomeSource']."</td>";
                    			echo "<td>".$row['incomePurpose']."</td>";
                    			echo "<td>".$row['incomeType']."</td>";
                    			echo "<td>".$row['incomeCode']."</td>";
                    			echo "<td>".$row['Amount']."</td>";
                    			echo "</tr>";
                    	}
    
                    	
                    	echo "<tr>";
                    			echo "<td></td>";
                    			echo "<td></td>";
                    			echo "<td></td>";
                    			echo "<td></td>";
                    			echo "<td></td>";
                    			echo "<td></td>";
                    			
                    			echo "<td><strong>Totals</strong></td>";
                    			echo "<td>";
                    			echo "<strong>";
                    	$sum ="SELECT SUM(Amount) as Amount FROM `generalincome`";		
                    	$result2 = mysqli_query($connect, $sum);
                    	
                    	if($result2){
                    	
                    	while ($row = mysqli_fetch_array($result2)){
                    		echo $row['Amount'];
                    	}
                    }
                    	echo "</strong>";
                    			"</td>";
                    
                    		
                    	echo "</tr>";
                    	
                    	
                    echo "</table><br>";
                     ?>
             
             </div> 
             
           <div class="mainwrapper">    
            <?php
            echo '<a href="sitemastercentre.php" id="backlink">Back to the main page</a><br>';
         
            
            }else {
            	echo "No data was found!";
            }
            echo "<br>";
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