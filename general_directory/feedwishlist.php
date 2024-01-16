<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
//is_volunteer();
include ('../site_includes/titlebar.php');

?>


<html>
  <head>
<title>Wishlist</title>
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
     font-size:20px;   
     width:600px;
     text-align:center;
     background:LightSlateGray;
     border:1px solid black;
        
    }
    
      .heading{
        background:none;
        width:600px;
    }
    
    .inputfield1{
        width:400px;
        height:30px;
        font-size:16px;
    }
    
     .textarea{
        width:400px;
        height:100px;
    }
    
</style>
 </head>  
 <body>
 <div class="maindiv">
   <div class="heading"> 
    <center> <h3>Twiga/KHM Wishlist</h3> </center>  
   </div><br>
     
  <form action="wishlistscript.php" method="post">
      <br>
   Date need arised : <br><input type="date"   name="formdate" class="inputfield1"><br>
   Item Name : <br><input type="text"   name="itemname" class="inputfield1"><br>
   Item Description: <br><input type="text"   name="idesc" class="inputfield1"><br>
   How much of it needed : <br><input type="text"   name="quantity" class="inputfield1"><br>
   Position in priority: <br><input type="text"   name="priority" class="inputfield1"><br>
   Estimated cost in TShs: <br><input type="text"   name="cost" class="inputfield1"><br>
   When needed by: <br><input type="date"   name="deadline" class="inputfield1"><br>
     <br><input type="submit"   name="submit" Value="Submit"><br><br>
  
   </form>
 
 
    <br> 
    <a href="volunteercentre.php" >Back to volunteer Page</a> 
    <br>
    
 </div>

</body>   
   
    
    
</html>