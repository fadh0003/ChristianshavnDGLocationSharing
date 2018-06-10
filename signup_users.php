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
    $rowusername = mysqli_fetch_assoc($namecheck); 

    if($rowusername['user_name'] == $username){
        echo " Name already exsits";
    } 
    
    $emailcheckquery = "SELECT user_email FROM users WHERE user_email = '" .$email. "';";
    $emailcheck = mysqli_query($DB_connection, $emailcheckquery) or die('ERROR: SQL query problem' . mysqli_error($DB_connection));
    $rowuseremail = mysqli_fetch_assoc($emailcheck); 
    
    if($rowuseremail['user_email'] == $email){
        echo " Email already exsits";
    } else {
    $passwordhash = password_hash($password, PASSWORD_DEFAULT);    
    mysqli_query($DB_connection, "INSERT INTO users(user_name, user_email, user_password, fk_role_id) VALUES('$username','$email', '$passwordhash', '2')") or die ('ERROR: SQL query problem' . mysqli_error($DB_connection));
    echo("0");
    }  
}

?>