<?php
ob_start();
include ('site_includes/connect.php');
include('site_includes/functions.php');


?>
		<html>
		<style>
		include ('site_includes/head.php');
		
        *{
        margin:0px; 
        background:lightblue;
        
        }
        
        form{
        width:400px; 
        height:400px; 
        background:none; 
        margin: 0 auto;
        
        }
        
        input{
        width:300px; 
        height:40px; 
        margin-left:50px; 
        font-size:20px; 
        text-align:center; 
        background:white;
        
        }
        .submit{
        width:300px; 
        height:40px; 
        margin-left:50px; 
        font-size:20px; 
        text-align:center; 
        background:silver;
        
        }
        
        .register{
        width:500px; 
        height:200px; 
        text-align:center;
        margin: 0 auto; 
        background:white;
        border: 2px solid black;
        font-size:30px;
        font-weight:bold;
        
        }
        table{
        margin-left:130px;
        
        }	

		</style>


		</html>


        <?php
        $fname = mysqli_real_escape_string($connect, $_POST['fullname']);
        $username = mysqli_real_escape_string($connect, $_POST['username']);
        $contacts = mysqli_real_escape_string($connect, $_POST['contacts']);
        $pword = mysqli_real_escape_string($connect, $_POST['password']);
        $pword2 = mysqli_real_escape_string($connect, $_POST['password2']);
        $userlevel = 10;
        $status = 'active';
        $secch = 4;
        $fnotification = 1;
        
        $pword_hash = md5($pword);
        $pword2_hash = md5($pword2);
        
        
        
       /* echo $fname.'<br>';
        echo $username .'<br>';
        echo $contacts .'<br>';
        echo $pword_hash .'<br>';
        echo $pword2_hash.'<br>' ; 
        echo $userlevel.'<br>';
        echo $status .'<br>';
        echo $secch .'<br>';
        echo $fnotification .'<br>'; */
        
        
        
        if (isset($fname) && isset($username) && isset($contacts) && isset($pword) && isset($pword2) && isset($userlevel) && isset($status) ){
        
        if(!empty($fname) && !empty($username) && !empty($contacts) && !empty($pword) && !empty($pword2)){
        
        $query = mysqli_query($connect, "SELECT userName, contactDetails FROM membertable WHERE userName = '$username' OR contactDetails = '$contacts'");
        $count = mysqli_num_rows($query);
        if($count !=0){
        
            echo "<br><br><div class= 'register'>";
            echo "User Name or Email already exists, please register with a different User Name or email<br><br>"; 
            echo "</div>";
        
        
        }else{
        $load = "INSERT INTO `membertable`(fullName, userName, contactDetails, passWord, passWord2, userLevel, userStatus, secChanger) 
        VALUES ('$fname', '$username', '$contacts', '$pword_hash', '$pword2_hash', '$userlevel', '$status', '$secch')";
        
        $result = mysqli_query($connect, $load);
        
        if($result){
        echo "<br><br><div class= 'register'>";
        echo "<br><br>";
        echo "You are successfully registered!<br><br>";
        echo "<a href='loginform.php'>You can login here.</a>";
        echo "</div>";
        }else{
        echo "<div class= 'register'>";
        echo "Registration could not take place, please check your input information<br><br>"; 
        echo "</div>";
        }
        }   
        }else{
        
        echo "<br><br><div class= 'register'>";
        echo "<br>";
        echo "All fields must be field!<br>";
        echo "<br><a href='register.php'>Go back to signup page.</a>";
        echo "</div>";
        }
        }
        
        ?>
