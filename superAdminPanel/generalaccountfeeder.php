<?php 
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
is_admin();
?>
<!DOCTYPE html>

<html>
<head>
   <title>General Accounts</title>
   <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<?php 
include ('../site_includes/head.php'); 
?>
            

</head>
    <body>
        
        
        
        <div class="titlewrapper">
         <!-- The titlebar goes here -->   
         
            <?php 
            include ('../site_includes/siteheader.php');
            ?>
        
            </div>
        
            <div class="maindiv">
                
            <br>


			<div class="myforms col-3"><br>
					<h2 class="myth">General Income</h2></th>
					<form class="generalaccountform" action="generalincomescript.php" method="POST">
					<br>
					<h4>Date of transaction</h4>
					<input type="date" name="date" placeholder="Day">
					
					<select name='month'>
					    <option value="">-Select Month here!-</option>
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
					
					<select name='year'>
					    <option value="">-Select Year here!-</option>
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
					    
					 </select>
					
					
					<select name='source'>
					    <option value="">-Select Source here!-</option>
					    <option>Bank withdraw (personal)</option>
					    <option>Bank withdraw (Twiga)</option>
					    <option>Bank withdraw (KHM)</option>
					    <option>Personal work income</option>
					    <option>Gift from friends</option>
					    <option>Family member support</option>
					    <option>Other business income</option>
					    <option>English Classes fees</option>
					    <option>Consultation fees</option>
					    
					 </select>
					
					
					
					<select name='purpose'>
					    <option value="">-Select Purpose Here!-</option>
					    <option>General KHM expenditure</option>
					    <option>Sponsorship income </option>
					    <option>Wages and allnces </option>
					    <option>General personal </option>
					    <option>House rent KHM</option>
					    <option>House rent TVT</option>
					    <option>Family member support</option>
					    <option>Various</option>
					    <option>corprate Social responsibility</option>
					
					 </select>
					
					
					
					<input type="text" name ="type" placeholder="Income type">
		
					<select name='code'>
					    <option value="">-Selected Item Code Here!-</option>
					    <option>GPBI</option><!--General Personal Business Income-->
					    <option>WSPI</option><!--Wages and Services Provision Income-->
					    <option>KDPI</option><!--KHM Daycare Personal Income-->
					    <option>KDFI</option><!--KHM Daycare Fees Income-->
					    <option>FSPI</option><!--Friends Support Personal Income-->
					    <option>WSAI</option><!--Workshop and Semina Allowance Income-->
					    <option>BWDI</option><!--Bank Withdraw Income-->
					 </select>
					 
				    <input type="number" name="amount" placeholder="Amount"><br>
					
					<input type="submit" name="submit" value="SUBMIT INCOME" class="submit">
					</form>
					</div>


			<div class="myforms col-3" ><br>
			    <th><h2 class="myth">General Expenditure</h2></th>
				
					<form class="generalaccountform" action="generalexpenditurescript.php" method="POST">
					<br>
					<h4>Date of transaction</h4>
					<input type="date" name="date" placeholder="Day">
					
					
					<select name='month'>
					    <option value="">-Select Month here!-</option>
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
					
					<select name='year'>
					    <option value="">-Select Year here!-</option>
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
					    
					 </select>
					
					
					<select name='channel'>
					    <option value="">-Select Chanel here!-</option>
					    <option>General Personal Expenditure</option>
					    <option>General Cipegwa Expenditure</option>
					    <option>Family & Friends Support</option>
					    <option>Personal Public Relations(Socialising)</option>
					    <option>General TVT Expenditure</option>
					    <option>Corprate Social Responsibility (KHM)</option>
					    <option>TVT loan scheme</option>
					    <option>General KHM Expenditure</option>					    
					    
					    <option>Public Relations (TVT)</option>
					    <option>Public Relations (KHM)</option>
					    <option>Participation in social issues</option>
					</select>
					
					
					<input type="text" name ="description" placeholder="Item Description">
					<input type="text" name="type" placeholder="Type">
					<input type="text" name ="quantity" placeholder="Quantity">
					<select name ='code'>
					    <option value="">-Selected Item Code Here!-</option>
					    <option>STNR</option><!--Stationery-->
					    <option>TCHM</option><!--Teaching materials-->
					    <option>KCFS</option><!--Kitchen and food Stuff-->
					    <option>WCWL</option><!--Wages and compansation for worker's labour -->
					    <option>LGRS</option><!--Leagle and Governement Requirements-->
					    <option>KHMR</option><!--KHM House Rent-->
					    <option>KBDT</option><!--KHM Bank Deposite Transaction-->
					    <option>TBDT</option><!--Twiga Vision Bank Deposite Transaction-->
					    <option>TVHR</option><!--Twiga Vision House Rent-->
					    <option>TPSR</option><!--Twiga Vision Public and Social Relation-->
					    <option>GKOE</option><!--General KHM Office Expenditure-->
					    <option>KIIE</option><!--KHM Infrastructure Improvement Expenses-->
					    <option>PHFE</option><!--Personal Home Food Expenses-->
					    <option>POME</option><!--Personal Outside Meals Expenses-->
					    <option>PWEE</option><!--Personal Work Execution Expenses-->
					    <option>PRFS</option><!--Personal Relatives and Friends Support-->
					    <option>PSRE</option><!--Personal Social Responsibility Expenses-->
					    <option>PBDT</option><!--Personal Bank Deposite Transaction-->
					    <option>PCGE</option><!--Personal Cipegwa General Expenses-->
					    <option>PSSE</option><!--Personal Shedrack School Expenses-->
					    <option>PSOE</option><!--Personal Shedrack Other Expenses-->
					    <option>PMTE</option><!--Personal Medical Treatment Expenses-->
					    <option>POPE</option><!--Personal Outfit Purchase Expenses-->
					    <option>PCBE</option><!--Personal Capacity Building Expenses-->
					    <option>PFDE</option><!--Personal Family Development Expenses-->
					    <option>PGEX</option><!--Personal General Expenses-->
					    
					</select>
					
					<input type="number" name="amount" placeholder="Amount"><br>
					<input type="submit" name="submit" Value="SUBMIT EXPENDITURE" class="submit">
					</form>
			</div>
    </div>
   <div class='linkwrapper'> 
<br>
<a href="sitemastercentre.php" class="backlink">Back to the main page</a>
<br>
            
        </div> 
        
        
        <div class="mainwrapper">
            <!-- The foorwe goes here -->
            <?php 
            include ('../site_includes/footer.php');
            ?>        
        
        </div>
 
 
</body>
</html>