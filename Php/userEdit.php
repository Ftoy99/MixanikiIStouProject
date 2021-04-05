<?php
session_start();
include_once('connect.php');

$name = $_POST["name"];
$email = $_POST["email"];
$id = $_SESSION['userID'];
$sql = "UPDATE `accounts`(`Name`, `Email`) SET ('$name','$email') WHERE AccountID = $id;";

if (mysqli_query($con,$sql)){
    echo "TRUE";
}else{
    echo $sql;
}
