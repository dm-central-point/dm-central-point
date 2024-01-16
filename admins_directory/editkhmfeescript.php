<?php
ob_start();
session_start();
include('../../site_includes/function.php');
include('../../site_includes/connect.php');
?>
<head>
<style>

    .datamsg{
    width:50%;
    height:150px;
    text-align:center;
    background:yellow;
    margin: 0 auto;
    font-size:20px;
    line-height:50px;
    margin-bottom:23%;
    margin-top:23%;
    }    
    
    .backlink{
        display:block;
        width:300px;
        height:40px;
        background:yellow;
        position:relative;
        margin: 0 auto;
        color:blue;
        
    }
    
    
    
</style>
    
    
</head>



<?php

date_default_timezone_set('Africa/Nairobi');
$lastupdate = date('d/m/Y h:i:s a', time());

if(isset($_POST['submit'])){
    
    
$fm_id = mysqli_real_escape_string($connect, $_POST['id']);
$fm_yid = mysqli_real_escape_string($connect, $_POST['yearid']);
$fm_mid = mysqli_real_escape_string($connect, $_POST['monthid']);
$fm_date = mysqli_real_escape_string($connect, $_POST['date']);
$fm_fname = mysqli_real_escape_string($connect, $_POST['fname']);
$fm_chname = mysqli_real_escape_string($connect, $_POST['chname']);
$fm_currmonth = mysqli_real_escape_string($connect, $_POST['month']);
$fm_monthpaid = mysqli_real_escape_string($connect, $_POST['monthpaid']);
$fm_curryear = mysqli_real_escape_string($connect, $_POST['year']);
$fm_yearpaid = mysqli_real_escape_string($connect, $_POST['yearpaid']);
$fm_amount = mysqli_real_escape_string($connect, $_POST['amount']);
$fm_standing = mysqli_real_escape_string($connect, $_POST['standing']);
$fm_page = mysqli_real_escape_string($connect, $_POST['page']);
$postedby = $_SESSION['userName'];


/*
echo $fm_id."<br>";
echo $fm_yid."<br>";
echo $fm_mid."<br>";
echo $fm_date."<br>";
echo $fm_fname."<br>";
echo $fm_chname."<br>";
echo $fm_currmonth."<br>";
echo $fm_monthpaid."<br>";
echo $fm_curryear."<br>";
echo $fm_yearpaid."<br>";
echo $fm_amount."<br>";
echo $fm_standing."<br>";
echo $postedby."<br>"; 
echo $lastupdate;
                    */




echo "<br><br>";

if(!empty($fm_date) & !empty($fm_fname) & !empty($fm_chname) & !empty($fm_currmonth) & !empty($fm_monthpaid) & !empty($fm_curryear) & !empty($fm_yearpaid) & !empty($fm_amount)){
    
    $select = mysqli_query($connect, "SELECT * FROM `khm_schoolfees_table` WHERE `id`= $fm_id");
    
    if(mysqli_num_rows($select)>0){
        
        $row = mysqli_fetch_assoc($select);
    
             $db_id = $row['id'];
             $db_mid = $row['monthId'];
             $db_yid = $row['yearId'];
             $db_date = $row['date'];
             $db_pname = $row['payerFullName'];
             $db_cname = $row['childName'];
             $db_month = $row['currentMonth'];
             $db_monthpaid = $row['monthPaidFor'];
             $db_year = $row['currentYear'];
             $db_yearpaid = $row['yearPaidFor'];
             $db_amount = $row['amountPaid'];
             $db_standing = $row['outStanding'];
             $db_submittedby = $row['submittedBy'];
             
            $db_id = mysqli_real_escape_string($connect, $row['acc_id']);
            $db_mid = mysqli_real_escape_string($connect, $row['month_id']);
            $db_yid = mysqli_real_escape_string($connect, $row['year_id']);
            $db_date = mysqli_real_escape_string($connect, $row['Day']);
            $db_pname = mysqli_real_escape_string($connect, $row['payerFullName']);
            $db_cname = mysqli_real_escape_string($connect, $row['childName']);
            $db_month = mysqli_real_escape_string($connect, $row['currentMonth']);
            $db_monthpaid = mysqli_real_escape_string($connect, $row['monthPaidFor']);
            $db_year = mysqli_real_escape_string($connect, $row['currentYear']);
            $db_yearpaid = mysqli_real_escape_string($connect, $row['yearPaidFor']);
            $db_amount = mysqli_real_escape_string($connect, $row['amountPaid']);
            $db_standing = mysqli_real_escape_string($connect, $row['outStanding']);
            $db_submittedby = mysqli_real_escape_string($connect, $row['submittedBy']);
        
         /* echo $db_id."<br>";
            echo $db_mid ."<br>";
            echo $db_yid ."<br>";
            echo $db_date ."<br>";
            echo $db_pname ."<br>";
            echo $db_cname ."<br>";
            echo $db_month ."<br>";
            echo $db_monthpaid ."<br>";
            echo $db_year ."<br>";
            echo $db_yearpaid ."<br>";
            echo $db_amount ."<br>";
            echo $db_standing ."<br>";
            echo $db_submittedby ."<br>";   */
        
        
        if(isset($_SESSION['userName'])){
    
                $insert = mysqli_query($connect, "INSERT INTO `khm_schoolfees_table_changebackup`(`original_id`, `monthId`, `yearId`, `date`, `payerFullName`, 
                `childName`, `currentMonth`, `monthPaidFor`,`currentYear`, `yearPaidFor`, `amountPaid`, `outStanding`, `submittedBy`, `changedBy`, `lastUpdated`)
                
                VALUES ( '$db_id','$db_mid', '$db_yid', '$db_date', '$db_pname','$db_cname','$db_month','$db_monthpaid', '$db_year','$db_yearpaid', '$db_amount', 
                '$db_standing','$db_submittedby','$postedby', '$lastupdate')");
                
                
                if($insert){
                    
                        

                    
                    
                $update = mysqli_query($connect, " UPDATE `khm_schoolfees_table` SET `monthId`='$fm_mid',`yearId`='$fm_yid',`date`= '$fm_date',`payerFullName`= '$fm_fname',`childName`='$fm_chname',`currentMonth`='$fm_currmonth',
                `monthPaidFor`= '$fm_monthpaid', `currentYear`= '$fm_curryear',`yearPaidFor`= '$fm_yearpaid',`amountPaid`= '$fm_amount',`outStanding`= '$fm_standing',`updatedBy`= '$postedby',`lastUpdated`= '$lastupdate' WHERE `id`='$fm_id'");
                   
                    
                    
                    if($update){
                        
                        header("Refresh: 2; url=/two_dimensionmaster/overallaccounts/editkhmfeesform.php?yid=$fm_yid&mid=$fm_mid&incid=$fm_id&page=$fm_page");
                        
                        echo "<div class='datamsg'>Fees data was sucessfully updated!</div>";
                        
                        
                        
                    }else{
                        
                        echo "<div class='datamsg'>Fees data was not successfully updated!<br>";
                        echo "<a href='/two_dimensionmaster/overallaccounts/editkhmfeesform.php?yid=$fm_yid&mid=$fm_mid&incid=$fm_id&page=$fm_page' class='backlink'>Please go back to the previous page!</a></div>";
                    }
                    
                    
                    
                    
                }else{
                    
                    echo "<div class='datamsg'>Fees backup not successfully added!<br>";
                    echo "<a href='/two_dimensionmaster/overallaccounts/editkhmfeesform.php?yid=$fm_yid&mid=$fm_mid&incid=$fm_id&page=$fm_page' class='backlink'>Please go back to the previous page!</a><br></div>";
                    
                    
                }
                    
    
        }else{
            
            echo '<div class="datamsg">You need to be signed in to perform that operaton!</div>';
            
        }
    
    
        
        }else{
            echo '<div class="datamsg">No data was found!</div>';
            
        }


    }else{
        
        echo "<div class='datamsg'>All fields need to be filled!<br>";
        echo "<a href='/two_dimensionmaster/overallaccounts/editkhmfeesform.php?yid=$fm_yid&mid=$fm_mid&incid=$fm_id&page=$fm_page' class='backlink'>Please go back to the previous page!</a></div>";
        
    }
    }
?>


