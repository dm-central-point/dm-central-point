<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
is_stakeholder();

?>
<!DOCTYPE html>

<html>
<head>
   <title>Edit-Family_ccounts</title>  
   <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<?php 
include ('../site_includes/head.php'); 
?>
            

</head>
    <body>
        
        <div class="maindiv">
      
    <?php include ('../site_includes/siteheader.php'); ?>
    

    <?php
     
if(isset($_GET['yid']) & isset($_GET['mid']) & isset($_GET['trid']) & isset($_GET['page']) & isset($_SESSION['userName'])){
    
        $yid = mysqli_real_escape_string($connect, $_GET['yid']);
        $mid = mysqli_real_escape_string($connect, $_GET['mid']); 
        $trid = mysqli_real_escape_string($connect, $_GET['trid']);
        $page = mysqli_real_escape_string($connect, $_GET['page']);

        
        //paginatin code starts here////////////////////////////////////////////////////////////////////////////////////////////
        
$countquery = "SELECT COUNT(transactionId) FROM `overall_accounts` WHERE  `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`= '".$_SESSION['userName']."' ";

$totalcount = mysqli_query ($connect, $countquery);

$outcome = mysqli_fetch_array($totalcount);

$totaloutcome = $outcome['0'];

$per_page = 10;

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
        $centerpages .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$pplus1.'&yid='.$yid.'&mid='.$mid.'&trid='.$trid.'">' .$pplus1. '</a> ';
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
        $paginationDisplay .='<a class="navlinks" href="'.$_SERVER['PHP_SELF'].'?page='.$previous.'&yid='.$yid.'&mid='.$mid.'&trid='.$trid.'"> Back </a>';
        }
        $paginationDisplay .='<div class="paginationNumbers"> '.$centerpages.' </div>'; 
        
        if($page != $num_of_pages){
        
        $next = $page + 1;
        $paginationDisplay .=' <a class="navlinks" href="'.$_SERVER['PHP_SELF'].'?page='.$next.'&yid='.$yid.'&mid='.$mid.'&trid='.$trid.'"> Next </a>';
        
        }
        
        }
        
      } 

    // pagination code ends here////////////////////////////////////////////////////////////////////////////////////////////////
        
        ?>

       <?php
        
        if(isset($_GET['yid']) & isset($_GET['mid'])){
        
        $yid = mysqli_real_escape_string($connect, $_GET['yid']);
        $mid = mysqli_real_escape_string($connect, $_GET['mid']); 
        $trid = mysqli_real_escape_string($connect, $_GET['trid']);
        $page = mysqli_real_escape_string($connect, $_GET['page']);
        
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
        $es_type = stripslashes(htmlspecialchars($type, ENT_QUOTES));
        $es_income = stripslashes(htmlspecialchars($income, ENT_QUOTES));
        $es_expenditure = stripslashes(htmlspecialchars($expenditure, ENT_QUOTES));
        
        
        }else{
        echo '<div class="datamsg">No data was found!</div>';
        }
        
        echo "<form class='accform_edit' method='post'action='editgeneralaccountscript.php'>
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
        <option value='$es_year'>$es_year</option>
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
        <option value='2026'>2026</option>
        
        </select> 
        
        <input type='text' name='description' value='$es_descr' > 
        <input type='text' name='type' value='$es_type' > 
        <input type='number' name='income' value='$es_income'>
        <input type='number' name='expenditure' value='$es_expenditure'>
        <input type='hidden' name='monthid' value='$mid'>
        <input type='hidden' name='yearid' value='$yid'>
        <input type='hidden' name='id' value='$trid'>
        <input type='hidden' name='page' value='$page'>
        <input type='submit' id='mysubmitbtn' name='submit' value='Add Acounts'>
        </form>";

       
       echo "<div class='tablewrapper'>";
        
        $query = "SELECT * FROM `overall_accounts` WHERE  `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`= '".$_SESSION['userName']."' ORDER BY transactionDate DESC LIMIT $start, $per_page";
        
        $result = mysqli_query($connect, $query);
        
        $num_rows = mysqli_num_rows($result);
        
        if($num_rows !=0){
        
        echo "<table class='acctable'>";
    
    
        echo "<tr><th id='dateclm'>Date</th><th class='mythdata'>Month</th><th class='mythdata'>Year</th><th class='mythdata'>Description</th>
        <th class='mythdata'>Type</th><th id='amountclm'>Income</th><th id='amountclm'>Expenditure</th>";
        
        while ($row = mysqli_fetch_assoc($result)){
        $id = $row['transactionId'];
        $month_id = $row['month_id'];
        $year_id = $row['year_id'];
        $date = $row['transactionDate'];
        $month = $row['transactionMonth'];
        $year = $row['transactionYear'];
        $descr = $row['itemDescription'];
        $type = $row['transactionType'];
        $income = $row['incomeAmount'];
        $expenditure = $row['expenditureAmount'];
        
        
        
        echo "<tr><td class='mythdata'>$date</td><td class='mythdata'>$month</td> <td class='mythdata'>$year</td>
        <td class='mythdata'>$descr</td><td class='mythdata'>$type</td> <td class='amounttd'>$income</td><td class='amounttd'>$expenditure</td>
        </tr>";
        
        }
        
        echo "<tr><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td>
        <td class='bottomrow'>Totals</td>
        
        <td class='bottomrow'>";
        
        
        $sum ="SELECT SUM(incomeAmount) as Amount FROM `overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='".$_SESSION['userName']."'";		
        $result2 = mysqli_query($connect, $sum);
        
        if($result2){
        
        while ($row = mysqli_fetch_array($result2)){
        $incometotal= $row['Amount'];
        echo $incometotal;
        }
        }
        
        echo "</td>";
        
        echo "<td class='bottomrow'>";
        
        
        $sum ="SELECT SUM(expenditureAmount) as Amount2 FROM `overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='".$_SESSION['userName']."'";		
        $result2 = mysqli_query($connect, $sum);
        
        if($result2){
        
        while ($row = mysqli_fetch_array($result2)){
        $expendituretotal = $row['Amount2'];
        echo $expendituretotal;
        }
        }
        
        echo "</td>";
        
        
        echo "<tr><td class='bottomrow2'></td></td><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'>Balance</td>";
        
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
       
        echo '<a  class="backlink" href="displaygeneralaccounts.php?mid='.$mid.'&yid='.$yid.'&page='.$page.'" >Back to the previous page</a><br>';  
        
        ?>
        
        </div>
  
    </div>
    
 <?php include ('../site_includes/sitefooter.php'); ?>
 
</body>
</html>