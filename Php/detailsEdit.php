<?php
session_start();
include_once('connect.php');

$id = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];
//Query
$stmt = mysqli_prepare($con, "UPDATE accounts SET Name = ?, Email = ? WHERE AccountID = ?;");
mysqli_stmt_bind_param($stmt, 'ssd', $name, $email, $id);

if (mysqli_stmt_execute($stmt)) {
    echo "TRUE";
} else {
    echo $sql;
}
