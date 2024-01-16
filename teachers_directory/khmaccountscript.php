<?php
    ob_start();
    session_start();
    include('../site_includes/function.php');
    include('../site_includes/connect.php');
    include('../site_includes/accountsfunctions.php');
?>
    <head>

    </head>
    
<?php
    
    date_default_timezone_set('Africa/Nairobi');
    $lastupdate = date('d/m/Y h:i:s a', time());
    
    if(isset($_POST['submit'])){
        
    $date = mysqli_real_escape_string($connect, $_POST['date']);
    $month = mysqli_real_escape_string($connect, $_POST['month']);
    $year = mysqli_real_escape_string($connect, $_POST['year']);
    $code = mysqli_real_escape_string($connect, $_POST['code']);
    $descr = mysqli_real_escape_string($connect, $_POST['description']);
    $type = mysqli_real_escape_string($connect, $_POST['type']);
    $income = mysqli_real_escape_string($connect, $_POST['income']);
    $expenditure = mysqli_real_escape_string($connect, $_POST['expenditure']);
    $oncredit = mysqli_real_escape_string($connect, $_POST['oncredit']);
    $yid = mysqli_real_escape_string($connect, $_POST['yearid']);
    $mid = mysqli_real_escape_string($connect, $_POST['monthid']);
    $page = mysqli_real_escape_string($connect, $_POST['page']);
    $postedby = $_SESSION['userName'];
    $quality = mysqli_real_escape_string($connect, $_POST['quality']);
    
    
    echo $date."<br>";
    echo $month."<br>";
    echo $year."<br>";
    echo $code."<br>";
    echo $descr."<br>";
    echo $type."<br>";
    echo $income."<br>";
    echo $expenditure."<br>";
    echo $oncredit."<br>";
    echo $yid."<br>";
    echo $mid."<br>";
    echo $page."<br>";
    echo $postedby."<br>"; 
    echo $lastupdate;  
    
    
    echo "<br><br>";
    
    
    if(!empty($date) & !empty($month)& !empty($year) & !empty($code) & !empty($descr) & !empty($type)){
    
    $insert = mysqli_query($connect, "INSERT INTO `khm_overall_accounts`(`month_id`, `year_id`, `acc_Date`, `acc_Month`, `acc_Year`, `acc_Code`,
    `acc_Description`, `acc_Type`, `incomeAm`, `expenditureAm`,`oncreditExpenditure`, `recordedBy`, `updatedBy`, `lastUpdated`) 
    
    VALUES ( '$mid', '$yid', '$date', '$month','$year', '$code', '$descr', '$type', '$income', '$expenditure', '$oncredit', '$postedby', '$postedby', '$lastupdate')");
    
    
    if($insert){
        
        header("Refresh: 2; url=displaykhmaccounts.php?yid=$yid&mid=$mid&page=$page");
        
        echo "<div class='datamsg'>Accounts sucessfully submitted!</div>";
        
        
        
    }else{
        
        echo "<div class='datamsg'>Accounts not successfully submitted!<br>";
        echo "<a href='displaykhmaccounts.php?yid=$yid&mid=$mid&page=$page' class='backlink'>Please go back to the previous page!</a></div>";
    }
    }else{
        
        echo "<div class='datamsg'>All fields need to be filled!<br>";
        echo "<a href='displaykhmaccounts.php?yid=$yid&mid=$mid&page=$page' class='backlink'>Please go back to the previous page!</a></div>";
        
    }
    }
?>