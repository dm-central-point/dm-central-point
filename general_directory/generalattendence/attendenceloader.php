<?php
include ('../../site_includes/connect.php');
include ('../../site_includes/functions.php');
include ('../../site_includes/accountsfunctions.php');


if(isset($_POST['mtid']) & isset($_POST['yrid'])){
    
    $mid = $_POST['mtid'];
    $yid = $_POST['yrid'];
    $contentVar = $_POST['contentVar'];
 
if($contentVar == 'A'){
    

        
        $query = "SELECT * FROM `khm_attendence_table` WHERE `year_id`= $yid AND `month_id`= $mid AND `groupName`= 'Group A' ORDER BY date DESC";
        
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
        
        }if($contentVar == 'B'){
        
             
        $query = "SELECT * FROM `khm_attendence_table` WHERE `year_id`= $yid AND `month_id`= $mid AND `groupName`= 'Group B' ORDER BY date DESC";
        
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
     
     
    } if($contentVar == 'C'){
        
                  
        $query = "SELECT * FROM `khm_attendence_table` WHERE `year_id`= $yid AND `month_id`= $mid AND `groupName`= 'Group C' ORDER BY date DESC";
        
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
        
        
        
        }if($contentVar == 'D'){
            
        $query = "SELECT * FROM `khm_attendence_table` WHERE `year_id`= $yid AND `month_id`= $mid AND `groupName`= 'Group D' ORDER BY date DESC";
        
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
            
            
        }else if($contentVar == 'G'){
        
        $query = "SELECT * FROM `khm_attendence_table` WHERE  `year_id`='$yid' AND `month_id` ='$mid'  ORDER BY date DESC";
        
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
        
    }
        ?> 
