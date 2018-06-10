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

    $validateUsername = '';
    $validatePassword = '';
    
    if($username == $fetchUserTypeLogin['user_name']){
        $validateUsername = true;
    } else {
        $validateUsername = false;
        echo "incorrectUsername |";
    }
    
    if(password_verify($password, $matchUserPassword)){
        
        $_SESSION['user_id'] = $fetchUserTypeLogin['user_id'];
        $_SESSION['user_name'] = $fetchUserTypeLogin['user_name'];
        
        $validatePassword = true;
    }
    else {
        $validatePassword = false;
        echo "incorrectPassword |";
    }

    if($validateUsername && $validatePassword){
        if($fetchUserTypeLogin['fk_role_id'] == 2){
            echo "0 |";
        }
    }
    else {
        echo "Login information does not exist";
    }
}

?>