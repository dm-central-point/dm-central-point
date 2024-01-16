<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
//is_teacher();
include ('../site_includes/titlebar.php');
include ('../site_includes/isset2.php');

?>
<html>
<head>
<style>
            *{
                margin:0px; 
                background:darkorange;
                
            }
            table{
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
                
                
            }
            td{border: 1px solid black; 
            padding: 5px; 
            text-align: right; 
            background:lightgreen;
            text-align:center;
                
            }
            th{
                background:lightgreen; 
                text-align:center; 
                border: 1px solid black;}
         
            #backlink{
                background:darkorange; 
                text-align:center;
                
            }
            
            
            /*.pagination{width:800px; height:40px; border: 1px solid black; background:lightgreen;padding:5px; margin:0 auto; text-align:center; border-radius:20px;}*/
	
	 .paginationNumbers a {
	    display:inline-block; 
	    background:black; 
	    color:white;
	    padding:5px; 
	    line-height:20px; 
	    text-align:center; 
	    width:20px; 
	    height:20px;
	    text-decoration:none; 
	    border: 1px solid black; 
	    border-radius:10px;
	    
	    }
	    
	 .navigation {
	    display:inline-block; 
	    background:lightblue; 
	    padding:5px; 
	    line-height:20px; 
	    text-align:center; 
	    width:40px; 
	    height:20px;
	    text-decoration:none; 
	    border: 1px solid black; 
	    border-radius:10px;
	    font-weight:bold;
	    
	    }
	 
	    
	.activepage {
	    display:inline-block; 
	    background:silver; 
	    padding:5px; 
	    line-height:20px; 
	    text-align:center; 
	    width:20px; 
	    height:20px;
	    text-decoration:none; 
	    border: 2px solid black; 
	    border-radius:10px;
	    
	}
	
    .paginationNumbers{padding:5px; margin-left:10px; margin-right:10px; text-align:center; background:darkorange;}
    
    body{
        text-align:center;
        
    }

</style>
</head>
<body>
<?php

//paginatin code starts here////////////////////////////////////////////////////////////////////////////////////////////

$countquery = "SELECT COUNT(donation_id) FROM volunteerdonationrecords ";

$totalcount = mysqli_query ($connect, $countquery);

$outcome = mysqli_fetch_array($totalcount);

$totaloutcome = $outcome['0'];

$per_page = 5;

$num_of_pages = ceil($totaloutcome/$per_page);


if(!isset($_GET['page'])){
    
    header('Location: viewvolunteerdonation.php?page=1');
    
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
   $centerpages .='&nbsp; <span class="activepage">' .$page. '</span> &nbsp;';
   $centerpages .='&nbsp; <a href="'.$_SERVER['PHP_SELF'].'?page='.$pplus1.'">' .$pplus1. '</a> &nbsp;';
    
}else if($page == $num_of_pages){

 
 $centerpages .='&nbsp; <a href="'.$_SERVER['PHP_SELF'].'?page='.$pminus1.'">' .$pminus1. '</a> &nbsp;';
 $centerpages .='&nbsp; <span class="activepage">' .$page. '</span> &nbsp;';

}else if($page > 2 && $page < ($num_of_pages-1)){

	 $centerpages .='&nbsp; <a href="'.$_SERVER['PHP_SELF'].'?page='.$pminus2.'">' .$pminus2. '</a> &nbsp;';
	 $centerpages .='&nbsp; <a href="'.$_SERVER['PHP_SELF'].'?page='.$pminus1.'">' .$pminus1. '</a> &nbsp;';
	 $centerpages .='&nbsp; <span class="activepage">' .$page. '</span> &nbsp;';
 	 $centerpages .='&nbsp; <a href="'.$_SERVER['PHP_SELF'].'?page='.$pplus1.'">' .$pplus1. '</a> &nbsp;';
 	 $centerpages .='&nbsp; <a href="'.$_SERVER['PHP_SELF'].'?page='.$pplus2.'">' .$pplus2. '</a> &nbsp;';
 	 
}else if($page > 1 && $page < ($num_of_pages)){

	
	 $centerpages .='&nbsp; <a href="'.$_SERVER['PHP_SELF'].'?page='.$pminus1.'">' .$pminus1. '</a> &nbsp;';
	 $centerpages .='&nbsp; <span class="activepage">' .$page. '</span> &nbsp;';
 	 $centerpages .='&nbsp; <a href="'.$_SERVER['PHP_SELF'].'?page='.$pplus1.'">' .$pplus1. '</a> &nbsp;';
 	
}

// pagination display implementation starts here///////////////////////////////////////////////////////

$paginationDisplay ="";

if($num_of_pages!="1"){
$paginationDisplay.= 'Page <strong>'. $page. '</strong> of '.$num_of_pages.'&nbsp;&nbsp;&nbsp; ';

 if($page !=1){
        
        $previous = $page - 1;
        $paginationDisplay .='&nbsp; <a class="navigation" href="'.$_SERVER['PHP_SELF'].'?page='.$previous.'"> Back </a> &nbsp;';
    }
   $paginationDisplay .='<span class="paginationNumbers"> '.$centerpages.' </span> &nbsp;'; 
    
if($page != $num_of_pages){
    
    $next = $page + 1;
    $paginationDisplay .='&nbsp; <a class="navigation" href="'.$_SERVER['PHP_SELF'].'?page='.$next.'"> Next </a> &nbsp;';
    
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






$sql = "SELECT * FROM `volunteerdonationrecords` ORDER BY dateofDonation DESC LIMIT $start, $per_page";

$result = mysqli_query($connect, $sql);

if($row = mysqli_num_rows($result)>0){
			echo "<br>
			<table>
			<tr class='tr' >
			<th width='100'>Date of Donation</th>
			<th width='200'>Donor Full Name</th>
			<th width='200'>Type of Donation</th>
			<th width='200'>Description</th>
			<th>Value in origional Currency</th>
			<th>Value in Tsh</th>
			<th>Donor Target</th>
			<th width='100'>Donor Remark</th>
			<th>Support Document?</th>
			<th>Recorded By</th>
			
			</tr>";
			


	while ($row = mysqli_fetch_assoc($result)){
	       
		
			echo "<tr>";
		    echo "<td>".$row['dateofDonation']."</td>";
			echo "<td>".$row['donorfullName']."</td>";
			echo "<td>".$row['typeofDonation']."</td>";
			echo "<td>".$row['detailsfoDonation']."</td>";
			echo "<td>".$row['estimatedValue']."</td>";
			echo "<td>".$row['estimatedvalueinTsh']."</td>";
			echo "<td>".$row['donorsTarget']."</td>";
			echo "<td>".$row['donorsRemark']."</td>";
			echo "<td>".$row['supportDocument']."</td>";
			echo "<td>".$row['recordBy']."</td>";

			echo "</tr>";
	}

	
	
echo "</table><br>";


// pagination display starts here///////////////////////////////////////////////////////

echo $paginationDisplay;

// pagination display ends here///////////////////////////////////////////////////////

//echo "<br> Page $page of $num_of_pages pages";

echo "<br><br>";

echo '<a href="khmcorner.php" id="backlink"><center>Back to previous page</center></a><br>';

echo "<br><br>";


}else {
	echo "No data was found!";
	echo "</table><br><br>";
echo '<a href="khmcorner.php" id="backlink"><center>Back to previous page</center></a><br>';
}
echo "<br><br>";

?>
</body>
</htm>