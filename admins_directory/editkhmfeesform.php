<?php
include ('../../site_includes/connect.php');
include ('../../site_includes/functions.php');
is_admin();

?>
<!DOCTYPE html>

<html>
<head>
   <title>Fees-page</title>  
   <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<?php 
include ('../../site_includes/head.php'); 
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
           
        .bottomrow2{
        padding:10px;
        font-weight:bold;
        font-size:18px;
        background:violet;
        color:white;
        text-align:right;
        border:1px solid black;
        }  

        
        .maindivtop::after{
        content:""; 
        clear:both;
        display:table;
        
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
            include ('../../site_includes/titlebar2.php');
            ?>
        
            </div>

        <div class="menuwrapper2">
                <!-- The menubar goes here -->
            <?php 
                include ('../../site_includes/menubarmobile.php');
            ?> 
        </div>
                        


    <div class="mainwrapper">
                          
        
        <?php
     
if(isset($_GET['yid']) & isset($_GET['mid']) & isset($_GET['page'])){
    
        $yid = mysqli_real_escape_string($connect, $_GET['yid']);
        $mid = mysqli_real_escape_string($connect, $_GET['mid']); 
        $incid = mysqli_real_escape_string($connect, $_GET['incid']);
        $page = mysqli_real_escape_string($connect, $_GET['page']);
        
        //paginatin code starts here////////////////////////////////////////////////////////////////////////////////////////////
        
        $countquery = "SELECT COUNT(id) FROM `khm_schoolfees_table` WHERE `yearId`='$yid' AND `monthId` ='$mid' ";
        
        $totalcount = mysqli_query ($connect, $countquery);
        
        $outcome = mysqli_fetch_array($totalcount);
        
        $totaloutcome = $outcome['0'];
        
        $per_page = 15;
        
        $num_of_pages = ceil($totaloutcome/$per_page);
        
        
        if(!isset($_GET['page'])){
        
        header('Location: displayfees.php?page=1');
        
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
        $centerpages .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$pplus1.'&yid='.$yid.'&mid='.$mid.'&incid='.$incid.'">' .$pplus1. '</a> ';
        
        }else if($page == $num_of_pages){
        
        
        $centerpages .='<a href="'.$_SERVER['PHP_SELF'].'?page='.$pminus1.'&yid='.$yid.'&mid='.$mid.'&incid='.$incid.'">' .$pminus1. '</a> ';
        $centerpages .='<span class="activepage">' .$page. '</span> ';
        
        }else if($page > 2 && $page < ($num_of_pages-1)){
        
        $centerpages .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$pminus2.'&yid='.$yid.'&mid='.$mid.'&incid='.$incid.'">' .$pminus2. '</a> ';
        $centerpages .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$pminus1.'&yid='.$yid.'&mid='.$mid.'&incid='.$incid.'">' .$pminus1. '</a> ';
        $centerpages .=' <span class="activepage">' .$page. '</span> ';
        $centerpages .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$pplus1.'&yid='.$yid.'&mid='.$mid.'&incid='.$incid.'">' .$pplus1. '</a> ';
        $centerpages .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$pplus2.'&yid='.$yid.'&mid='.$mid.'&incid='.$incid.'">' .$pplus2. '</a> ';
        
        }else if($page > 1 && $page < ($num_of_pages)){
        
        
        $centerpages .='<a href="'.$_SERVER['PHP_SELF'].'?page='.$pminus1.'&yid='.$yid.'&mid='.$mid.'&incid='.$incid.'">' .$pminus1. '</a> ';
        $centerpages .='<span class="activepage">' .$page. '</span>';
        $centerpages .='<a href="'.$_SERVER['PHP_SELF'].'?page='.$pplus1.'&yid='.$yid.'&mid='.$mid.'&incid='.$incid.'">' .$pplus1. '</a> ';
        
        }
        
        // pagination display implementation starts here///////////////////////////////////////////////////////
        
        $paginationDisplay ="";
        
        if($num_of_pages!="1"){
        $paginationDisplay.= '<div class="paginationNumbers1 ">Page <strong>'. $page. '</strong> of '.$num_of_pages.'</div><br>';
        
        if($page !=1){
        
        $previous = $page - 1;
        $paginationDisplay .='<a class="navlinks" href="'.$_SERVER['PHP_SELF'].'?page='.$previous.'&yid='.$yid.'&mid='.$mid.'&incid='.$incid.'"> Back </a>';
        }
        $paginationDisplay .='<div class="paginationNumbers"> '.$centerpages.' </div>'; 
        
        if($page != $num_of_pages){
        
        $next = $page + 1;
        $paginationDisplay .=' <a class="navlinks" href="'.$_SERVER['PHP_SELF'].'?page='.$next.'&yid='.$yid.'&mid='.$mid.'&incid='.$incid.'"> Next </a>';
        
        }
        
        }
        
}
        
        // pagination code ends here////////////////////////////////////////////////////////////////////////////////////////////////
        
        ?>


  </div>       
        
         
         
          
         
    <div class="maindivtop">
        <!-- The main contant goes here -->
        <?php
        
        if(isset($_GET['yid']) & isset($_GET['mid']) & isset($_GET['incid']) & isset($_GET['page'])){
        
        $yid = mysqli_real_escape_string($connect, $_GET['yid']);
        $mid = mysqli_real_escape_string($connect, $_GET['mid']); 
        $incid = mysqli_real_escape_string($connect, $_GET['incid']);
        $page = mysqli_real_escape_string($connect, $_GET['page']);
        
        
        $select = mysqli_query($connect, "SELECT * FROM `khm_schoolfees_table` WHERE `id`= $incid");
        
        if(mysqli_num_rows($select)>0){
        
        $row = mysqli_fetch_assoc($select);
        
        $id = $row['id'];
        $mid = $row['monthId'];
        $yid =$row['yearId'];
        $date = $row['date'];
        $payername = $row['payerFullName'];
        $chname = $row['childName'];
        $month = $row['currentMonth'];
        $monthpaid = $row['monthPaidFor'];
        $year = $row['currentYear'];
        $yearpaid = $row['yearPaidFor'];
        $amount = $row['amountPaid'];
        $standing = $row['outStanding'];
        
        
        $es_id = stripslashes(htmlspecialchars($id, ENT_QUOTES));
        $es_mid = stripslashes(htmlspecialchars($month_id, ENT_QUOTES));
        $es_yeid = stripslashes(htmlspecialchars($year_id, ENT_QUOTES));
        $es_date = stripslashes(htmlspecialchars($date, ENT_QUOTES));
        $es_payername = stripslashes(htmlspecialchars($payername, ENT_QUOTES));
        $es_chname = stripslashes(htmlspecialchars($chname, ENT_QUOTES));
        $es_month = stripslashes(htmlspecialchars($month, ENT_QUOTES));
        $es_monthpaid = stripslashes(htmlspecialchars($monthpaid, ENT_QUOTES));
        $es_year = stripslashes(htmlspecialchars($year, ENT_QUOTES));
        $es_yearpaid = stripslashes(htmlspecialchars($yearpaid, ENT_QUOTES));
        $es_amount = stripslashes(htmlspecialchars($amount, ENT_QUOTES));
        $es_standing = stripslashes(htmlspecialchars($standing, ENT_QUOTES));
        
        
        }else{
        echo '<div class="datamsg">No data was found!</div>';
        
        }
        
        
        
        echo "<form class='accform_edit' method='post'action='editkhmfeescript.php'>
        <input type='date' name='date' value='$es_date'>
        <input type='text' name='fname' value='$es_payername' >
        <input type='text' name='chname' value='$es_chname' >
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
        
        <select name='monthpaid'>
        <option value='$es_monthpaid'>$es_monthpaid</option>
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
        <option value='October'>October</option>
        
        </select>   
        
        <select name='yearpaid'>
        <option value='$es_yearpaid'>$es_yearpaid</option>
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
        
        <input type='number' name='amount' value='$es_amount'>
        <input type='number' name='standing' value='$es_standing'>
        <input type='hidden' name='monthid' value='$mid'>
        <input type='hidden' name='yearid' value='$yid'>
        <input type='hidden' name='id' value='$id'>
        <input type='hidden' name='page' value='$page'>
        <input type='submit' id='mysubmitbtn' name='submit' value='Add Acounts'>
        </form>";

   
        echo "<div class='tablewrapper'>";   
        
        $query = "SELECT * FROM `khm_schoolfees_table` WHERE  `yearId`='$yid' AND `monthId` ='$mid' ORDER BY date DESC LIMIT $start, $per_page ";
        
        $result = mysqli_query($connect, $query);
        
        $num_rows = mysqli_num_rows($result);
        
        if($num_rows !=0){
        
        echo "<table class='acctable'>";
        
        /*`monthId`, `yearId`, `date`, `payerFullName`, `childName`, `currentMonth`, `monthPaidFor`, `currentYear`, `yearPaidFor`,  `amountPaid`, `outStanding` */
        
        
        echo "<tr><th id='dateclm'>Date</th><th class='mythdata'>Payer's Full Name</th><th class='mythdata'>Child Name</th><th class='mythdata'>Month</th><th class='mythdata'>Pay Month </th><th class='mythdata'>Year</th><th class='mythdata'>Pay Year</th>
        <th class='mythdata'>Amount</th><th class='mythdata'>Outstanding</th></tr>";
        
        while ($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $month_id = $row['monthId'];
        $year_id = $row['yearId'];
        $date = $row['date'];
        $payername = $row['payerFullName'];
        $chname = $row['childName'];
        $month = $row['currentMonth'];
        $monthpaid = $row['monthPaidFor'];
        $year = $row['currentYear'];
        $yearpaid = $row['yearPaidFor'];
        $amount = $row['amountPaid'];
        $standing = $row['outStanding'];
        
        
        
        
        echo "<tr><td class='mythdata'>$date</td><td class='mythdata'>$payername</td><td class='mythdata'>$chname</td><td class='mythdata'>$month</td><td class='mythdata'>$monthpaid</td><td class='mythdata'>$year</td><td class='mythdata'>$yearpaid</td>
        <td class='amounttd'>$amount</td><td class='amounttd'>$standing</td></tr>";
        
        }
        
        /*>>>>>>>>>>>>>>>>>BOTTOM ROW ONE<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/
        echo "<tr><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'></td><td class='bottomrow'>Total fees</td>
        
        <td class='bottomrow'>";
        
        
        $sum ="SELECT SUM(amountPaid) as Amount FROM `khm_schoolfees_table` WHERE `yearId`='$yid' AND `monthId` ='$mid'";		
        $result2 = mysqli_query($connect, $sum);
        
        if($result2){
        
        while ($row = mysqli_fetch_array($result2)){
        echo $row['Amount'];
        }
        }
        
        echo "</td>";
        
        echo"<td class='bottomrow'>";
        
        $sum ="SELECT SUM(outStanding) as Standing FROM `khm_schoolfees_table` WHERE `yearId`='$yid' AND `monthId` ='$mid'";		
        $result2 = mysqli_query($connect, $sum);
        
        if($result2){
        
        while ($row = mysqli_fetch_array($result2)){
        echo $row['Standing'];
        }
        }
        
        
        echo "</td>";
      
        
        /*>>>>>>>>>>>>>>>>> BOTTOM ROW TWO <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/
        echo "<tr><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'></td><td class='bottomrow2'>Payment in advance</td>
        
        <td class='bottomrow2'>";
        
        
        $sum ="SELECT SUM(amountPaid) as Amount FROM `khm_schoolfees_table` WHERE `yearId`='$yid' AND `monthId` ='$mid'";		
        $result2 = mysqli_query($connect, $sum);
        
        if($result2){
        
        while ($row = mysqli_fetch_array($result2)){
        echo $row['Amount'];
        }
        }
        
        echo "</td>";
        
        echo"<td class='bottomrow2'>";
        
        $sum ="SELECT SUM(outStanding) as Standing FROM `khm_schoolfees_table` WHERE `yearId`='$yid' AND `monthId` ='$mid'";		
        $result2 = mysqli_query($connect, $sum);
        
        if($result2){
        
        while ($row = mysqli_fetch_array($result2)){
        echo $row['Standing'];
        }
        }
        
        
        echo "</td>";
        
   
        
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
   
        echo '<a  class="backlink" href="manageoverallaccounts.php?yid='.$yid.'&mid='.$mid.'&page='.$page.'" >Back to previous page</a><br>';  
        
        
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