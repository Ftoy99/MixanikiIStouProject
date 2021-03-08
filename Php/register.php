<?php
include_once("connect.php");
session_start();

$email     = $_POST["email"];
$password      = $_POST["password"];
$password2     = $_POST["password2"];


if ($password = $password2) {
    $password = hash("sha256",$password);
    //the querry
    $sql = "INSERT INTO accounts (Email,Password,Type) VALUES ('$email' , '$password', 0)";
    
    //do the query check for error
    if (mysqli_query($con, $sql)) {
        echo "New record created successfully";
        //header('Location: ../index.html');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

?>
