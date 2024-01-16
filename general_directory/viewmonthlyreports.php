<?php 
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
//is_admin();
?>
<!DOCTYPE html>

<html>
<head>
   <title>Monthlyreport</title>         
<?php 
include ('../site_includes/head.php'); 
?>
            
    <style>
         *{
                margin:0px; 
                background:darkorange;
         }
        
        .maindiv{
            border: 4px sold black;
            width: 100%; 
            height:auto; 
            background:darkorange; 
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
            border: 4px sold black; 
           
		}

           
            #backlink{
                background:darkorange; 
                text-align:center;
                
            }
            
            
            ul {
	    display:flex;
	    width:600px; 
	    height:30px; margin: 0 auto; 
	    align-content:center;
	    justify-content:center;
	    flex-direction:row;
	    
	}
	
	/*.pagination{width:800px; height:40px; border: 1px solid black; background:lightgreen;padding:5px; margin:0 auto; text-align:center; border-radius:20px;}*/
	

	 
	 
	    
	.activepage {
	    display:inline-block; 
	    background:lightgreen; 
	    padding:5px;
	    margin:0;
	    line-height:20px; 
	    text-align:center; 
	    width:30px; 
	    height:30px;
	    text-decoration:none; 
	    border: 1px solid red; 
	    border-radius:10px;
	    
	}
        
      .paginationNumbers a {
	    background:lightblue; 
	    padding:5px; 
	    margin:0;
	    line-height:20px; 
	    text-align:center; 
	    width:30px; 
	    height:30px;
	    text-decoration:none; 
	    border: 1px solid black; 
	    border-radius:10px;
	    display:inline-block; 

	    }  
        

    .paginationNumbers{
        display:inline-block;
        height:30;
        padding:5px; 
        float:left;
        text-align:center;
        background:darkorange;
        text-align:center;
       
    }
    
    .paginationNumbers1{
        display:inline-block;
        position:relative;
        height:30;
        padding:5px; 
        float:left;
        text-align:center;
        background:darkorange;
        text-align:center;
       
    }
    
    .pagination{
        position:relative;
        width:100%;
        height:auto;
        background:darkorange;
        display:flex;
        flex-direction:row;
        justify-content:center;
        align-content:center;
        align-items:center;
        flex-flow: row-wrap;
       
    }
    
        .pagination strong, a{
       
        background:darkorange;
        
    }
    

		
		body{
		    text-align:center;
		    
		}
		
		 .mainwrapper{
        background:darkorange;
    }


            

		.backlink{
		    display:block;
		    background:darkorange;
		    margin: 0 auto;
		    width:300px;
		    height:40px;
		    text-align:center;
		    
		}
		
		.myth{
			    background:darkorange;
			    
			}
			

	.name{
		background:tan;

         }   
         table{
                background: lightgreen; 
                padding:10px;
                border: 1px solid black; 
                margin: 0 auto; 
                width:800px; 
                height: auto; 
                margin-top:20px; 
                bottom:50px; 
                text-align:left; 
                border-collapse:collapse;
                font-size:14px;
                
                
            }
            
            .description{
                border: 1px solid black; 
                padding: 5px; 
                text-align: justify; 
                background:white;
                text-align:justify;
                
            }
            
        .titleclass{
            border: 1px solid black; 
            padding: 5px; 
            background:white;
            text-align:right;
            width:300px;
            height:auto;
            font-style: oblique;
                
            }

         th{
                background:black;
                height:30px;
                color:white;
                font-size:16px;
                text-align:center; 
                border: 1px solid black;
                border-top:none;
                border-bottom:none;
                
            }
               
               strong{background:white;}
          
		
		
		.setting{
		background:lightgreen;
		
		}
		
		.maindiv h1, a{
		    background:darkorange;
		}
		

        .pagination strong, a{
         background:darkorange;
        }

    </style>

</head>
    <body>
        
        
            <div class="mainwrapper">
                <!-- The titlebar goes here -->   
                <?php 
                include ('../site_includes/titlebar.php');
                ?>
                </div>
                        
            <div class="mainwrapper">
                <!-- The titlebar goes here -->   
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
                     
                    
<?php

//paginatin code starts here////////////////////////////////////////////////////////////////////////////////////////////

$countquery = "SELECT COUNT(id) FROM workersreporttable";

$totalcount = mysqli_query ($connect, $countquery);

$outcome = mysqli_fetch_array($totalcount);

$totaloutcome = $outcome['0'];

$per_page = 1;

$num_of_pages = ceil($totaloutcome/$per_page);


if(!isset($_GET['page'])){
    
    header('Location: viewmonthlyreports.php?page=1');
    
}else{

 
                $page = $_GET['page'];
                    
                }
                
                $start = (($page - 1) * $per_page);
                
                
                $centerpages = "";
                $pminus1 = $page - 1;
                $pminus2 = $page - 2;
                $pplus1 = $page + 1;
                $pplus2 = $page + 2;
                
                if($page ==1){
                   $centerpages .='<span class="activepage">' .$page. '</span> ';
                   $centerpages .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$pplus1.'">' .$pplus1. '</a> ';
                    
                }else if($page == $num_of_pages){
                
                 
                 $centerpages .='<a href="'.$_SERVER['PHP_SELF'].'?page='.$pminus1.'">' .$pminus1. '</a> ';
                 $centerpages .='<span class="activepage">' .$page. '</span> ';
                
                }else if($page > 2 && $page < ($num_of_pages-1)){
                
                	 $centerpages .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$pminus2.'">' .$pminus2. '</a> ';
                	 $centerpages .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$pminus1.'">' .$pminus1. '</a> ';
                	 $centerpages .=' <span class="activepage">' .$page. '</span> ';
                 	 $centerpages .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$pplus1.'">' .$pplus1. '</a> ';
                 	 $centerpages .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$pplus2.'">' .$pplus2. '</a> ';
                 	 
                }else if($page > 1 && $page < ($num_of_pages)){
                
                	
                	 $centerpages .='<a href="'.$_SERVER['PHP_SELF'].'?page='.$pminus1.'">' .$pminus1. '</a> ';
                	 $centerpages .='<span class="activepage">' .$page. '</span>';
                 	 $centerpages .='<a href="'.$_SERVER['PHP_SELF'].'?page='.$pplus1.'">' .$pplus1. '</a> ';
                 	
                }
        
        // pagination display implementation starts here///////////////////////////////////////////////////////
                
               $paginationDisplay ="";
            
            if($num_of_pages!="1"){
            $paginationDisplay.= '<div class="paginationNumbers1 ">Page <strong>'. $page. '</strong> of '.$num_of_pages.'</div><br>';
            
             if($page !=1){
                    
                    $previous = $page - 1;
                    $paginationDisplay .='<a href="'.$_SERVER['PHP_SELF'].'?page='.$previous.'"> Back </a>';
                }
               $paginationDisplay .='<div class="paginationNumbers"> '.$centerpages.' </div>'; 
                
            if($page != $num_of_pages){
                
                $next = $page + 1;
                $paginationDisplay .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$next.'"> Next </a>';
                
            }
            
            }
                
            // pagination display implementation ends here/////////////////////////////////////////////////////////////////////////////////
                

/*echo $centerpages;
echo $totaloutcome;

echo "<br><br>";

echo $num_of_pages;

echo "<br><br>";

echo $start;

echo "<br><br>";*/


// pagination code ends here////////////////////////////////////////////////////////////////////////////////////////////////

?>


<?php
$sql = "SELECT * FROM `workersreporttable` WHERE `type`='Monthly'ORDER BY date DESC LIMIT $start, $per_page  ";

$result = mysqli_query($connect, $sql);

if($row = mysqli_num_rows($result)>0){

			
            echo "<br><table id='reportdiv'>";
            echo"<tr><th>Things to look at</th><th>Description of the things</th></tr>";

	while ($row = mysqli_fetch_assoc($result)){
	       
		
		
			echo "<tr><td class='titleclass'><strong>Date of Submission</strong></td><td class='description'>".$row['date']."</td></tr>";
			echo "<tr><td class='titleclass'><strong>Month of Submission</strong></td><td class='description'>".$row['month']."</td></tr>";
			echo "<tr><td class='titleclass'><strong>Year of Submission</strong></td><td class='description'>".$row['year']."</td></tr>";
			echo "<tr><td class='titleclass'><strong>Period Covered</strong></td><td class='description'>".$row['periodcovered']."</td></tr>";
			echo "<tr><td class='titleclass'><strong>Report Submitted By</strong></td><td class='description'>".$row['reportername']."</td></tr>";
			echo "<tr><td class='titleclass'><strong>The Overview of the Report</strong></td><td class='description'>".$row['reportsummary']."</td></tr>";
			echo "<tr><td class='titleclass'><strong>The Activity Goals Originally Set</strong></td><td class='description'>".$row['goalsset']."</td></tr>";
			echo "<tr><td class='titleclass'><strong>Which of the Goals were reached?</strong></td><td class='description'>".$row['goalsreached']."</td></tr>";
			echo "<tr><td class='titleclass'><strong>Which of the Goals were not reached?</strong></td><td class='description'>".$row['goalsnotreached']."</td></tr>";
			echo "<tr><td class='titleclass'><strong>Why the goals not reached?</strong></td><td class='description'>".$row['whygoalsnotreached']."</td></tr>";
			echo "<tr><td class='titleclass'><strong>What was the Biggest Achievement over the period?</strong></td><td class='description'>".$row['biggestachievement']."</td></tr>";
			echo "<tr><td class='titleclass'><strong>And What Was the Biggest Challenge? over the period?</strong></td><td class='description'>".$row['biggestchallenge']."</td></tr>";
			echo "<tr><td class='titleclass'><strong>What are the newly set Goals?</strong></td><td class='description'>".$row['newgoals']."</td></tr>";
			echo "<tr><td class='titleclass'><strong>What are the strategies not to Fail?</strong></td><td class='description'>".$row['strategy']."</td></tr>";
			echo "<tr><td class='titleclass'><strong>Any additional information or comment?</strong></td><td class='description'>".$row['comment']."</td></tr>";

		
	}
	
	
	echo "</table>";
	

        
        
            echo "<br><br>";
        
        echo '<a href="khmcorner.php" id="backlink">Back to previous page</a><br>';
        
        
        
        
        }else {
        	echo "No data was found!";
        	echo "<br><br>";
        echo '<a href="khmcorner.php" id="backlink">Back to previous page</a><br>';
        }
    
        
        ?>
    </div>
    </div>

<div class='mainwrapper'>
        <!--pagination display-->
        <div class="pagination">
      
              <?php
                
                echo "<br>";
                // pagination display starts here///////////////////////////////////////////////////////
                
                echo $paginationDisplay;
                
                echo "<br>";
                
                // pagination display ends here///////////////////////////////////////////////////////
                ?>

       </div>         
            <?php
             
                //backlink starts here
                if($_SESSION['userLevel']==1){
                echo '<a  class="backlink" href="/multi_dimension/khmcorner.php" >Back to teacher\'s page</a><br>';  
                echo "<br>";
                    
                }else if($_SESSION['userLevel']==2){
                
                echo '<a  class="backlink" href="/two_dimension1/khmcorner.php" >Back to teacher\'s page</a><br>';  
                echo "<br>";
                }
                echo "<br>";
    
            ?>
  
    </div>
  
        <div class="mainwrapper">
            <!-- The footer goes here -->
            <?php 
            include ('../site_includes/footer.php');
            ?>        
        
        </div>
 
 
</body>
</html>