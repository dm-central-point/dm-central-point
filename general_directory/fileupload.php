<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
//is_teacher();
include ('../site_includes/titlebar.php');
include ('../site_includes/menubar.php');
?>




<html>
<head>
    <title>
       Uploads 
    </title>
    
 <style>

    *{
        margin:0px;
        
    }
    
    .maindiv{
        display:flex;
        flex-direction:column;
        background:darkorange;
        align-items:center;
    }
    
    form{
     font-size:18px;  
     width:600px;
     text-align:center;
     background:lightgreen;
     border:1px solid black;
        
    }
    
      .heading{
        background:violet;
        width:100%;
    }
    
    .inputfield1{
        width:400px;
        height:30px;
        font-size:14px;
        font-family: Verdana, Arial, Helvetica, sans-serif;
    }
    
     .textarea{
        width:400px;
        height:80px;
        resize:none;
        font-size:14px;
        font-family: Verdana, Arial, Helvetica, sans-serif;
    }
    
</style>  
    
    
    
    
    
    
     </head> 
     <body>
      <div class="maindiv">    
      <br>
     </html><h2>Thank you for compeleting the first part, just one more step</h2><br>

     <form action="voluformscript2.php" method="post" enctype="multipart/form-data">
    <br>
     Motive behind your decision to Volunteer: <br><textarea   name="motive1" class="textarea"></textarea><br>
     Why did you choose Twiga as your volunteering destination: <br><textarea   name="motive2" class="textarea"></textarea><br>
     Any addtional information?: <br><textarea  name="addition" class="textarea"></textarea><br> 
     when will you be able to start volunteering: <br><input type="date"   name="startdate" class="inputfield1"><br>
     When will be the end of your volunteering: <br><input type="date"   name="enddate" class="inputfield1"><br>  
     Please provide your contact details: <br><input type="text"   name="contact" class="inputfield1"><br>
     Could you please upload your recent photo(jpeg type): <br><input type="file"   name="image" class="image"><br>
     <br><input type="submit"   name="submit" Value="SUBMIT"><br>
     </div>      
     </form>    

    
    
    
</body>
