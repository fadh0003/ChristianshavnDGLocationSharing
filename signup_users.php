<?php
session_start();

include('DBconnection.php');
/***************/


if(mysqli_connect_errno())
{
    echo "1: Connection failed";
    exit();
}

//$username = '';
//$email = '';
//$password = '';

if($_POST){
    $username = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $namecheckquery = "SELECT user_name FROM users WHERE user_name = '" .$username. "';";
    $namecheck = mysqli_query($DB_connection, $namecheckquery) or die('ERROR: SQL query problem' . mysqli_error($DB_connection));
    $row = mysqli_fetch_assoc($namecheck); 

    if($row['user_name'] == $username){
        echo "3: Name already exsits";
        exit();
    } else {
    
    $passwordhash = password_hash($password, PASSWORD_DEFAULT);    
    mysqli_query($DB_connection, "INSERT INTO users(user_name, user_email, user_password, fk_role_id) VALUES('$username','$email', '$passwordhash', '2')") or die ('ERROR: SQL query problem' . mysqli_error($DB_connection));
    echo("0");
    }  
}

?>