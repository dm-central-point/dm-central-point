0<?php
function showAcounts(){
include('connect.php');
include('head.php');
    
   $query = mysqli_query($connect, "SELECT * FROM yeartable");
   
   while ($row =mysqli_fetch_assoc($query)){
       
       echo "<table class='acctable'>";
       echo "<tr><td class='yeartitles'>".$row['year_name']."</td></tr>";
       dispMonth($row['year_id']);
       
       echo "</table>";
   }
}



function dispMonth($foreignkey_id){
    include('connect.php');
    
$select = mysqli_query($connect, "SELECT year_id, month_id, foreignkey_id, month_name FROM yeartable, monthtable WHERE ($foreignkey_id = yeartable.year_id) & ($foreignkey_id = monthtable.foreignkey_id)");
  
    while ($row = mysqli_fetch_assoc($select)){
        
        echo "<tr><td class='monthtitle'> <a href='showmonthlyaccounts.php?yid=".$row['year_id']."&mid=".$row['month_id']."'> ".$row['month_name']."</a>
        </td></tr>";
    }
}

    /*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>GENERAL ACCOUNTS FUNCTIONS KHM <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/



        
        
     /*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>START GENERAL ACCOUNTS FUNCTIONS<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/   
        
        function dispGeneralAccounts(){
            
        include('connect.php');   
            
        $userid = $_SESSION['user_id'];
            
        $yearid = mysqli_query($connect, "SELECT secChanger FROM membertable WHERE user_id = $userid");
        
        while($row1= mysqli_fetch_assoc($yearid)){
            
        $yearId = $row1['secChanger'];
      
           
        }   
        
           $query = mysqli_query($connect, "SELECT * FROM generalyeartable WHERE year_id = '$yearId'");
           
           while ($row =mysqli_fetch_assoc($query)){
               
               echo "<table class='yeartable'>";
               echo "<tr><td class='yeartitles'>".$row['year_name']."</td></tr>";
               echo "<tr><td class='yeartitles'>Overall Accounts Entry</td></tr>";
              
               showMonthGeneral($row['year_id']);
               
               echo "</table>";
           }
        }
        
        
        
      function ShowMonthGeneral($foreignkey_id){
        include('connect.php');
        
        $select = mysqli_query($connect, "SELECT year_id, month_id, foreignkey_id, month_name FROM yeartable, monthtable2 WHERE ($foreignkey_id = yeartable.year_id) & ($foreignkey_id = monthtable2.foreignkey_id)");
        
        while ($row = mysqli_fetch_assoc($select)){
        
        echo "<tr><td class='monthtitle'> <a href='displaygeneralaccounts.php?yid=".$row['year_id']."&mid=".$row['month_id']."&page=1'> ".$row['month_name']."</a>
        </td></tr>";
        
         }
    
}  
        
/*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>END GENERAL ACCOUNTS FUNCTION ONE<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< */       
        
        
/*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>START INTERNATIONAL ACCOUNTS FUNCTIONS<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< */   
        
      
        function dispInternationalAccounts(){
            
             
        include('connect.php');   
            
            
        $yearid = mysqli_query($connect, "SELECT year_id FROM yearId1");
        
        while($row1= mysqli_fetch_assoc($yearid)){
            
        $yearId = $row1['year_id'];
      
           
        }   
        
           $query = mysqli_query($connect, "SELECT * FROM yeartable WHERE year_id = '$yearId'");
           
           while ($row =mysqli_fetch_assoc($query)){
               
               echo "<table class='yeartable'>";
               echo "<tr><td class='yeartitles'>".$row['year_name']."</td></tr>";
               echo "<tr><td class='yeartitles'>Our International Accounts</td></tr>";
              
               showMonthInternational($row['year_id']);
               
               echo "</table>";
           }
        }
        
        
        
      function ShowMonthInternational($foreignkey_id){
        include('connect.php');
        
        $select = mysqli_query($connect, "SELECT year_id, month_id, foreignkey_id, month_name FROM yeartable, monthtable2 WHERE ($foreignkey_id = yeartable.year_id) & ($foreignkey_id = monthtable2.foreignkey_id)");
        
        while ($row = mysqli_fetch_assoc($select)){
        
        echo "<tr><td class='monthtitle'> <a href='displayinternationalaccounts.php?yid=".$row['year_id']."&mid=".$row['month_id']."&page=1'> ".$row['month_name']."</a>
        </td></tr>";
        
         }
    
}
        
        /*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>END INTERNATIONAL ACCOUNTS FUNCTION ONE<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/           
         
         
         
        
        /*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>START ATTENDENCE  FUNCTIONS<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/   
        
      
        function dispAttendence(){
            
             
        include('connect.php');   
            
            
        $yearid = mysqli_query($connect, "SELECT year_id FROM yearId4");
        
        while($row1= mysqli_fetch_assoc($yearid)){
            
        $yearId = $row1['year_id'];
      
           
        }   
        
           $query = mysqli_query($connect, "SELECT * FROM generalyeartable WHERE year_id = '$yearId'");
           
           while ($row =mysqli_fetch_assoc($query)){
               
               echo "<table class='yeartable'>";
               echo "<tr><td class='yeartitles'>".$row['year_name']."</td></tr>";
               echo "<tr><td class='yeartitles'>Our Annual Attendence</td></tr>";
              
               showMonthAttendence($row['year_id']);
               
               echo "</table>";
           }
        }
        
        
        
      function ShowMonthAttendence($foreignkey_id){
        include('connect.php');
        
        $select = mysqli_query($connect, "SELECT year_id, month_id, foreignkey_id, month_name FROM generalyeartable, monthtable2 WHERE ($foreignkey_id = generalyeartable.year_id) & ($foreignkey_id = monthtable2.foreignkey_id)");
        
        while ($row = mysqli_fetch_assoc($select)){
        
        echo "<tr><td class='monthtitle'> <a href='displaygeneralattendence.php?yid=".$row['year_id']."&mid=".$row['month_id']."&page=1'> ".$row['month_name']."</a>
        </td></tr>";
        
         }
    
}  
        
       
        
        /*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>END ATTENDENCE FUNCTION ONE<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/   
        
        
        
         /*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>START OVERALL ACCOUNTS  FUNCTIONS<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/   
        
      
        function dispOverallAccounts(){
            
             
        include('connect.php');   
            
        $userid = $_SESSION['user_id'];
            
        $yearid = mysqli_query($connect, "SELECT secChanger FROM membertable WHERE user_id = $userid");
        
        while($row1= mysqli_fetch_assoc($yearid)){
            
        $yearId = $row1['secChanger'];
      
           
        }   
        
           $query = mysqli_query($connect, "SELECT * FROM generalyeartable WHERE year_id = '$yearId'");
           
           while($row = mysqli_fetch_assoc($query)){
               
               echo "<table class='yeartable'>";
               echo "<tr><td class='yeartitles'>".$row['year_name']."</td></tr>";
               echo "<tr><td class='yeartitles'>Overall Accounts Entry</td></tr>";
              
               showMonthOverallAccounts($row['year_id']);
               
               echo "</table>";
           }
        }
        
        
        
      function ShowMonthOverallAccounts($foreignkey_id){
        include('connect.php');
        
        $select = mysqli_query($connect, "SELECT year_id, month_id, foreignkey_id, month_name FROM generalyeartable, monthtable2 WHERE ($foreignkey_id = generalyeartable.year_id) & ($foreignkey_id = monthtable2.foreignkey_id)");
        
        while ($row = mysqli_fetch_assoc($select)){
        
        echo "<tr><td class='monthtitle'> <a href='manageaccounts.php?yid=".$row['year_id']."&mid=".$row['month_id']."&page=1'> ".$row['month_name']."</a>
        </td></tr>";
        
         }
    
}  
        
       
        
        /*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>END OVERALL ACCOUNTS FUNCTION ONE<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/ 
        
        
        
        /*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>START KHM ACCOUNTS  FUNCTIONS<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/   
        
      
        function dispKhmAccounts(){
            
             
        include('connect.php');   
            
        $userid = $_SESSION['user_id'];
            
        $yearid = mysqli_query($connect, "SELECT secChanger FROM membertable WHERE user_id = $userid");
        
        while($row1= mysqli_fetch_assoc($yearid)){
            
        $yearId = $row1['secChanger'];
      
           
        }   
        
           $query = mysqli_query($connect, "SELECT * FROM generalyeartable WHERE year_id = '$yearId'");
           
           while ($row =mysqli_fetch_assoc($query)){
               
               echo "<table class='yeartable'>";
               echo "<tr><td class='yeartitles'>".$row['year_name']."</td></tr>";
               echo "<tr><td class='yeartitles'>KHM General Accounts</td></tr>";
              
               showMonthKhmAccounts($row['year_id']);
               
               echo "</table>";
           }
        }
        
        
        
      function ShowMonthKhmAccounts($foreignkey_id){
        include('connect.php');
        
        $select = mysqli_query($connect, "SELECT year_id, month_id, foreignkey_id, month_name FROM generalyeartable, monthtable2 WHERE ($foreignkey_id = generalyeartable.year_id) & ($foreignkey_id = monthtable2.foreignkey_id)");
        
        while ($row = mysqli_fetch_assoc($select)){
        
        echo "<tr><td class='monthtitle'> <a href='displaykhmaccounts.php?yid=".$row['year_id']."&mid=".$row['month_id']."&page=1'> ".$row['month_name']."</a>
        </td></tr>";
        
         }
    
    }  
                
        /*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>END KHM ACCOUNTS FUNCTION ONE<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/ 
        
        
        
        /*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>START KHM FEES ACCOUNTS  FUNCTIONS<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/   
        
      
        function dispKhmSchoolFees(){
            
             
        include('connect.php');   
            
        $userid = $_SESSION['user_id'];
            
        $yearid = mysqli_query($connect, "SELECT secChanger FROM membertable WHERE user_id = $userid");
        
        while($row1= mysqli_fetch_assoc($yearid)){
            
        $yearId = $row1['secChanger'];
      
           
        }   
        
           $query = mysqli_query($connect, "SELECT * FROM generalyeartable WHERE year_id = '$yearId'");
           
           while ($row =mysqli_fetch_assoc($query)){
               
               echo "<table class='yeartable'>";
               echo "<tr><td class='yeartitles'>".$row['year_name']."</td></tr>";
               echo "<tr><td class='yeartitles'>KHM ShoolFees Accounts</td></tr>";
              
               showMonthKhmFees($row['year_id']);
               
               echo "</table>";
           }
        }
        
        
        
      function ShowMonthKhmFees($foreignkey_id){
        include('connect.php');
        
        $select = mysqli_query($connect, "SELECT year_id, month_id, foreignkey_id, month_name FROM generalyeartable, monthtable2 WHERE ($foreignkey_id = generalyeartable.year_id) & ($foreignkey_id = monthtable2.foreignkey_id)");
        
        while ($row = mysqli_fetch_assoc($select)){
        
        echo "<tr><td class='monthtitle'> <a href='displaykhmfees.php?yid=".$row['year_id']."&mid=".$row['month_id']."&page=1'> ".$row['month_name']."</a>
        </td></tr>";
        
         }
    
        }  
        
               
        /*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>END KHM FEES ACCOUNTS FUNCTION ONE<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< */ 
        
?>

