<?php
ob_start();
include_once('functions.php');
include('connect.php');
include('head.php');

?>
<html>


<body>
            <div class ="header">
                
                <img src="http://localhost/thedminfopoint/images/dmcp2.jpg" id="logoid" />
                
                
                
                
                    <h1 class='main_title'>WELCOME TO THE DM CENTRAL POINT</h1> 
                
                               
                
                <div class="logindiv"> 
                
                <?php
                if(loggedin()){
                    
                echo '<a href="http://localhost/thedminfopoint/logout.php" class="menuup">LOGOUT</a>';
                }else if($page=='Login_page'){
                    
                echo '<a href="http://localhost/thedminfopoint/registerform.php" class="menuup">SIGNUP</a>';
                }else{
                    echo '<a href="http://localhost/thedminfopoint/loginform.php" class="menuup">LOGIN</a>';
                }
                ?>
                
                </div>
            
            </div>
            

            
            
<!--MENU DIV STARTS HERE-->
        <div class='menudiv'>
        <?php
        
        if(loggedin() && $_SESSION['userLevel'] !=1 && $_SESSION['userLevel'] !=2 && $_SESSION['userLevel'] !=3 && $_SESSION['userLevel'] !=4 && $_SESSION['userLevel']!=5 && $_SESSION['userLevel']!=6) 
        {
        ?>
        
        <a href="http://localhost/thedminfopoint/index.php" class="menu">HOME</a> |
        <a href="http://localhost/thedminfopoint/sponsorship.php" class="menu">SPONSORSHIP</a> |
        <a href="http://localhost/thedminfopoint/three_dimension/partners.php" class="menu">PARTNERS</a> |
        <a href="http://localhost/thedminfopoint/three_dimension/memberlist.php" class="menu">SITE MEMBERS</a> |
        <a href="" class="menu">FORUM</a>  |
        <a href="" class="menu">PHOTOS</a> |
        <a href="http://localhost/thedminfopoint/theteam.php" class="menu">THE TEAM</a> |
         
        <?php
        }else if(loggedin() && $_SESSION['userLevel']==6){
            
        ?>
        <a href="http://localhost/thedminfopoint/index.php" class="menu">HOME</a> |
        <a href="http://localhost/thedminfopoint/two_dimension1/controllpanel.php" class="menu">ADMIN PANEL</a> |
        <a href="http://localhost/thedminfopoint/khm_directory/khmaccountspage.php" class="menu">KHMACCOUNTS</a> |
        <a href="http://localhost/thedminfopoint/two_dimension1/accountsnewformats/accountspage.php" class="menu">ACCOUNTS</a> |
       
        
        <?php
        } else if(loggedin() && $_SESSION['userLevel']==5){
        ?>
        
        <a href="http://localhost/thedminfopoint/index.php" class="menu">HOME</a> |
        <a href="http://localhost/thedminfopoint/forums/forumindex.php" class="menu">FAMILY FORUM</a> |
        <a href="http://localhost/thedminfopoint/multi_dimension/volunteercentre.php" class="menu"> NEWS</a> |
        <a href="http://localhost/thedminfopoint/generalAccounts/generalAccountsPage.php" class="menu">ACCOUNTS</a> |
        
        
        
        <?php
        } else if(loggedin() && $_SESSION['userLevel']==4){
        ?>
        
        <a href="http://localhost/thedminfopoint/index.php" class="menu">HOME</a> |
        <a href="http://localhost/thedminfopoint/multi_dimension/generalattendence/attendencecorner.php" class="menu">ATTENDENCE</a>  |
        <a href="http://localhost/thedminfopoint/generalAccounts/generalAccountsPage.php" class="menu">ACCOUNTS</a> |
        
        
        
        
        <?php
        } else if(loggedin() && $_SESSION['userLevel']==3){
        ?>
        
        <a href="http://localhost/thedminfopoint/index.php" class="menu">HOME</a>  |
        <a href="" class="menu">FORUMS</a> |
        <a href="http://localhost/thedminfopoint/theinternational_directory/informationpage.php" class="menu">INFO-CORNER</a> |
        <a href="http://localhost/thedminfopoint/generalAccounts/generalAccountsPage.php" class="menu">ACCOUNTS</a> |
        
        
        
        <?php
        } else if(loggedin() && $_SESSION['userLevel']==2){
        ?>
        <a href="http://localhost/thedminfopoint/index.php" class="menu">HOME</a> |
        <a href="" class="menu">FORUM</a> |
        <a href="http://localhost/thedminfopoint/two_dimension1/controllpanel.php" class="menu">ADMIN PANEL</a> |
        <a href="http://localhost/thedminfopoint/adminsAccounts/overallaccountspage.php" class="menu">MANAGE_ACCS</a> |
        <a href="http://localhost/thedminfopoint/generalAccounts/generalAccountsPage.php" class="menu">ACCOUNTS</a> 
 
        <?php
        }else if(loggedin() && $_SESSION['userLevel']==1){
        ?>
        <a href="http://localhost/thedminfopoint/index.php" class="menu">HOME</a> |
        <a href="http://localhost/thedminfopoint/superAdminPanel/sitemastercentre.php" class="menu">MAIN MENU</a> |
        <a href="http://localhost/thedminfopoint/admins_directory/adminscorner.php" class="menu">ADMIN PANEL</a> |
        <a href="http://localhost/thedminfopoint/generalAccounts/generalAccountsPage.php" class="menu">ACCOUNTS</a> |
       
        
        
        <?php
        }else{
        
        
        if($page == "Login_page" || $page == "Signup_page"){
         
        echo '<a href="http://localhost/thedminfopoint/index.php" class="menu">HOME</a> |
        <a href="http://localhost/thedminfopoint/sitemanual.php" class="menu">SITE MANUAL</a> |
        <a href="http://localhost/thedminfopoint/contacts.php" class="menu">CONTACTS</a>';
        
        }else if($page = "Home"){
            
    echo '<a href="http://localhost/thedminfopoint/sitemanual.php" class="menu">MANUAL</a> |
            <a href="http://localhost/thedminfopoint/registerform.php" class="menu">SIGNUP</a> |
            <a href="http://localhost/thedminfopoint/contacts.php" class="menu">CONTACTS</a>
            ';
        }
         
        }
        ?>
        
    </div>
        
        
        <!--MENU ENDS HERE!-->

</body>
		
</html>
