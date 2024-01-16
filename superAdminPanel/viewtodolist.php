<?php 
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
is_admin();
?>
<!DOCTYPE html>

<html>
<head>
   <title>View To-do-list</title>         
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
                    
                    $sql = "SELECT * FROM mytodolist ORDER BY datelisted ASC";
                    
                    $result = mysqli_query($connect, $sql);
                    
                    if($row = mysqli_num_rows($result)>0){
                    		echo "<br>
                    		
                    			<table>
                    			<tr class='tr' >
                    			<th>LIST ITEM DATE</th>
                    			<th>PLANNED ACTIVITY</th>
                    			<th>ACTIVITY DEADLINE</th>
                    			<th>PRIORITY</th>
                    			<th>ACTIVITY BELONGING</th>
                    			<th>RESPONSIBLE</th>
                    			<th>LISTED BY</th>
                    			</tr>";

                    	while ($row = mysqli_fetch_assoc($result)){
                    	
                    			echo "<tr>";
                    			echo "<td>".$row['datelisted']."</td>";
                    			echo "<td>".$row['activityname']."</td>";
                    			echo "<td>".$row['deadline']."</td>";
                    			echo "<td>".$row['prioritylevel']."</td>";
                    			echo "<td>".$row['activitybelonging']."</td>";
                    			echo "<td>".$row['responsible']."</td>";
                    			echo "<td>".$row['postedby']."</td>";
                    			echo "</tr>";
                    	}
    
                    	

                    	
                    	
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