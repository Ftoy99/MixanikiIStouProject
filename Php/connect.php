<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'cei326');
 
/* Attempt to connect to MySQL database */
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME,3306);
 
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else{
//echo "<script type='text/javascript'>alert('Connected To DB');</script>";
}
return $con;
?>