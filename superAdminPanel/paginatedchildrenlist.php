<?php
include ('../site_includes/functions.php');
include ('../site_includes/connect.php');

?>

<html>
<head>
    
    <title> Allkhmchildren</title>
    

</head>

<body>
<?php

//paginatin code starts here////////////////////////////////////////////////////////////////////////////////////////////

$countquery = "SELECT COUNT(id) FROM childrenlist WHERE State = 'Active'";

$totalcount = mysqli_query ($connect, $countquery);

$outcome = mysqli_fetch_array($totalcount);

$totaloutcome = $outcome['0'];

$per_page = 5;

$num_of_pages = ceil($totaloutcome/$per_page);


if(!isset($_GET['page'])){
    
    header('Location: paginatedchildrenlist.php?page=1');
    
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

echo "<div class='childlist'>";
echo "<br>";
echo "<h1>List of All Twiga-supported children</h1>";

$sql = "SELECT * FROM childrenlist WHERE State = 'Active' ORDER BY joiningDate DESC LIMIT $start, $per_page ";

$result = mysqli_query($connect, $sql);

if($row = mysqli_num_rows($result)>0){
			echo "
			<table>
			<tr class='tr' >
			<th width='100'>Date</th>
			<th>First Name</th>
			<th>Second Name</th>
			<th>Surname</th>
			<th>Description</th>
			<th>Birthday</th>
			<th>Gender</th>
			<th>Status</th>
			<th>Status2</th>
		
			</tr>";
	
	
	
	
	

	while ($row = mysqli_fetch_assoc($result)){
	

$jdate = $row['joiningDate'];
$fname = $row['firstName'];
$sname = $row['secondName'];
$surname = $row['surName'];
$descr = $row['Description'];
$birthday = $row['BirthDay'];
$gender = $row['Gender'];
$status = $row['Status'];
$status2 = $row['Status2'];

	
	
			echo "<tr>
		
			<td>$jdate</td>
			<td>$fname</td>
			<td>$sname</td>
			<td>$surname</td>
			<td>$descr</td>
			<td>$birthday</td>
			<td>$gender</td>
			<td>$status</td>
			<td>$status2</td>
		
			</tr>";
	}
	
	

	
echo "</table>";

echo "<br>";


}else {
	echo "No data was found!";
}

// pagination display starts here///////////////////////////////////////////////////////


echo $paginationDisplay;   
    

// pagination display ends here///////////////////////////////////////////////////////



echo "<br><br>";

if($_SESSION['userLevel']==1 OR $_SESSION['userLevel']==2){
echo '<a href="sitemastercentre.php" >Back to previous page</a><br>';  
echo "<br><br>";
    
}else if($_SESSION['userLevel']==3){

echo '<a href="childrencorner.php" >Back to previous page</a><br>';  
echo "<br><br>";
}
echo "<br>";
echo "</div>";   

?>

</body>

</html>