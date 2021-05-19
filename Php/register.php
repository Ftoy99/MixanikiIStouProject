<?php
include_once("connect.php");
session_start();

$email         = $_POST["email"];
$name_input     = $_POST["name"];
$name  = strip_tags($name_input);
$password   = $_POST["password"];
$password2 = $_POST["password2"];
//Error Checks
if ($email == "") {
    //Email Empty Exists Error = 3 .
    $_SESSION['RegisterError'] = "3";
    header('Location: ../register.php');
    exit();
}
if ($name == "") {
    //Email Empty Exists Error = 4 .
    $_SESSION['RegisterError'] = "4";
    header('Location: ../register.php');
    exit();
}
if (strlen($password)< 5) {
    //Email Empty Exists Error = 4 .
    $_SESSION['RegisterError'] = "5";
    header('Location: ../register.php');
    exit();
}

if ($password == $password2) {
    $password = hash("sha256", $password);

    //check if email dosent exist . 
    $stmt = mysqli_prepare($con, "SELECT * FROM accounts WHERE email=?");
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    //IF result Do Stuff with them
    if (mysqli_stmt_num_rows($stmt) == 0) {
        //Create ACC QRY
        $stmt = mysqli_prepare($con, "INSERT INTO accounts (Email,Name,Password,Type) VALUES (?,?,?, 0)");
        mysqli_stmt_bind_param($stmt, 'sss', $email, $name, $password);

        //Error Or Succsess MSGS
        if (mysqli_stmt_execute($stmt)) {
            echo "New record created successfully";
            header('Location: ../index.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    } else {
        //Email Already Exists Error = 2 .
        $_SESSION['RegisterError'] = "2";
        header('Location: ../register.php');
        exit();
    }
} else {
    //Passwords Dont Match Error = 1 .
    $_SESSION['RegisterError'] = "1";
    header('Location: ../register.php');
    exit();
}
