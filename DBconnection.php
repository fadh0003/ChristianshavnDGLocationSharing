<?php
require('vendor/autoload.php');

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$conn = mysqli_connect($server, $username, $password, $db);

$DB_connection = $conn;

/*establishing the connection to the database*/
/*$host = "localhost";
$user = "root";
$password = "";
$database = "hashpasslogin";

$DB_connection = mysqli_connect($host, $user, $password, $database);*/
/*********************************************/

/* her sætter jeg min character på databasen til at være danks*/
mysqli_query($DB_connection, "SET NAMES utf8");
?>