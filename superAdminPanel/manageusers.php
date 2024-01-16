<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
is_master();
?>

<!DOCTYPE html>

<html>
<head>
     <title>managemembers</title>  
     <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<?php 
include ('../site_includes/head.php'); 
?>
            

</head>
    <body>
        
        <div class="maindiv">
         <!-- The titlebar goes here -->   
         
            <?php 
            include ('../site_includes/siteheader.php');
            ?>

           <!-- The main contant goes here --> 
           
           <div class='tablewrapper'>
            <br>
            
            <?php
            
            $sql = "SELECT * FROM membertable";
            
            $result = mysqli_query($connect, $sql);
            
            if($row = mysqli_num_rows($result)>0){
            			
            ?>
            			<table id='memberstable'>
            			<tr class='tr' >
            			<th ><h3>View User Profiles</h3></th>
            			<th ><h3>Current Level</h3></th>
            			<th class='mysettings'><h3>Manage User</h3></th>
            			<th class='mysettings'><h3>Edit User level</h3></th>
            			<th class='mysettings'><h3>Delete User</h3></th>
            			
            			</tr>
            			
            	
            <?php
            
            while ($row = mysqli_fetch_assoc($result)){
            	
            $id = $row['user_id'];
            $fname = $row['fullName'];
            $username = $row['userName'];
            $contacts = $row['contactDetails'];
            $password = $row['passWord'];
            $password2 = $row['passWord2'];
            $userlevel = $row['userLevel'];
            $userstatus = $row['userStatus'];
            
            ?>
            	
            		<tr>
            			<td width='400'><?php echo "<a href='userprofiledetails.php?cid=$id' class='setting'>$fname</a>"?></td>

            			<td>
            			  <?php
            			  if( $userlevel == 1){
            			      
            			      echo "Currently Site Master";
            			  }else if($userlevel==2){
            			      echo "Currently Accountant";
            			  }else if($userlevel == 3){
            			      echo "Currently Stakeholder";
            			   }else if ($userlevel == 4){
            			       echo "Currently Teacher";
            			   }else if($userlevel == 5){
            			       echo "Currently Family";
            			   }else if($userlevel == 6){
            			       echo "Currently KHM_Adimn";
            			   }else{
            			       echo "Site Member";
            			   }
            			  
            			  ?>
            			</td>
            			
            			            			
            			<td class='mysettings'> 
            			
            			<?php 
            			if($userstatus == 'active'){
            			echo "<a href='activation.php?cid=$id&ustatus=$userstatus' class='setting'>Deactivate User</a>";
            			}else if($userstatus =='inactive'){
            			echo "<a href='activation.php?cid=$id&ustatus=$userstatus' class='setting'>Activate User</a>";
            			}
            			?>
            			</td>
            			
            			
            			<td class='mysettings'>
            			<?php
            			
            		echo "<a href ='usereditform.php?uid=$id' class='setting' >Manage user levels</a>";
            		
            			?>
            			</td>
            			<td class='mysettings'>
            			<?php
            			
            			echo "<a href ='memberdelete.php?cid=$id' class='setting' >Delete User</a>";
            			?>
            			</td>
            			
            			</tr>
            			
            			
            <?php			
            			
            	}
            	
            echo "</table>";
            
         
            
            
            }else {
            	echo "<br><div class='datamsg'>No data was found!</div><br>";
            }
            
            echo"<br><br>";
            
        ?>

            </div>
            
        
            
         <div class="mainwrapper">
       
        <?php   
        
       
            
            if($_SESSION['userLevel']==1){
            echo '<a class="backlink" href="sitemastercentre.php" >Back to previous page</a>';  
            echo "<br>";
                
            }else if($_SESSION['userLevel']==2){
            
            echo '<a  class="backlink" href="../two_dimension1/controllpanel.php" >Back to previous page</a>';  
            echo "<br>";
            }
            
            echo "</div>";    
            
            
            ?>        
           
            	
        </div> 
        
        </div>

 
 
</body>
</html>
