<?php 
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
include ('../site_includes/accountsfunctions.php');
?>
 
 
 
<?php
                
           
    if(isset($_GET['id'])){ 
           
           
           
        $idurl = $_GET['id'];   
           
           
           
 $secChangerId = mysqli_query($connect, "SELECT * FROM `membertable` WHERE `user_id` = '$idurl'");
            
            while($row1= mysqli_fetch_assoc($secChangerId)){
            $id = $row1['user_id'];
            $changerId = $row1['secChanger'];
            
            
            
            if ($changerId <=14) {
            
            $newvalue = 5;
            
            }
            
            
            $update = mysqli_query($connect, "UPDATE `membertable` SET `secChanger`= '$newvalue' WHERE `user_id` = '$id'");
            
            if($update){
                
                header("Location:/adminsAccounts/overallaccountspage.php");
            }else{
                echo "It didn't work";
            }
    }
    
    }
            ?>