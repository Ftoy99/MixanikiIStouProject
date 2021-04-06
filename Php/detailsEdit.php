<?php
session_start();
include_once('connect.php');

$id = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];

$sql = "UPDATE accounts SET Name = '$name', Email = '$email' WHERE AccountID = '$id';";


if (mysqli_query($con,$sql)){
    echo "TRUE";
}else{
    echo $sql;
}
