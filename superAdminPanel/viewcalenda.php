<?php 
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
is_admin();
?>
<!DOCTYPE html>

<html>
<head>
   <title>Diary</title>         
<?php 
include ('../site_includes/head.php'); 
?>
            

</head>
    <body>
        
        
            <div class="maindiv">
               
                <?php include ('../site_includes/titlebar.php'); ?>
 

                    <?php
                    
                    $sql = "SELECT * FROM mydiary ORDER BY planDate ASC";
                    
                    $result = mysqli_query($connect, $sql);
                    
                    if($row = mysqli_num_rows($result)>0){
                    		echo "<br>
                    		
                    			<table>
                    			<tr class='tr' >
                    			<th>PLAN DATE</th>
                    			<th>PLANNED EVENT</th>
                    			<th>EVENT DATE</th>
                    			<th>EVENT MONTH </th>
                    			<th>EVENT YEAR </th>
                    			<th>EVENT CATEGORY</th>
                    			<th>LEVEL OF PRIORITY</th>
                    			<th>ADDED BY</th>
                    			</tr>";
                    	
                    
                    	while ($row = mysqli_fetch_assoc($result)){
                    	
                    			echo "<tr>";
                    			echo "<td>".$row['planDate']."</td>";
                    			echo "<td>".$row['plannedActivity']."</td>";
                    			echo "<td>".$row['actionDate']."</td>";
                    			echo "<td>".$row['actionMonth']."</td>";
                    			echo "<td>".$row['actionYear']."</td>";
                    			echo "<td>".$row['eventCategory']."</td>";
                    			echo "<td>".$row['priorityLevel']."</td>";
                    			echo "<td>".$row['setBy']."</td>";
                    			echo "</tr>";
                    	}
    
                    	

                    	
                    	
                    echo "</table><br><br>";
                     ?>
             
            
             
            <?php
            echo '<a href="sitemastercentre.php" id="backlink">Back to controllpanel</a><br>';
            
            echo "<br>";
            
            
            }else {
            	echo "No data was found!";
            }
            echo "<br>";
            ?>
            
            
     
        
  </div>      
        
 
</body>
</html>