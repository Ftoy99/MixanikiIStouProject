<?php
include_once("connect.php");
session_start();

$email         = $_POST["email"];
$name          = $_POST["name"];
$password      = $_POST["password"];
$password2     = $_POST["password2"];



if ($password == $password2) {
    $password = hash("sha256", $password);
    //check if email dosent exist . 

    $query = mysqli_query($con, "SELECT * FROM accounts WHERE email='$email'");
    //IF result Do Stuff with them
    if (mysqli_num_rows($query) == 0) {
        $sql = "INSERT INTO accounts (Email,Name,Password,Type) VALUES ('$email' ,'$name' ,'$password', 0)";
        if (mysqli_query($con, $sql)) {
            echo "New record created successfully";
            header('Location: ../index.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    } else {
        //Email Already Exists Error = 2 .
        $_SESSION['RegisterError'] = "2";
        header('Location: ../register.php');

    }

}else {
    //Passwords Dont Match Error = 1 .
    $_SESSION['RegisterError'] = "1";
    header('Location: ../register.php');
}

?>