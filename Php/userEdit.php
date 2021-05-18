<?php
session_start();
include_once('connect.php');

$id = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$type = $_POST["permissions"];

$stmt = mysqli_prepare($con, "UPDATE accounts SET Name = ?, Email = ?, Type = ? WHERE AccountID = ?;");
mysqli_stmt_bind_param($stmt, 'ssii', $name,$email,$type,$id);
if (mysqli_stmt_execute($stmt)){
    echo "TRUE";
}else{
    echo $sql;
}
