<?php
session_start();

include('DBconnection.php');

//checking connection
if(mysqli_connect_errno())
{
    echo "1: Connection failed";
    exit();
}
/***************/

//$userid = $_SESSION['user_id'];

//getting user
//$getuserquery =  mysqli_query($DB_connection, "SELECT user_name FROM users WHERE user_id ='$userid'") or die ('ERROR: SQL query problem' . mysqli_error($DB_connection));
//$fecthuserinfo = mysqli_fetch_assoc($getuserquery);
//echo $fecthuserinfo['user_name'];


if($_POST){
    $username = $_POST["name"];
    $password = $_POST["password"];

    $getUserTypeLogin = mysqli_query($DB_connection, "Select * from users WHERE user_name='$username'") or die ('ERROR: SQL query problem' . mysqli_error($DB_connection));
    $fetchUserTypeLogin = mysqli_fetch_assoc($getUserTypeLogin);

    $matchUserPassword = $fetchUserTypeLogin['user_password'];

    if(password_verify($password, $matchUserPassword)){
        
        $_SESSION['user_id'] = $fetchUserTypeLogin['user_id'];
        $_SESSION['user_name'] = $fetchUserTypeLogin['user_name'];


        if($fetchUserTypeLogin['fk_role_id'] == 2){
            echo "0";
        }

    }
    else{
        echo "your login info is incorrect, please create an account";
    }
}

?>