<?php
header("Access-Control-Allow-Origin: *");
ob_start();
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
include ('../site_includes/accountsfunctions.php');
include ('../site_includes/head.php');
//is_admin();
?>

        
<?php
     
 if(isset($_POST['mtid']) & isset($_POST['yrid']) & isset($_POST['accountVar']) & isset($_POST['pg'])){
    
        $yid = $_POST['yrid'];
        $mid = $_POST['mtid']; 
        $accvar = $_POST['accountVar']; 
        $page = $_POST['pg'];
        
        
        //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> START YUSUFU<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        
        
        if($accvar=="YS"){
            
        
        
        if(isset($_POST['yrid']) & isset($_POST['mtid']) & isset($_POST['pg'])){
        
        $yid = mysqli_real_escape_string($connect, $_POST['yrid']);
        $mid = mysqli_real_escape_string($connect, $_POST['mtid']); 
        $page = mysqli_real_escape_string($connect, $_POST['pg']);;  
        

        
        $query = "SELECT * FROM `overall_accounts` WHERE  `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='gugungadu' ORDER BY transactionDate DESC ";
        
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
        $income = number_format($row['incomeAmount']);
        $expenditure = number_format($row['expenditureAmount']);
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
        
        
        $sum ="SELECT SUM(incomeAmount) as Amount FROM `overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='gugungadu";		
        $result2 = mysqli_query($connect, $sum);
        
        if($result2){
        
        while ($row = mysqli_fetch_array($result2)){
        $incometotal= $row['Amount'];
        echo number_format($incometotal);
        }
        }
        
        echo "</td>";
        
        echo "<td class='bottomrow'>";
        
        
        $sum ="SELECT SUM(expenditureAmount) as Amount2 FROM `overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='gugungadu'";		
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
    }
    
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> END YUSUFU<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
    
      
    
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>START OLIVA<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        
        
         else if($accvar=="OL"){
            
        if(isset($_POST['yrid']) & isset($_POST['mtid']) & isset($_POST['pg'])){
        
        $yid = mysqli_real_escape_string($connect, $_POST['yrid']);
        $mid = mysqli_real_escape_string($connect, $_POST['mtid']); 
        $page = mysqli_real_escape_string($connect, $_POST['pg']);;  
        
        $query = "SELECT * FROM `overall_accounts` WHERE  `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='Oliva' ORDER BY transactionDate DESC ";
        
        $result = mysqli_query($connect, $query);
        
        $num_rows = mysqli_num_rows($result);
        
        if($num_rows !=0){
        
        echo "<table class='acctable'>";
        
        echo "<tr><th class='mythdata'>UserName</th><th id='dateclm'>Date</th><th class='mythdata'>Month</th><th class='mythdata'>Year</th>
        <th class='mythdata'>Description</th><th class='mythdata'>Category</th>
        <th id='amountclm'>Income</th><th id='amountclm'>Expenditure</th><th id='amountclm'>AccEdit</th><th id='amountclm'>AccDelete</th></tr>";
        
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
        <td class='mythdata'>$year</td><td class='mythdata'>$descr</td><td class='mythdata'>$trtype</td>
        <td class='amounttd'>$income</td><td class='amounttd'>$expenditure</td>
        <td class='edittd'><a class='editlink' href='editoverallaccountsform.php?mid=$mid&yid=$yid&trid=$id&page=$page'>Edit</a></td>
        <td class='edittd'><a class='editlink' href='deleteaccountsitemscript.php?mid=$mid&yid=$yid&trid=$id&page=$page'>Delete</a></td></tr>";
        
        }
        
        echo "<tr><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td> <td class='bottomrow'>Totals</td>
        
        <td class='bottomrow'>";
        
        
        $sum ="SELECT SUM(incomeAmount) as Amount FROM `overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='Oliva'";       
        $result2 = mysqli_query($connect, $sum);
        
        if($result2){
        
        while ($row = mysqli_fetch_array($result2)){
        $incometotal= $row['Amount'];
        echo number_format($incometotal);
        }
        }
        
        echo "</td>";
        
        echo "<td class='bottomrow'>";
        
        
        $sum ="SELECT SUM(expenditureAmount) as Amount2 FROM `overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='Oliva'";     
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
        
        echo "<tr><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'></td></td><td class='bottomrow2'></td><td class='bottomrow2'>
        </td><td class='bottomrow2'></td><td class='bottomrow2'>Balance</td>";
        
        echo"<td class='bottomrow2'>";
        
        echo number_format($incometotal - $expendituretotal);
        
        
        echo "</td>";
        
        //echo "<td class='bottomrow2'></td>";
        //echo "<td class='bottomrow2'></td>";
        echo "<td class='bottomrow2'></td></tr>";
        
        echo"</table>";
        }else{
        
        echo '<div class="datamsg_main"><br>No data was found!</div>';
        }
        
        
        }
    }
    
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>ENDS OLIVA<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
    
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>START CHIPEGWA<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        
        
         else if($accvar=="CP"){
            
        if(isset($_POST['yrid']) & isset($_POST['mtid']) & isset($_POST['pg'])){
        
        $yid = mysqli_real_escape_string($connect, $_POST['yrid']);
        $mid = mysqli_real_escape_string($connect, $_POST['mtid']); 
        $page = mysqli_real_escape_string($connect, $_POST['pg']);;  
        
        $query = "SELECT * FROM `overall_accounts` WHERE  `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='Chipe' ORDER BY transactionDate DESC ";
        
        $result = mysqli_query($connect, $query);
        
        $num_rows = mysqli_num_rows($result);
        
        if($num_rows !=0){
        
        echo "<table class='acctable'>";
        
        echo "<tr><th class='mythdata'>UserName</th><th id='dateclm'>Date</th><th class='mythdata'>Month</th><th class='mythdata'>Year</th>
        <th class='mythdata'>Description</th><th class='mythdata'>Category</th>
        <th id='amountclm'>Income</th><th id='amountclm'>Expenditure</th><th id='amountclm'>AccEdit</th><th id='amountclm'>AccDelete</th></tr>";
        
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
        <td class='mythdata'>$year</td><td class='mythdata'>$descr</td><td class='mythdata'>$trtype</td>
        <td class='amounttd'>$income</td><td class='amounttd'>$expenditure</td>
        <td class='edittd'><a class='editlink' href='editoverallaccountsform.php?mid=$mid&yid=$yid&trid=$id&page=$page'>Edit</a></td>
        <td class='edittd'><a class='editlink' href='deleteaccountsitemscript.php?mid=$mid&yid=$yid&trid=$id&page=$page'>Delete</a></td></tr>";
        
        }
        
        echo "<tr><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td> <td class='bottomrow'>Totals</td>
        
        <td class='bottomrow'>";
        
        
        $sum ="SELECT SUM(incomeAmount) as Amount FROM `overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='Chipe'";       
        $result2 = mysqli_query($connect, $sum);
        
        if($result2){
        
        while ($row = mysqli_fetch_array($result2)){
        $incometotal= $row['Amount'];
        echo number_format($incometotal);
        }
        }
        
        echo "</td>";
        
        echo "<td class='bottomrow'>";
        
        
        $sum ="SELECT SUM(expenditureAmount) as Amount2 FROM `overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='Chipe'";     
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
        
        echo "<tr><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'></td></td><td class='bottomrow2'></td><td class='bottomrow2'>
        </td><td class='bottomrow2'></td><td class='bottomrow2'>Balance</td>";
        
        echo"<td class='bottomrow2'>";
        
        echo number_format($incometotal - $expendituretotal);
        
        
        echo "</td>";
        
        //echo "<td class='bottomrow2'></td>";
        //echo "<td class='bottomrow2'></td>";
        echo "<td class='bottomrow2'></td></tr>";
        
        echo"</table>";
        }else{
        
        echo '<div class="datamsg_main"><br>No data was found!</div>';
        }
        
        
        }
    }
    
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>ENDS CHIPEGWA<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
    
    
        //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>START CHILONGOLA<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        
        
         else if($accvar=="CL"){
            
        if(isset($_POST['yrid']) & isset($_POST['mtid']) & isset($_POST['pg'])){
        
        $yid = mysqli_real_escape_string($connect, $_POST['yrid']);
        $mid = mysqli_real_escape_string($connect, $_POST['mtid']); 
        $page = mysqli_real_escape_string($connect, $_POST['pg']);;  
        
        $query = "SELECT * FROM `overall_accounts` WHERE  `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='Chilo' ORDER BY transactionDate DESC ";
        
        $result = mysqli_query($connect, $query);
        
        $num_rows = mysqli_num_rows($result);
        
        if($num_rows !=0){
        
        echo "<table class='acctable'>";
        
        echo "<tr><th class='mythdata'>UserName</th><th id='dateclm'>Date</th><th class='mythdata'>Month</th><th class='mythdata'>Year</th>
        <th class='mythdata'>Description</th><th class='mythdata'>Category</th>
        <th id='amountclm'>Income</th><th id='amountclm'>Expenditure</th><th id='amountclm'>AccEdit</th><th id='amountclm'>AccDelete</th></tr>";
        
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
        <td class='mythdata'>$year</td><td class='mythdata'>$descr</td><td class='mythdata'>$trtype</td>
        <td class='amounttd'>$income</td><td class='amounttd'>$expenditure</td>
        <td class='edittd'><a class='editlink' href='editoverallaccountsform.php?mid=$mid&yid=$yid&trid=$id&page=$page'>Edit</a></td>
        <td class='edittd'><a class='editlink' href='deleteaccountsitemscript.php?mid=$mid&yid=$yid&trid=$id&page=$page'>Delete</a></td></tr>";
        
        }
        
        echo "<tr><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td> <td class='bottomrow'>Totals</td>
        
        <td class='bottomrow'>";
        
        
        $sum ="SELECT SUM(incomeAmount) as Amount FROM `overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='Chilo'";       
        $result2 = mysqli_query($connect, $sum);
        
        if($result2){
        
        while ($row = mysqli_fetch_array($result2)){
        $incometotal= $row['Amount'];
        echo number_format($incometotal);
        }
        }
        
        echo "</td>";
        
        echo "<td class='bottomrow'>";
        
        
        $sum ="SELECT SUM(expenditureAmount) as Amount2 FROM `overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='Chilo'";     
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
        
        echo "<tr><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'></td></td><td class='bottomrow2'></td><td class='bottomrow2'>
        </td><td class='bottomrow2'></td><td class='bottomrow2'>Balance</td>";
        
        echo"<td class='bottomrow2'>";
        
        echo number_format($incometotal - $expendituretotal);
        
        
        echo "</td>";
        
        //echo "<td class='bottomrow2'></td>";
        //echo "<td class='bottomrow2'></td>";
        echo "<td class='bottomrow2'></td></tr>";
        
        echo"</table>";
        }else{
        
        echo '<div class="datamsg_main"><br>No data was found!</div>';
        }
        
        
        }
    }
    
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>ENDS CHILONGOLA<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

    
    
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>START ROSELINE<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        
        
         else if($accvar=="RL"){
            
        if(isset($_POST['yrid']) & isset($_POST['mtid']) & isset($_POST['pg'])){
        
        $yid = mysqli_real_escape_string($connect, $_POST['yrid']);
        $mid = mysqli_real_escape_string($connect, $_POST['mtid']); 
        $page = mysqli_real_escape_string($connect, $_POST['pg']);;  
        
        $query = "SELECT * FROM `overall_accounts` WHERE  `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='Roseline' ORDER BY transactionDate DESC ";
        
        $result = mysqli_query($connect, $query);
        
        $num_rows = mysqli_num_rows($result);
        
        if($num_rows !=0){
        
        echo "<table class='acctable'>";
        
        echo "<tr><th class='mythdata'>UserName</th><th id='dateclm'>Date</th><th class='mythdata'>Month</th><th class='mythdata'>Year</th>
        <th class='mythdata'>Description</th><th class='mythdata'>Category</th>
        <th id='amountclm'>Income</th><th id='amountclm'>Expenditure</th><th id='amountclm'>AccEdit</th><th id='amountclm'>AccDelete</th></tr>";
        
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
        <td class='mythdata'>$year</td><td class='mythdata'>$descr</td><td class='mythdata'>$trtype</td>
        <td class='amounttd'>$income</td><td class='amounttd'>$expenditure</td>
        <td class='edittd'><a class='editlink' href='editoverallaccountsform.php?mid=$mid&yid=$yid&trid=$id&page=$page'>Edit</a></td>
        <td class='edittd'><a class='editlink' href='deleteaccountsitemscript.php?mid=$mid&yid=$yid&trid=$id&page=$page'>Delete</a></td></tr>";
        
        }
        
        echo "<tr><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td> <td class='bottomrow'>Totals</td>
        
        <td class='bottomrow'>";
        
        
        $sum ="SELECT SUM(incomeAmount) as Amount FROM `overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='Roseline'";       
        $result2 = mysqli_query($connect, $sum);
        
        if($result2){
        
        while ($row = mysqli_fetch_array($result2)){
        $incometotal= $row['Amount'];
        echo number_format($incometotal);
        }
        }
        
        echo "</td>";
        
        echo "<td class='bottomrow'>";
        
        
        $sum ="SELECT SUM(expenditureAmount) as Amount2 FROM `overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='Roseline'";     
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
        
        echo "<tr><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'></td></td><td class='bottomrow2'></td><td class='bottomrow2'>
        </td><td class='bottomrow2'></td><td class='bottomrow2'>Balance</td>";
        
        echo"<td class='bottomrow2'>";
        
        echo number_format($incometotal - $expendituretotal);
        
        
        echo "</td>";
        
        //echo "<td class='bottomrow2'></td>";
        //echo "<td class='bottomrow2'></td>";
        echo "<td class='bottomrow2'></td></tr>";
        
        echo"</table>";
        }else{
        
        echo '<div class="datamsg_main"><br>No data was found!</div>';
        }
        
        
        }
    }
    
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> END ROSELINE <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
    
    
    
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>START CHALINZE <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        
        
        else if($accvar=="CH"){
            
        if(isset($_POST['yrid']) & isset($_POST['mtid']) & isset($_POST['pg'])){
        
        $yid = mysqli_real_escape_string($connect, $_POST['yrid']);
        $mid = mysqli_real_escape_string($connect, $_POST['mtid']); 
        $page = mysqli_real_escape_string($connect, $_POST['pg']);;  
        
        $query = "SELECT * FROM `overall_accounts` WHERE  `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='Chalinze' ORDER BY transactionDate DESC ";
        
        $result = mysqli_query($connect, $query);
        
        $num_rows = mysqli_num_rows($result);
        
        if($num_rows !=0){
        
        echo "<table class='acctable'>";
        
        echo "<tr><th class='mythdata'>UserName</th><th id='dateclm'>Date</th><th class='mythdata'>Month</th><th class='mythdata'>Year</th>
        <th class='mythdata'>Description</th><th class='mythdata'>Category</th>
        <th id='amountclm'>Income</th><th id='amountclm'>Expenditure</th><th id='amountclm'>AccEdit</th><th id='amountclm'>AccDelete</th></tr>";
        
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
        <td class='mythdata'>$year</td><td class='mythdata'>$descr</td><td class='mythdata'>$trtype</td>
        <td class='amounttd'>$income</td><td class='amounttd'>$expenditure</td>
        <td class='edittd'><a class='editlink' href='editoverallaccountsform.php?mid=$mid&yid=$yid&trid=$id&page=$page'>Edit</a></td>
        <td class='edittd'><a class='editlink' href='deleteaccountsitemscript.php?mid=$mid&yid=$yid&trid=$id&page=$page'>Delete</a></td></tr>";
        
        }
        
        echo "<tr><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td> <td class='bottomrow'>Totals</td>
        
        <td class='bottomrow'>";
        
        
        $sum ="SELECT SUM(incomeAmount) as Amount FROM `overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='Chalinze'";		
        $result2 = mysqli_query($connect, $sum);
        
        if($result2){
        
        while ($row = mysqli_fetch_array($result2)){
        $incometotal= $row['Amount'];
        echo number_format($incometotal);
        }
        }
        
        echo "</td>";
        
        echo "<td class='bottomrow'>";
        
        
        $sum ="SELECT SUM(expenditureAmount) as Amount2 FROM `overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='Chalinze'";		
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
        
        echo "<tr><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'></td></td><td class='bottomrow2'></td><td class='bottomrow2'>
        </td><td class='bottomrow2'></td><td class='bottomrow2'>Balance</td>";
        
        echo"<td class='bottomrow2'>";
        
        echo number_format($incometotal - $expendituretotal);
        
        
        echo "</td>";
        
        //echo "<td class='bottomrow2'></td>";
        //echo "<td class='bottomrow2'></td>";
        echo "<td class='bottomrow2'></td></tr>";
        
        echo"</table>";
        }else{
        
        echo '<div class="datamsg_main"><br>No data was found!</div>';
        }
        
        
        }
    }
    
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>ENDS CHALINZE<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
    
    
 //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>START PAULINA<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        
        
        else if($accvar=="PL"){
            
        if(isset($_POST['yrid']) & isset($_POST['mtid']) & isset($_POST['pg'])){
        
        $yid = mysqli_real_escape_string($connect, $_POST['yrid']);
        $mid = mysqli_real_escape_string($connect, $_POST['mtid']); 
        $page = mysqli_real_escape_string($connect, $_POST['pg']);;  
        
        $query = "SELECT * FROM `overall_accounts` WHERE  `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='Paulina' ORDER BY transactionDate DESC ";
        
        $result = mysqli_query($connect, $query);
        
        $num_rows = mysqli_num_rows($result);
        
        if($num_rows !=0){
        
        echo "<table class='acctable'>";
        
        echo "<tr><th class='mythdata'>UserName</th><th id='dateclm'>Date</th><th class='mythdata'>Month</th><th class='mythdata'>Year</th>
        <th class='mythdata'>Description</th><th class='mythdata'>Category</th>
        <th id='amountclm'>Income</th><th id='amountclm'>Expenditure</th><th id='amountclm'>AccEdit</th><th id='amountclm'>AccDelete</th></tr>";
        
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
        <td class='mythdata'>$year</td><td class='mythdata'>$descr</td><td class='mythdata'>$trtype</td>
        <td class='amounttd'>$income</td><td class='amounttd'>$expenditure</td>
        <td class='edittd'><a class='editlink' href='editoverallaccountsform.php?mid=$mid&yid=$yid&trid=$id&page=$page'>Edit</a></td>
        <td class='edittd'><a class='editlink' href='deleteaccountsitemscript.php?mid=$mid&yid=$yid&trid=$id&page=$page'>Delete</a></td></tr>";
        
        }
        
        echo "<tr><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td> <td class='bottomrow'>Totals</td>
        
        <td class='bottomrow'>";
        
        
        $sum ="SELECT SUM(incomeAmount) as Amount FROM `overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='Paulina'";       
        $result2 = mysqli_query($connect, $sum);
        
        if($result2){
        
        while ($row = mysqli_fetch_array($result2)){
        $incometotal= $row['Amount'];
        echo number_format($incometotal);
        }
        }
        
        echo "</td>";
        
        echo "<td class='bottomrow'>";
        
        
        $sum ="SELECT SUM(expenditureAmount) as Amount2 FROM `overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='Paulina'";     
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
        
        echo "<tr><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'></td></td><td class='bottomrow2'></td><td class='bottomrow2'>
        </td><td class='bottomrow2'></td><td class='bottomrow2'>Balance</td>";
        
        echo"<td class='bottomrow2'>";
        
        echo number_format($incometotal - $expendituretotal);
        
        
        echo "</td>";
        
        //echo "<td class='bottomrow2'></td>";
        //echo "<td class='bottomrow2'></td>";
        echo "<td class='bottomrow2'></td></tr>";
        
        echo"</table>";
        }else{
        
        echo '<div class="datamsg_main"><br>No data was found!</div>';
        }
        
        
        }
    }
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>END PAULINA<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

    
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>START ANGEL<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
            
        else if($accvar=="AN"){
            
        if(isset($_POST['yrid']) & isset($_POST['mtid']) & isset($_POST['pg'])){
        
        $yid = mysqli_real_escape_string($connect, $_POST['yrid']);
        $mid = mysqli_real_escape_string($connect, $_POST['mtid']); 
        $page = mysqli_real_escape_string($connect, $_POST['pg']);;  
        
        $query = "SELECT * FROM `overall_accounts` WHERE  `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='Angel' ORDER BY transactionDate DESC ";
        
        $result = mysqli_query($connect, $query);
        
        $num_rows = mysqli_num_rows($result);
        
        if($num_rows !=0){
        
        echo "<table class='acctable'>";
        
        echo "<tr><th class='mythdata'>UserName</th><th id='dateclm'>Date</th><th class='mythdata'>Month</th><th class='mythdata'>Year</th>
        <th class='mythdata'>Description</th><th class='mythdata'>Category</th>
        <th id='amountclm'>Income</th><th id='amountclm'>Expenditure</th><th id='amountclm'>AccEdit</th><th id='amountclm'>AccDelete</th></tr>";
        
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
        <td class='mythdata'>$year</td><td class='mythdata'>$descr</td><td class='mythdata'>$trtype</td>
        <td class='amounttd'>$income</td><td class='amounttd'>$expenditure</td>
        <td class='edittd'><a class='editlink' href='editoverallaccountsform.php?mid=$mid&yid=$yid&trid=$id&page=$page'>Edit</a></td>
        <td class='edittd'><a class='editlink' href='deleteaccountsitemscript.php?mid=$mid&yid=$yid&trid=$id&page=$page'>Delete</a></td></tr>";
        
        }
        
        echo "<tr><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td> <td class='bottomrow'>Totals</td>
        
        <td class='bottomrow'>";
        
        
        $sum ="SELECT SUM(incomeAmount) as Amount FROM `overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='Angel'";       
        $result2 = mysqli_query($connect, $sum);
        
        if($result2){
        
        while ($row = mysqli_fetch_array($result2)){
        $incometotal= $row['Amount'];
        echo number_format($incometotal);
        }
        }
        
        echo "</td>";
        
        echo "<td class='bottomrow'>";
        
        
        $sum ="SELECT SUM(expenditureAmount) as Amount2 FROM `overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='Angel'";     
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
        
        echo "<tr><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'></td></td><td class='bottomrow2'></td><td class='bottomrow2'>
        </td><td class='bottomrow2'></td><td class='bottomrow2'>Balance</td>";
        
        echo"<td class='bottomrow2'>";
        
        echo number_format($incometotal - $expendituretotal);
        
        
        echo "</td>";
        
        //echo "<td class='bottomrow2'></td>";
        //echo "<td class='bottomrow2'></td>";
        echo "<td class='bottomrow2'></td></tr>";
        
        echo"</table>";
        }else{
        
        echo '<div class="datamsg_main"><br>No data was found!</div>';
        }
        
        
        }
    }
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>ENDS ANGEL<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
    
        
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>START ELSE<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        
        
        else{
            
        
        
        if(isset($_POST['yrid']) & isset($_POST['mtid']) & isset($_POST['pg'])){
        
        $yid = mysqli_real_escape_string($connect, $_POST['yrid']);
        $mid = mysqli_real_escape_string($connect, $_POST['mtid']); 
        $page = mysqli_real_escape_string($connect, $_POST['pg']);;  
        

        
        $query = "SELECT * FROM `overall_accounts` WHERE  `year_id`='$yid' AND `month_id` ='$mid' ORDER BY transactionDate DESC ";
        
        $result = mysqli_query($connect, $query);
        
        $num_rows = mysqli_num_rows($result);
        
        if($num_rows !=0){
        
        echo "<table class='acctable'>";
        
        echo "<tr><th class='mythdata'>UserName</th><th id='dateclm'>Date</th><th class='mythdata'>Month</th><th class='mythdata'>Year</th>
        <th class='mythdata'>Description</th><th id='amountclm'>Income</th><th id='amountclm'>Expenditure</th><th id='amountclm'>AccEdit</th><th id='amountclm'>AccDelete</th></tr>";
        
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
        <td class='mythdata'>$year</td><td class='mythdata'>$descr</td><td class='amounttd'>$income</td><td class='amounttd'>$expenditure</td>
        <td class='edittd'><a class='editlink' href='editoverallaccountsform.php?mid=$mid&yid=$yid&trid=$id&page=$page'>Edit</a></td>
        <td class='edittd'><a class='editlink' href='deleteaccountsitemscript.php?mid=$mid&yid=$yid&trid=$id&page=$page'>Delete</a></td></tr>";
        
        }
        
        echo "<tr><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'>Totals</td>
            <td class='bottomrow'>";
        
        
        $sum ="SELECT SUM(incomeAmount) as Amount FROM `overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid'";		
        $result2 = mysqli_query($connect, $sum);
        
        if($result2){
        
        while ($row = mysqli_fetch_array($result2)){
        $incometotal= $row['Amount'];
        echo number_format($incometotal);
        }
        }
        
        echo "</td>";
        
        echo "<td class='bottomrow'>";
        
        
        $sum ="SELECT SUM(expenditureAmount) as Amount2 FROM `overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid'";		
        $result2 = mysqli_query($connect, $sum);
        
        if($result2){
        
        while ($row = mysqli_fetch_array($result2)){
        $expendituretotal = $row['Amount2'];
        echo number_format($expendituretotal);
        }
        }
        
        echo"</td>";
        echo "<td class='bottomrow'></td><td class='bottomrow'></td>";
        echo "</tr>";
        
        echo "<tr><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'></td></td><td class='bottomrow2'></td><td class='bottomrow2'>
        </td><td class='bottomrow2'></td><td class='bottomrow2'>Balance</td>";
        
        echo"<td class='bottomrow2'>";
        
        echo number_format($incometotal - $expendituretotal);
        
        
        echo "</td>";
        
        //echo "<td class='bottomrow2'></td>";
        echo "<td class='bottomrow2'></td></tr>";
        
        echo"</table>";
        }else{
        
        echo '<div class="datamsg_main"><br>No data was found!</div>';
        }
        
        
        }
    }
    
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>ENDS ELSE<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
}
        
        ?>
    
    
    