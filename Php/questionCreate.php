<?php
include_once('connect.php');
session_start();

$title = $_POST["title"];
$description = $_POST["description"];
$id = $_POST["id"];

$stmt = mysqli_prepare($con, "INSERT INTO questions(Title,Description,AskedBy) VALUES (?,?,?);");
mysqli_stmt_bind_param($stmt, 'ssi', $title,$description,$id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_query($con,$sql)){
    echo "TRUE";
}else{
    echo $sql;
}