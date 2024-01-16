<?php 
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');

include ('site_includes/head.php'); 

            
if(isset($_POST['submit'])){
                
 $selector = bin2hex(random_bytes(8));
 $token = random_bytes(32);
 
 $url = "https://thedminfopoint.com/passwordReset/createnewpassword.php?selector=".$selector. "&token=".bin2hex($token);
   
            
$expires = date("U") + 800;


$useremail=$_POST['email'];  

$sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
$stmt = mysqli_stmt_init($connect);
if(!mysqli_stmt_prepare($stmt, $sql)){

echo "There was a problem creating connection";
exit();
    
    
}else{
mysqli_stmt_bind_param($stmt, 's', $useremail);  

mysqli_stmt_execute($stmt);

}

$sql="INSERT INTO `pwdReset`(`pwdResetEmail`, `pwdResetValidator`, `pwdResetToken`, `pwdResetExpires`) VALUES (?, ?, ?, ?)";
$stmt = mysqli_stmt_init($connect);
if(!mysqli_stmt_prepare($stmt, $sql)){

echo "There was a problem creating connection";
exit();
    
    
}else{

$hashedtoken = password_hash($token, PASSWORD_DEFAULT);

mysqli_stmt_bind_param($stmt, 'ssss', $useremail, $selector, $hashedtoken, $expires);  

mysqli_stmt_execute($stmt);

}

mysqli_stmt_close($stmt);
mysqli_close($connect);

$to = $useremail;

$subject = "Password Reset for The DM Central point";

$message = "<p>You sent us a password reset request, the link to reset your password is below. If you didn't make this request then ignore this email</p>";
$message .= "<p>Here is your password reset link.</p>";
$message .= "<a href='.$url.'>'.$url.'</a></p>";

$headers = "From: The DM central Point <passwordreset@thedminfopoint.com>\r\n";
$headers .= "Reply-To: passwordreset@thedminfopoint.com\r\n";
$headers .= "Content-type: text/html\r\n";


mail($to, $subject, $message, $headers);


header("Location: passwordreset.php?reset=success");






 }else{
     
     
  header("Location: ../index.php");   
     
 }
 
 
?>
            
            
            
            
            
            

   <?php include ('site_includes/jscodes_includer.php'); ?>
