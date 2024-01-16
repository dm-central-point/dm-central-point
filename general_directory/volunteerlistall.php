<?php 
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
include ('../site_includes/backlinks_functions.php');

?>
<!DOCTYPE html>

<html>
<head>
   <title>Volunteer-list</title>  
   <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<?php 
include ('../site_includes/head.php'); 
?>
            
    <style>
        .mainwrapper{
        background:darkorange;
        width:100%;
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
        margin-top:0px;
        
        }
        
        .tableheadingwrapper{
        width: 100%; 
        height:auto; 
        background:darkorange; 
        text-align: center; 
        display:flex;
        flex-direction:row-reverse;
        justify-content: center;
        align-content:center;
        flex-flow:column;
        overflow-x:auto;
        
        }
        
        .tableheadings{
        background:darkorange;
        }
        
        
        .backlink{
        display:block;
        background:darkorange;
        margin: 0 auto;
        width:100%;
        text-align:center;
        padding-top:30px;
        color:blue;
       
        }
        
        .linkwrapper{
        width:100%;
        height:auto;
        background:#eee;
        text-align:center;
        }
        
        
        .myth{
        background:darkorange;
        
        }
        
        
        *{
        margin:0px; 
        background:darkorange;
        }
        
        
        .name{
        background:tan;
        text-align:left;
        
        }
        
        #volunewstable{
        margin:0 auto; 
        border:1px solid black;
        border-spacing: 2px;
        height:auto;
        margin: 0 auto; 
        width:1100px; 
        text-align:center;
        border-collapse: collapse;
        margin-top:20px;
        }
        
        #volunewstable h4{
        background:lightgreen;
        }
        
        #volunewstable p{
        background:tan;
        }
        
        
        th{
        background:lightgreen;
        border:1px solid black;
        text-align:center;	
        border-collapse: collapse;
        padding:5px;
        }
        
        #volunewstable td{
        border:1px solid black;
        background:tan;
        padding:5px;
        font-size:14px;
        text-align:left;
        }
        
        h1{
        background:lightblue;
        }
        
        
        
        .setting{
        background:lightgreen;
        
        }
        
        .maindiv a{
        background:darkorange;
        }
        
        .maindiv h1{
        background:darkorange;
        }
        
        #volunewstable #volphoto{
        width:100px; 
        height:100px; 
        border:1px solid black;
        border-radius:5px;
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
    <div class='tableheadingwrapper'>  
                 <br>
                 <br>
                <h1 class='tableheadings'> List Of All Twiga Vision Volunteers</h1>

        </div>
            <div class="maindiv">
        <!-- The main contant goes here -->

    <?php
            
            
            //paginatin code starts here////////////////////////////////////////////////////////////////////////////////////////////
            
            $countquery = "SELECT COUNT(vol_id) FROM volunteertable  ";
            
            $totalcount = mysqli_query ($connect, $countquery);
            
            $outcome = mysqli_fetch_array($totalcount);
            
            $totaloutcome = $outcome['0'];
            
            $per_page = 2;
            
            $num_of_pages = ceil($totaloutcome/$per_page);
            
            
            if(!isset($_GET['page'])){
                
                header('Location: volunteerlistall.php?page=1');
                
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



            
            
                   $sql = "SELECT * FROM volunteertable ORDER BY Date LIMIT $start, $per_page ";

                $result = mysqli_query($connect, $sql);
                
                if($row = mysqli_num_rows($result)>0){
                			
                ?>
                			
                			<br>
                			<table id="volunewstable">
                			<tr class='tr' >
                			<th width='150' height='40' valign="center"><h4>Full Name </h4></th>
                			<th width='100' valign="center"><h4>Country </h4></th>
                			<th width='100'  valign="center"><h4>Profession</h4></th>
                			<th width='100' valign="center"><h4>Motive behind volunteering</h4></th>
                			<th width='100' valign="center"><h4>Why Vounteer at Twiga?</h4></th>
                			<th width='100' valign="center"><h4>More information</h4></th>
                			<th width='100' valign="center"><h4>Starting Day</h4></th>
                			<th width='100' valign="center"><h4>Finishing Day</h4></th>
                			<th width='100' valign="center"><h4>Photo</h4></th>
                			
                			</tr>
                			
                
                <?php
                
                while ($row = mysqli_fetch_assoc($result)){
                	
                $id = $row['user_id'];
                $fname = $row['fullName'];
                $country = $row['Country'];
                $profession = $row['Profession'];
                $motive1 = $row['motive1'];
                $motive2 = $row['motive2'];
                $addition = $row['additionalInfo'];
                $startdate = $row['startDate'];
                $enddate = $row['endDate'];
                $image = $row['image'];
                
                ?>
                	
                	
                			<tr>
                			    
                			<td height='100' valign="center"> 
                			<?php
                			echo "<p class='name'>$fname</p>";
                			?>
                			</td>
                			
                			<td valign="center"> 
                			<?php
                			echo "<p class='name'>$country</p>";
                			?>
                			</td>
                			
                			<td valign="center"> 
                			<?php
                			echo "<p class='name'>$profession</p>";
                			?>
                			</td>
                			<td width='200' valign="top"> 
                			<?php
                			echo "<p class='name'>$motive1</p>";
                			?>
                			</td>
                			<td width='200' valign="top"> 
                			<?php
                			echo "<p class='name'>$motive2</p>";
                			?>
                			</td>
                			
                			<td width='200' valign="top"> 
                			<?php
                			echo "<p class='name'>$addition</p>";
                			?>
                			</td>
                			
                			<td width='100' valign="center"> 
                			<?php
                			echo "<p class='name'>$startdate</p>";
                			?>
                			</td>
                			
                			<td width='100' valign="center"> 
                			<?php
                			echo "<p class='name'>$enddate</p>";
                			?>
                			</td>
                			
                			<td width='100' valign="center"> 
                			<?php
                			echo "<p class='name'><img src='../uploads/$image' id='volphoto'></p>";
                			?>
                			</td>
                			
                			
                			</tr>
                			
                			
                <?php			
                			
                	}
                	
                	
                
                	
                echo "</table>";
                
                echo "<br>";
                
                
                }else {
                	echo "No data was found!";
                }
                
                echo "<br>";
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
     </div>
       
    <div class="linkwrapper">  
            
        <?php
        
        backlinkMain();

        ?>
  
    </div>
  
        <div class="mainwrapper">
            <!-- The foorwe goes here -->
            <?php 
            include ('../site_includes/footer.php');
            ?>        
        
        </div>
 
 
</body>
</html>