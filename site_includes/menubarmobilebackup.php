<html>

<?php
include ('connect.php');
?>
<head>
    
<?php
include ('head.php');
?>
 <style>
 
        
        *{
        margin:0;
        padding:0;
        box-sizing: border-box;
        }
        
        
        .menudiv{
        width:100%; 
        height:50px;
        text-align:center; 
        background:#666;
        display:flex;
        justify-content:center; 
         align-items:center;
        flex-flow: row wrap;
        height:auto; 
        flex-direction:row;
        position:relative;
        }
        
        
        .menumaindiv{
        border: 4px sold black;
        width: 100%; 
        height:auto; 
        background:#505050; 
        text-align: center; 
        border-radius:0;
        display:flex;
        flex-direction:row;
        justify-content:center;
        align-content:center;
        flex-flow: row-reverse wrap ;
        padding-top:10px;
        padding-bottom:10px;
        
        }
        
        
        .menumaindiv{
        content: "";
        clear: both;
        display: table;
        
        }
        
        
        
        .toptable{
        margin:0 auto; 
        background:yellow;
        }
        .td1{
        background:yellow; 
        width:600px; text-align:center;
        
        }
        
        .td2{
        background:black; 
        height:30px;
        width:200px;
        text-align:center; 
        border-radius:20px;
        
        }
        tr{
        border:none;
        
        }
        
        /*CSS FOR MENU BAR ENDS HERE */ 
        
        /*--------------------------------------------------*/
        
      
        
        .mobmenu{
        width:200px;
        height:200px;
        overflow-y:auto;
        padding:10px;
        float:right;
        position:absolute;
        right:1px;
        top:60px;
        z-index:1000;
        background:cyan;
        }
        
                
        .menumob{
        display:block;
        padding:10px;
        line-height:30px;
        margin-bottom:10px;
        margin-top:10px;
        color:white;
        text-decoration:none;
        }
        
        .mainwrappernav{
        width:100%; 
        height:auto;
        background:darkorange;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        text-align: center;
        display:block;
        position:relative;
        padding:10px;
        
        }
        
        .mainwrappernav::after{
        content:"";
        clear:both;
        display:table;
        
        }
        .menutap{
        position:relative;
        width:40px;
        height:40px;
        background:darkorange;
        display:inline;
        position:relative;
        float:right;
     
        }
        
        .menutap::after{
        content:"";
        clear:both;
        display:table;
        }
        
        .menutap img{
        width:100%;
        height:100%;
        border-radius:100px;
        }
        
        .tinylogo{
        position:relative;
        width:40px;
        height:40px;
        background:darkorange;
        display:inline-block;
        position:relative;
        float:left;
    
        }
        
        .tinylogo::after{
        content:"";
        clear:both;
        display:table;
        }
        
        .tinylogo img{
        width:100%;
        height:100%;
        border-radius:100px;
        }       
       
        .realtitle{
        position:relative;
        width:70%;
        height:40px;
        background:darkorange;
        display:inline-block;
        position:relative;
        line-height:35px;
        }
        
        .realtitle::after{
        content:"";
        clear:both;
        display:table;
          
        }
        .realtitle h3{
        background:darkorange;
        font-size:14px;
        }
        
        .menucontainer::after{
        content:"";
        clear:both;
        display:table;
        
        }
        
        .mobmenutitle{
        width:85%;
        height:40px;
        background:darkorange;
        display:inline-block;
        position:relative;
        
        
        }
        
        
        .mobmenutitle::after;{
        content:"";
        clear:both;
        display:table;
 
        }
</style>

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

</head>


<body>
<div class="menumaindiv">

<div class="menucontainer">


<!--MENU DIV STARTS HERE-->
        <div class='menudiv'>
        <?php
      
        if(loggedin() && $_SESSION['userLevel'] !=1 && $_SESSION['userLevel'] !=2 && $_SESSION['userLevel'] !=3 && $_SESSION['userLevel'] !=4 && $_SESSION['userLevel']!=5 
        && $_SESSION['userLevel'] !=6 && $_SESSION['userLevel']!=7 && $_SESSION['userLevel']!=8 && $_SESSION['userLevel']!=8){
        ?>
        <div class="mobmenu" id ="mobmenu">
        <a href="/index.php" class="menumob">HOME</a> 
        <a href="/sponsorship.php" class="menumob">SPONSORSHIP</a> 
        <a href="/three_dimension/partners.php" class="menumob">PARTNERS</a> 
        <a href="/three_dimension/memberlist.php" class="menumob">SITE MEMBERS</a> 
        <a href="/forums/forumindex.php" class="menumob">FORUM</a> 
        <a href="/photos.php" class="menumob">PHOTOS</a> 
        <a href="/theteam.php" class="menumob">THE TEAM</a> 
        <a href="/logout.php" class="menumob">LOGOUT</a>  
        </div>
            <?php
        } else if(loggedin() && $_SESSION['userLevel']==9){
        ?>
        
        <div class="mobmenu" id ="mobmenu">
        <a href="/index.php" class="menumob">HOME</a> 
        <a href="" class="menumob">FORUM</a>
        <a href="" class="menumob">PROJECTS</a> 
        <a href="" class="menumob">PROGRAMS</a> 
        <a href="/twiga_directory/admincorner.php" class="menumob">INFORMATION-CORNER</a> 
        <a href="/logout.php" class="menumob">LOGOUT</a>
        </div>
        
        
          <?php
        } else if(loggedin() && $_SESSION['userLevel']==8){
        ?>
        
        <div class="mobmenu" id ="mobmenu">
        <a href="/index.php" class="menumob">HOME</a> 
        <a href="" class="menumob">FORUM</a>
        <a href="" class="menumob">PROJECTS</a> 
        <a href="" class="menumob">PROGRAMS</a> 
        <a href="/theinternational_directory/sponsorcorner.php" class="menumob">INFORMATION-CORNER</a> 
         <a href="/twiga_directory/twigaaccounts/twigaaccountspage.php" class="menumobmenu">ACCOUNTS</a> 
        <a href="/logout.php" class="menumob">LOGOUT</a>
        </div>
        
        <?php
        } else if(loggedin() && $_SESSION['userLevel']==7){
        ?>
        
        <div class="mobmenu" id ="mobmenu">
        <a href="/index.php" class="menumob">HOME</a> 
        <a href="/forums/forumindex.php" class="menumob">FORUM</a>
        <a href="/three_dimension/partners.php" class="menumob">PROJECTS</a> 
        <a href="/two_dimension2/beneficiaries.php" class="menumob">FAMILY FORUM</a> 
        <a href="" class="menu">MEMBER CORNER</a> 
        <a href="/family_directory/familyaccounts/familyaccountspage.php" class="menumob">ACCOUNTS</a> 
        <a href="/logout.php" class="menumob">LOGOUT</a>
        </div>
        
        <?php
        } else if(loggedin() && $_SESSION['userLevel']==6){
        ?>
        
        <div class="mobmenu" id ="mobmenu">
        <a href="/index.php" class="menumob">HOME</a> 
        <a href="/forums/forumindex.php" class="menumob">FORUM</a> 
        <a href="/three_dimension/partners.php" class="menumob">PROJECTS</a> 
        <a href="/two_dimension2/beneficiaries.php" class="menumob">PROGRAMS</a>
        <a href="" class="menu">INFORMATION CORNER</a> 
        <a href="/stakeholders_directory/accountsnewformats/accountscentre.php" class="menumob">ACCOUNTS</a> 
        <a href="/logout.php" class="menumob">LOGOUT</a>
        </div>
        
        <?php
        } else if(loggedin() && $_SESSION['userLevel']==5){
        ?>
        
        <div class="mobmenu" id ="mobmenu">
        <a href="/index.php" class="menumob">HOME</a> 
        <a href="/forums/forumindex.php" class="menumob">FORUM</a> 
        <a href="/multi_dimension/volunteercentre.php" class="menumob"> VOLUNTEER CORNER</a> 
        <a href="/four_dimension2/general.php" class="menumob">GENERAL</a> 
        <a href="/logout.php" class="menumob">LOGOUT</a>
        </div>
        
        <?php
        } else if(loggedin() && $_SESSION['userLevel']==4){
        ?>
        
        <div class="mobmenu" id ="mobmenu">
        <a href="/index.php" class="menumob">HOME</a> 
        <a href="/forums/forumindex.php" class="menumob">FORUM</a> 
        <a href="/multi_dimension/khmcorner.php" class="menumob">TEACHER'S CORNER</a> 
        <a href="/multi_dimension/generalattendence/attendencecorner.php" class="menumob">ATTENDENCE</a> 
        <a href="/logout.php" class="menumob">LOGOUT</a>
        </div>
        
        
        <?php
        } else if(loggedin() && $_SESSION['userLevel']==3){
        ?>
        
        <div class="mobmenu" id ="mobmenu">
        <a href="/index.php" class="menumob">HOME</a> 
        <a href="/forumindex.php" class="menumob">FORUMS</a> 
        <a href="/theinternational_directory/informationpage.php" class="menumob"> INFORMATION-CORNER</a> 
        <a href="/theinternational_directory/internationalaccounts/internationalaccountspage.php" class="menumob">ACCOUNTS</a> 
        <a href="/logout.php" class="menumob">LOGOUT</a>
        </div>
        
        <?php
        } else if(loggedin() && $_SESSION['userLevel']==2){
        ?>
        <div class="mobmenu" id ="mobmenu">
        <a href="/index.php" class="menumob">HOME</a> 
        <a href="/forums/forumindex.php" class="menumob">FORUM</a> 
        <a href="/two_dimension1/controllpanel.php" class="menumob">ADMIN PANEL</a> 
        <a href="/multi_dimension/khmcorner.php" class="menumob">KHM CORNER</a> 
        <a href="/khm_directory/khmaccounts/khmaccountspage.php" class="menumob">ACCOUNTS-NEW</a> 
        <!--<a href="../two_dimension1/accountsnewformats/accountspage.php" class="menumob">ACCOUNTS</a> -->
        <a href="/logout.php" class="menumob">LOGOUT</a>
        </div>
        
        <?php
        }else if(loggedin() && $_SESSION['userLevel']==1){
        ?>
        <div class="mobmenu"  id ="mobmenu">
        <a href="/index.php" class="menumob">HOME</a> 
        <a href="/forums/forumindex.php" class="menumob">FORUM</a> 
        <a href="/two_dimensionmaster/sitemastercentre.php" class="menumob">SUPER ADMIN</a> 
        <a href="/two_dimension1/controllpanel.php" class="menumob">ADMIN PANEL</a> 
        <a href="/two_dimension2/privileges.php" class="menumob">CONTROL CENTRE</a> 
        <a href="/multi_dimension/khmcorner.php" class="menumob">KHM CORNER</a>
        <a href="/multi_dimension/volunteercentre.php" class="menumob"> VOLUNTEER CORNER</a> 
        <a href="../two_dimension1/accountsnewformats/accountspage.php" class="menumob">ACCOUNTS</a> 
        <a href="/logout.php" class="menumob">LOGOUT</a>
        </div>
        
        <?php
        }else{
        
        ?>
        <div class="mobmenu" id ="mobmenu" >
         <a href="../../index.php" class="menumob">HOME</a> 
         <a href="../programs.php" class="menumob">PROGRAMS</a> 
         <a href="../projects.php" class="menumob">PROJECTS</a> 
         <a href="/forums/forumindex.php" class="menumob">FORUM</a>  
         <a href="../photos.php" class="menumob">PHOTOS</a>  
         <a href="../theteam.php" class="menumob">THE TEAM</a> 
         <a href="../registerform.php" class="menumob">SIGNUP</a> 
         <a href="../loginform.php" class="menumob">LOGIN</a> 
         <a href="../contacts.php" class="menumob">CONTACTS</a> 
         </div>
        <?php
        }
        ?>
        
        
   
          <div class="mainwrappernav">  
          
            <div class="menutap" onClick="showMenu()" >
        						
        			<img src="/uploads/mobile-navigation-bar-responsive.png" />
        			
        	</div>          
      <div class='mobmenutitle'> 
      
      
        <div class="tinylogo" >
        						
        			<img src="/images/twigalogo.png" />
        			
        </div>
            
      <div class="realtitle">
      <h3>Twiga Vision Tanzania</h3>
      </div>

      </div>         
      



        </div>
   
    </div>
    
         


  </div>


</div>






</body>
</html>
