<html> 
<body>
<div class="maindiv">  
<?php 

    $selector = $_GET['selector'];
    $validator = $_GET['token'];
    
    if(isset($selector) && isset($validator)){
    if(empty($selector) || empty($validator)){
    
    echo "We could not validate your request!";
   // exit();
    
    
    }else{
        
        
        if(ctype-exdigit($selector) !==false && ctype-exdigit($validator) !==false ){
        ?>
       <form class="logginform col-6" action="resetpasswordscript.php"  method="POST">
                <br>
                <input type="hiden" name ="selector" value="<?php echo $selector ?>"><br>
                <input type="hiden" name ="validator" value ="<?php echo $validator ?>"><br>
                <input type="password" name ="newpassword" placeholder ="Enter your new password "><br>
                <input type="password" name ="newpassword2" placeholder ="Confirm new password "><br>
              
                
                <input type="submit" name="reset_request_submit" value="RESET" class="submit">
                </form>
            
            
            <?php
          }

         }
    
    }else{
        
        echo "No values were found!";
    }
    
    ?>    
        </div> 
        
    <?php include ('../site_includes/sitefooter.php'); ?>

   </body>

   <?php include ('../site_includes/jscodes_includer.php'); ?>
</html>