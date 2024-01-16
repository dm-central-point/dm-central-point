<?php 
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
//is_teacher();
?>
<!DOCTYPE html>

<html>
<head>
   <title>General income</title>         
<?php 
include ('../site_includes/head.php'); 
?>
            
    <style>
    *{
            margin:0px;

        }
        
        
        .maindiv{
            border: 4px sold black;
            width: 100%; 
            height:auto; 
            background:white; 
            margin: 0 auto; 
            text-align: center; 
            border-radius:0px;
            display:flex;
            flex-direction:row-reverse;
            justify-content: center;
            align-content:center;
            align-items:center;
            flex-flow:column;
            overflow-x:auto;
		
		}
        
        #multiphase{ 
            /*border:#000 1px solid; */
            padding:24px; 
            width:500px; 
            margin: 0 auto; 
            margin-bottom:30px;
            margin-top:40px;
            background:green;
            text-align:justify;
            text-align:center;
            background:white;
            box-shadow: 0 5px 5px 10px gray;
            border-radius:5px;
            
        }
        
            #phase1,#phase2, #phase3,#phase4,#show_all_data{ 
            background:white;
            
        }
        
        
        #multiphase > #phase2, #phase3,#phase4, #show_all_data{ 
            display:none; 
            
        }
        
        
        #progress{
            margin:0 auto; 
            background:cyan; 
            text-align:center; 
            padding-top:10px;
            width:100%;
            border-bottom:2px solid black;
            
        }
        
        #status{
            background:cyan;
        }
        
        .text{
            border:pink 3px solid; 
            width:400px;
            height:40px;
            padding:5px;
            background:white;
            font-size:14px;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            
        }
        
          .textarea{
             border:pink 3px solid; 
            resize:none;
            width:400px;
            height:50px;
            background:white;
            padding:5px;
            display:table-cell; 
            vertical-align:middle;
            font-size:14px;
            font-family: Verdana, Arial, Helvetica, sans-serif;
        }
        
        body{
            
            text-align:center;
            
        }
        
        #backlink{
            display:block;
            width:100%;
            height:80px;
            margin:0 auto;
            line-height:50px;
            background:cyan;
            
        }
        

    </style>

 <script>

            var formdate, month, year, period,  name, summary, goal, goalreached, notreached, whynot, achievement, challenge, newgoals, strategy, challenge, type;
          
            function _(x){
            	return document.getElementById(x);
            }
            function processPhase1(){
            	
            	fdate = _("formdate").value;
            	month = _("month").value;
            	year = _("year").value;
            	period = _("period").value;

            		
            if(fdate.length > 2 && month.length > 2 && year.length > 2 && period.length > 2){
            		_("phase1").style.display = "none";
            		_("phase2").style.display = "block";
            		_("progressBar").value = 25;
            		_("status").innerHTML = "Phase 1 of 4";
            	} else {
            	    alert("Please fill in the fields");	
            	}
            }
            
            function processPhase2(){
            	name = _("name").value;
            	summary =_("summary").value;
            	goal = _("goal").value;
            	goalreached =_("goalreached").value;
       
            	
            if(name.length > 0 && summary.length > 0 && goal.length > 0 && goalreached.length >0){
            		_("phase2").style.display = "none";
            		_("phase3").style.display = "block";
            		_("progressBar").value = 50;
            		_("status").innerHTML = "Phase 2 of 4";
            	} else {
            	    alert("Please choose your gender");	
            	}
            }
            
            function processPhase3(){
            	notreached = _("notreached").value;
            	whynot = _("whynot").value;
            	achievement = _("achievement").value;
            	challenge = _("challenge").value;
            	
            		
            if(notreached.length > 0 && whynot.length > 0 && achievement.length > 0 && challenge.length > 0){
            	  
            		_("phase3").style.display = "none";
            		_("phase4").style.display = "block";
            		_("progressBar").value = 75;
            		_("status").innerHTML = "phase 3 of 4";
            	} 
            }
        
            function processPhase4(){
                    
            	newgoals = _("newgoals").value;
            	strategy = _("strategy").value;
            	comment = _("comment").value;
            	type = _("type").value;
            	
            if(newgoals.length > 0 && strategy.length > 0 && comment.length > 0 && type.length > 0){
            	  
            		_("phase4").style.display = "none";
            		_("show_all_data").style.display = "block";
            		_("display_formdate").innerHTML = fdate;
            		_("display_month").innerHTML = month;
            		_("display_year").innerHTML = year;
            		_("display_period").innerHTML = period;
            		_("display_name").innerHTML = name;
            		_("display_summary").innerHTML = summary;
            		_("display_goals").innerHTML = goal;
            		_("display_goalreached").innerHTML = goalreached;
            		_("display_goalnotreached").innerHTML = notreached;
            		_("display_reasonnotreached").innerHTML = whynot;
            		_("display_achievement").innerHTML = achievement;
            		_("display_challenge").innerHTML = challenge;
            		_("display_newgoals").innerHTML = newgoals;
            		_("display_strategy").innerHTML = strategy;
            		_("display_comment").innerHTML = comment;
            		_("display_type").innerHTML = type;
            		_("progressBar").value = 100;
            		_("status").innerHTML = "Data Overview";
            	} 
            }
            
            

            function submitForm(){
            	_("multiphase").method = "post";
            	_("multiphase").action = "activityreportscript.php";
            	_("multiphase").submit();
                
            }
            
            function showPhase1(){
            
            		_("phase2").style.display = "none";
            		_("phase1").style.display = "block";
            		
            	
            }
            
            function showPhase2(){
            
            		_("phase3").style.display = "none";
            		_("phase2").style.display = "block";
            		
            }

            
            
            function showPhase3(){
            
            		_("phase4").style.display = "none";
            		_("phase3").style.display = "block";
            		
            	
            }
            
            
                
          function showPhase4(){
            
            		_("show_all_data").style.display = "none";
            		_("phase4").style.display = "block";
            		
            	
            }
            
        </script>


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
 <div id="progress">
<progress id="progressBar" value="0" max="100" style="width:250px;"></progress>
<h3 id="status">Phase 0 of 4</h3>

</div>
<br>
<form id="multiphase" class="col-9" onsubmit="return false" enctype="multiparty/form-data">
  <div id="phase1">
   	<leble>Date of filling the form<leble><br>
	<input type="date" name="formdate" class="text" id="formdate" ><br><br>
	<leble>Month:</leble><br>				
<select id="month" name="month" class="text" >
	<option value="" selected="selected"> -Select Month- </option>
	<option value="January">January</option>
	<option value="February">February</option>
	<option value="March">March</option>
	<option value="April">April</option>
	<option value="May">May</option>
	<option value="June">June</option>
	<option value="July">July</option>
	<option value="August">August</option>
	<option value="September">September</option>
	<option value="October">October</option>
	<option value="November">November</option>
	<option value="December">December</option>
</select><br><br>


	<leble> Year</leble><br>
<select name="year" id="year" class="text">
    <option value="">-Select Year-</option>
	<option value="2018">2018</option>
	<option value="2019">2019</option>
	<option value="2020">2020</option>
	<option value="2021">2021</option>
	<option value="2022">2022</option>
	<option value="2023">2023</option>
	<option value="2024">2024</option>
	<option value="2025">2025</option>
	<option value="2026">2026</option>
	<option value="2027">2027</option>
	<option value="2028">2028</option>
	<option value="2019">2029</option>
	<option value="2030">2030</option>
    	</select><br><br>
    	
<leble>Period Covered</leble><br>
<input type="text" id="period" name="period" class="text"><br><br>
<button onclick="processPhase1()">Continue</button>
  </div>
  
  <div id="phase2">
    <leble>Name of Reporter</leble><br>
   		
<select id="name" name="name" class="text" >
	<option value="" selected="selected"> -Select Name- </option>
	<option value="Frida Swai">Frida Swai</option>
	<option value="Roseline Mushi">Roseline Mushi</option>
	<option value="Hawa Yassini">Hawa Yassini</option>
	<option value="Grace Lemka">Grace Lemka</option>
	<option value="Amina Halifa">Amina Halifa</option>
	<option value="Oliva Marandu">Oliva Marandu</option>
	<option value="Catherin Ngowe">Catherine Ngowe</option>
	<option value="Daniphord Mwajah">Daniphord Mwajah</option>
</select><br><br>
    <leble>Report Summary</leble><br>
    <textarea   name="summary" class="textarea" id="summary"></textarea><br><br>
    <leble>What goals did you set?</leble><br>
    <textarea   name="goal" class="textarea" id="goal"></textarea><br><br>
    <leble>Which of the goals were reached?</leble><br>
    <textarea   name="goalreached" class="textarea" id="goalreached"></textarea><br><br>
    <button onclick="showPhase1()">Back</button>
    <button onclick="processPhase2()">Continue</button>
 </div>
 
 <div id="phase3">
    <leble>Which goals didn't you reach?</leble><br>
    <textarea   name="notreached"  class="textarea" id="notreached"></textarea><br><br>
    <leble> Why weren't these goals reached?</leble><br>
    <textarea   name="whynot" id="whynot"  class="textarea"></textarea><br><br>
    <leble>What was the biggest achievement?</leble><br>
    <textarea   name="achievement"  class="textarea" id="achievement"></textarea><br><br>
    <leble> What was the biggest Challenge?</leble><br>
    <textarea   name="challenge" id="challenge"  class="textarea"></textarea><br><br>
    <button onclick="showPhase2()">Back</button>
    <button onclick="processPhase3()">Continue</button>
  </div>
  
  
   <div id="phase4">
    <leble> What are the new goals?</leble><br>
    <textarea   name="newgoals" class="textarea" id="newgoals"></textarea><br><br>
    <leble> What is the strategy not to fail?</leble><br>
    <textarea   name="strategy" class="textarea" id="strategy"></textarea><br><br>  
    <leble> Any comment?</leble><br>
    <textarea   name="comment" class="textarea" id="comment"></textarea><br><br>
    <leble> Type of report</leble><br>
    <select name="type" id="type" class="text">
    <option value="">-Select type-</option>
	<option value="Weekly">Weekly</option>
	<option value="Monthly">Monthly</option>
	<option value="Annual">Annual</option>
	</select><br><br>
	
    <button onclick="showPhase3()">Back</button>
    <button onclick="processPhase4()">Continue</button>
  </div>
  

  <div id="show_all_data">
      <br>
     <h3>Now you can review your answers before submitting</h3>
      <br>
    Date form filled: <span id="display_formdate"></span> <br>
    Month: <span id="display_month"></span> <br>
    Year: <span id="display_year"></span> <br>
    Period Covered: <span id="display_period"></span> <br>
    Name of Reporter: <span id="display_name"></span> <br>
    Report Summary: <span id="display_summary"></span> <br>
    Goals Set: <span id="display_goals"></span> <br>    
    Goals Reached: <span id="display_goalreached"></span> <br>
    Goals Not Reached: <span id="display_goalnotreached"></span> <br>
    Whay Not reached?: <span id="display_reasonnotreached"></span> <br>
    Biggest Achievement: <span id="display_achievement"></span> <br>
    Biggest Challenge: <span id="display_challenge"></span> <br>
    New goals: <span id="display_newgoals"></span> <br>
    Strategy set: <span id="display_strategy"></span> <br>
    Comments : <span id="display_comment"></span> <br>
    Report Type : <span id="display_type"></span> <br>
       <button onclick="showPhase4()">Back</button>    
    <button onclick="submitForm()">Submit Data</button>
  </div>
</form>

</div> 

        
  </div> 
   <div class="mainwrapper">            
            <?php
            echo '<a id="backlink" href="khmcorner.php" id="backlink">Back to Teacher\'s corner</a><br>';
            
            
            ?>
            
            
     </div>
  
    <div class="footerwrapper1">
	    <?php
		include ('../site_includes/footer.php');
		
		?>
  
   </div>
   
   <div class="footerwrapper2">
	    <?php
		include ('../site_includes/footermobile.php');
		
		?>
  
   </div>
 
 
</body>
</html>