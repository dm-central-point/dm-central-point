<?php 
include ('../../site_includes/connect.php');
include ('../../site_includes/functions.php');
//is_teacher();
?>
<!DOCTYPE html>

<html>
<head>
    
    <?php
    include('../site_includes/head.php');
    ?>
   <title>Attendence-Corner</title></title>         

    <style>
    *{
    	    margin:0px;
			background:yellow;
    	    
    	}
    
       .maindiv{
            border: 4px sold black;
            width: 80%; 
            height:auto; 
            background:darkorange; 
            margin: 0 auto; 
            text-align: center; 
            border-radius:0px;
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-content:center;
            align-items:center;
            flex-flow: row-reverse wrap;
            
        }

    	
    	#container2 { 
    	    border:#000 1px solid; 
    	    padding:24px; 
    	    height:auto; 
    	    width:100%; 
    	    background:darkorange; 
    	    margin: 0 auto; 
    	    display:flex;
    	    flex-direction:column;
    	    align-content:center;
    	    align-items:center;
    	    
    	}
    	
    	#fetchmenu1-1, #fetchmenu1-2, #fetchmenu2-1, #fetchmenu2-2, #fetchmenu3-1, #fetchmenu3-2 #fetchmenu4-1 , #fetchmenu4-2{ 
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-content:center;
            align-items:center;
            flex-flow: row-reverse wrap;
    		padding:20px;
    		
		    
		}
    	
		#fetchmenu1-2, #fetchmenu2-1, #fetchmenu2-2, #fetchmenu3-1, #fetchmenu3-2, #fetchmenu4-1, #fetchmenu4-2{ display:none;}
		
       
       .mincontainer{
           width:900px; 
           height:400px; 
           background:#505050; 
           margin:0 auto; 
           border-radius:10px;
           
       }
       #fetchmenu1-1, #fetchmenu1-2{
           background:#D3D3D3; 
           color:black; 
           width:60%;
           height:auto; 
           margin-top:20px;
           margin-bottom:20px; 
           text-align:center;
           border:1px solid black; 
           border-radius:20px;
           
       }
       #fetchmenu2-1, #fetchmenu2-2{
           background:plum; 
           color:black; 
           height:auto;  
           margin-top:20px;
           margin-bottom:20px; 
           text-align:center;
           border:1px solid black; 
           border-radius:20px;
           
       }
       
        .fetchmenu1 h2{
           background:#D3D3D3; 
       }
       
       #fetchmenu3-1, #fetchmenu3-2{
           background:lightgreen; 
           color:black; 
           height:auto;  
           margin-top:20px;
           margin-bottom:20px; 
           text-align:center;
           border:1px solid black; 
           border-radius:20px;
		   
	    }
		
		#fetchmenu4-1, #fetchmenu4-2{
            background:tan; 
           color:black; 
           height:auto;  
           margin-top:20px;
           margin-bottom:20px; 
           text-align:center;
           border:1px solid black; 
           border-radius:20px;
		   
	    }
		
		#fetchmenu1-1, #fetchmenu1-2, #fetchmenu2-1, #fetchmenu2-2, #fetchmenu3-1, #fetchmenu3-2, #fetchmenu4-1 , #fetchmenu4-2{ 
		  padding:20px;
		  box-sizing:border-box;
		    
		}
      .fetchlink{
          display:inline-block; 
          background:#7CB9E8; 
          line-height:60px; 
          color:black; 
          height:60px; 
          margin-bottom:10px;
          text-align:center; 
          text-decoration:none; 
          border:1px solid black;
          font-size:20px; 
          border-radius:10px;
          
      } 
      
      .button{
          margin-bottom:10px;
          height:40px;
          width:250px;
          font-size:20px;
          background:silver;
          border-radius:10px;
          
         }
         .mainwrapper{
             background:yellow;
         }
         #fetchmenu1-1::after{
               content: "";
              clear: both;
              display: table;
         }
         
        #fetchmenu1-2::after{
               content: "";
              clear: both;
              display: table;
         }
         
         
        #fetchmenu2-1::after{
              content: "";
              clear: both;
              display: table;
         }
         
          #fetchmenu2-2::after{
               content: "";
              clear: both;
              display: table;
         }
         
         
         #fetchmenu3-1::after{
              content: "";
              clear: both;
              display: table;
         }
          #fetchmenu3-2::after{
               content: "";
              clear: both;
              display: table;
         }
         
        #fetchmenu4-1::after{
              content: "";
              clear: both;
              display: table;
         }
          #fetchmenu4-2::after{
               content: "";
              clear: both;
              display: table;
         }
         
        #backlink{
                background:darkorange; 
                text-align:center;
                
            }
            
 
      
    </style>
    	<script type="text/javascript">
	
	function domore(x){
		return document.getElementById(x);
	}
	function processDiv1(){
		domore("fetchmenu1-1").style.display = "none";
		domore("fetchmenu1-2").style.display = "flex";
		domore("fetchmenu1-2").style.display = "block";
	
	}
	function processDiv2(){
		domore("fetchmenu1-2").style.display = "none";
		domore("fetchmenu2-1").style.display = "block";
		
		
	}
	
	function processDiv3(){
		domore("fetchmenu2-1").style.display = "none";
		domore("fetchmenu2-2").style.display = "block";
		
		
	}
	
		function processDiv4(){
		domore("fetchmenu2-2").style.display = "none";
		domore("fetchmenu3-1").style.display = "block";
		
		
	}
	
	
		function processDiv5(){
		domore("fetchmenu3-1").style.display = "none";
		domore("fetchmenu3-2").style.display = "block";
		
		
	}
	
		function processDiv6(){
		domore("fetchmenu3-2").style.display = "none";
		domore("fetchmenu4-1").style.display = "block";
		
		
	}
	
		function processDiv7(){
		domore("fetchmenu4-1").style.display = "none";
		domore("fetchmenu4-2").style.display = "block";
		
		
	}
	
	  function processDiv8(){
		domore("fetchmenu4-2").style.display = "none";
		domore("fetchmenu1-1").style.display = "block";
		
		
	}
	
	
	
	
	</script>
    
    
    

</head>
    <body>
        
        
            <div class="mainwrapper">
                <!-- The titlebar goes here -->   
                <?php 
                include ('../../site_includes/titlebar.php');
                ?>
                </div>
                
            <div class="mainwrapper">
                <!-- The infobar goes here -->
                <?php 
                include ('../../site_includes/isset.php');
                ?>       
                </div>
        
            <div class="mainwrapper">
                <!-- The menubar goes here -->
                <?php 
                include ('../../site_includes/menubar.php');
                ?>        
            </div>
    
    
        <div class="mainwrapper">
         <!-- The main contant goes here -->
    
        
    
    <div id= "container2">
    
	<div class="maindiv">
   
    <div id="fetchmenu1-1" class="col-9 fetchmenu1">
    <br>
    
    <h2>Attendence first-half 2019</h2>
    <br><br>
	<a href='Attendence2019/attendencejanuary2019.php' class="fetchlink col-6">January</a>
	<a href='Attendence2019/attendencefebruary2019.php' class="fetchlink col-6">February</a>
	<a href='Attendence2019/attendencemarch2019.php' class="fetchlink col-6">March</a>
	<a href='Attendence2019/attendenceapril2019.php' class="fetchlink col-6">April</a>
	<a href='Attendence2019/attendencemay2019.php' class="fetchlink col-6">May</a>
	<a href='Attendence2019/attendencejune2019.php' class="fetchlink col-6">June</a>
    <br>
    <button class='button' onclick="processDiv1()">Go to second-half 2019</button>
    <br>
    </div> 
    
    <div id="fetchmenu1-2" class="col-9 fetchmenu1">
    <br>
    <h2>Second-half 2019</h2>
    <br>
    <br>
	<a href='Attendence2019/attendencejuly2019.php' class="fetchlink col-6">July</a>
	<a href='Attendence2019/attendenceaugust2019.php' class="fetchlink col-6">August</a>
	<a href='Attendence2019/attendenceseptember2019.php' class="fetchlink col-6">September</a>
	<a href='Attendence2019/attendenceoctober2019.php' class="fetchlink col-6">October</a>
	<a href='Attendence2019/attendencenovember2019.php' class="fetchlink col-6">November</a>
	<a href='Attendence2019/attendencedecember2019.php' class="fetchlink col-6">December</a>
    <br>
    <button class='button' onclick="processDiv2()">Go to Year 2020</button>
    <br>
    </div>
    
   
   	<div id="fetchmenu2-1" class="col-9">
    <br>
     <h2>Attendence first-half 2020</h2>
    <br>
    <br>
	<a href='Attendence2020/attendencejanuary2020.php' class="fetchlink col-6">January</a>
	<a href='Attendence2020/attendencefebruary2020.php' class="fetchlink col-6">February</a>
	<a href='Attendence2020/attendencemarch2020.php' class="fetchlink col-6">March</a>
	<a href='Attendence2020/attendenceapril2020.php' class="fetchlink col-6">April</a>
	<a href='Attendence2020/attendencemay2020.php' class="fetchlink col-6">May</a>
	<a href='Attendence2020/attendencejune2020.php' class="fetchlink col-6">June</a>
    <br>
     <button class='button' onclick="processDiv3()">Go to second-half 2020</button>
     <br>
    </div> 
    
    
    <div id="fetchmenu2-2" class="col-9">
    <br>
    <h2>Second-half 2020</h2>
    <br>
    <br>
	<a href='Attendence2020/attendencejuly2020.php' class="fetchlink col-6">July</a>
	<a href='Attendence2020/attendenceaugust2020.php' class="fetchlink col-6">August</a>
	<a href='Attendence2020/attendenceseptember2020.php' class="fetchlink col-6">September</a>
	<a href='Attendence2020/attendenceoctober2020.php' class="fetchlink col-6">October</a>
	<a href='Attendence2020/attendencenovember2020.php' class="fetchlink col-6">November</a>
	<a href='Attendence2020/attendencedecember2020.php' class="fetchlink col-6">December</a>
   	<br>
     <button class='button' onclick="processDiv4()">Back to Year 2021</button>
     <br>
    </div>

   
   
    <div id="fetchmenu3-1" class="col-9">
    <br>
    <h2>Attendence first-half 2021</h2>
    <br>
    <br>
	<a href='Attendence2021/attendencejanuary2021.php' class="fetchlink col-6">January</a>
	<a href='Attendence2021/attendencefebruary2021.php' class="fetchlink col-6">February</a>
	<a href='Attendence2021/attendencemarch2021.php' class="fetchlink col-6">March</a>
	<a href='Attendence2021/attendenceapril2021.php' class="fetchlink col-6">April</a>
	<a href='Attendence2021/attendencemay2021.php' class="fetchlink col-6">May</a>
	<a href='Attendence2021/attendencejune2021.php' class="fetchlink col-6">June</a>
   	<br>
		<button class='button' onclick="processDiv5()">Go to second-half 2021</button>
		<br>
    </div>
    
    
    <div id="fetchmenu3-2" class="col-9">
    <br>
    <h2>Second-half 2021</h2>
    <br>
    <br>
	<a href='Attendence2021/attendencejuly2021.php' class="fetchlink col-6">July</a>
	<a href='Attendence2021/attendenceaugust2021.php' class="fetchlink col-6">August</a>
	<a href='Attendence2021/attendenceseptember2021.php' class="fetchlink col-6">September</a>
	<a href='Attendence2021/attendenceoctober2021.php' class="fetchlink col-6">October</a>
	<a href='Attendence2021/attendencenovember2021.php' class="fetchlink col-6">November</a>
	<a href='Attendence2021/attendencedecember2021.php' class="fetchlink col-6">December</a>
   	<br>
		<button class='button' onclick="processDiv6()">Go to Year 2018</button>
		<br>
    </div>
  
  
    <div id="fetchmenu4-1" class="col-9">
    <br>
    <h2>Attendence first-half 2018</h2>
    <br>
    <br>
	<a href='Attendence2018/attendencejanuary2018.php' class="fetchlink col-6">January</a>
	<a href='Attendence2018/attendencefebruary2018.php' class="fetchlink col-6">February</a>
	<a href='Attendence2018/attendencemarch2018.php' class="fetchlink col-6">March</a>
	<a href='Attendence2018/attendenceapril2018.php' class="fetchlink col-6">April</a>
	<a href='Attendence2018/attendencemay2018.php' class="fetchlink col-6">May</a>
	<a href='Attendence2018/attendencejune2018.php' class="fetchlink col-6">June</a>
	<br>
         <button class='button' onclick="processDiv7()">Go to second-half 2018</button>
    <br>
    </div>
    
    
    
    <div id="fetchmenu4-2" class="col-9">
    <br>
    <h2>Second-half 2018</h2>
    <br>
    <br>
	<a href='Attendence2018/attendencejuly2018.php' class="fetchlink col-6">July</a>
	<a href='Attendence2018/attendenceaugust2018.php' class="fetchlink col-6">August</a>
	<a href='Attendence2018/attendenceseptember2018.php' class="fetchlink col-6">September</a>
	<a href='Attendence2018/attendenceoctober2018.php' class="fetchlink col-6">October</a>
	<a href='Attendence2018/attendencenovember2018.php' class="fetchlink col-6">November</a>
	<a href='Attendence2018/attendencedecember2018.php' class="fetchlink col-6">December</a>
	<br>
         <button class='button' onclick="processDiv8()">Go to Year 2019</button>
    <br>
    </div>
   


	

    
		  
	
    
  </div>     
       	<br>
		<a href="../khmcorner.php" id="backlink">Back to KHM Centre</a><br><br>  
            

    </div>         
            
    </div> 
        
        
        <div class="mainwrapper">
            <!-- The foorwe goes here -->
            <?php 
            include ('../../site_includes/footer.php');
            ?>        
        
        </div>
        
    </div>
        
 
 
</body>
</html>
