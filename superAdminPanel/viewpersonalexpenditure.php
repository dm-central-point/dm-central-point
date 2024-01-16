<?php 
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
is_admin();
?>
<!DOCTYPE html>

<html>
<head>
   <title>General Expenditure</title>         
<?php 
include ('../site_includes/head.php'); 
?>
            

</head>
    <body>
        
        
            <div class="mainwrapper">
                <!-- The titlebar goes here -->   
                <?php 
                include ('../site_includes/titlebar.php');
                ?>
                </div>
                
            <div class="mainwrapper">
                <!-- The infobar goes here -->
                <?php 
                include ('../site_includes/isset.php');
                ?>       
                </div>
        
            <div class="mainwrapper">
                <!-- The menubar goes here -->
                <?php 
                include ('../site_includes/menubar.php');
                ?>        
            </div>
    
    
    <div class="mainwrapper">
         <!-- The main contant goes here -->
            <div class="maindiv">
 

            <?php

            $sql = "SELECT * FROM generalexpenditure WHERE expenditureChannel='Personal' ORDER BY Date ASC";
            
            $result = mysqli_query($connect, $sql);
            
            if($row = mysqli_num_rows($result)>0){
            		echo "<br><br>
            			<table>
            			<tr class='tr' >
            			<th width='100'>DATE</th>
            			<th>MONTH</th>
            			<th>YEAR</th>
            			<th>DESCRIPTION</th>
            			<th>CHANNEL</th>
            			<th>TYPE</th>
            			<th>QUANTITY</th>
            			<th>QUALITY</th>
            			<th>CODE</th>
            			<th>AMOUNT</th>
            			</tr>";
            	
            
            	while ($row = mysqli_fetch_assoc($result)){
            	
            			echo "<tr>";
            			echo "<td>".$row['Date']."</td>";
            			echo "<td>".$row['Month']."</td>";
            			echo "<td>".$row['Year']."</td>";
            			echo "<td>".$row['itemDescription']."</td>";
            			echo "<td>".$row['expenditureChannel']."</td>";
            			echo "<td>".$row['itemType']."</td>";
            			echo "<td>".$row['Quantity']."</td>";
            			echo "<td>".$row['Quality']."</td>";
            			echo "<td>".$row['expenditureCode']."</td>";
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
            			echo "<td></td>";
            			echo "<td></td>";
            			
            			echo "<td><p><strong>Totals</strong></P></td>";
            			echo "<td>";
            			echo "<strong>";
            	$sum ="SELECT SUM(Amount) as Amount FROM `generalexpenditure`";		
            	$result2 = mysqli_query($connect, $sum);
            	
            	if($result2){
            	
            	while ($row = mysqli_fetch_array($result2)){
            		echo $row['Amount'];
            	}
            }
            	echo "</strong>";
            			"</td>";
            
            		
            	echo "</tr>";
            	
            	
                echo "</table><br><br>";
            
            ?>
             
             </div> 
             
            <?php
            echo '<a href="sitemastercentre.php" id="backlink">Back to controllpanel</a><br>';
            
            echo "<br>";
            
            
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