<?php
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $user_id = 0;
    $status = ""

    $stmt = $con->prepare("SELECT user_id, username, password, status FROM users WHERE username=? AND password=? LIMIT 1");
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $stmt->bind_result($user_id, $username, $password, $status);
    $stmt->store_result();
    if($stmt->num_rows == 1)  //To check if the row exists
        {
            if($stmt->fetch()) //fetching the contents of the row
            {
               if ($status == 'd') {
                   echo "YOUR account has been DEACTIVATED.";
                   exit();
               } else {
                   $_SESSION['Logged'] = 1;
                   $_SESSION['user_id'] = $user_id;
                   $_SESSION['username'] = $username;
                   echo 'Success!';
                   exit();
               }
           }

    }
    else {
        echo "INVALID USERNAME/PASSWORD Combination!";
    }
    $stmt->close();
}
else 
{   

}
$con->close();