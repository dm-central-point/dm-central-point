        <?php
        ob_start();
        include('../site_includes/connect.php');
        include_once('../site_includes/functions.php');
        //is_admin();
        
        ?>
        <!DOCTYPE html>
        
        <html>
        <head>
        <title>Overall_accounts-display</title>  
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <?php 
        include ('../site_includes/head.php'); 
        ?>
        
        
        </style>
        
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
        
        <div class='acc_navbar'>
        
        <a href="#" onClick="javascript:viewAccounts('CH');">Chalinze</a>
        <a href="#" onClick="javascript:viewAccounts('CP');">Cipegwa</a>
        <a href="#" onClick="javascript:viewAccounts('CL');">Chilongola</a>
        <a href="#" onClick="javascript:viewAccounts('YS');">Yusufu</a>
        <a href="#" onClick="javascript:viewAccounts('AN');">Angel</a>
        <a href="#" onClick="javascript:viewAccounts('RL');">Roseline</a>
        <a href="#" onClick="javascript:viewAccounts('OL');">Oliva</a>
        <a href="#" onClick="javascript:viewAccounts('RA');">Res_KA</a>
        <a href="#" onClick="javascript:viewAccounts('TU');">toUse</a>
        <a href="#" onClick="javascript:viewAccounts('RF');">Res_KF</a>
        <a href="#" onClick="javascript:viewAccounts('RO');">Res_OA</a>  
        
        </div> 
        
        <script>
        function viewAccounts(acc){
        
        var mid = <?php echo $mid ?>;
        var yid = <?php echo $yid ?>;
        var page = <?php echo $page ?>;
        var url = 'overallaccountsloader.php';
        $.post(url, {accountVar:acc, mtid:mid, yrid:yid, pg:page}, function(data){ 
        
        $('#tablewrapper_overallaccounts').html(data).show(); });
        
        }
        
        </script> 
        
        <!-- The main contant goes here -->
                
        <div class='tablewrapper' id='tablewrapper_overallaccounts'>
        
        <?php
                
        $query = "SELECT * FROM `overall_accounts` WHERE  `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='Daniphord' ORDER BY transactionDate DESC ";
        
        $result = mysqli_query($connect, $query);
        
        $num_rows = mysqli_num_rows($result);
        
        if($num_rows !=0){
        
        echo "<table class='acctable'>";
        
        echo "<tr><th class='mythdata'>UserName</th><th id='dateclm'>Date</th><th class='mythdata'>Month</th><th class='mythdata'>Description</th>
        <th class='mythdata'>Type</th><th id='amountclm'>Income</th><th id='amountclm'>Expenditure</th><th id='amountclm'>AccEdit</th><th id='amountclm'>AccDelete</th></tr>";
        
        while ($row = mysqli_fetch_assoc($result)){
        $id = $row['transactionId'];
        $month_id = $row['month_id'];
        $year_id = $row['year_id'];
        $date = $row['transactionDate'];
        $month = $row['transactionMonth'];
        $year = $row['transactionYear'];
        $descr = $row['itemDescription'];
        $trtype = $row['transactionType'];
        $income = $row['incomeAmount'];
        $expenditure = $row['expenditureAmount'];
        $addedby = $row['recordedBy'];
        
        
        echo "<tr><td class='mythdata'>$addedby</td><td class='mythdata'>$date</td><td class='mythdata'>$month</td>
        <td class='mythdata'>$descr</td><td class='mythdata'>$trtype</td>
        <td class='amounttd'>$income</td><td class='amounttd'>$expenditure</td>
        <td class='edittd'><a class='editlink' href='editoverallaccountsform.php?mid=$mid&yid=$yid&trid=$id&page=$page'>Edit</a></td>
        <td class='edittd'><a class='editlink' href='deleteaccountsitemscript.php?mid=$mid&yid=$yid&trid=$id&page=$page'>Delete</a></td></tr>";
        
        }
        
        echo "<tr><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td>
        <td class='bottomrow'></td><td class='bottomrow'>Totals</td>
        
        <td class='bottomrow'>";
        
        
        $sum ="SELECT SUM(incomeAmount) as Amount FROM `overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='Daniphord'";		
        $result2 = mysqli_query($connect, $sum);
        
        if($result2){
        
        while ($row = mysqli_fetch_array($result2)){
        $incometotal= $row['Amount'];
        echo number_format($incometotal);
        }
        }
        
        echo "</td>";
        
        echo "<td class='bottomrow'>";
        
        
        $sum ="SELECT SUM(expenditureAmount) as Amount2 FROM `overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='Daniphord'";		
        $result2 = mysqli_query($connect, $sum);
        
        if($result2){
        
        while ($row = mysqli_fetch_array($result2)){
        $expendituretotal = $row['Amount2'];
        echo number_format($expendituretotal);
        }
        }
        
        echo"</td>";
        echo "<td class='bottomrow'></td>";
        echo "<td class='bottomrow'></td>";
        echo "</tr>";
        
        echo "<tr><td class='bottomrow2'></td></td><td class='bottomrow2'></td><td class='bottomrow2'>
        </td><td class='bottomrow2'></td><td class='bottomrow2'>Balance</td>";
        
        echo"<td class='bottomrow2'>";
        
        echo number_format($incometotal - $expendituretotal);
        
        
        echo "</td>";
        
        echo "<td class='bottomrow2'></td>";
        echo "<td class='bottomrow2'></td>";
        echo "<td class='bottomrow2'></td></tr>";
        
        echo"</table>";
        }else{
        
        echo '<div class="datamsg_main"><br>No data was found!</div>';
        }
        
        
        }
        ?>
        </div>
        
        
        <div class='linkwrapper'>
        <?php
        
        //backlink starts here
        
        echo '<a  class="backlink" href="overallaccountspage.php" >Back to the main page</a><br>';  
        
        ?>
        
        </div>
        
        
        <div class="footerwrapper1">
        <?php
        include ('../site_includes/footer.php');
        
        ?>
        
        </div>
        
        
      <!--  <div class="footerwrapper2">
        <?php
        //include ('../site_includes/footermobile.php');
        
        ?>
        
        </div> -->
        
        </div>
        </body>
        </html>