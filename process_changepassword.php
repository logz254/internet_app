<?php
include_once 'user.php';    
include_once 'db.php';    
$con = new DBConnector();    
$pdo = $con->connectToDB();
if(isset($_POST['changedpass']))
{
    //change password
    // $email = $_POST['email'];
    $password = $_POST['pass'];
    $password2 = $_POST['pass2'];
    $user = new User();
    // $user->setEmail($email);
    $user->setPassword($password);
    $user->setPassword2($password2);
     
    echo $user->changePassword($pdo); 


}
?>