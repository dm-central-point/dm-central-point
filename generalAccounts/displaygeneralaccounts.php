    <?php
    include ('../site_includes/connect.php');
    include ('../site_includes/functions.php');
    is_stakeholder();

    ?>
    <!DOCTYPE html>

    <html>
    <head>
    <title>Accounts-display</title>  
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <div class="form_loader"><a id="formbtn" onclick="loadForm()"> Load_Form </a></div>

    <div class="mainwrapper">

    <?php

    if(isset($_GET['yid']) & isset($_GET['mid']) & isset($_GET['page']) & isset($_SESSION['userName'])){

    $yid = $_GET['yid'];
    $mid = $_GET['mid'];  
    $page = $_GET['page'];

    //paginatin code starts here////////////////////////////////////////////////////////////////////////////////////////////

    $countquery = "SELECT COUNT(transactionId) FROM `overall_accounts` WHERE  `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`= '".$_SESSION['userName']."' ";

    $totalcount = mysqli_query ($connect, $countquery);

    $outcome = mysqli_fetch_array($totalcount);

    $totaloutcome = $outcome['0'];

    $per_page = 10;

    $num_of_pages = ceil($totaloutcome/$per_page);


    if(!isset($_GET['page'])){

    header('Location: displaygeneralaccounts.php?page=1');

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
    $centerpages .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$pplus1.'&yid='.$yid.'&mid='.$mid.'">' .$pplus1. '</a> ';

    }else if($page == $num_of_pages){

    $centerpages .='<a href="'.$_SERVER['PHP_SELF'].'?page='.$pminus1.'&yid='.$yid.'&mid='.$mid.'">' .$pminus1. '</a> ';
    $centerpages .='<span class="activepage">' .$page. '</span> ';

    }else if($page > 2 && $page < ($num_of_pages-1)){

    $centerpages .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$pminus2.'&yid='.$yid.'&mid='.$mid.'">' .$pminus2. '</a> ';
    $centerpages .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$pminus1.'&yid='.$yid.'&mid='.$mid.'">' .$pminus1. '</a> ';
    $centerpages .=' <span class="activepage">' .$page. '</span> ';
    $centerpages .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$pplus1.'&yid='.$yid.'&mid='.$mid.'">' .$pplus1. '</a> ';
    $centerpages .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$pplus2.'&yid='.$yid.'&mid='.$mid.'">' .$pplus2. '</a> ';

    }else if($page > 1 && $page < ($num_of_pages)){

    $centerpages .='<a href="'.$_SERVER['PHP_SELF'].'?page='.$pminus1.'&yid='.$yid.'&mid='.$mid.'">' .$pminus1. '</a> ';
    $centerpages .='<span class="activepage">' .$page. '</span>';
    $centerpages .='<a href="'.$_SERVER['PHP_SELF'].'?page='.$pplus1.'&yid='.$yid.'&mid='.$mid.'">' .$pplus1. '</a> ';
    }

    // pagination display implementation starts here///////////////////////////////////////////////////////

    $paginationDisplay ="";

    if($num_of_pages!="1"){
    $paginationDisplay.= '<div class="paginationNumbers1 ">Page <strong>'. $page. '</strong> of '.$num_of_pages.'</div><br>';

    if($page !=1){

    $previous = $page - 1;
    $paginationDisplay .='<a class="navlinks" href="'.$_SERVER['PHP_SELF'].'?page='.$previous.'&yid='.$yid.'&mid='.$mid.'"> Back </a>';
    }
    $paginationDisplay .='<div class="paginationNumbers"> '.$centerpages.' </div>'; 

    if($page != $num_of_pages){

    $next = $page + 1;
    $paginationDisplay .=' <a class="navlinks" href="'.$_SERVER['PHP_SELF'].'?page='.$next.'&yid='.$yid.'&mid='.$mid.'"> Next </a>';
    }

    }

    }

    // pagination code ends here////////////////////////////////////////////////////////////////////////////////////////////////

    ?>

    </div>       

    <?php
    if(isset($_GET['yid']) & isset($_GET['mid'])){

    $yid = $_GET['yid'];
    $mid = $_GET['mid'];  
    

   echo "<form class='accform' id='accformgeneral' method='post'action='generalaccountscript.php'>

    <input type='date' name='date'>

    <select name='month'>
    <option value=''>Select Month Here...</option>
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
    <option value=''>Select Year Here...</option>
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

    <input type='text' name='description' placeholder='Describe Item'>
    <input type='text' name='type' placeholder='Item type'>
    <input type='hidden' name='monthid' value='$mid'>
    <input type='hidden' name='yearid' value='$yid'>
    <input type='number' name='income' placeholder='Fill Income Here'>
    <input type='number' name='expenditure' placeholder='Fill Expenditure Here'>
    <input type='submit' id='mysubmitbtn' name='submit' value='Submit Accounts'>
    </form>

    <div class='tablewrapper'>";

    $query = "SELECT * FROM `overall_accounts` WHERE  `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`= '".$_SESSION['userName']."' ORDER BY transactionDate DESC  LIMIT $start, $per_page ";

    $result = mysqli_query($connect, $query);

    $num_rows = mysqli_num_rows($result);

    if($num_rows !=0){
    
    ?>
    
    <table class='acctable'>

    <tr><th id='dateclm'>Date</th><th class='mythdata'>Month</th><th class='mythdata'>Description</th><th class='mythdata'>
    Type</th><th id='amountclm'>Income</th><th id='amountclm'>Expenditure</th><th id='amountclm'>Settings</th></tr>

    <?php
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

   echo"<tr><td class='mythdata'>$date</td><td class='mythdata'>$month</td>
    <td class='mythdata'>$descr</td><td class='mythdata'>$trtype</td><td class='amounttd'>$income</td><td class='amounttd'>$expenditure</td>
    <td class='edittd'><a class='editlink' href='editgeneralaccountsform.php?mid=$mid&yid=$yid&trid=$id&page=$page'>Edit</a></td></tr>";

    }

    echo "<tr><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'>Grand Totals</td><td class='bottomrow'></td>

    <td class='bottomrow'>";

    $sum ="SELECT SUM(incomeAmount) as Amount FROM `overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='".$_SESSION['userName']."'";		
    $result2 = mysqli_query($connect, $sum);

    if($result2){

    while ($row = mysqli_fetch_array($result2)){
    $incometotal= $row['Amount'];
    echo number_format($incometotal);
    }
    }

    echo "</td>";

    echo "<td class='bottomrow'>";


    $sum ="SELECT SUM(expenditureAmount) as Amount2 FROM `overall_accounts` WHERE `year_id`='$yid' AND `month_id` ='$mid' AND `recordedBy`='".$_SESSION['userName']."'";		
    $result2 = mysqli_query($connect, $sum);

    if($result2){

    while ($row = mysqli_fetch_array($result2)){
    $expendituretotal = $row['Amount2'];
    echo number_format($expendituretotal);
    }
    }

    echo"</td>";
    echo "<td class='bottomrow'></td>";
    echo "</tr>";

    echo "<tr><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'>Balance</td>";

    echo"<td class='bottomrow2'>";

    echo number_format($incometotal - $expendituretotal);


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

    echo '<a  class="backlink" href="generalAccountsPage.php" >Back to the main page</a><br>';  

    ?>

    </div>
    </div>

    <?php include ('../site_includes/sitefooter.php'); ?>
    </body>

    <?php include ('../site_includes/jscodes_includer.php'); ?>
    </html>