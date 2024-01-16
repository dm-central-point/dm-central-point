<?php 
include ('../../site_includes/connect.php');
include ('../../site_includes/functions.php');
include ('../../site_includes/accountsfunctions.php');
?>
<!DOCTYPE html>

<html>
<head>
    <title>Accounts Page</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
            
<?php 
include ('../../site_includes/head.php'); 
?>
            
    <style>
        .name{
        background:tan;
        
        }
        
        .maindivtop{
        display:block;
        position:relative;
        width:100%;
        height:auto;
        background:#666;
        padding-top:20px;
        padding-bottom:20px;
        }}
        
        .maindiv{
        content:"";
        clear:both;
        display:table;
        }
        
        
        .accountsperyears{
        width:100%;
        height:auto;
        position:relative;
        background:white;
        padding:20px;
        display:flex;
        flex-direction:column;
        overflow-x:auto;
        }
        

        
        .yearwrapper{
        width:300px; 
        height:auto;
        margin: 0 auto;
        border:1px solid blue; 
        }
        
        .generalbox{
        width:90%;
        height:auto;
        background:white;
        margin:0 auto;
        position:relative;
      
        }
        
        .expensesbox{
        width:33%;
        height:auto;
        background:tan;
        margin-right:0;
        position:relative;
        float:right;
       
        }
        
        
        .yeartable{
            width:100%;
            background:blue;
            padding:20px;
            margin:0 auto; 
            height:90%;
            background:white;
            border-collapse:collapse;
        }
        
        

        table, tr, td, th {
        cellspacing:0; 
        border: 0;
        }
        
        
        table, th, td {
        background:cyan;
        text-align:center;	
        
        
        }
        
        td{
        background:white;
        padding:5px;
        text-align:center;
        }
        
        td a{
        display:inline-block;
        height:30px;
        width:90%;
        background:#666;
        padding:5px;
        text-align:center;
        font-style:italic;
        font-style:bold;
        font-size:20px;
        text-decoration:none;
        border-radius:10px;
        color:white;
        opacity: 0.5;
        transition: 0.5s;
        }
        
        .yeartable a:hover {
            opacity:1;
            height:35px;
            line-height:20px;
        }
        
        
        #backlink{
        width:100%;
        height:40px;
        top:0;
        display:block;
        text-align:center;
        position:relative
        z-index:2000;
        line-height:40px;
        background:#cccfff;
        color:blue;
        }
        
        .yearheader{
            width:100%;
            position:relative;
            margin-top:0;
            background:#666;
            padding:7px;
            color:blue;
           
        }
        
         .yearheader::after{
            content:"";
            clear:both;
            display:table;
        }
        
        .inneryearheader{
            width:100%;
            height:auto;
            margin:0 auto;
            background:#ccc;
            display:block;
            position:relative;
          
        }
        
        
            .inneryearheader a{
            width:33%;
            height:30px;
            text-decoration:none;
            color:white;
            margin:0 auto;
            background:#666;
            position:relative;
            display:inline-block;
            text-align:center;
            float:left;
            line-height:30px;
            opacity: 0.5;
            transition: 0.5s;
            font-style:bold;
                
            }
        
        .inneryearheader a:hover{
            opacity:1.5;
            padding:10;
            border:1px solid #fff;
            
        }
		
		.inneryearheader a:active { 
            background-color: yellow;
        }
        
        .selectdb{
            width:100%;
            height:200px;
            background:white;
        }
        
        btn{
            
        
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
      
     

        <div class="maindivtop">
            
            <div class='accountsperyears'>
                <div class='yearwrapper'>
                <div class='yearheader'><div class='inneryearheader'><a href='decreaseyearnumber.php?id=1' id=''> <<  Previous</a> 
                <a href='maintainyearnumber.php?id=1' id=''>Current||Year</a> <a href='increaseyearnumber.php?id=1' id=''>Next >></a></div></div>
                    <div class='generalbox'>
                   
                    <?php
                   
                    dispAttendence();
                    
                    ?>
                
                    </div>
            

                    
                    
            </div>  
            
          </div> 
    </div>
         <div class="linkwrapper">
       
        <a id='backlink' href='../../index.php'>Go back to the index page</a>
        
              
        </div>
                <?php 
                include ('../../site_includes/footermobile2.php');
                ?>
   


 
</body>
</html>