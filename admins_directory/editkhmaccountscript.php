<?php
session_start();
ob_start();
include('../site_includes/function.php');
include('../site_includes/connect.php');
include('../site_includes/accountsfunctions.php');
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
    margin-bottom:15%;
    margin-top:15%;
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
$lastupdate = mysqli_real_escape_string($connect, date('d/m/Y h:i:s a', time()));

if(isset($_POST['submit'])){
    
    $fm_date = mysqli_real_escape_string($connect, $_POST['date']);
    $fm_month = mysqli_real_escape_string($connect, $_POST['month']);
    $fm_year = mysqli_real_escape_string($connect, $_POST['year']);
    $fm_code = mysqli_real_escape_string($connect, $_POST['code']);
    $fm_descr = mysqli_real_escape_string($connect, $_POST['description']);
    $fm_quantity = mysqli_real_escape_string($connect, $_POST['quantity']);
    $fm_type = mysqli_real_escape_string($connect, $_POST['type']);
    $fm_category = mysqli_real_escape_string($connect, $_POST['category']);
    $fm_income = mysqli_real_escape_string($connect, $_POST['income']);
    $fm_expenditure = mysqli_real_escape_string($connect, $_POST['expenditure']);
    $fm_oncredit = mysqli_real_escape_string($connect, $_POST['oncredit']);
    $fm_yid = mysqli_real_escape_string($connect, $_POST['yearid']);
    $fm_mid = mysqli_real_escape_string($connect, $_POST['monthid']);
    $fm_id = mysqli_real_escape_string($connect, $_POST['id']);
    $fm_page = mysqli_real_escape_string($connect, $_POST['page']);
    $updatedby = $_SESSION['userName'];
    
    
   /* 
    echo $fm_date."<br>";
    echo $fm_month."<br>";
    echo $fm_year."<br>";
    echo $fm_code."<br>";
    echo $fm_descr."<br>";
    echo $fm_quantity."<br>";
    echo $fm_type."<br>";
    echo $fm_category."<br>";
    echo $fm_income."<br>";
    echo $fm_expenditure."<br>";
    echo $fm_oncredit."<br>";
    echo $fm_yid."<br>";
    echo $fm_mid."<br>";
    echo $fm_id."<br>";
    echo $fm_page."<br>";
    echo $updatedby."<br>"; 
    echo $lastupdate."<br><br>";   
    
    */





echo "<br><br>"; 

 if(!empty($fm_date) & !empty($fm_month) & !empty($fm_year) & !empty($fm_code) & !empty($fm_descr) & !empty($fm_quantity)  & !empty($fm_type) & !empty($fm_category)){
    
    $select = mysqli_query($connect, "SELECT * FROM `khm_overall_accounts` WHERE `acc_id`= '$fm_id'");
    
    if(mysqli_num_rows($select)>0){
        
        $row = mysqli_fetch_assoc($select);
        

    
        $db_id = mysqli_real_escape_string($connect, $row['acc_id']);
        $db_mid = mysqli_real_escape_string($connect, $row['month_id']);
        $db_yid = mysqli_real_escape_string($connect, $row['year_id']);
        $db_date = mysqli_real_escape_string($connect, $row['acc_Date']);
        $db_month = mysqli_real_escape_string($connect, $row['acc_Month']);
        $db_year = mysqli_real_escape_string($connect, $row['acc_Year']);
        $db_code = mysqli_real_escape_string($connect, $row['acc_Code']);
        $db_descr = mysqli_real_escape_string($connect, $row['acc_Description']);
        $db_quantity = mysqli_real_escape_string($connect, $row['acc_Quantity']);
        $db_type = mysqli_real_escape_string($connect, $row['acc_Type']);
        $db_category = mysqli_real_escape_string($connect, $row['acc_Category']);
        $db_income = mysqli_real_escape_string($connect, $row['incomeAm']);
        $db_expenditure = mysqli_real_escape_string($connect, $row['expenditureAm']);
        $db_oncredit = mysqli_real_escape_string($connect, $row['oncreditExpenditure']);
        $db_recordedby = mysqli_real_escape_string($connect, $row['recordedBy']);
        
 /*
        echo $db_id ."<br>";
        echo $db_mid ."<br>";
        echo $db_yid ."<br>";
        echo $db_date ."<br>";
        echo $db_month ."<br>";
        echo $db_year ."<br>";
        echo $db_code ."<br>";
        echo $db_descr ."<br>";
        echo $db_quantity ."<br>";
        echo $db_type ."<br>";
        echo $db_category ."<br>";
        echo $db_income ."<br>";
        echo $db_expenditure ."<br>";
        echo $db_oncredit ."<br>";
        echo $db_recordedby ."<br>";  
        echo $lastupdate;
        
    */
        
        if(isset($_SESSION['userName'])){
            
        
       $insert = mysqli_query($connect, "INSERT INTO `khm_overall_accounts_changebackup`(`month_id`, `year_id`, `acc_date`, `acc_month`, `acc_year`, `acc_code`, `acc_descr`, `acc_quantinty`, `acc_type`, `acc_category`, `acc_income`, `acc_expenses`, `acc_oncreditExp`, `recordedby`, `updetedby`, `lastupdate`)  
       VALUES ('$db_mid', '$db_yid', '$db_date', '$db_month', '$db_year', '$db_code', '$db_descr', '$db_quantity', '$db_type', '$db_category', '$db_income', '$db_expenditure','$db_oncredit', '$db_recordedby', '$updatedby', '$lastupdate')"); 
        
          
     /*
       $insert = mysqli_query($connect, "INSERT INTO `khm_overall_accounts_changebackup`(`month_id`, `year_id`, `acc_Date`, `acc_Month`, `acc_Year`, `acc_Code`, `acc_Description`, `acc_Quantity`, `acc_Type`, `acc_Category`, `incomeAm`, `expenditureAm`, `recordedBy`, `updatedBy`, `lastUpdated`) 
       VALUES (37, 4, '53454', 'January' ,2020,'GOEX','Bought food', '4 kg', 'N/A', 'KHM', 0,5000, 'Chalinze','Mgeni','27/01/2020') "); 
        
     
     
     $insert = mysqli_query($connect, "INSERT INTO khm_overall_accounts_changebackup ( month_id, year_id, acc_Date, acc_Month, acc_Year, acc_Code, acc_Description, acc_Quantity, 
      acc_Type, acc_Category, incomeAm, expenditureAm, recordedBy, updatedBy, lastUpdated) 
    VALUES ( '$db_mid', '$db_yid', '$db_date', '$db_month', '$db_year', '$db_code', '$db_descr', '$db_quantity', '$db_type', '$db_category', '$db_income', '$db_expenditure', '$db_recordedby', '$updatedby', '$lastupdate')");    */
          
    
     if($insert){
         
         /*
            echo "<br>";
            echo "<br>";
            echo $fm_date."<br>";
            echo $fm_month."<br>";
            echo $fm_year."<br>";
            echo $fm_descr."<br>";
            echo $fm_quality."<br>";
            echo $fm_channel."<br>";
            echo $fm_type."<br>";
            echo $fm_income."<br>";
            echo $fm_expenditure."<br>";
            echo $fm_oncredit."<br>";
            echo $fm_yid."<br>";
            echo $fm_mid."<br>";
            echo $fm_id."<br>";
            echo $updatedby."<br>"; 
            echo $lastupdate; 
            
            */
                    
           $update = mysqli_query($connect, "UPDATE `khm_overall_accounts` SET `acc_Date`='$fm_date', `acc_Month`='$fm_month', `acc_Code`='$fm_code', `acc_Year`='$fm_year', `acc_Description`='$fm_descr', 
            `acc_Quantity`='$fm_quantity', `acc_Type`='$fm_type', `acc_Category`='$fm_category',`incomeAm`='$fm_income', `expenditureAm`='$fm_expenditure',`oncreditExpenditure`='$fm_oncredit', `lastUpdated`='$lastupdate', `updatedBy`= '$updatedby' 
          WHERE `acc_id`='$fm_id'");
                   
                    
        
    if($update){
            
            header("Refresh: 2; url= editkhmaccountsform.php?yid=$fm_yid&mid=$fm_mid&trid=$fm_id&page=$fm_page");
            
            echo "<div class='datamsg'>Accounts data was sucessfully updated!</div>";
            
            
            
        }else{
            
            echo "<div class='datamsg'>Accounts data was not successfully updated!<br>";
            echo "<a href='editkhmaccountsform.php?yid=$fm_yid&mid=$fm_mid&trid=$fm_id&page=$fm_page' class='backlink'>Please go back to the previous page!</a></div>";
        }
        
        
        
        
    }else{
        
        echo "<div class='datamsg'>Accounts backup not successfully submitted!<br>";
        echo "<a href='editkhmaccountsform.php?yid=$fm_yid&mid=$fm_mid&trid=$fm_id&page=$fm_page' class='backlink'>Please go back to the previous page!</a><br>
        $db_postedby<br></div>";
        
        
    }
                    
    
        }else{
            
            echo '<div class="datamsg">You need to be loggedin to perform that operaton!</div>';
            
        }
    
    
        
        }else{
            echo '<div class="datamsg">No data was found!<br>';
             echo "<a href= editkhmaccountsform.php?yid=$fm_yid&mid=$fm_mid&trid=$fm_id&page=$fm_page' class='backlink'>Please go back to the previous page!</a></div>";
            
        }


    }else{
        
        echo "<div class='datamsg'>All fields need to be filled!<br>";
        echo "<a href='editkhmaccountsform.php?yid=$fm_yid&mid=$fm_mid&trid=$fm_id&page=$fm_page' class='backlink'>Please go back to the previous page!</a></div>";
        
    }
    
    
    
    }
        
?>


