<?php
ob_start();
include_once('functions.php');
include('connect.php');
include('head.php');

?>
<html>

<body>

<!-- TITLE SECTION -->

        <div class="mobmenucontainer">
        <h1 class='main_title_mob'>THE DM CENTRAL POINT</h1> 
        <img src="http://localhost/thedminfopoint/images/mobile-nav-bar.png" id="navbutton" onClick="showMenu()"/>

        <?php
        include("menubarmobile.php");
        ?>

        </div>

        <div class ="header">

                <img src="http://localhost/thedminfopoint/images/dmcp2.jpg" id="logoid" />
                
                <h1 class='main_title'>THE DM CENTRAL POINT</h1> 
                              
        </div>
            

            
            
<!--MENU DIV STARTS HERE-->
        <div class='menudiv'>
        <?php
        
        if(loggedin() && $_SESSION['userLevel'] !=1 && $_SESSION['userLevel'] !=2 && $_SESSION['userLevel'] !=3 && $_SESSION['userLevel'] !=4 && $_SESSION['userLevel']!=5 && $_SESSION['userLevel']!=6) 
        {
        ?>
        
        <a href="http://localhost/thedminfopoint/index.php" class="menu">HOME</a> 
        <a href="http://localhost/thedminfopoint/forum_directory/forumpage.php" class="menu">FORUM</a>
        <a href="http://localhost/thedminfopoint/sitemanual.php" class="menu">MANUAL</a>
        <a href="http://localhost/thedminfopoint/theteam.php" class="menu lastmenuitem">THE TEAM</a>
        <a href="http://localhost/thedminfopoint/logout.php" class="menu">LOGOUT</a> 
         
        <?php
        }else if(loggedin() && $_SESSION['userLevel']==6){
            
        ?>
        <a href="http://localhost/thedminfopoint/index.php" class="menu">HOME</a> 
        <a href="http://localhost/thedminfopoint/forum_directory/forumpage.php" class="menu">FORUM</a> 
        <a href="http://localhost/thedminfopoint/sitemanual.php" class="menu">MANUAL</a> 
        <a href="http://localhost/thedminfopoint/generalAccounts/generalAccountsPage.php" class="menu">ACCOUNTS</a> 
        <a href="http://localhost/thedminfopoint/logout.php" class="menu">LOGOUT</a>
       
        <?php
        } else if(loggedin() && $_SESSION['userLevel']==5){
        ?>
        
        <a href="http://localhost/thedminfopoint/index.php" class="menu">HOME</a> 
        <a href="http://localhost/thedminfopoint/forum_directory/forumpage.php" class="menu">FORUM</a>
        <a href="http://localhost/thedminfopoint/sitemanual.php" class="menu">MANUAL</a> 
        <a href="http://localhost/thedminfopoint/generalAccounts/generalAccountsPage.php" class="menu lastmenuitem">ACCOUNTS</a>
        <a href="http://localhost/thedminfopoint/logout.php" class="menu">LOGOUT</a> 
         
        <?php
        } else if(loggedin() && $_SESSION['userLevel']==4){
        ?>
        
        <a href="http://localhost/thedminfopoint/index.php" class="menu">HOME</a> 
        <a href="http://localhost/thedminfopoint/forum_directory/forumpage.php" class="menu">FORUM</a>
          <a href="http://localhost/thedminfopoint/sitemanual.php" class="menu">MANUAL</a>
        <a href="http://localhost/thedminfopoint/admins_directory/attendence.php" class="menu">ATTENDENCE</a>  
        <a href="http://localhost/thedminfopoint/logout.php" class="menu">LOGOUT</a> 
        <a href="http://localhost/thedminfopoint/generalAccounts/generalAccountsPage.php" class="menu lastmenuitem">ACCOUNTS</a> 
        
        <?php
        } else if(loggedin() && $_SESSION['userLevel']==3){
        ?>
        
        <a href="http://localhost/thedminfopoint/index.php" class="menu">HOME</a>  
        <a href="http://localhost/thedminfopoint/forum_directory/forumpage.php" class="menu">FORUM</a> 
        <a href="http://localhost/thedminfopoint/sitemanual.php" class="menu">MANUAL</a>
        <a href="http://localhost/thedminfopoint/logout.php" class="menu">LOGOUT</a> 
        <a href="http://localhost/thedminfopoint/generalAccounts/generalAccountsPage.php" class="menu">ACCOUNTS</a> 
        
        <?php
        } else if(loggedin() && $_SESSION['userLevel']==2){
        ?>

        <a href="http://localhost/thedminfopoint/index.php" class="menu">HOME</a> 
        <a href="http://localhost/thedminfopoint/forum_directory/forumpage.php" class="menu">FORUM</a> 
        <a href="http://localhost/thedminfopoint/admins_directory/adminscorner.php" class="menu">ADMIN</a> 
        <a href="http://localhost/thedminfopoint/logout.php" class="menu">LOGOUT</a> 
        <a href="http://localhost/thedminfopoint/generalAccounts/generalAccountsPage.php" class="menu">ACCOUNTS</a> 
        <a href="http://localhost/thedminfopoint/forum_directory/forumpage.php" class="menu">FORUM</a> 
        
        <?php
        }else if(loggedin() && $_SESSION['userLevel']==1){
        ?>

        <a href="http://localhost/thedminfopoint/index.php" class="menu">HOME</a> 
        <a href="http://localhost/thedminfopoint/forum_directory/forumpage.php" class="menu">FORUM</a>
        <a href="http://localhost/thedminfopoint/sitemanual.php" class="menu">MANUAL</a> 
        <a href="http://localhost/thedminfopoint/superAdminPanel/sitemastercentre.php" class="menu">MENU</a> 
        <a href="http://localhost/thedminfopoint/admins_directory/adminscorner.php" class="menu">ADMIN</a> 
        <a href="http://localhost/thedminfopoint/generalAccounts/generalAccountsPage.php" class="menu">ACCOUNTS</a> 
        <a href="http://localhost/thedminfopoint/logout.php" class="menu">LOGOUT</a>
       
        <?php
        }else{
        
        if($page == "Login_page"){
         
        echo '<a href="http://localhost/thedminfopoint/index.php" class="menu">HOME</a>
        <a href="http://localhost/thedminfopoint/forum_directory/forumpage.php" class="menu">FORUM</a>  
        <a href="http://localhost/thedminfopoint/sitemanual.php" class="menu">MANUAL</a>
        <a href="http://localhost/thedminfopoint/contacts.php" class="menu">CONTACTS</a>
        <a href="http://localhost/thedminfopoint/registerform.php" class="menu">SIGNUP</a>';
      
       }else if($page =="Signup_page"){

        echo '<a href="http://localhost/thedminfopoint/index.php" class="menu">HOME</a> 
        <a href="http://localhost/thedminfopoint/forum_directory/forumpage.php" class="menu">FORUM</a> 
        <a href="http://localhost/thedminfopoint/sitemanual.php" class="menu">MANUAL</a>
        <a href="http://localhost/thedminfopoint/contacts.php" class="menu">CONTACTS</a>
        <a href="http://localhost/thedminfopoint/loginform.php" class="menu">LOGIN</a>';
      
        }else{

         if($page=="Home"){
         echo '<a href="http://localhost/thedminfopoint/index.php" class="menu">HOME</a> 
        <a href="http://localhost/thedminfopoint/forum_directory/forumpage.php" class="menu">FORUM</a> 
        <a href="http://localhost/thedminfopoint/sitemanual.php" class="menu">MANUAL</a>
        <a href="http://localhost/thedminfopoint/contacts.php" class="menu">CONTACTS</a>
        <a href="http://localhost/thedminfopoint/loginform.php" class="menu">LOGIN</a>
        <a href="http://localhost/thedminfopoint/registerform.php" class="menu">SIGNUP</a>';
      
        }
        }
        }


        ?>
        
    </div>
        
        
        <!--MENU ENDS HERE!-->

</body>
		
</html>
