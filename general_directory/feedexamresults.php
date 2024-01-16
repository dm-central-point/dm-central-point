<?php 
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
//is_teacher();
?>
<!DOCTYPE html>

<html>
<head>
   <title>Examinationresults-form</title>         
<?php 
include ('../site_includes/head.php'); 
?>

    <style>
    
    .mainwrapper{
    
        background:lightblue;
    }
       .maindiv{
            border: 4px sold black;
            width: 80%; 
            height:auto; 
            background:lightblue; 
            margin: 0 auto; 
            text-align: center; 
            border-radius:0px;
            display:flex;
            flex-direction:row-reverse;
            justify-content:center;
            align-content:center;
            align-items:center;
            flex-flow: row-reverse wrap;
            overflow-x:auto;
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
        
        .semidiv{
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
      
      		.generalaccountform3{
		    width:50%;
		    height:auto; 
		    background:white; 
		    margin: 0 auto;
		    margin-top:30px;
		    margin-bottom:30px;
		    
		}
		
		.generalaccountform3 h4{
		 
		    background:white;
		}
		
		.generalaccountform3 input[type=text]{
		    width:80%; 
		    height:40px;
		    font-size:18px; 
		    text-align:left; 
		    background:white;
		    margin-bottom:5px;
		    
		}
		
		.generalaccountform3 input[type=submit]{
		    width:80%; 
    		height:40px; 
    		font-size:20px; 
    		text-align:center;
    		background:#000080;
    		margin-bottom:20px;
        	}
        		
        
        .generalaccountform3 input[type=date]{
		    width:80%; 
		    height:40px;
		    font-size:18px; 
		    text-align:left; 
		    background:white;
		    margin-bottom:5px;
		    
		    
		}
		
		.generalaccountform3 input[type=number]{
		    width:80%; 
		    height:40px;
		    font-size:18px; 
		    text-align:left; 
		    background:white;
		    border: 3px solid rgb(236, 176, 220);
		    margin-bottom:5px;
        	}
		
		
		
		
		.generalaccountform3 select{
		    width:80%; 
		    height:40px; 
		    text-align:left; 
		    background:white;
		    font-size:16px;
		    margin-bottom:5px;
		    
		}
		
		.generalaccountform3 textarea{
		    width:80%; 
		    height:40px; 
		    text-align:justify; 
		    background:white;
		    font-size:18px;
		    padding:10px;
		    border: 3px solid rgb(236, 176, 220);
		    font-family: 'Droid Serif', serif;
		    margin-bottom:5px;
		    
		}
		
		.generalaccountform3 input[type=radio]{
		    height:20px; 
		    width:20px;
		    text-align:justify; 
		    background:white;
		    font-size:18px;
		    border: 3px solid rgb(236, 176, 220);
		    font-family: 'Droid Serif', serif;
		    margin-bottom:5px;

		}
		
		 .generalaccountform3 lable{
		    height:40px;
		    margin:0 auto;
		    text-align:justify; 
		    background:bisque;
		    font-size:18px;
		    font-family: 'Droid Serif', serif;
		    margin-bottom:10px;
		    padding:10px;
		    line-height:10px;
		 }
		 
		 .myth{
		       background:darkorange; 
		       padding:10px;
		        
		    }

			.linkwrapper{
		    width:100%;
		    height:40px;
		    background:lightblue;
		    text-align:center;
		    }
		    
		    .backlink{
		        background:lightblue;
		        color:blue;
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
                
            		
            		<form class="generalaccountform3 col-6" action="examinationscript.php" method="POST">
            		    <h2 class="myth">Examination results form</h2></th>
					
					<h4>Examination Results Feeding Date</h4>
					<input type="date" name="recorddate" class="text" >
					<input type="text" name ="childname" class="text" placeholder="Child's Name">
					
					<select name ="group" class="text" >
						<option value=''>-Select Group Here-</option>
						<option>Group A</option>
						<option>Group B</option>
						<option>Group C</option>
						<option>Group D</option>
						<option>Group E</option>
				    </select>
					
					
					<select name ="exammonth" class="text" >
						<option value=''>-Select Month of Examinination Here-</option>
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
				    
	
				    
				   	<select name ="examyear" class="text" >
					    <option value''>-Select Year of Examination Here-</option>
						<option>2017</option>
						<option>2018</option>
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
					
					<select name ="examtype" class="text" >
						<option value=''>-Select Examination Type Here-</option>
						<option>Monthly</option>
						<option>Quarterly</option>
						<option>Semi-Annually</option>
						<option>Annually</option>
					
					</select>
					
						<h4>Examination Date</h4>
					<input type="date" name="dateofexam" class="text" >	
					<input type="text" name="totalscores" class="text"  placeholder="Type total Score here" >
										
					<select name ="grade" class="text" >
						<option value=''>-Select Grade Here-</option>
						<option>Grade A+</option>
						<option>Grade A</option>
						<option>Grade B+</option>
						<option>Grade B</option>
						<option>Grade C</option>
						<option>Grade D</option>
						<option>Grade F</option>
						<option>Julieth </option>
					</select>

					<input type="text" name="suggestion" class="text" placeholder="Teacher's comment">
					<input type="submit" name="submit" value="SUBMIT REPORT" class="submit"><br>
					</form>
                    
            </div>         
            
    </div> 
 
         <div class="linkwrapper">
            <?php
            back_link_main();
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
        
    </div>
        
 
 
</body>
</html>