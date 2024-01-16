<?php 
include ('../../site_includes/connect.php');
include ('../../site_includes/functions.php');
include ('../../site_includes/accountsfunctions.php');
?>
 
 
 
<?php
                
           
    if(isset($_GET['id'])){ 
           
           
           
        $idurl = $_GET['id'];   
           
           
           
            $yearid = mysqli_query($connect, "SELECT * FROM yearId4 WHERE id = $idurl");
            
            while($row1= mysqli_fetch_assoc($yearid)){
            $id = $row1['id'];
            $year_id = $row1['year_id'];
            
            if ($year_id <=3){
            
            $newvalue = 3;
            
            }
            
            
            $update = mysqli_query($connect, "UPDATE `yearId4` SET `year_id`= '$newvalue' WHERE `id` = '$id'");
            
            if($update){
                
                header("Location:attendencecorner.php");
            }
    }
    
    }
            ?>