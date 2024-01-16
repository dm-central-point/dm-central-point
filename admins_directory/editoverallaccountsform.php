<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
is_admin();

?>
<!DOCTYPE html>

<html>
<head>
   <title>Accounts-display</title>  
   <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<?php 
include ('../site_includes/head.php'); 
?>
            
    <style>
    
        *{
        margin:0px; 
        background:darkorange;
        }
        
        .maindivtop{
        border: 4px sold black;
        width: 100%; 
        height:auto; 
        background:#666; 
        text-align: center; 
        border-radius:0px;
        position:relative;
       
           }
           

        
        .maindivtop::after{
        content:""; 
        clear:both;
        display:table;
        
        }
        
        .bottomrow2{
        padding:10px;
        font-weight:bold;
        font-size:18px;
        background:#eee;
        color:#000;
        text-align:right;
        }
        

        
        .linkwrapper{
        width:100%;
        background:#cccfff;
        height:40px;
        position:relative;
        
        }
        
        .backlink{
        display:block;
        background:#cccfff;
        margin: 0 auto;
        height:40px;
        text-align:center;
        line-height:40px;
        width:100%;
        color:blue;
        }  
        
        h2{
        background:darkorange;
        }
        
        .activepage {
        display:inline-block; 
        background:lightgreen; 
        padding:5px;
        margin:0;
        line-height:20px; 
        text-align:center; 
        width:30px; 
        height:30px;
        text-decoration:none; 
        border: 1px solid red; 
        border-radius:10px;
        }
        
        .paginationNumbers a {
        background:lightblue; 
        padding:5px; 
        margin:0;
        line-height:20px; 
        text-align:center; 
        width:30px; 
        height:30px;
        text-decoration:none; 
        border: 1px solid black; 
        border-radius:10px;
        display:inline-block; 
        }  
        
        .paginationNumbers{
        display:inline-block;
        height:30;
        padding:5px; 
        float:left;
        text-align:center;
        background:#cccfff;;
        text-align:center;
        }
        
        .paginationNumbers1{
        display:inline-block;
        position:relative;
        height:30;
        padding:5px; 
        float:left;
        text-align:center;
        background:#cccfff;
        text-align:center;
        }
        
        .pagination{
        position:relative;
        width:100%;
        height:auto;
        background:#cccfff;
        display:flex;
        flex-direction:row;
        justify-content:center;
        align-content:center;
        align-items:center;
        flex-flow: row-wrap;
        }
        
        .pagination strong, a{
        background:#cccfff;
        color:blue;
        }
        
        .mainwrapper{
        background:darkorange;
        }
        
        .myth{
        background:darkorange;
        
        }
        
        .name{
        background:tan;
        
        }
        


    </style>

</head>
    <body>
        
        <div class="titlewrapper">
         <!-- The titlebar goes here -->   
         
            <?php 
            include ('../site_includes/siteheader.php');
            ?>
        
            </div>


    <div class="mainwrapper">
                          
        
        <?php
     
if(isset($_GET['yid']) & isset($_GET['mid']) & isset($_GET['trid']) & isset($_GET['page']) & isset($_SESSION['userName'])){
    
$yid = $_GET['yid'];
$mid = $_GET['mid'];
$trid =$_GET['trid'];

        
        //paginatin code starts here////////////////////////////////////////////////////////////////////////////////////////////
        
$countquery = "SELECT COUNT(transactionId) FROM `overall_accounts` WHERE  `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`= '".$_SESSION['userName']."' ";

$totalcount = mysqli_query ($connect, $countquery);

$outcome = mysqli_fetch_array($totalcount);

$totaloutcome = $outcome['0'];

$per_page = 15;

$num_of_pages = ceil($totaloutcome/$per_page);
        
        
        if(!isset($_GET['page'])){
        
        header('Location: editaccountsform.php?page=1');
        
        }else{
        
        
        $page = $_GET['page'];
        
        }
        
        $start = (($page - 1) * $per_page);
        
        
        $centerpages = "";
        $pminus1 = $page - 1;
        $pminus2 = $page - 2;
        $pplus1 = $page + 1;
        $pplus2 = $page + 2;
        
        if($page ==1){
        $centerpages .='<span class="activepage">' .$page. '</span> ';
        $centerpages .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$pplus1.'&yid='.$yid.'&mid='.$mid.'&trid='.$trid.'">' .$pplus1. '</a> ';
        
        }else if($page == $num_of_pages){
        
        
        $centerpages .='<a href="'.$_SERVER['PHP_SELF'].'?page='.$pminus1.'&yid='.$yid.'&mid='.$mid.'&trid='.$trid.'">' .$pminus1. '</a> ';
        $centerpages .='<span class="activepage">' .$page. '</span> ';
        
        }else if($page > 2 && $page < ($num_of_pages-1)){
        
        $centerpages .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$pminus2.'&yid='.$yid.'&mid='.$mid.'&trid='.$trid.'">' .$pminus2. '</a> ';
        $centerpages .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$pminus1.'&yid='.$yid.'&mid='.$mid.'&trid='.$trid.'">' .$pminus1. '</a> ';
        $centerpages .=' <span class="activepage">' .$page. '</span> ';
        $centerpages .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$pplus1.'&yid='.$yid.'&mid='.$mid.'&trid='.$trid.'&trid='.$trid.'">' .$pplus1. '</a> ';
        $centerpages .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$pplus2.'&yid='.$yid.'&mid='.$mid.'&trid='.$trid.'">' .$pplus2. '</a> ';
        
        }else if($page > 1 && $page < ($num_of_pages)){
        
        
        $centerpages .='<a href="'.$_SERVER['PHP_SELF'].'?page='.$pminus1.'&yid='.$yid.'&mid='.$mid.'&trid='.$trid.'">' .$pminus1. '</a> ';
        $centerpages .='<span class="activepage">' .$page. '</span>';
        $centerpages .='<a href="'.$_SERVER['PHP_SELF'].'?page='.$pplus1.'&yid='.$yid.'&mid='.$mid.'&trid='.$trid.'">' .$pplus1. '</a> ';
        
        }
        
        // pagination display implementation starts here///////////////////////////////////////////////////////
        
        $paginationDisplay ="";
        
        if($num_of_pages!="1"){
        $paginationDisplay.= '<div class="paginationNumbers1 ">Page <strong>'. $page. '</strong> of '.$num_of_pages.'</div><br>';
        
        if($page !=1){
        
        $previous = $page - 1;
        $paginationDisplay .='<a href="'.$_SERVER['PHP_SELF'].'?page='.$previous.'&yid='.$yid.'&mid='.$mid.'&trid='.$trid.'"> Back </a>';
        }
        $paginationDisplay .='<div class="paginationNumbers"> '.$centerpages.' </div>'; 
        
        if($page != $num_of_pages){
        
        $next = $page + 1;
        $paginationDisplay .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$next.'&yid='.$yid.'&mid='.$mid.'&trid='.$trid.'"> Next </a>';
        
        }
        
        }
        
}
        
        // pagination code ends here////////////////////////////////////////////////////////////////////////////////////////////////
        
        ?>


  </div>       
        
         
         
          
         
    <div class="maindivtop">
        <!-- The main contant goes here -->
        <?php
        
        if(isset($_GET['yid']) & isset($_GET['mid'])){
        
        $yid = $_GET['yid'];
        $mid = $_GET['mid']; 
        $trid =$_GET['trid'];
        
        $select = mysqli_query($connect, "SELECT * FROM `overall_accounts` WHERE `transactionId`= $trid");
        
        if(mysqli_num_rows($select)>0){
        
        $row = mysqli_fetch_assoc($select);
        
        $id = $row['transactionId'];
        $month_id = $row['month_id'];
        $year_id = $row['year_id'];
        $date = $row['transactionDate'];
        $month = $row['transactionMonth'];
        $year = $row['transactionYear'];
        $descr = $row['itemDescription'];
        $channel = $row['transactionChannel'];
        $quality = $row['typeQuantity'];
        $type = $row['transactionType'];
        $income = $row['incomeAmount'];
        $expenditure = $row['expenditureAmount'];
        
        $es_id = stripslashes(htmlspecialchars($id, ENT_QUOTES));
        $es_month_id = stripslashes(htmlspecialchars($month_id, ENT_QUOTES));
        $es_year_id = stripslashes(htmlspecialchars($year_id, ENT_QUOTES));
        $es_date = stripslashes(htmlspecialchars($date, ENT_QUOTES));
        $es_month = stripslashes(htmlspecialchars($month, ENT_QUOTES));
        $es_year = stripslashes(htmlspecialchars($year, ENT_QUOTES));
        $es_descr = stripslashes(htmlspecialchars($descr, ENT_QUOTES));
        $es_channel = stripslashes(htmlspecialchars($channel, ENT_QUOTES));
        $es_quality = stripslashes(htmlspecialchars($quality, ENT_QUOTES));
        $es_type = stripslashes(htmlspecialchars($type, ENT_QUOTES));
        $es_income = stripslashes(htmlspecialchars($income, ENT_QUOTES));
        $es_expenditure = stripslashes(htmlspecialchars($expenditure, ENT_QUOTES));
        
        }else{
        echo '<div class="datamsg">No data was found!</div>';
        
        }
        
        
        
        
        
        
        echo "<form class='accform_edit' method='post'action='editoverallaccountscript.php'>
        <input type='date' name='date' value='$es_date'>
        
        <select name='month'>
        <option value='$es_month'>$es_month</option>
        <option value='January'>January</option>
        <option value='February'>February</option>
        <option value='March'>March</option>
        <option value='April'>April</option>
        <option value='May'>May</option>
        <option value='June'>June</option>
        <option value='July'>July</option>
        <option value='August'>August</option>
        <option value='September'>September</option>
        <option value='October'>October</option>
        <option value='November'>November</option>
        <option value='December'>December</option>
        </select>
        
        <select name='year'>
        <option value='$year'>$es_year</option>
        <option value='2017'>2017</option>
        <option value='2018'>2018</option>
        <option value='2019'>2019</option>
        <option value='2020'>2020</option>
        <option value='2021'>2021</option>
        <option value='2022'>2022</option>
        <option value='2023'>2023</option>
        <option value='2024'>2024</option>
        <option value='2025'>2025</option>
        <option value='2026'>2026</option>
        <option value='October'>October</option>
        
        </select> 
        
        <input type='text' name='description' value='$es_descr' > 
        <input type='text' name='quality' value='$es_quality'>
        
        <select name='channel'> 
        <option value='$es_channel'>$es_channel</option>
        <option>Twiga_Vision_General</option>
        <option>KHM_centre</option>
        <option>Take_A_Malaika</option>
        <option>Caanani_Group</option>
        <option>Twiga_Challenge</option>
        <option>Eager_Volunteers</option>
        <option>Nyoneza_Fund</option>
        <option>Northern_Vocational_Training</option>
        <option>Unique_Daycare_Centre</option>
        <option>Home_expenditure</option>
        <option>Other</option>
        
        </select>
        
        
        <select name='type'>
        <option '$es_type'>$es_type</option>
        <option>Income</option>
        <option>Expenditure</option>
        
        </select>  
        
        
        <input type='number' name='income' value='$es_income'>
        <input type='number' name='expenditure' value='$es_expenditure'>
        <input type='hidden' name='monthid' value='$mid'>
        <input type='hidden' name='yearid' value='$yid'>
        <input type='hidden' name='id' value='$id'>
        <input type='hidden' name='page' value='$page'>
        <input type='submit' id='mysubmitbtn' name='submit' value='Add Acounts'>
        </form>";

        
        
       echo "<div class='tablewrapper'>";
        
        $query = "SELECT * FROM `overall_accounts` WHERE  `year_id`='$yid' AND `month_id` ='$mid' ORDER BY transactionDate DESC LIMIT $start, $per_page";
        
        $result = mysqli_query($connect, $query);
        
        $num_rows = mysqli_num_rows($result);
        
        if($num_rows !=0){
        
        echo "<table class='acctable'>";
    
    
        echo "<tr><th id='dateclm'>Date</th><th class='mythdata'>Month</th><th class='mythdata'>Year</th><th class='mythdata'>Description</th><th class='mythdata'>Type</th>
        <th class='mythdata'>Channel</th><th class='mythdata'>Category</th><th id='amountclm'>Income</th><th id='amountclm'>Expenditure</th>";
        
        while ($row = mysqli_fetch_assoc($result)){
        $id = $row['transactionId'];
        $month_id = $row['month_id'];
        $year_id = $row['year_id'];
        $date = $row['transactionDate'];
        $month = $row['transactionMonth'];
        $year = $row['transactionYear'];
        $descr = $row['itemDescription'];
        $quality = $row['typeQuantity'];
        $channel = $row['transactionChannel'];
        $type = $row['transactionType'];
        $income = $row['incomeAmount'];
        $expenditure = $row['expenditureAmount'];
        
        
        
        echo "<tr><td class='mythdata'>$date</td><td class='mythdata'>$month</td>
        <td class='mythdata'>$year</td><td class='mythdata'>$descr</td><td class='mythdata'>$quality</td><td class='mythdata'>$channel</td><td class='mythdata'>$type</td>
        <td class='amounttd'>$income</td><td class='amounttd'>$expenditure</td>
        </tr>";
        
        }
        
        echo "<tr><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td>
        <td class='bottomrow'>Totals</td>
        
        <td class='bottomrow'>";
        
        
        $sum ="SELECT SUM(incomeAmount) as Amount FROM `overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid' ";		
        $result2 = mysqli_query($connect, $sum);
        
        if($result2){
        
        while ($row = mysqli_fetch_array($result2)){
        $incometotal= $row['Amount'];
        echo $incometotal;
        }
        }
        
        echo "</td>";
        
        echo "<td class='bottomrow'>";
        
        
        $sum ="SELECT SUM(expenditureAmount) as Amount2 FROM `overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid' ";		
        $result2 = mysqli_query($connect, $sum);
        
        if($result2){
        
        while ($row = mysqli_fetch_array($result2)){
        $expendituretotal = $row['Amount2'];
        echo $expendituretotal;
        }
        }
        
        echo "</td>";
        
        
        echo "<tr><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'></td></td><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'>Balance</td>";
        
        echo"<td class='bottomrow2'>";
        
        echo $incometotal - $expendituretotal;
        
        
        echo "</td>";
        
        echo "<td class='bottomrow2'></td></tr>";
        
        
        echo"</table>";
        }else{
        
        echo '<div class="datamsg">No data was found!</div>';
        }
        
        
        }


        echo "</div>";
        
        ?> 

       

    </div>
   



        <div class="pagination">
        
        <?php
        
        echo "<br>";
        // pagination display starts here///////////////////////////////////////////////////////
        
        echo $paginationDisplay;
        
        echo "<br>";
        
        // pagination display ends here///////////////////////////////////////////////////////
        ?>
        
        </div> 
        
        
         <div class='linkwrapper'>
        <!--pagination display-->
        <?php
        
        //backlink starts here
       
        echo '<a  class="backlink" href="manageoverallaccounts.php?yid='.$yid.'&mid='.$mid.'&page=1" >Back to previous page</a><br>';  
        
        ?>
        
        </div>
  
        <div class="mainwrapper">
            <!-- The footer goes here -->
            <?php 
            include ('../../site_includes/footermobile2.php');
            ?>        
        
        </div>
 
 
</body>
</html>