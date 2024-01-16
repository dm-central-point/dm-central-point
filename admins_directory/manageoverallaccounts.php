<?php
ob_start;
include('http://localhost/thedminfopoint/site_includes/connect.php');
include_once('http://localhost/thedminfopoint/site_includes/functions.php');
is_admin();

?>
<!DOCTYPE html>

<html>
<head>
   <title>Overall_accounts-display</title>  
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
        

                        


    <div class="mainwrapper">
                          
        
        <?php
     
if(isset($_GET['yid']) & isset($_GET['mid']) & isset($_GET['page'])){
    
$yid = mysqli_real_escape_string($connect, $_GET['yid']);
$mid = mysqli_real_escape_string($connect, $_GET['mid']); 
$page = mysqli_real_escape_string($connect, $_GET['page']);
        

        ?>


  </div>       
        
        <div class='att_navbar'>
        
        
        <a href="#" onClick="javascript:viewAccounts('OL');">Oliva</a>
        <a href="#" onClick="javascript:viewAccounts('ANK');">Angel</a>
        <a href="#" onClick="javascript:viewAccounts('AY');">Jobson</a>
        <a href="#" onClick="javascript:viewAccounts('JL');">Julieth</a>
        <a href="#" onClick="javascript:viewAccounts('SH');">Shed</a>
        <a href="#" onClick="javascript:viewAccounts('NL');">Noela</a>
        <a href="#" onClick="javascript:viewAccounts('YS');">Defao</a>
        <a href="#" onClick="javascript:viewAccounts('ANO');">Angel2</a>
        <a href="#" onClick="javascript:viewAccounts('GL');">Glory</a>
        <a href="#" onClick="javascript:viewAccounts('EV');">Eva</a>
        
        </div> 
        
        <div class='att_navbar'>
        <a href="#" onClick="javascript:viewAccounts('SF');">KHM-fees</a>    
        <a href="#" onClick="javascript:viewAccounts('RA');">Res_KA</a>
        <a href="#" onClick="javascript:viewAccounts('RF');">Res_KF</a>
        <a href="#" onClick="javascript:viewAccounts('RO');">Res_OA</a>
        <a href="#" onClick="javascript:viewAccounts('DN');">Dan</a>
        <a href="#" onClick="javascript:viewAccounts('CP');">Chipe</a>
        <a href="#" onClick="javascript:viewAccounts('MG');">Magoma</a>
        <a href="#" onClick="javascript:viewAccounts('CL');">Chilo</a>
        <a href="#" onClick="javascript:viewAccounts('MN');">Mgeni</a>
        <a href="#" onClick="javascript:viewAccounts('DR');">Darick</a>
        </div> 
        
        
        <script>
            function viewAccounts(acc){
                
            var mid = <?php echo $mid ?>;
            var yid = <?php echo $yid ?>;
            var page = <?php echo $page ?>;
            var url = 'https://www.thedmcentralpoint.com/adminsAccounts/overallaccountsloader.php';
            $.post(url, {accountVar:acc, mtid:mid, yrid:yid, pg:page}, function(data){ 
            
            $('#tablewrapper_overallaccounts').html(data).show(); });
            
            }
        
        </script> 
         
          
         
        <div class="maindivtop2">
        <!-- The main contant goes here -->
        
        
       <div class='tablewrapper_main' id='tablewrapper_overallaccounts'>
       
       <?php
        

        $query = "SELECT * FROM `khm_overall_accounts` WHERE  `year_id`='$yid' AND `month_id` ='$mid' ORDER BY acc_Date DESC ";
        
        $result = mysqli_query($connect, $query);
        
        $num_rows = mysqli_num_rows($result);
        
        if($num_rows !=0){
        
        echo "<table class='acctable_main'>";
        
        
        
        
        echo "<tr><th class='mythdata'>UserName</th><th id='dateclm'>Date</th><th class='mythdata'>Month</th><th class='mythdata'>Year</th><th class='mythdata'>Description</th><th class='mythdata'>Quantity</th><th class='mythdata'>Type</th>
        <th class='mythdata'>Category</th><th id='amountclm'>Income</th><th id='amountclm'>Expenditure</th><th id='amountclm'>On-Credit</th><th id='amountclm'>AccEdit</th><th id='amountclm'>AccDelete</th></tr>";
        
        while ($row = mysqli_fetch_assoc($result)){
        $id = $row['acc_id'];
        $month_id = $row['month_id'];
        $year_id = $row['year_id'];
        $date = $row['acc_Date'];
        $month = $row['acc_Month'];
        $year = $row['acc_Year'];
        $code = $row['acc_Code'];
        $descr = $row['acc_Description'];
        $quantity = $row['acc_Quantity'];
        $type = $row['acc_Type'];
        $category = $row['acc_Category'];
        $income = $row['incomeAm'];
        $expenditure = $row['expenditureAm'];
        $oncredit = $row['oncreditExpenditure'];
        $addedby = $row['recordedBy'];
       
        
        
        echo "<tr><td class='mythdata'>$addedby</td><td class='mythdata'>$date</td><td class='mythdata'>$month</td>
        <td class='mythdata'>$year</td><td class='mythdata'>$descr</td><td class='mythdata'>$quantity</td><td class='mythdata'>$type</td><td class='mythdata'>$category</td><td class='amounttd'>$income</td><td class='amounttd'>$expenditure</td><td class='amounttd'>$oncredit</td>
        <td class='edittd'><a class='editlink' href='editkhmaccountsform.php?mid=$mid&yid=$yid&trid=$id&page=$page'>Edit</a></td><td class='edittd'><a class='editlink' href='deletekhmaccountsitemscript.php?mid=$mid&yid=$yid&trid=$id&page=$page'>Delete</a></td></tr>";
        
        }
        
        echo "<tr><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'><td class='bottomrow'></td><td class='bottomrow'></td></td><td class='bottomrow'>Totals</td>
        
        <td class='bottomrow'>";
        
        
        $sum ="SELECT SUM(incomeAm) as Amount FROM `khm_overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid'";		
        $result2 = mysqli_query($connect, $sum);
        
        if($result2){
        
        while ($row = mysqli_fetch_array($result2)){
        $incometotal= $row['Amount'];
        echo $incometotal;
        }
        }
        
        echo "</td>";
        
        echo "<td class='bottomrow'>";
       
        
        
        $sum ="SELECT SUM(expenditureAm) as Amount2 FROM `khm_overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid'";		
        $result2 = mysqli_query($connect, $sum);
        
        if($result2){
        
        while ($row = mysqli_fetch_array($result2)){
        $expendituretotal = $row['Amount2'];
        echo $expendituretotal;
        }
        }
        
        
        
        
        echo"</td>";
        
                echo "<td class='bottomrow'>";
       
        
        
        $sum ="SELECT SUM(oncreditExpenditure) as Amount3 FROM `khm_overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid'";		
        $result2 = mysqli_query($connect, $sum);
        
        if($result2){
        
        while ($row = mysqli_fetch_array($result2)){
        $oncreditexpendituretotal = $row['Amount3'];
        echo $oncreditexpendituretotal;
        }
        }
        
        
        echo"</td>";
        
        
        echo "<td class='bottomrow'></td>";
        echo "<td class='bottomrow'></td>";
     
        echo "</tr>";
        
        echo "<tr><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'><td class='bottomrow2'></td></td>
        <td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'>Balance</td>";
        
        echo"<td class='bottomrow2'>";
        
        echo $incometotal - $expendituretotal;
        
        echo "</td>";
        
        echo "</td><td class='bottomrow2'></td>";
        echo "</td><td class='bottomrow2'></td>";
        echo "</td><td class='bottomrow2'></td>";
        
        echo "</tr>";
        
        echo"</table>";
        }else{
        
        echo '<div class="datamsg_main"><br>No data was found!</div>';
        }
        
        ?>
        </div>
        
        
        
        

       

    </div>
   



       
        
        
         <div class='linkwrapper'>
        <?php
        
        //backlink starts here
        
        echo '<a  class="backlink" href="overallaccountspage.php" >Back to the main page</a><br>';  
        
        ?>
        
        </div>
  

        <div class="footerwrapper1">
        <?php
        include ('../../site_includes/footer.php');
        
        ?>
        
        </div>
        
        
        <div class="footerwrapper2">
        <?php
        include ('../../site_includes/footermobile.php');
        
        ?>
        
        </div>
 
 <?php
 
}
 
 ?>
 </div>
</body>
</html>