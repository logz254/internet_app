<?php    
include_once 'user.php';    
include_once 'db.php';    
$con = new DBConnector();    
$pdo = $con->connectToDB();
session_start();

if(isset($_POST['Login']))
{         
    $email = $_POST['email'];        
    $password = $_POST['pass'];
    $user = new User();
    $user->setEmail($email);
    $user->setPassword($password); 
    $_SESSION["email"] = $_POST["email"];      
    echo $user->login($pdo);

    
} 
?>