<?php
session_start();
include_once('connect.php');

$id = $_POST["id"];
$name_input = $_POST["name"];
$name = strip_tags($name_input);
$email_input = $_POST["email"];
$email = strip_tags($email_input);
$type_input = $_POST["permissions"];
$type = strip_tags($type_input);

$stmt = mysqli_prepare($con, "UPDATE accounts SET Name = ?, Email = ?, Type = ? WHERE AccountID = ?;");
mysqli_stmt_bind_param($stmt, 'ssii', $name,$email,$type,$id);
if (mysqli_stmt_execute($stmt)){
    echo "TRUE";
}else{
    echo $sql;
}
