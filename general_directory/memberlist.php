<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
is_master();
?>

<!DOCTYPE html>

<html>
<head>
     <title>Member-list</title>       
<?php 
include ('../site_includes/head.php'); 
?>
            
    <style>

		
        .linkv{
        display:block;
        height:auto;
        width:80%; 
        background:black;
        color:white; 
        margin-bottom:10px;  
        padding:5px; 
        line-height:20px; 
        font-size:20px;
        text-decoration: none;
        text-align:center;
        border-radius:50px;
            
        }
        
        .semidiv{
        background:bisque; 
        float:left;
        margin-bottom:10px;
        margin-top:10px;
        border: 2px solid blue;
        border-radius:10px;
        display:flex;
        flex-direction:column;
        align-items:center;
        align-content:center;
        flex-basis: auto;
      }
        .semidiv2{
        width:230px; 
        height:40px;
        background:darkorange; 
        display:block;
        text-align:center;
      }
        .semidiv2 h3{
        background:darkorange; 
        
      }      
      
        	*{
		margin:0px; 
		background:darkorange;
		}

		
		.name{
		background:lightgreen;

		}
				
		table{
		margin:0 auto; 
		padding:10px; 
		border-radius:5px; 
		border:1px solid black;
		width:400px;
		height:auto;
		text-align:center;
		background:lightgreen;
		}
		
		table h3{
		background:lightgreen;
		}
		
		table p{
		background:lightgreen;
		}
		
		
		td, th{
		background:lightgreen;
		text-align:left;		
		}
		

		.setting{
		background:lightgreen;
		}
        
    </style>

</head>
    <body>

        <div class="maindiv">
         <!-- The titlebar goes here -->   
         
            <?php 
            include ('../site_includes/titlebar.php');
            ?>
        
                
                
                <?php
                
                $sql = "SELECT * FROM usertable WHERE userStatus='active'";
                
                $result = mysqli_query($connect, $sql);
                
                if($row = mysqli_num_rows($result)>0){
                			
                ?>
                			<br><br>
                			<h1> List Of All Active Site Members</h1>
                			<br>
                			<table>
                			<tr class='tr' >
                			<th width='400' height='40'><h3>First Name</h3></th>
                			<th width='400'><h3>Second Name</h3></th>
                						
                			</tr>
                			
                
                <?php
                
                while ($row = mysqli_fetch_assoc($result)){
                	
                $id = $row['user_id'];
                $fname = $row['firstName'];
                $sname = $row['surName'];
                $username = $row['userName'];
                $email = $row['emailAddress'];
                $password = $row['passWord'];
                $password2 = $row['passWord2'];
                $userlevel = $row['userLevel'];
                $userstatus = $row['userStatus'];
                
                ?>
                	
                	
                			<tr>
                			<td width='400'>
                			<?php 
                			echo "<p class='name'>$fname</p>";
                			?>
                			
                			</td>
                			
                			<td > 
                			<?php 
                			
                			echo "<p class='name'>$sname</p>";
                			?>
                			
                			
                			</td>
                			
                			
                			</tr>
                			
                			
                <?php			
                			
                	}
                	
                	
                
                	
                echo "</table>";
                
                echo "<br><br>";
                
                
                }else {
                	echo "No data was found!";
                }
                
                if($_SESSION['userLevel']==1){
                echo '<a href="../two_dimensionmaster/sitemastercentre.php" >Back to previous page</a><br>';  
                echo "<br><br>";
                    
                }else if($_SESSION['userLevel']==2){
                
                echo '<a href="../two_dimension1/controllpanel.php" >Back to previous page</a><br>';  
                echo "<br><br>";
                }
                echo "<br>";
                echo "</div>";    
                
                
                ?>
                
            
        
    </div>
 
</body>
</html>
