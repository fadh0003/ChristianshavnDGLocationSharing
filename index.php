<?php
ob_start();
session_start();

include('DBconnection.php');
/***************/
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
    <h1>login</h1>
    <form method="post">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="submitLogin" value="login">
    </form>
    <?php
    if(isset($_POST['submitLogin'])){
        $email = mysqli_real_escape_string($DB_connection, $_POST['email']);
        $password = mysqli_real_escape_string($DB_connection, $_POST['password']);

        /*bruges til at sende roletype til login siden*/
        $admin = 1;
        $Standard = 2;
        
        $getUserTypeLogin = mysqli_query($DB_connection, "Select * from users WHERE user_email='$email'") or die ('ERROR: SQL query problem' . mysqli_error($DB_connection));
        $fetchUserTypeLogin = mysqli_fetch_assoc($getUserTypeLogin);
        
        $matchUserPassword = $fetchUserTypeLogin['user_password'];
        
        if(password_verify($password, $matchUserPassword)){
        
            $_SESSION['user_id'] = $fetchUserTypeLogin['user_id'];
            $_SESSION['fk_role_id'] = $fetchUserTypeLogin['fk_role_id'];

            if($fetchUserTypeLogin['fk_role_id'] == $admin){
                die(header('location: admin_profile.php'));
            }
            if($fetchUserTypeLogin['fk_role_id'] == $Standard){
                die(header('location: user_profile.php'));
            }

        }
        else{
            echo "<p class='errormsg'>your login info is incorrect, please create an account</p>";
        }
        
    }
    ?>
</body>
</html>