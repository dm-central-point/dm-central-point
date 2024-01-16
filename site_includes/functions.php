<?php 
ob_start(); 
session_start();
include('connect.php');
?>
<?php
function is_admin(){
	if(adminset()===false){
		header('Location:https://www.thedmcentralpoint.com/index.php');
		exit();
	}
}

function is_moderator(){
	if(moderatorset()===false){
		header('Location:https://www.thedmcentralpoint.com/index.php');
		exit();
	}
}


	function is_stakeholder(){
	if(stakeholderset()===false){
		header('Location:https://www.thedmcentralpoint.com/index.php');
		exit();
			}
		}


	function is_master(){
	if(stakeholderset()===false){
		header('Location:https://www.thedmcentralpoint.com/index.php');
		exit();
			}
		}



	function masterset(){
	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) && $_SESSION['userLevel'] == 1){
	return true;
	}else{
	return false;
	    }
	}
	
	function is_loggedin(){
	if(loggedin() == false){
		header('Location:https://www.thedmcentralpoint.com/index.php');
		exit();
	    }
	}


function adminset(){
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) && $_SESSION['userLevel'] == 1 OR $_SESSION['userLevel']==2 OR $_SESSION['userLevel']==9){
return true;
}else{
return false;
}
}

function moderatorset(){
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) && $_SESSION['userLevel'] == 1 OR $_SESSION['userLevel']==3){
return true;
}else{
return false;
}
}


function stakeholderset(){
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) && $_SESSION['userLevel'] == 1 OR $_SESSION['userLevel']==2 OR $_SESSION['userLevel']==3 
OR $_SESSION['userLevel']==4 OR $_SESSION['userLevel']==5 OR $_SESSION['userLevel']==6 OR $_SESSION['userLevel']==7 OR $_SESSION['userLevel']==8){
return true;
}else{
return false;
}
}






function loggedin(){
if(isset($_SESSION['user_id']) && isset($_SESSION['userLevel']) && isset($_SESSION['userName']) && !empty($_SESSION['user_id']) && !empty($_SESSION['userLevel']) &&!empty($_SESSION['userName'])){
return true; 
}else{
return false;
}
}

function online(){
session_start();
include('connect.php');
    
    $guest_timeout = time() - 120;
    $member_timeout = time() - 300;
    $guest_ip = $_SERVER['REMOTE_ADDR'];
    $time = time();
    
 
    
    if(isset($_SESSION['userName'])){
          //if the user is loggedin 
       $query = mysqli_query($connect, "DELETE FROM active_guests WHERE guest_ip ='".$guest_ip."'");
       
       $query2 = mysqli_query($connect, "REPLACE INTO online_users (username, time_visited) VALUES ('".$_SESSION['userName']."', '".$time."' )");
        
    }else{
        //guests active
     $query3 = mysqli_query($connect, "REPLACE INTO active_guests (guest_ip, time_visited) VALUES ('".$guest_ip."', '".$time."')");
    }
    
    $query4 = mysqli_query($connect, "DELETE FROM active_guests WHERE time_visited < ".$guest_timeout);
    $query5 = mysqli_query($connect, "DELETE FROM online_users WHERE time_visited < ".$member_timeout);
    $query6 = mysqli_query($connect, "SELECT guest_ip FROM active_guests");
    $online_guests = mysqli_num_rows($query6);
    $query7 = mysqli_query($connect, "SELECT username FROM online_users");
    $online_users = mysqli_num_rows($query7);
    
    echo "<div class='online'><p> Site guest(s) [" .$online_guests."]  and Online user(s)[".$online_users."] </p></div> ";
   
  
}


function back_link_main(){
    
            if($_SESSION['userLevel']==1 ){
        echo '<a  class="backlink" href="/two_dimensionmaster/sitemastercentre.php" >Back to the main page</a><br>';  
        
        
        }else if($_SESSION['userLevel']==2){
        
        echo '<a  class="backlink" href="/two_dimension1/controllpanel.php" >Back to the main page</a><br>'; 
        }else if($_SESSION['userLevel']==3){
        
        echo '<a  class="backlink" href="/theinternational_directory/informationpage.php" >Back to the main page</a><br>'; 
        
        }else if($_SESSION['userLevel']==4){
            
        echo '<a  class="backlink" href="/multi_dimension/khmcorner.php" >Back to the main page</a><br>'; 
            
        }else if($_SESSION['userLevel']==5){
            
        echo '<a  class="backlink" href="/multi_dimension/volunteercentre.php" >Back to the main page</a><br>';
            
        }else if($_SESSION['userLevel']==8){
            
         echo '<a  class="backlink" href="/theinternational_directory/sponsorcorner.php" >Back to the main page</a><br>';   
        
        }else if($_SESSION['userLevel']==9){
            
         echo '<a  class="backlink" href="/twiga_directory/admincorner.php" >Back to the main page</a><br>';   
        
        }
}


?>