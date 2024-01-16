<?php 
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
?>
<!DOCTYPE html>

<html>
<head>
     <title>Profile_edit_form</title>       
<?php 
include ('../site_includes/head.php'); 
?>
            
    <style>

        .maindiv{
        border: 4px sold black;
        width: 100%; 
        height:auto; 
        background:#fff; 
        text-align: center; 
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-content:center;
        align-items:center;
        flex-flow: column;
        padding-top:40px;
        padding-bottom:30px;
        
        }
    
    

        *{
        margin:0;
        padding:0;
        }
        
        
        
        
        .name{
        background:tan;
        
        }
        
        
        .mainwrapper{
        position:relative;
        display:block;
        }
        
        .mainwrapper{
        
        }
        

        
        #profileform_edit{
        background:cyan;
        width:50%;
        margin:0 auto;
        height:auto;
        text-align:center;
        } 
        
        #profileform_edit h3{
        background:cyan;
        }
        
        #profileform_edit input[type=text]{
        background:white;
        width:80%;
        margin:0 auto;
        height:40px;
        margin-bottom:15px;
        padding:5px;
        }
        

        
        #profileform_edit input[type=date]{
        background:white;
        width:80%;
        margin:0 auto;
        height:40px;
        margin-bottom:15px;
        font-size:16px;
        }
        
                
        #profileform_edit input[type=submit]{
        background:silver;
        width:80%;
        margin:0 auto;
        height:40px;
        margin-bottom:15px;
        padding:5px;
        font-size:16px;
        }
        
        #profileform_edit input[type=file]{
        background:white;
        width:80%;
        margin:0 auto;
        height:40px;
        margin-bottom:15px;
        padding:5px;
        font-size:16px;
        }
        
        #profileform_edit textarea{
        background:white;
        width:80%;
        margin:0 auto;
        height:150px;
        margin-bottom:15px;
        padding:10px;
        font-size:16px;
        }
        
        #profileform_edit select{
        background:white;
        width:80%;
        margin:0 auto;
        height:40px;
        margin-bottom:15px;
        padding:5px;
        font-size:16px;
        }
        
        .backlink{
            display:block;
            width:300px;
            margin:0 auto;
            background:white;
        }

		
    </style>

</head>
    <body>

        
        <div class="mainwrapper">
         <!-- The titlebar goes here -->   
         
            <?php 
            include ('../site_includes/titlebar.php');
            ?>
        
                </div>
        

        
                <div class="mainwrapper">
                <!-- The menubar goes here -->
            <?php 
            include ('../site_includes/menubar.php');
            ?>        
        
                </div>
    
    
     
     
          <div class="mainpage">
 
            <div class='maindiv'>
               <!-- The main contant goes here -->         
        
        
        <?php
        if (isset($_GET['cid'])){
        
        $id = mysqli_real_escape_string($connect, $_GET['cid']);   
        
        $query = mysqli_query($connect, "SELECT * FROM `profiles` WHERE client_id = '$id'");
        
        $row = mysqli_fetch_assoc($query);
        
        $id = $row['client_Id'];
        $dateregistered = $row['dayRegistered'];
        $fname = $row['fullName'];
        $birthday = $row['birthDay'];
        $gender = $row['Gender'];
        $location = $row['Location'];
        $category = $row['Category'];
        $schname = $row['schoolName'];
        $level = $row['level/class'];
        $chdrnumber = $row['childrenNum'];
        $stts1 = $row['sspStatus'];
        $stts2 = $row['sspStatus2'];
        $bstts = $row['bnsStatus'];
        $details = $row['Description'];
        $state = $row['clientState'];
        $image = $row['Image'];

        }
        

        ?>    
               
        <br><br>
        <form id="profileform_edit" enctype="multipart/form-data" method="post" action="editprofilescript.php?">
        <br><br>
        <h3>Date of registration</h3>
        <input type='date' name='date' class='input' value='<?php echo $dateregistered?>'><br>
        <input type='text' name='fullname' class='input' value='<?php echo $fname?>'><br>
        <h3>Date of birth</h3>
        <input type='date' name='birthday' class='input' value='<?php echo $birthday?>'><br>
        
        <select name ="gender" class="text" >
        <option value='<?php echo $gender?>'> <?php echo $gender?></option>
        <option>Male</option>
        <option>Female</option>
        <option>Other</option>
        </select>	
        
        <input type='text' name='location' class='input' value='<?php echo $location?>'><br>
        
        <select name ="category" class="text" >
        <option value='<?php echo $category?>'> <?php echo $category?></option>
        <option>Child_Care</option>
        <option>Women_Empowerment</option>
        <option>Youths_Empowerment</option>
        </select>
        
        <input type='text' name='schoolname' class='input' value='<?php echo $schname?>'><br>
        <input type='text' name='schoollevel' class='input' value='<?php echo $level?>'><br>
        <input type='text' name='childnum' class='input' value='<?php echo $chdrnumber?>'><br>
        
        <select name ="status" class="text" >
        <option value='<?php echo $stts1?>'> <?php echo $stts1 ?></option>
        <option>Sponsored</option>
        <option>Non-Sponsored</option>
        </select>
        
        <select name ="status2" class="text" >
        <option value='<?php echo $stts2?>'> <?php echo $stts2 ?></option>
        <option>None</option>
        <option>KHM-Sponsorship</option>
        <option>GVMT-Sponsorship</option>
        </select>
        
        <input type='text' name='bstts' class='input' value='<?php echo $bstts?>'><br>
        <textarea name='description' class='textfield' > <?php echo $details?></textarea><br>
        
        <input type='hidden' name='myid' value='<?php echo $id ?>'>
        <input type='file' name='image' id='image' value='<?php echo $image?>'><br>
        <input type='submit' name='submit' id='submit' value='Submit'>
        <br><br>
        
        </form>
        <br><br>
                
          </div>         
                
            
        </div>
        
        <div class="linkwrapper">
            <?php
            back_link_main();
            ?>
        </div> 
        
       <!--<div class="mainwrapper"> 
        <img src='images/womensday-image2.jpg' width='100%' height='auto'/>
        
        </div>-->
        
        <div class="mainwrapper">
            <!-- The foorwe goes here -->
            <?php 
            include ('../site_includes/footer.php');
            ?>        
        
        </div>
 
 
</body>
</html>