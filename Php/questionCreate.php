<?php
include_once('connect.php');
session_start();

$title = $_POST["title"];
$description = $_POST["description"];
$id = $_POST["id"];

$sql = 'INSERT INTO `questions`(`Title`, `Description`, `AskedBy`) VALUES ("'.$title.'","'.$description.'","'.$id.'");';

if (mysqli_query($con,$sql)){
    echo "TRUE";
}else{
    echo $sql;
}