<?php
session_start();

include('DBconnection.php');

//include('wideimage/WideImage.php');
require('wideimage/WideImage.php');


//checking connection
if(mysqli_connect_errno())
{
    echo "1: Connection failed";
    exit();
}
/***************/

if($_POST){
    $post_text = $_POST["posttext"];
    $post_username = $_POST["username"];
    $ignoreImage = 0;

    $query =  "Select * from users WHERE user_name='".$post_username."'";
    echo $query;


    if($ignoreImage != 1){
        /*
        $imageName = $_FILES['postimage']['name'];

        $imageName = uniqid() . "_" . $imageName;

        $image = WideImage::load('postimage');

        $image -> saveToFile("UploadImages/" .$imageName);
        */
        //select userid query
        $useridquery =  mysqli_query($DB_connection, "SELECT user_id FROM users WHERE user_name = '$post_username'") or die('ERROR: SQL query problem' . mysqli_error($DB_connection));
        $row = mysqli_fetch_assoc($useridquery);
        $userid = $row['user_id'];
        //insert post query
        $postsquery = mysqli_query($DB_connection, "INSERT INTO posts (post_text, post_image, post_date, fk_user_id) VALUES('$post_text', '30590797_946679478834376_6124683747041214464_n.jpg', CURRENT_TIMESTAMP, $userid)") or die('ERROR: SQL query problem' . mysqli_error($DB_connection));
        $querystring = "INSERT INTO posts (post_text, post_image, post_date, fk_user_id) VALUES('$post_text', '30590797_946679478834376_6124683747041214464_n.jpg', CURRENT_TIMESTAMP, $userid)";
        echo $querystring;
    }
}

?>