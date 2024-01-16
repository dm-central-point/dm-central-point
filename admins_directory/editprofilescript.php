<?php
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
include ('../site_includes/head.php');

?>



<?php


        
        if(isset($_POST['myid'])){
        
        
        $id = mysqli_real_escape_string($connect, $_POST['myid']);
        $date = mysqli_real_escape_string($connect, $_POST['date']);
        $fname = mysqli_real_escape_string($connect, $_POST['fullname']);
        $birthday = mysqli_real_escape_string($connect, $_POST['birthday']);
        $gender = mysqli_real_escape_string($connect, $_POST['gender']);
        $place = mysqli_real_escape_string($connect, $_POST['location']);
        $category = mysqli_real_escape_string($connect, $_POST['category']);
        $schname = mysqli_real_escape_string($connect, $_POST['schoolname']); 
        $level = mysqli_real_escape_string($connect, $_POST['schoollevel']);
        $childnum = mysqli_real_escape_string($connect, $_POST['childnum']);
        $status1 = mysqli_real_escape_string($connect, $_POST['status']);
        $status2 = mysqli_real_escape_string($connect, $_POST['status2']);
        $bstts = mysqli_real_escape_string($connect, $_POST['bstts']);
        $descr = mysqli_real_escape_string($connect, $_POST['description']);
        
        $image_name = strtolower($_FILES['image']['name']);
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_name = strtolower($_FILES['image']['name']);
        $image_type = $_FILES['image']['type'];
        $image_size = $_FILES['image']['size'];
        $extension = substr($image_name, strpos($image_name, ".") + 1);
        $max_size = 4194304; 
        
        
        
        /*echo $id."<br>";
        echo $date."<br>";
        echo $fname."<br>";
        echo $birthday."<br>";
        echo $gender."<br>";
        echo $place."<br>";
        echo $category."<br>";
        echo $schname."<br>";
        echo $level."<br>";
        echo $childnum."<br>";
        echo $status1."<br>";
        echo $status2."<br>";
        echo $bstts."<br>";
        echo $descr."<br>";
        echo $image_name."<br>"; */
        
        
        $location ='../uploads/';
        
        if(($extension ==jpg) || ($extension=jpeg) && ($image_type == image/jpeg) || ($image_type == image/jpeg) ){
        
        if($image_size <= $max_size){
    
        unlink($location/$image);
        move_uploaded_file($_FILES['image']['tmp_name'], $location.$image_name); 
        } 
        
        } else{
        
        echo "File extension must be JPEG OR JPG";
        }
        
        
        $edit = "UPDATE `profiles` SET `dayRegistered`='$date',`fullName`='$fname',`birthDay`='$birthday',`Gender`='$gender',`Location`='$place',`Category`='$category',`schoolName`='$schname',
        `level/class`='$level',`childrenNum`='$childnum',`sspStatus`='$status1',`sspStatus2`='$status2',`bnsStatus`='$bstts',`Description`='$descr',`Image`='$image_name' WHERE `client_Id`='$id'";
        
        
        $result = mysqli_query($connect, $edit);
        
        
        if($result){
        
        
        echo '<div class="register"><br><br>';
        
        header("refresh:2; url=/two_dimension1/editprofilesform.php?cid=$id");
        
        echo 'Client information successfully updated!<br><br>';
        
        echo '</div>';	
        
        
        
        
        }else{
        
        echo '<div class="register"><br><br>';
        
        echo 'Client information not successfully updated!<br>';
        
        echo '<a href="editprofilesform.php?cid='.$id.'">Back to previous Page</a><br><br>'; 
        echo "</div>";
        
        }
        
        
        }	