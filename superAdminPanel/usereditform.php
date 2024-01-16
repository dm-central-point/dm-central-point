<?php 
 $id = $_GET['uid'];
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
?>
<!DOCTYPE html>

<html>
<head>
<title>Userinfomanage-form</title> 
 <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<?php 
include ('../site_includes/head.php'); 
?>
            
    <style>
    
    
        
        
        
    </style>

</head>
    <body>
       
    <div class="maindiv">

            <div class="menuwrapper1">
                    <!-- The menubar goes here -->
                    <?php 
                    include ('../site_includes/siteheader.php');
                    ?>        
                  
            </div>
                   
        <?php
        
           
       if(isset($_GET['uid'])) {
       
       $sql = "SELECT * FROM `membertable` WHERE `user_id` = $id";
        
        $result = mysqli_query($connect, $sql);
        
        if($row = mysqli_num_rows($result)>0){
        
        
        
        while ($row = mysqli_fetch_assoc($result)){
        
        $id = $row['user_id'];
        $fname = $row['fullName'];
        $username = $row['userName'];
        $contacts = $row['contactDetails'];
        $password = $row['passWord'];
        $password2 = $row['passWord2'];
        $userlevel = $row['userLevel'];
        $userstatus = $row['userStatus'];
        
          
                } 
            
            }
       }     
            ?>
                
                
                <div class="myloginfo col-12">
                    <br>
                				<h2>Manage member's level here!</h2>
                				
                                <form action="usereditscript.php" class="logginform col-6" method="POST">
                    					<br>
                    					<input type="text" name="fullname" value="<?php echo $fname ?>">
                    					<input type="text" name="username" value="<?php echo $username ?>">
                    					<input type="text" name="userlevel" value="<?php echo $userlevel ?>">
                    					<input type="hidden" name="userid" value="<?php echo $id ?>">
                    					<input type="submit" name="submit" Value="UPDATE" class="submit">
                    			</form>
                	</div>
            
           
            <?php 
            include ('../site_includes/footer.php');
            ?>        
        
        </div>
 
 
</body>
</html>