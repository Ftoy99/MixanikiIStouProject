<?php
session_start();
include_once('connect.php');

$id = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$type = $_POST["permissions"];

$sql = "UPDATE accounts SET Name = '$name', Email = '$email', Type = '$type' WHERE AccountID = '$id';";

if (mysqli_query($con,$sql)){
    echo "TRUE";
}else{
    echo $sql;
}
