<?php 
include ('site_includes/connect.php');
include ('site_includes/functions.php');
$page = 'Signup_page';
?>
<!DOCTYPE html>

<html>
<head>
<title> <?php echo $page;?> </title>  
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"  >
<?php 
include ('site_includes/head.php'); 
?>


</head>
    <body>
        
        <div class="maindiv">
         <!-- The titlebar goes here -->   
         
            <?php 
            include ('site_includes/siteheader.php');
            ?>
        
     
        


    
        <div class="logginform_wrapper">
         <!-- The main contant goes here -->
         
                    
                    <br>
                				<h2>Signup form</h2>
                				
                                <form action="registerscript.php" class="logginform col-6" method="POST">
                    					<br>
                    					<input type="text" name="fullname" placeholder="Full Name"><br>
                    					<input type="text" name="username" placeholder="User Name"><br>
                    					<input type="text" name="contacts" placeholder="Email or Mobile number"><br>
                    					<input type="password" name ="password" placeholder="Password"><br>
                    					<input type="password" name="password2" placeholder="Confirm Password"><br>
                    					<input type="submit" name="submit" Value="SIGNUP" class="submit">
                    			</form>
                	
            </div>
     
    </div>
 
</body>
</html>