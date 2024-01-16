<?php 
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
//is_admin();
?>
<!DOCTYPE html>

<html>
<head>
   <title>View-Examresults</title>         
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
        
        
        ul {
        display:flex;
        width:600px; 
        height:30px; margin: 0 auto; 
        align-content:center;
        justify-content:center;
        flex-direction:row;
        
        }
        
        
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
        
        .linkwrapper{
        width:100%;
        height:70px;
        background:darkorange;
        text-align:center;
        padding:10px;
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
        #reporttable{
        background: lightgreen; 
        padding:10px;
        border: 1px solid black; 
        margin: 0 auto; 
        width:1200px; 
        height: auto; 
        margin-top:20px; 
        bottom:50px; 
        text-align:left; 
        border-collapse:collapse;
        font-size:14px;
        
        
        }
        
        .description{
        border: 1px solid black; 
        padding: 10px; 
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
        background:cyan;
        color:black;
        font-style:bold;
        height:30px;
        font-size:16px;
        text-align:center; 
        border: 1px solid black;
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
    
    
    <div class="mainwrapper">
         <!-- The main contant goes here -->
            <div class="maindiv">
                     
                    
<?php

//paginatin code starts here////////////////////////////////////////////////////////////////////////////////////////////

$countquery = "SELECT COUNT(id) FROM examtable";

$totalcount = mysqli_query ($connect, $countquery);

$outcome = mysqli_fetch_array($totalcount);

$totaloutcome = $outcome['0'];

$per_page = 10;

$num_of_pages = ceil($totaloutcome/$per_page);


if(!isset($_GET['page'])){
    
    header('Location: viewexamresults.php?page=1');
    
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
$sql = "SELECT * FROM `examtable` ORDER BY dateofRecord DESC LIMIT $start, $per_page  ";

$result = mysqli_query($connect, $sql);

if($row = mysqli_num_rows($result)>0){
    
    
	    $row['childFullName'];
	    $row['groupName'];
		$row['monthOfExam'];
		$row['yearOfExam'];
		$row['examType'];
		$row['dateOfExam'];
		$row['totalScores'];
		$row['gradeAverage'];
		$row['teachersComment'];

    
    ?>
			
		<br><table id='reporttable'>
            
            <tr>
                <th>Child's Full Name</th>
                 <th>Group Name</th>
                <th>Month of Exam</th>
                 <th>Year of Exam</th>
                <th>Exam Type</th>
                <th>Date of Exam</th>
                <th>Total Score</th>
                <th>Average Grade</th>
                <th>Teacher's Comment</th>
                
            </tr>
                
     <?php

	while ($row = mysqli_fetch_assoc($result)){
	       
		?>
		
			<tr>
			<td class='description'><?php echo$row['childFullName']?> </td>
			<td class='description'><?php echo$row['groupName']?></td>
			<td class='description'><?php echo$row['monthOfExam']?></td>
			<td class='description'><?php echo$row['yearOfExam']?> </td>
			<td class='description'><?php echo$row['examType']?> </td>
			<td class='description'><?php echo$row['dateOfExam']?></td>
			<td class='description'><?php echo$row['totalScores']?></td>
			<td class='description'><?php echo$row['gradeAverage']?></td>
			<td class='description'><?php echo$row['teachersComment']?> </td>
		
			
			</tr>
		
<?php
		
	}
	
	
	echo "</table>";
	

    echo "<br><br>";
        
        }else {
        	echo "No data was found!";
        	
        echo "<div class='linkwrapper'>
        
        back_link_main();
        
        </div>";
 
 
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
 
 
</body>
</html>