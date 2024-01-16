<?php
ob_start();
include('../../site_includes/function.php');
include('../../site_includes/connect.php');
include('../../site_includes/accountsfunctions.php');
//is_loggedin();
?>
<head>

</head>



<?php

date_default_timezone_set('Africa/Nairobi');
$lastupdate = date('d/m/Y h:i:s a', time());

if(isset($_POST['submit'])){
    
    

    $fm_date = mysqli_real_escape_string($connect, $_POST['date']);
    $fm_month = mysqli_real_escape_string($connect, $_POST['month']);
    $fm_year = mysqli_real_escape_string($connect, $_POST['year']);
    $fm_code = mysqli_real_escape_string($connect, $_POST['code']);
    $fm_descr = mysqli_real_escape_string($connect, $_POST['description']);
    $fm_quality = mysqli_real_escape_string($connect, $_POST['quality']);
    $fm_channel = mysqli_real_escape_string($connect, $_POST['channel']);
    $fm_type = mysqli_real_escape_string($connect, $_POST['type']);
    $fm_income = mysqli_real_escape_string($connect, $_POST['income']);
    $fm_expenditure = mysqli_real_escape_string($connect, $_POST['expenditure']);
    $fm_yid = mysqli_real_escape_string($connect, $_POST['yearid']);
    $fm_mid = mysqli_real_escape_string($connect, $_POST['monthid']);
    $fm_id = mysqli_real_escape_string($connect, $_POST['id']);
    $fm_page = mysqli_real_escape_string($connect, $_POST['page']);
    $postedby = $_SESSION['userName'];
    
    
   /*  echo $fm_date."<br>";
    echo $fm_month."<br>";
    echo $fm_year."<br>";
    echo $fm_descr."<br>";
    echo $fm_quality."<br>";
    echo $fm_channel."<br>";
    echo $fm_type."<br>";
    echo $fm_income."<br>";
    echo $fm_expenditure."<br>";
    echo $fm_yid."<br>";
    echo $fm_mid."<br>";
    echo $fm_id."<br>";
    echo $postedby."<br>"; 
    echo $lastupdate."<br><br>";  */





echo "<br><br>";

if(!empty($fm_date) & !empty($fm_month)& !empty($fm_year)  & !empty($fm_descr) & !empty($fm_quality)& !empty($fm_channel) & !empty($fm_type) ){
    
    $select = mysqli_query($connect, "SELECT * FROM `overall_accounts` WHERE `transactionId`= $fm_id");
    
    if(mysqli_num_rows($select)>0){
        
        $row = mysqli_fetch_assoc($select);
    
        $db_id = mysqli_real_escape_string($connect, $row['transactionId']);
        $db_mid = mysqli_real_escape_string($connect, $row['month_id']);
        $db_yid = mysqli_real_escape_string($connect, $row['year_id']);
        $db_date = mysqli_real_escape_string($connect, $row['transactionDate']);
        $db_month = mysqli_real_escape_string($connect, $row['transactionMonth']);
        $db_year = mysqli_real_escape_string($connect, $row['transactionYear']);
        $db_descr = mysqli_real_escape_string($connect, $row['itemDescription']);
        $db_quality = mysqli_real_escape_string($connect, $row['typeQuantity']);
        $db_channel = mysqli_real_escape_string($connect, $row['transactionChannel']);
        $db_type = mysqli_real_escape_string($connect, $row['transactionType']);
        $db_income = mysqli_real_escape_string($connect, $row['incomeAmount']);
        $db_expenditure = mysqli_real_escape_string($connect, $row['expenditureAmount']);
        $db_recordedby = mysqli_real_escape_string($connect, $row['recordedBy']);
        
      /*  
        echo $db_id ."<br>";
        echo $db_mid ."<br>";
        echo $db_yid ."<br>";
        echo $db_date ."<br>";
        echo $db_month ."<br>";
        echo $db_year ."<br>";
        echo $db_descr ."<br>";
        echo $db_quality ."<br>";
        echo $db_channel ."<br>";
        echo $db_type ."<br>";
        echo $db_income ."<br>";
        echo $db_expenditure ."<br>";
        echo $db_recordedby ."<br>"; */
        
        
        if(isset($_SESSION['userName'])){
    
    $insert = mysqli_query($connect, "INSERT INTO `overall_accounts_changebackup`( `month_id`, `year_id`, `transactionDate`, `transactionMonth`, `transactionYear`, `itemDescription`, 
    `typeQuantity`,`transactionChannel`, `transactionType`, `incomeAmount`, `expenditureAmount`, `recordedBy`,`changedBy`, `changeDate`) 
    VALUES ( '$db_mid', '$db_yid', '$db_date', '$db_month','$db_year',  '$db_descr', '$db_quality', '$db_channel', '$db_type','$db_income','$db_expenditure','$db_recordedby', '$postedby', '$lastupdate')");
                
                
                if($insert){
                    
                        
           /* echo $fm_date."<br>";
            echo $fm_month."<br>";
            echo $fm_year."<br>";
            echo $fm_descr."<br>";
            echo $fm_quality."<br>";
            echo $fm_channel."<br>";
            echo $fm_type."<br>";
            echo $fm_income."<br>";
            echo $fm_expenditure."<br>";
            echo $fm_yid."<br>";
            echo $fm_mid."<br>";
            echo $fm_id."<br>";
            echo $postedby."<br>"; 
            echo $lastupdate;   */
                    
            $update = mysqli_query($connect, "UPDATE `overall_accounts` SET `transactionDate`='$fm_date', `transactionMonth`='$fm_month', `transactionYear`='$fm_year', `itemDescription`='$fm_descr', 
            `typeQuantity`='$fm_quality', `transactionChannel`='$fm_channel', `transactionType`='$fm_type', `incomeAmount`='$fm_income', `expenditureAmount`='$fm_expenditure',`lastUpdate`='$lastupdate', `updatedBy`= '$postedby' WHERE `transactionId`='$fm_id'");
                   
                    
                    
                    if($update){
                        
                        header("Refresh: 2; url=/family_directory/familyaccounts/editfamilyaccountsform.php?yid=$fm_yid&mid=$fm_mid&trid=$fm_id&page=$fm_page");
                        
                        echo "<div class='datamsg'>Accounts data was sucessfully updated!</div>";
                        
                        
                        
                    }else{
                        
                        echo "<div class='datamsg'>Accounts data was not successfully updated!<br>";
                        echo "<a href='/family_directory/familyaccounts/editfamilyaccountsform.php?yid=$fm_yid&mid=$fm_mid&trid=$fm_id&page=$fm_page' class='backlink'>Please go back to the previous page!</a></div>";
                    }
                    
                    
                    
                    
                }else{
                    
                    echo "<div class='datamsg'>Accounts backup not successfully submitted!<br>";
                    echo "<a href='/family_directory/familyaccounts/editfamilyaccountsform.php?yid=$fm_yid&mid=$fm_mid&trid=$fm_id&page=$fm_page' class='backlink'>Please go back to the previous page!</a><br>
                    $db_postedby<br></div>";
                    
                    
                }
                    
    
        }else{
            
            echo '<div class="datamsg">You need to be signed in to perform that operaton!</div>';
            
        }
    
    
        
        }else{
            echo '<div class="datamsg">No data was found!<br>';
             echo "<a href='/family_directory/familyaccounts/editfamilyaccountsform.php?yid=$fm_yid&mid=$fm_mid&trid=$fm_id&page=$fm_page' class='backlink'>Please go back to the previous page!</a></div>";
            
        } 


    }else{
        
        echo "<div class='datamsg'>All fields need to be filled!<br>";
        echo "<a href='/family_directory/familyaccounts/editfamilyaccountsform.php?yid=$fm_yid&mid=$fm_mid&trid=$fm_id&page=$fm_page' class='backlink'>Please go back to the previous page!</a></div>";
        
    }
    }
?>


