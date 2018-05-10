<?php
ob_start();
session_start();

include('DBconnection.php');

/*if the role type is not standard redirect*/
if($_SESSION['fk_role_id'] != 2) {
    die(header('location: index.php'));
}

if(isset($_GET['logout'])){
    unset($_SESSION['user_id']);
}

/*if there is no user id send to login page*/
if(!isset($_SESSION['user_id'])){
    die(header('location: index.php'));
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   <nav>
       <a href="index.php">login</a>
       <a href="register.php">register</a>
       <a href="admin_profile.php">admin site</a>
       <a href="user_profile.php">user site</a>
    </nav>
    <h1>welcome to user profile</h1>
    <a href="?logout=true">Log out</a>
</body>
</html>