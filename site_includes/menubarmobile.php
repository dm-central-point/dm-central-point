<html>

<?php
include ('connect.php');
?>
<head>
    
<?php
include ('head.php');
?>



</head>


<body>

        <?php
      
        if(loggedin() && $_SESSION['userLevel'] !=1 && $_SESSION['userLevel'] !=2 && $_SESSION['userLevel'] !=3 && $_SESSION['userLevel'] !=4 && $_SESSION['userLevel']!=5 
        && $_SESSION['userLevel'] !=6 && $_SESSION['userLevel']!=7 && $_SESSION['userLevel']!=8 && $_SESSION['userLevel']!=8){
        ?>
        <div class="mobmenu" id="mobmenu">
        <a href="http://localhost/thedminfopoint/index.php" class="menumob">HOME</a> 
        <a href="http://localhost/thedminfopoint/forum_directory/forumpage.php" class="menumob">FORUM</a>
        <a href="http://localhost/thedminfopoint/sitemanual.php" class="menumob">MANUAL</a>
        <a href="http://localhost/thedminfopoint/theteam.php" class="menumob">THE TEAM</a>
        <a href="http://localhost/thedminfopoint/logout.php" class="menumob">LOGOUT</a> 
        </div>

            <?php
        } else if(loggedin() && $_SESSION['userLevel']==6){
        ?>
        
        <div class="mobmenu" id="mobmenu">
            <a href="http://localhost/thedminfopoint/index.php" class="menumob">HOME</a> 
            <a href="http://localhost/thedminfopoint/admins_directory/adminscorner.php" class="menumob">ADMIN</a> 
            <a href="http://localhost/thedminfopoint/sitemanual.php" class="menumob">MANUAL</a> 
            <a href="http://localhost/thedminfopoint/generalAccounts/generalAccountsPage.php" class="menumob">ACCOUNTS</a>
            <a href="http://localhost/thedminfopoint/logout.php" class="menumob">LOGOUT</a>
        </div>
        
        <?php
        } else if(loggedin() && $_SESSION['userLevel']==5){
        ?>
        
        <div class="mobmenu" id="mobmenu">
            <a href="http://localhost/thedminfopoint/index.php" class="menumob">HOME</a> 
            <a href="http://localhost/thedminfopoint/forum_directory/forumpage.php" class="menumob">FORUM</a> 
            <a href="http://localhost/thedminfopoint/sitemanual.php" class="menumob">MANUAL</a> 
            <a href="http://localhost/thedminfopoint/generalAccounts/generalAccountsPage.php" class="menumob">ACCOUNTS</a>
            <a href="http://localhost/thedminfopoint/logout.php" class="menumob">LOGOUT</a> 
        </div>
        
        <?php
        } else if(loggedin() && $_SESSION['userLevel']==4){
        ?>
        
        <div class="mobmenu" id="mobmenu">
            <a href="http://localhost/thedminfopoint/index.php" class="menumob">HOME</a> 
            <a href="http://localhost/thedminfopoint/forum_directory/forumpage.php" class="menumob">FORUM</a>
            <a href="http://localhost/thedminfopoint/sitemanual.php" class="menumob">MANUAL</a> 
            <a href="http://localhost/thedminfopoint/admins_directory/attendence.php" class="menumob">ATTENDENCE</a>  
            <a href="http://localhost/thedminfopoint/generalAccounts/generalAccountsPage.php" class="menumob">ACCOUNTS</a>
            <a href="http://localhost/thedminfopoint/logout.php" class="menumob">LOGOUT</a> 
            
        </div>
        
        <?php
        } else if(loggedin() && $_SESSION['userLevel']==3){
        ?>
        
        <div class="mobmenu" id="mobmenu">
            <a href="http://localhost/thedminfopoint/index.php" class="menumob">HOME</a>  
            <a href="http://localhost/thedminfopoint/forum_directory/forumpage.php" class="menumob">FORUM</a>
            <a href="http://localhost/thedminfopoint/sitemanual.php" class="menumob">MANUAL</a> 
            <a href="http://localhost/thedminfopoint/logout.php" class="menumob">LOGOUT</a> 
            <a href="http://localhost/thedminfopoint/generalAccounts/generalAccountsPage.php" class="menumob">ACCOUNTS</a>
        </div>
        
        <?php
        } else if(loggedin() && $_SESSION['userLevel']==2){
        ?>
        
        <div class="mobmenu" id="mobmenu">
            <a href="http://localhost/thedminfopoint/index.php" class="menumob">HOME</a> 
            <a href="http://localhost/thedminfopoint/two_dimension1/controllpanel.php" class="menumob">ADMIN</a> 
            <a href="http://localhost/thedminfopoint/adminsAccounts/overallaccountspage.php" class="menumob">MANAGE_ACCS</a> 
            <a href="http://localhost/thedminfopoint/adminsAccounts/overallaccountspage.php" class="menumob">LOGOUT</a> 
            <a href="http://localhost/thedminfopoint/generalAccounts/generalAccountsPage.php" class="menumob">ACCOUNTS</a> 
        </div>
        
        <?php
        } else if(loggedin() && $_SESSION['userLevel']==1){
        ?>

        <div class="mobmenu" id="mobmenu" >
            <a href="http://localhost/thedminfopoint/index.php" class="menumob">HOME</a> 
            <a href="http://localhost/thedminfopoint/forum_directory/forumpage.php" class="menumob">FORUM</a>
            <a href="http://localhost/thedminfopoint/superAdminPanel/sitemastercentre.php" class="menumob">MENU</a> 
            <a href="http://localhost/thedminfopoint/admins_directory/adminscorner.php" class="menumob">ADMIN</a> 
            <a href="http://localhost/thedminfopoint/logout.php" class="menumob">LOGOUT</a> 
            <a href="http://localhost/thedminfopoint/generalAccounts/generalAccountsPage.php" class="menumob">ACCOUNTS</a>
         </div>
        <?php
        }else{

        if($page == "Login_page"){
         ?>
        <div class="mobmenu" id="mobmenu" >
            <a href="http://localhost/thedminfopoint/index.php" class="menumob">HOME</a> 
            <a href="http://localhost/thedminfopoint/forum_directory/forumpage.php" class="menu">FORUM</a>
            <a href="http://localhost/thedminfopoint/sitemanual.php" class="menumob">MANUAL</a>
            <a href="http://localhost/thedminfopoint/registerform.php" class="menumob">SIGNUP</a> 
            <a href="http://localhost/thedminfopoint/contacts.php" class="menumob">CONTACTS</a>
        </div>
      
      <?php

       }else if($page =="Signup_page"){

      ?>
        <div class="mobmenu" id="mobmenu" >
            <a href="http://localhost/thedminfopoint/index.php" class="menumob">HOME</a> 
            <a href="http://localhost/thedminfopoint/forum_directory/forumpage.php" class="menumob">FORUM</a>
            <a href="http://localhost/thedminfopoint/sitemanual.php" class="menumob">MANUAL</a>
            <a href="http://localhost/thedminfopoint/loginform.php" class="menumob">LOGIN</a> 
            <a href="http://localhost/thedminfopoint/contacts.php" class="menumob">CONTACTS</a>
        </div>
      
      <?php
        }else{

         if($page=="Home"){

        ?>
         <div class="mobmenu" id="mobmenu" >
             <a href="http://localhost/thedminfopoint/index.php" class="menumob">HOME</a> 
             <a href="http://localhost/thedminfopoint/forum_directory/forumpage.php" class="menumob">FORUM</a>
             <a href="http://localhost/thedminfopoint/sitemanual.php" class="menumob">MANUAL</a>
             <a href="http://localhost/thedminfopoint/loginform.php" class="menumob">LOGIN</a>
             <a href="http://localhost/thedminfopoint/registerform.php" class="menumob">SIGNUP</a>
             <a href="http://localhost/thedminfopoint/contacts.php" class="menumob">CONTACTS</a>
         </div>

         <?php
        }
        }
        }
        
        ?>
        
    <script>

    function showMenu(){

    var x = document.getElementById('mobmenu');
    if (x.style.display === "none") {
    x.style.display = "block";
    } else {
    x.style.display = "none";
    } 
    } 

    </script>  
        
   
</body>
</html>
