<?php 
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
//is_admin();
?>
<!DOCTYPE html>

<html>
<head>
   <title>Volunteer-report</title>    
   <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
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
                     
        
        #realtable{
                background: lightgreen; 
                padding:10px;
                border: 1px solid black; 
                margin: 0 auto; 
                width:1200px; 
                height: auto; 
                margin-top:20px; 
                text-align:left; 
                border-collapse:collapse;
                font-size:14px;
                
                
            }
            
        #realtable  td{border: 1px solid black; 
            padding: 10px; 
            text-align: right; 
            background:lightgreen;
            text-align:center;
                
            }
        #realtable th{
                background:black;
                color:white;
                height:30px;
                font-size:16px;
                text-align:center; 
                border: 1px solid white;
                border-top:none;
                border-bottom:none;
                padding:10px;
                
            }
               
               strong{background:lightblue;}
          
		
		
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
            </div>
    
    
        
            <div class="maindiv">
          <!-- The main contant goes here -->            
                    
<?php

//paginatin code starts here////////////////////////////////////////////////////////////////////////////////////////////

$countquery = "SELECT COUNT(report_id) FROM `volunteerreport`";

$totalcount = mysqli_query ($connect, $countquery);

$outcome = mysqli_fetch_array($totalcount);

$totaloutcome = $outcome['0'];

$per_page = 1;

$num_of_pages = ceil($totaloutcome/$per_page);


if(!isset($_GET['page'])){
    
    header('Location: viewvolunteerreport.php?page=1');
    
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
$sql = "SELECT * FROM `volunteerreport` ORDER BY `reportDate` DESC LIMIT $start, $per_page  ";

$result = mysqli_query($connect, $sql);

if($row = mysqli_num_rows($result)>0){
		echo"<table id='realtable'>
			<tr class='tr' >
			<th width='120'>Full Name</th>
			<th width='80'>Country</th>
			<th width='80'>Duration</th>
			<th width='200'>General Overview</th>
			<th>Biggest Challenge</th>
			<th>Biggest Achievement</th>
			<th>Suggested Solution</th>
			<th width='80'>Contact Details</th>
			<th>Do you recomend us?</th>
			<th>What liked most</th>
			<th>What disliked most</th>
			<th>Sum up</th>
			
			
			</tr>";
			


	while ($row = mysqli_fetch_assoc($result)){
	       
		
			echo "<tr>";
		    echo "<td>".$row['fullName']."</td>";
			echo "<td>".$row['Country']."</td>";
			echo "<td>".$row['volunteerDuration']."</td>";
			echo "<td>".$row['generalOverview']."</td>";
			echo "<td>".$row['biggestChallenge']."</td>";
			echo "<td>".$row['biggestAchievement']."</td>";
			echo "<td>".$row['suggestedSolution']."</td>";
			echo "<td>".$row['contactDetails']."</td>";
			echo "<td>".$row['recommendation']."</td>";
			echo "<td>".$row['Likes']."</td>";
			echo "<td>".$row['Dislikes']."</td>";
			echo "<td>".$row['sumUp']."</td>";

			echo "</tr>";
	}
	
	

	

	
echo "</table><br>";

?>
	

    <div class='mainwrapper'>    
       
       <?php
            echo "<br><br>";
        
        echo '<a href="volunteercentre.php" id="backlink">Back to previous page</a><br>';
        
        
        
        
        }else {
        	echo "No data was found!";
        	echo "<br><br>";
        echo '<a href="volunteercentre.php" id="backlink">Back to previous page</a><br>';
        }
    
        ?>
        
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
                echo '<a  class="backlink" href="/multi_dimension/volunteercentre.php" >Back to volunteer\'s page</a><br>';  
                echo "<br>";
                    
                }else if($_SESSION['userLevel']==2){
                
                echo '<a  class="backlink" href="/two_dimension1/volunteercentre.php" >Back to volunteer\'s page</a><br>';  
                echo "<br>";
                }
                echo "<br>";
    
            ?>
  
    </div>
    </div>
  </div>
        <div class="mainwrapper">
            <!-- The footer goes here -->
            <?php 
            include ('../site_includes/footer.php');
            ?>        
        
        </div>
 
 
</body>
</html>