<?php 
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
is_admin();
?>
<!DOCTYPE html>

<html>
<head>
   <title>General Accounts</title>         
<?php 
include ('../site_includes/head.php'); 
?>
            

</head>
    <body>
        
        
            <div class="maindiv">
                
        <?php include ('../site_includes/siteheader.php'); ?>
             



			<div class="myforms col-3"><br>
					<h2 class="myth">Diary Feeder</h2></th>
					<form class="generalaccountform" action="diaryfeederscript.php" method="POST">
					<br>
					<h4>Date of plan</h4>
				<input type="date" name="plandate" ><br>
				<textarea name="event" placeholder="What will the action be"></textarea><br>
				
				    <h4>Date of action</h4>
                <input type="date" name="actiondate"><br>
					
					<select name='monthcode'>
					    <option>-Select Month here!-</option>
					    <option>January</option>
					    <option>February</option>
					    <option>March</option>
					    <option>April</option>
					    <option>May</option>
					    <option>June</option>
					    <option>July</option>
					    <option>August</option>
					    <option>September</option>
					    <option>October</option>
					    <option>November</option>
					    <option>December</option>					    
					    
					 </select>
					 
					 
					 <br>
	            <select name='yearcode'>
					    <option>-Select Year here!-</option>
					    <option>2019</option>
					    <option>2020</option>
					    <option>2021</option>
					    <option>2022</option>
					    <option>2023</option>
					    <option>2024</option>
					    <option>2025</option>
					    <option>2026</option>
					    <option>2027</option>
					    <option>2028</option>
					    <option>2029</option>
					    <option>2030</option>					    
					    
					 </select><br>
					
					
			
					<select name='categorycode'>
					    <option>-Select Calendar Category here!-</option>
					    <option>GTVE</option><!--General Twiga Vision Event-->
					    <option>SEFK</option><!--Specific Event for KHM-->
					    <option>SEFE</option><!--Specific Event for Eager volunteers-->
					    <option>SEFM</option><!--Specific Event for Multidimensional Business and Consultancy-->
					    <option>DPAE</option><!--Daniphord's Personal Action Event-->
					 </select><br>
					 
					<select name='prioritycode'>
					    <option>-Selec Priority Level!-</option>
					    <option>Very Low</option><!--General Twiga Vision Event-->
					    <option>Low</option><!--Specific Event for KHM-->
					    <option>Normal Level</option><!--Specific Event for Eager volunteers-->
					    <option>High</option><!--Specific Event for Multidimensional Business and Consultancy-->
					    <option>Very High</option><!--Daniphord's Personal Action Event-->
					 </select><br>

				    <input type="submit" name="submit" value="SUBMIT INCOME" class="submit">
				    
				    <br><br>
					</form>
					
					</div>

        <br><br>
        <a href="controllpanel.php" class="backlink">Back to controllpanel
        </a><br>

             </div>
    
        
       
     
 
</body>
</html>