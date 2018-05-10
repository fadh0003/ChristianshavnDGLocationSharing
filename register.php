<?php
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
    <h1>register</h1>
    <form method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="register" value="register">
    </form>
    <?php
    if(isset($_POST['register'])){
        $username = mysqli_real_escape_string($DB_connection, $_POST['username']);
        $email = mysqli_real_escape_string($DB_connection, $_POST['email']);
        $password = mysqli_real_escape_string($DB_connection, $_POST['password']);
        
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);
        
        mysqli_query($DB_connection, "INSERT INTO users(user_name, user_email, user_password, fk_role_id) VALUES('$username','$email', '$passwordhash', '2')") or die ('ERROR: SQL query problem' . mysqli_error($DB_connection));
        
        echo "you have an account";
    }
    ?>
</body>
</html>