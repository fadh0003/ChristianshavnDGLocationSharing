<?php
session_start();

include('DBconnection.php');

//include('wideimage/WideImage.php');


//checking connection
if(mysqli_connect_errno())
{
    echo "1: Connection failed";
    exit();
}

if($_POST){
    $username = $_POST['username'];

    $userpostquery = "SELECT * FROM posts INNER JOIN users on posts.fk_user_id=users.user_id WHERE user_name = '$username'";
    $fetchuserpost = mysqli_query($DB_connection, $userpostquery);
    $row = mysqli_fetch_assoc($fetchuserpost);

    echo "username: " .$row['user_name'] . "|post: " . $row['post_text'] . "|Image: " . $row['post_image'] . ";";

}

    

?>