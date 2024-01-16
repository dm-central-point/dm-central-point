<?php 
include ('site_includes/connect.php');
include ('site_includes/functions.php');
$page = 'Login_page';
?>
<!DOCTYPE html>

<html>
<head>
    <title><?php echo $page;?> </title>      
    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
include ('site_includes/head.php'); 
?>
            

</head>
    <body>
        
        
            <div class="maindiv">
              
                <?php include ('site_includes/siteheader.php'); ?>
               
                

                <div class="logginform_wrapper">
                	        <br>
                			<h2>Already a member? Login here</h2>
                				
                		       
                					<form class="logginform col-6" action="loginscript.php"  method="POST">
                					<br>
                					<input type="text" name="username" placeholder="User Name"><br>
                					<input type="password" name ="password" placeholder="Password"><br>
                
                					<input type="submit" name="submit" value="LOGIN" class="submit">
                				</form>
                		
                </div>
            
            </div> 
        
    
</body>
</html>