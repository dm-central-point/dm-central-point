<?php 
include ('../../../site_includes/connect.php');
include ('../../../site_includes/functions.php');
//is_admin();
?>
<!DOCTYPE html>

<html>
<head>
   <title>Attendence-june2020</title>         
<?php 
include ('../../../site_includes/head.php'); 
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

            table{
            background: lightgreen; 
            border: 1px solid black; 
            width:1200px; 
            height: auto; 
            margin-top:30px; 
            text-align:left; 
            border-radius:20px;
            border-collapse:collapse;
            margin:0 auto; 
        	padding:10px; 
        	border-spacing: 10px;
            padding:10px; 

            }
            

            th{
                text-align:center; 
                border: 1px solid black;
                background:lightblue; 
                text-align:center; 
                border: 1px solid black;
                
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
	    display:inline-block; 
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
        height:30;
        padding:5px; 
        float:left;
        text-align:center;
        background:darkorange;
        text-align:center;
    }
    
    .paginationNumbers1{
        height:30;
        padding:5px; 
        float:left;
        text-align:center;
        background:darkorange;
        text-align:center;
    }
    
    .pagination{
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


            
            a, strong, p{
                background:lightblue;
                
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
				

		table h4{
		background:lightgreen;
		}
		
		table p{
		background:lightgreen;
		}
		
		
		table td {
		background:lightgreen;
		text-align:center;	
		border: 1px solid black;
		border-collapse: collapse;
		padding:5px;

		}

		
		h1{
		background:lightblue;
		}
		
		
		
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
                include ('../../../site_includes/titlebar.php');
                ?>
                </div>

            <div class="mainwrapper">
                <!-- The menubar goes here -->
                <?php 
                include ('../../../site_includes/menubar.php');
                ?>        
            </div>
    
    
    <div class="mainwrapper">
         <!-- The main contant goes here -->
            <div class="maindiv">
                     <?php
                
                //paginatin code starts here////////////////////////////////////////////////////////////////////////////////////////////
                
                $countquery = "SELECT COUNT(Att_id) FROM khmattendance WHERE Month ='June' AND Year ='2020'";
                
                $totalcount = mysqli_query ($connect, $countquery);
                
                $outcome = mysqli_fetch_array($totalcount);
                
                $totaloutcome = $outcome['0'];
                
                $per_page = 8;
                
                $num_of_pages = ceil($totaloutcome/$per_page);
                
                
                if(!isset($_GET['page'])){
                    
                    header('Location: attendencejune2020.php?page=1');
                    
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
                
                $sql = "SELECT * FROM khmattendance WHERE `Month` = 'June' AND `Year` = '2020' ORDER BY Date DESC LIMIT $start, $per_page ";
                
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
                ?>

                <?php
                echo '<a href="../attendencecorner.php" id="backlink">Back to previous page</a><br>';
                
               
                
                
                }else {
                	echo "No data was found!<br>";
                	echo "</table><br><br>";
                echo '<a href="../attendencecorner.php" id="backlink">Back to previous page</a><br>';
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
            include ('../../../site_includes/footer.php');
            ?>        
        
        </div>
 
 
</body>
</html>