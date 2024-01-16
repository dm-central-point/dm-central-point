<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
//is_volunteer();

?>


<html>
  <head>
<title>Donation-form</title>
<?php
include ('../site_includes/head.php'); 
?>
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

<style>

    *{
        margin:0px;
        
    }
    
    .maindiv{
        display:flex;
        flex-direction:column;
        background:#fff;
        align-items:center;
        padding-top:30px;
    }
    
    #donationform{
     font-size:18px;   
     width:600px;
     text-align:center;
     background:DarkKhaki;
     border:1px solid black;
      margin-bottom:20px;
    }
    
      #heading{
        background:#fff;
        width:100%;
        text-align:center;
        color:blue;
        padding:5px;
       
    }
    
     #heading h1{
    background:#fff;
    }
    
    .inputfield1{
        width:400px;
        height:40px;
        font-size:16px;
    }
    
     .text{
        width:400px;
        height:50px;
        font-size:16px;
    }
    
</style>
 </head>  
 <body>
        
            <div class="titlewrapper">
                <!-- The titlebar goes here -->   
                <?php 
                include ('../site_includes/titlebar.php');
                ?>
                </div>
                

            <div class="menuwrapper1">
                <!-- The menubar goes here -->
                <?php 
                include ('../site_includes/menubar.php');
                ?>        
            </div>
            
            
            <div class="menuwrapper2">
                <!-- The menubar goes here -->
                <?php 
                include ('../site_includes/menubarmobile.php');
                ?>        
            </div>
     
     
 <div class="maindiv">
   <div id="heading"> 
    <h1>Please Recored your Donations Here!</h1>  
   </div><br>
     
 
      
     <form id='donationform' action="donationfeederscript.php" method="post" enctype="multipart/form-data">
        <br>
         Date of donation: <br><input type="date"   name="date" class="inputfield1"><br>
         Donor full name: <br><input type="text"   name="fullname" class="inputfield1"><br>
         Type of donation: <br>
         
         <select name="type" class="inputfield1" >
         <option value=""></option>
         <option value="In-kind">In-kind</option>
         <option value="Cash">Cash</option>
            </select><br>
         Please describe the donation: <br><input type="text"   name="description" class="text"><br>
         What is the Estimated Value in original currence: <br><input type="text"   name="value" class="inputfield1"><br>  
         Estimated value in Tsh: <br><input type="number"   name="valuelocal" class="inputfield1"><br>
         What is your preferred target: <br><input type="text"   name="target" class="inputfield1"><br>
         Any remarks? <br><input type="text"   name="remark" class="inputfield1"><br>
         Is there any documents related to the donation <br> (if any) e.g invoices/reciepts:<br>
         <br><input type="radio" name="document" value="Yes" id="yes"> <leble> </leble for="yes">YES</leble>
         <input type="radio"   name="document" value="No" id="no"><leble for="no">NO</leble><br>
         <br><input type="submit"   name="submit" Value="SUBMIT RECORD"><br><br>
  
    </form>
    <br>
 	<a href="volunteercentre.php" >Back to volunteer Page</a>
 	<br> 
 </div>
 
 </body> 
    
</html>