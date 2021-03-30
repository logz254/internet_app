<?php
include_once 'user.php';
include_once 'db.php';
$con=new DBConnector();
$pdo=$con->connectToDB();
if(isset($_POST['register']))
{
$firstName=$_POST['fname'];
$lastName=$_POST['lname'];
$email=$_POST['email'];
$password=$_POST['pass'];
$city=$_POST['city'];
$image=$_POST['image'];
$user=new User();
$user->setFName($firstName);
$user->setLName($lastName);
$user->setCity($city);
$user->setPassword($password);
$user->setEmail($email);
$user->setprofilePicUrl($image);
echo $user->register($pdo);
}
?>