<?php
include ('connect.php');

function backlinkMain(){
    
            if(loggedin && $_SESSION['userLevel']==1){
                
                    echo "<a href='https://www.twigavisiontz.club/two_dimensionmaster/sitemastercentre.php' class='backlink'>Go back to the main page</>";
            
            } else if(loggedin && $_SESSION['userLevel']==2){
                
                     echo "<a href='https://www.twigavisiontz.club/two_dimension1/controllpanel.php' class='backlink'>Go back to the main page</>";
            
            
            } else if(loggedin && $_SESSION['userLevel']==3){
                
                    echo "<a href='https://www.twigavisiontz.club/two_dimension2/privileges.php' class='backlink'>Go back to the main page</>";
                        
            } else if(loggedin && $_SESSION['userLevel']==4){
                
                    echo "<a href='https://www.twigavisiontz.club/multi_dimension/khmcorner.php' class='backlink'>Go back to the main page</>";
            
            } else if(loggedin && $_SESSION['userLevel']==5){
                
                    echo "<a href='https://www.twigavisiontz.club/multi_dimension/volunteercentre.php' class='backlink'>Go back to the main page</>";
            
            }else if(loggedin  && $_SESSION['userLevel']==6){
            
                echo "<a href='stakeholdercentre.php' class='backlink'>Go back to the main page</>";
            
            }else{
             echo "<a href='index.php' class='backlink'>Go back to the main page</>";
             
             exit();
            
            }
}
?>