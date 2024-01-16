<?php
include ('../../site_includes/connect.php');
include ('../../site_includes/functions.php');
is_loggedin();

?>
<!DOCTYPE html>

<html>
<head>
   <title>Attendence-display</title>  
   <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<?php 
include ('../../site_includes/head.php'); 
?>
            
    <style>
    
        *{
        margin:0px; 
        background:darkorange;
        }
        
        .maindivtop{
        border: 4px sold black;
        width: 100%; 
        height:auto; 
        background:#666; 
        text-align: center; 
        border-radius:0px;
        position:relative;
        }
           
        .maindivtop::after{
        content:""; 
        clear:both;
        display:table;
        
        }
        
        .bottomrow2{
        padding:10px;
        font-weight:bold;
        font-size:18px;
        background:#eee;
        color:#000;
        text-align:right;
        }
        
        .linkwrapper{
        width:100%;
        background:#cccfff;
        height:40px;
        position:relative;
        
        }
        
        .backlink{
        display:block;
        background:#cccfff;
        margin: 0 auto;
        height:40px;
        text-align:center;
        line-height:40px;
        width:100%;
        color:blue;
        }  
        
        h2{
        background:darkorange;
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
        background:#cccfff;;
        text-align:center;
        }
        
        .paginationNumbers1{
        display:inline-block;
        position:relative;
        height:30;
        padding:5px; 
        float:left;
        text-align:center;
        background:#cccfff;
        text-align:center;
        }
        
        .pagination{
        position:relative;
        width:100%;
        height:auto;
        background:#cccfff;
        display:flex;
        flex-direction:row;
        justify-content:center;
        align-content:center;
        align-items:center;
        flex-flow: row-wrap;
        }
        
        .pagination strong, a{
        background:#cccfff;
        }
        
        .mainwrapper{
        background:darkorange;
        }
        
        .myth{
        background:darkorange;
        }
        
        .name{
        background:tan;
        }
        
        .amounttd{
        text-align:center;
        }
        
        .formhead{
        width:100%;
        height:auto;
        position:relative;
        background:darkorange;
        }
        
        .formhead h2{
            background:darkorange;
        }
        
        .attradio{
 		 background:bisque;
		}
		
		.att_navbar{
		 width:100%;
		 height:50px;
		 background:#cccfff;
		 padding:5px;
		}
		
		.att_navbar a{
		 width:10%;
		 height:30px;
		 background:#ccc;
		 display:inline-block;
		 position:relative;
		 float:right;
		 margin-top:5px;
		 margin-right:4%;
		 background:#666;
		 text-align:center;
		 color:#fff;
		 line-height:25px;
		 
		}
    
    
    	.att_navbar a:hover{
		 padding:5px;
		 background:#ccc;
		 line-height:15px;
	
		}
   
   
   
   
    </style>
    

</head>
    <body>
        
        <div class="titlewrapper">
         <!-- The titlebar goes here -->   
         
            <?php 
            include ('../../site_includes/titlebar2.php');
            ?>
        
            </div>

        <div class="menuwrapper2">
                <!-- The menubar goes here -->
            <?php 
                include ('../../site_includes/menubarmobile.php');
            ?> 
        </div>
                        


    <div class="mainwrapper">
                          
        
        <?php
     
if(isset($_GET['yid']) & isset($_GET['mid']) & isset($_GET['page']) & isset($_SESSION['userName'])){
    
$yid = $_GET['yid'];
$mid = $_GET['mid'];  
$page = $_GET['page'];

//paginatin code starts here////////////////////////////////////////////////////////////////////////////////////////////
        
$countquery = "SELECT COUNT(att_id) FROM `khm_attendence_table` WHERE  `year_id`='$yid' AND `month_id` ='$mid' ";

$totalcount = mysqli_query ($connect, $countquery);

$outcome = mysqli_fetch_array($totalcount);

$totaloutcome = $outcome['0'];

$per_page = 20;

$num_of_pages = ceil($totaloutcome/$per_page);
        
        
        if(!isset($_GET['page'])){
        
        header('Location: displaygeneralaccounts.php?page=1');
        
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
        $centerpages .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$pplus1.'&yid='.$yid.'&mid='.$mid.'">' .$pplus1. '</a> ';
        
        }else if($page == $num_of_pages){
        
        
        $centerpages .='<a href="'.$_SERVER['PHP_SELF'].'?page='.$pminus1.'&yid='.$yid.'&mid='.$mid.'">' .$pminus1. '</a> ';
        $centerpages .='<span class="activepage">' .$page. '</span> ';
        
        }else if($page > 2 && $page < ($num_of_pages-1)){
        
        $centerpages .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$pminus2.'&yid='.$yid.'&mid='.$mid.'">' .$pminus2. '</a> ';
        $centerpages .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$pminus1.'&yid='.$yid.'&mid='.$mid.'">' .$pminus1. '</a> ';
        $centerpages .=' <span class="activepage">' .$page. '</span> ';
        $centerpages .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$pplus1.'&yid='.$yid.'&mid='.$mid.'">' .$pplus1. '</a> ';
        $centerpages .=' <a href="'.$_SERVER['PHP_SELF'].'?page='.$pplus2.'&yid='.$yid.'&mid='.$mid.'">' .$pplus2. '</a> ';
        
        }else if($page > 1 && $page < ($num_of_pages)){
        
        
        $centerpages .='<a href="'.$_SERVER['PHP_SELF'].'?page='.$pminus1.'&yid='.$yid.'&mid='.$mid.'">' .$pminus1. '</a> ';
        $centerpages .='<span class="activepage">' .$page. '</span>';
        $centerpages .='<a href="'.$_SERVER['PHP_SELF'].'?page='.$pplus1.'&yid='.$yid.'&mid='.$mid.'">' .$pplus1. '</a> ';
        
        }
        
        // pagination display implementation starts here///////////////////////////////////////////////////////
        
        $paginationDisplay ="";
        
        if($num_of_pages!="1"){
        $paginationDisplay.= '<div class="paginationNumbers1 ">Page <strong>'. $page. '</strong> of '.$num_of_pages.'</div><br>';
        
        if($page !=1){
        
        $previous = $page - 1;
        $paginationDisplay .='<a class="navlinks" href="'.$_SERVER['PHP_SELF'].'?page='.$previous.'&yid='.$yid.'&mid='.$mid.'"> Back </a>';
        }
        $paginationDisplay .='<div class="paginationNumbers"> '.$centerpages.' </div>'; 
        
        if($page != $num_of_pages){
        
        $next = $page + 1;
        $paginationDisplay .=' <a class="navlinks" href="'.$_SERVER['PHP_SELF'].'?page='.$next.'&yid='.$yid.'&mid='.$mid.'"> Next </a>';
        
        }
        
        }
        

        
        // pagination code ends here////////////////////////////////////////////////////////////////////////////////////////////////
        
        ?>


  </div>       

        <div class='att_navbar'>
            
            <a href="#" onClick="javascript:swapContent('D');">GROUP D</a>
            <a href="#" onClick="javascript:swapContent('C');">GROUP C</a>
            <a href="#" onClick="javascript:swapContent('B');">GROUP B</a>
            <a href="#" onClick="javascript:swapContent('A');">GROUP A</a>
            <a href="#" onClick="javascript:swapContent('G');">All GROUPS</a>
            
        </div>
         
         
    <script>
            
        function swapContent(cv){
        var mid = <?php echo $mid ?>;
        var yid = <?php echo $yid ?>;
        var url = 'attendenceloader.php';
        $.post(url, {contentVar:cv, mtid:mid, yrid: yid}, function(data){
            
            
          $('#att_tablewrapper').html(data).show();
        });
        }
    
   
    
    </script>   
          
          
          
          
          
          
          
          
         
        <div class="att_maindiv">
        <!-- The main contant goes here -->
        <?php
        
        if(isset($_GET['yid']) & isset($_GET['mid'])){
        
        $yid = $_GET['yid'];
        $mid = $_GET['mid'];  
        
        echo '<div class="formwrapper">
    
        <form class="att_form " action="attendencescript.php" method="POST">
        <div class"formhead"><h2>Attendence form</h2></div>
        <br>
        <h4>Day attandence taken</h4>
        <input type="date" name="date" class="text" >
        <select name ="month" class="text" >
        <option value="">-Select month here-</option>
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
        
        <select name ="year" class="text" >
        <option value"">-Select year here-</option>
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
        
        <h4 class="heads" >Group Name</h4><br>
        <lable class="attradio"><input type="radio" name="group"  value="Group A"  >Group A</lable>
        <lable class="attradio"><input type="radio" name="group"  value="Group B" >Group B</lable>
        <lable class="attradio"><input type="radio" name="group"  value="Group C" >Group C</lable>
        <input type="text" name="teachername" class="text" placeholder="Teacher\'s Full Name">
        <input type="number" name ="boysnum" class="text" placeholder="Number of Boys">
        <input type="number" name="girlsnum" class="text" placeholder="Number of Girls">
        <input type="number" name="total" class="text" placeholder="Total attendence">
        <input type="number" name="sponsored" class="text" placeholder="Sponsored Children">
        <input type="number" name="lunchtakers" class="text" placeholder="Number of Lunchtakers">
        <input type="text" name="comment" class="text" placeholder="Teacher\'s Comment">
         <input type="hidden" name="mid" class="text" value='.$mid.'">
        <input type="hidden" name="yid" class="text" value="'.$yid.'">
        <input type="submit" name="submit" value="SUBMIT ATTENDENCE" class="submit"><br>
        </form>
        
        </div>';
        
        
       echo "<div class='tablewrapper' id='att_tablewrapper'>";
        
        
        $query = "SELECT * FROM `khm_attendence_table` WHERE  `year_id`='$yid' AND `month_id` ='$mid'  ORDER BY date DESC  LIMIT $start, $per_page ";
        
        $result = mysqli_query($connect, $query);
        
        $num_rows = mysqli_num_rows($result);
        
        if($num_rows !=0){
        
        echo "<table class='acctable'>";
        
        
        
        
        echo "<tr>
        
        <th id='dateclm'>Date</th>
        <th class='mythdata'>Month</th>
        <th class='mythdata'>Year</th>
        <th class='mythdata'>Group Name</th>
        <th class='mythdata'>Boys</th>
        <th class='mythdata'>Girls</th>
        <th class='mythdata'>Total</th>
        <th id='amountclm'>Sprd</th>
        <th id='amountclm'>L-tks</th>
        <th id='amountclm'>Comments</th>
        <th id='amountclm'>Settings</th>
        
        </tr>";
        
        while ($row = mysqli_fetch_assoc($result)){

        
    	$att_id  = $row['att_id'];
		$month_id = $row['month_id'];
		$year_id  = $row['year_id'];
		$date  = $row['date'];
		$month = $row['month'];
		$year =  $row['year'];
		$groupname = $row['groupName'];
		$teachername = $row['teachersFullName'];
		$boys = $row['numberBoys'];
		$girls = $row['numberGirls'];
		$totalnum = $row['totalNumber'];
		$sponsored = $row['sponsoredChildren'];
		$lunchtakers = $row['lunchTakers'];
		$comment = $row['teachersComment'];
		$addedby = $row['addedBy'];
        
        
        
        echo "<tr>
        <td class='mythdata'>$date</td>
        <td class='mythdata'>$month</td>
        <td class='mythdata'>$year</td>
        <td class='mythdata'>$groupname</td>
        <td class='amounttd'>$boys</td>
        <td class='amounttd'>$girls</td>
        <td class='amounttd'>$totalnum</td>
        <td class='amounttd'>$sponsored</td>
        <td class='amounttd'>$lunchtakers</td>
        <td class='mythdata'>$comment</td>
        <td class='edittd'><a class='editlink' href='editattendenceform.php?mid=$mid&yid=$yid&trid=$id&page=$page'>Edit</a></td>
        
        </tr>";
        
        }
        
        
        
    
        
        echo"</table>";
        }else{
        
        echo '<div class="datamsg">No data was found!</div>';
        }
        
        
        }
        
        
        echo "</div>";
        
}
        ?> 

       

    </div>
   



        <div class="pagination">
        
        <?php
        
        echo "<br>";
        // pagination display starts here///////////////////////////////////////////////////////
        
        echo $paginationDisplay;
        
        echo "<br>";
        
        // pagination display ends here///////////////////////////////////////////////////////
        ?>
        
        </div> 
        
        
         <div class='linkwrapper'>
        <!--pagination display-->
        <?php
        
        //backlink starts here
       
        echo '<a  class="backlink" href="attendencecorner.php" >Back to the main page</a><br>';  
        
        ?>
        
        </div>
  
        <div class="mainwrapper">
            <!-- The footer goes here -->
            <?php 
            include ('../../site_includes/footermobile2.php');
            ?>        
        
        </div>
 
 
</body>
</html>