<?php 
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
is_admin();
?>
<!DOCTYPE html>

<html>
<head>
   <title>To-do-list form</title>         
<?php 
include ('../site_includes/head.php'); 
?>
            


</head>
    <body>
        
        
            <div class="mainwrapper">
                <!-- The titlebar goes here -->   
                <?php 
                include ('../site_includes/titlebar.php');
                ?>
                </div>
                
            <div class="mainwrapper">
                <!-- The infobar goes here -->
                <?php 
                include ('../site_includes/isset.php');
                ?>       
                </div>
        
            <div class="mainwrapper">
                <!-- The menubar goes here -->
                <?php 
                include ('../site_includes/menubar.php');
                ?>        
            </div>
    
    
        <div class="mainwrapper">
         <!-- The main contant goes here -->
            <div class="maindiv">
                
            <br><br>

			<div class="myforms col-3"><br>
					<h2 class="myth">To-Do-List</h2></th>
					<form class="generalaccountform" action="todolistfeederscript.php" method="POST">
					<br>
					<h4>Date item listed</h4>
				<input type="date" name="datelisted" ><br>
				<textarea name="activity" placeholder="What activity to be listed"></textarea><br>
				
				    <h4>Item deadline</h4>
                <input type="date" name="deadline"><br>

					<select name='priority'>
					    <option>-Selec Priority Level!-</option>
					    <option>Very Low</option><!--General Twiga Vision Event-->
					    <option>Low</option><!--Specific Event for KHM-->
					    <option>Normal Level</option><!--Specific Event for Eager volunteers-->
					    <option>High</option><!--Specific Event for Multidimensional Business and Consultancy-->
					    <option>Very High</option><!--Daniphord's Personal Action Event-->
					 </select><br>
					 
					 <select name='activitybelonging'>
					    <option>-Select Belonging here!-</option>
					    <option>GTVA</option><!--General Twiga Vision Event-->
					    <option>SAFK</option><!--Specific Event for KHM-->
					    <option>SAFE</option><!--Specific Event for Eager volunteers-->
					    <option>SAFM</option><!--Specific Event for Multidimensional Business and Consultancy-->
					    <option>DPLA</option><!--Daniphord's Personal Action Event-->
					 </select><br>
					 
					 <select name='responsible'>
					    <option>-Select Responsible Person here!-</option>
					    <option>Daniphord Mwajah</option>
					    <option>Oliva Marandu</option>
					    <option>Roseline Mushi</option>
					    <option>Frida Swai</option>
					    <option>Hawa Yassin</option>
					    <option>Grace Gabriel</option>
					    <option>Julieth Laizer</option>
					    <option>Namnyaki Mollel</option>
					    <option>Noela Mathias</option>
					    <option>Glory Emmanuel</option>
					     <option>Evaline Njoliba</option>
					    <option>Esther Prohl</option>
					    <option>Liza Hodge</option>
					    <option>Vanessa Devenich</option>
					    <option>Asena Baso</option>
					 </select><br>

				    <input type="submit" name="submit" value="SUBMIT INCOME" class="submit">
				    
				    <br><br>
					</form>
					
					</div>



    </div>
    
<br><br>
<a href="controllpanel.php" class="backlink">Back to controllpanel
</a><br>
       
            
        </div> 
        
        
        <div class="mainwrapper">
            <!-- The foorwe goes here -->
            <?php 
            include ('../site_includes/footer.php');
            ?>        
        
        </div>
 
 
</body>
</html>