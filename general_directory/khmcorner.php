<?php 
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
//is_teacher();
?>
<!DOCTYPE html>

<html>
<head>
   <title>Khminfo</title>         
<?php 
include ('../site_includes/head.php'); 
?>
            
    <style>
       .maindiv{
            border: 4px sold black;
            width: 100%; 
            height:auto; 
            background:lightgreen; 
            text-align: center; 
            border-radius:0px;
            display:flex;
            flex-direction:row-reverse;
            justify-content:center;
            align-content:center;
            align-items:center;
            flex-flow: row-reverse wrap;
            
        }
        .linkv{
        display:block;
        height:auto;
        width:80%; 
        background:black;
        color:white; 
        margin-bottom:10px;  
        padding:5px; 
        line-height:20px; 
        font-size:20px;
        text-decoration: none;
        text-align:center;
        border-radius:50px;
            
        }
        
        .semidivkhm{
        background:cyan; 
        float:left;
        margin-bottom:10px;
        margin-top:10px;
        border: 1px solid blue;
        border-radius:10px;
        display:flex;
        flex-direction:column;
        align-items:center;
        align-content:center;
        flex-basis: auto;
      }
        .semidiv2{
        width:230px; 
        height:40px;
        background:darkorange; 
        display:block;
        text-align:center;
      }
        .semidiv2 h3{
        background:darkorange; 
        
      }      
      
    </style>

</head>
    <body>
        
        
        <div class="titlewrapper">
         <!-- The titlebar goes here -->   
         
            <?php 
            include ('../site_includes/titlebar2.php');
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
    
    
        <div class="mainwrapper">
         <!-- The main contant goes here -->
         
    <div class="maindiv">
     <div class="semidivkhm col-3">
	 <div class="semidiv2"><h3>CHILDREN INFORMATION</h3></div>
	<br>
	 <a href="attendencefeeder.php" class="linkv">Attendence Log</a>
	 <a href="monthlyattendence/attendencecorner.php" class="linkv">View Monthly Attendence</a>
	 <a href="activityreportfeeder.php" class="linkv">Feed Your Reports here</a>
	 <a href="viewweeklyreports.php" class="linkv">View Weekly Reports</a>
	 <a href="viewmonthlyreports.php" class="linkv">View Monthly Reports</a>

	</div>	

     <!--<div class="semidiv col-3" >
     <div class="semidiv2"><h3>KITCHEN INFORMATION</h3></div>
     <br>
	 <a href="donorregister.php" class="linkv">Food Usage Log</a> 
	 <a href="viewalldonor.php" class="linkv">View Food Usage</a>
	 <a href="" class="linkv">Log the inventory</a> 
	 <a href="" class="linkv">View assets</a>
	 <a href="" class="linkv">View Donation Expenditure</a> 
	 <a href="" class="linkv">List Problematic Children</a>
	 <a href="" class="linkv">View Problematic Children</a>
     <a href="" class="linkv">Capacity Building Sponsors</a>
	 <a href="" class="linkv">Building Projects Sponsors</a> 
	 <a href="" class="linkv">Women Business Sponsors</a>
	 <a href="" class="linkv">Capacity Building Sponsors</a> 	 
	 
     </div>-->
     
     <div class="semidivkhm col-3">
     <div class="semidiv2"><h3>ACADEMIC INFORMATION</h3></div>
     <br>
	 <a href="problematicchildform.php" class="linkv">Report a Problematic Child</a>
	 <a href="viewproblematicchild.php" class="linkv">View Problematic Children</a>
	 	 <a href="feedexamresults.php" class="linkv">Feed Examination Results</a>
	 <a href="viewexamresults.php" class="linkv">View Examination Results</a>
	 
	</div>        
            

    </div>         
            
    </div> 
        
        
        <div class="mainwrapper">
            <!-- The foorwe goes here -->
            <?php 
            include ('../site_includes/footer.php');
            ?>        
        
        </div>
        
    </div>
        
 
 
</body>
</html>