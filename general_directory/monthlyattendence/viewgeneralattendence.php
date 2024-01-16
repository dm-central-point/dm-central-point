<?php
include ('../../site_includes/connect.php');
include ('../../site_includes/functions.php');
//is_teacher();

?>

<html>
<head>
    <title>General Atendence</title>
    
<?php
include ('../../site_includes/functions.php');
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
            table{
                background: lightgreen; 
                padding:10px;
                border: 1px solid black; 
                margin: 0 auto; 
                width:100%; 
                height: 300px; 
                margin-top:50px; 
                bottom:50px; 
                text-align:left; 
                border-radius:20px;
                border-collapse:collapse;
                
            }
 

            td{border: 1px solid black; 
            padding: 5px; 
            text-align: right; 
            background:lightgreen;
            text-align:center;
                
            }
            th{
                background:lightblue; 
                text-align:center; 
                border: 1px solid black;}
          
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
	
	.paginationNumbers a {
	    display:inline-block; 
	    background:lightblue; 
	    padding:5px; 
	    line-height:20px; 
	    text-align:center; 
	    width:20px; 
	    height:20px;
	    text-decoration:none; 
	    border: 1px solid black; 
	    border-radius:10px;
	    
	    }
	 
	 
	    
	.activepage {
	    display:inline-block; 
	    background:lightgreen; 
	    padding:5px; 
	    line-height:20px; 
	    text-align:center; 
	    width:20px; 
	    height:20px;
	    text-decoration:none; 
	    border: 2px solid red; 
	    border-radius:10px;
	    
	}
	
	
.paginationNumbers{padding:5px; margin-left:10px; margin-right:10px; text-align:center;}
		
		body{text-align:center;}

</style>
</head>

<body>
<div class='mainwrapper'>
<?php

//paginatin code starts here////////////////////////////////////////////////////////////////////////////////////////////

$countquery = "SELECT COUNT(id) FROM childrenlist WHERE State = 'Active'";

$totalcount = mysqli_query ($connect, $countquery);

$outcome = mysqli_fetch_array($totalcount);

$totaloutcome = $outcome['0'];

$per_page = 8;

$num_of_pages = ceil($totaloutcome/$per_page);


if(!isset($_GET['page'])){
    
    header('Location: viewgeneralattendence.php?page=1');
    
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
        $paginationDisplay .='&nbsp; <a href="'.$_SERVER['PHP_SELF'].'?page='.$previous.'"> Back </a> &nbsp;';
    }
   $paginationDisplay .='<span class="paginationNumbers"> '.$centerpages.' </span> &nbsp;'; 
    
if($page != $num_of_pages){
    
    $next = $page + 1;
    $paginationDisplay .='&nbsp; <a href="'.$_SERVER['PHP_SELF'].'?page='.$next.'"> Next </a> &nbsp;';
    
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

echo"<div class='maindiv'>";

$sql = "SELECT * FROM khmattendance ORDER BY Date DESC LIMIT $start, $per_page ";

$result = mysqli_query($connect, $sql);

if($row = mysqli_num_rows($result)>0){
			echo "<br><br>
			<table>
			<tr class='tr' >
			<th width='100'>Date</th>
			<th>Month</th>
			<th>Year</th>
			<th>Group Name</th>
			<th>Teacher's full Name</th>
			<th>Boys</th>
			<th>Girls</th>
			<th>Total</th>
			<th>Sponsored</th>
			<th>Lunchtakers</th>
			<th width='200'>Comment</th>
			<th>Added By</th>
			</tr>";
			


	while ($row = mysqli_fetch_assoc($result)){
	       
	        $date = $row['Date'];
	      
		
			echo "<tr>";
			echo "<td>".$date."</td>";
			echo "<td>".$row['Month']."</td>";
			echo "<td>".$row['Year']."</td>";
			echo "<td>".$row['Groupname']."</td>";
			echo "<td>".$row['Teachersfullname']."</td>";
			echo "<td>".$row['Numberofboys']."</td>";
			echo "<td>".$row['Numberofgirls']."</td>";
			echo "<td>".$row['Totalnumber']."</td>";
			echo "<td>".$row['Sponsoredchildren']."</td>";
			echo "<td>".$row['Lunchtakers']."</td>";
			echo "<td>".$row['Teacherscomment']."</td>";
			echo "<td>".$row['Addedby']."</td>";
		
			
			echo "</tr>";
	}
	
    echo "</table><br>";

echo"</div>";
	
     echo "<br>";
     
     // pagination display starts here///////////////////////////////////////////////////////


    echo $paginationDisplay;   
        
    
    // pagination display ends here///////////////////////////////////////////////////////
    
    echo "<br><br>";






echo '<a href="../khmcorner.php" id="backlink"><center>Back to previous page</center></a><br>';

echo "<br><br>";


}else {
	echo "No data was found!";
	echo "</table><br><br>";
echo '<a href="../khmcorner.php" id="backlink"><center>Back to previous page</center></a><br>';
}
echo "<br><br>";



?>
</div>
</body>
</html>