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
    if($_POST){
        $post_text = $_POST["posttext"];
        $post_username = $_POST["username"];
        $ignoreImage = 0;
    
        /*$query =  "Select * from users WHERE user_name='".$post_username."'";
        echo $query;*/
    
    
        if($ignoreImage != 1){
    
    
            $imageName = $_FILES['postimage']['name'];
            $imageTmpName = $_FILES['postimage']['tmp_name'];
            $imageSize = $_FILES['postimage']['size'];
            $imageError = $_FILES['postimage']['error'];
            $imageType = $_FILES['postimage']['type'];
    
            $fileExt = explode('.', $imageName); //image . jpg
    
            print_r($imageName);
    
            $fileAcualExt = strtolower(end($fileExt)); //jpg
    
            $allowed = array('jpg', 'jpeg');
            //checks if $fileAcualExt is inside $allowed array
            /*if(in_array($fileAcualExt, $allowed)){
                //if file is allowed and have no error
                if($imageError === 0){
                    $newImageName = uniqid() . "_" . $fileAcualExt;
                    $fileDestination = 'UploadImages/'.$newImageName;
                    move_uploaded_file($imageTmpName, $fileDestination);
                    echo "image uploaded";
                } else {
                    echo "There was an error upolading this file";
                }
            } else {
                //failed
                echo "You cannot upolaod this type of file";
            }*/
    
            //select userid query
            $useridquery =  mysqli_query($DB_connection, "SELECT user_id FROM users WHERE user_name = '$post_username'") or die('ERROR: SQL query problem' . mysqli_error($DB_connection));
            $row = mysqli_fetch_assoc($useridquery);
            $userid = $row['user_id'];
            //insert post query
            //$postsquery = mysqli_query($DB_connection, "INSERT INTO posts (post_text, post_image, post_date, fk_user_id) VALUES('$post_text', '30590797_946679478834376_6124683747041214464_n.jpg', CURRENT_TIMESTAMP, $userid)") or die('ERROR: SQL query problem' . mysqli_error($DB_connection));
            //$querystring = "INSERT INTO posts (post_text, post_image, post_date, fk_user_id) VALUES('$post_text', '30590797_946679478834376_6124683747041214464_n.jpg', CURRENT_TIMESTAMP, $userid)";
            //echo $querystring;
        }
    }
?>


