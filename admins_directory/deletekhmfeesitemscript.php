<?php
include ('../../site_includes/connect.php');
include ('../../site_includes/functions.php');
include ('../../site_includes/head.php');

?>

<?php
        if (isset($_GET['trid']) & isset($_GET['mid']) & isset($_GET['yid']) & isset($_GET['page'])){
            
            $id = $_GET['trid'];
            $mid = $_GET['mid'];
            $yid = $_GET['yid'];
            $page = $_GET['page'];
            
            
         if(!isset($_GET['Answer'])) {
        
        echo "<br><br<br><br>";  
        echo "<div class='register'>
        <br><br>
        Are you sure you want to delete that item with id number $id ?<br>
        
        <a href='/two_dimensionmaster/overallaccounts/deletekhmfeesitemscript.php?mid=$mid&yid=$yid&trid=$id&page=$page&Answer=NO'>NO</a> &nbsp;&nbsp;<a href='/two_dimensionmaster/overallaccounts/deletekhmfeesitemscript.php?mid=$mid&yid=$yid&trid=$id&page=$page&Answer=YES'>YES</a>
        
        </div>";
        
         }else{
        
        if(isset($_GET['Answer']) & $_GET['Answer']=='YES'){
        
        $id = mysqli_real_escape_string($connect, $_GET['trid']);   
        
        $query = mysqli_query($connect, "DELETE FROM `khm_schoolfees_table` WHERE `id` = '$id'");
        
        if($query){
           
        echo "<br><br<br><br>";  
        echo '<div class="register"><br><br>';
        
        header("refresh:2; url=/two_dimensionmaster/overallaccounts/manageoverallaccounts.php?mid=$mid&yid=$yid&page=$page");
        
        echo 'Successfully deleted an item!<br><br>';
        
        echo '</div>';	
        
        
        }else{
        
        echo "<br><br<br><br>"; 
        echo '<div class="register"><br><br>';
        
        echo 'Item not successfully deleted!<br>';
        
        echo '<a href="/two_dimensionmaster/overallaccounts/manageoverallaccounts.php?mid='.$mid.'&yid='.$yid.'&page='.$page.'">Back to previous Page</a><br><br>'; 
        echo "</div>";
        
            }

        }else if(isset($_GET['Answer']) & $_GET['Answer']=='NO'){
            
        header("refresh:1; url=/two_dimensionmaster/overallaccounts/manageoverallaccounts.php?mid=$mid&yid=$yid&page=$page");    
            
        }
    }
}

?>    