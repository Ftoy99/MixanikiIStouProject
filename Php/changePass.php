<?php
include_once('connect.php');
session_start();

$pass = $_POST["pass"];
$input = $_POST["newpass"];
$new = strip_tags($input);
$user = $_SESSION["UserID"];
if ($pass==""){
    echo 3;
    exit();
}
if($row=mysqli_fetch_assoc(mysqli_query($con,'SELECT * FROM `accounts` WHERE `AccountID`="'.$user.'"'))){

if ($row["Password"]==hash("sha256", $pass)){
    $new = hash("sha256", $new);
    $sql = 'UPDATE `accounts` SET `Password`="'.$new.'" WHERE `AccountID`="'.$user.'";';
    if (mysqli_query($con,$sql)){
        echo "1";
    }else{
        echo $sql;
    }

}else {
    echo 2;
}
}else{
    echo "SQL 1 PROBLEM";
}










