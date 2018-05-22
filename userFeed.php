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
/***************/
    $userpostquery = "SELECT * FROM posts INNER JOIN users on posts.fk_user_id=users.user_id";
    $fetchuserpost = mysqli_query($DB_connection, $userpostquery);
    
    //$row = mysqli_fetch_assoc($fetchuserpost); 
    while($row = mysqli_fetch_assoc($fetchuserpost)){ 
        
        echo $row['user_name'];
        echo $row['post_image'];
        echo $row['post_text'];
    }
?>