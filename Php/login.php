<?php
    session_start();
    include("connect.php");
    unset($_SESSION["email"]);
    $email = $_POST["email"];
    $_SESSION["email"] = $email;
    $password = $_POST["password"];
    //Query
    $query = mysqli_query($con, "SELECT * FROM accounts WHERE email='$email'");
    //IF result Do Stuff with them
    
    if (mysqli_num_rows($query) == 1) {

        $row = mysqli_fetch_row($query);
        $dbpass = $row[3];
        $password = hash('sha256', $password);
        //if passwords match.
        if ($password == $dbpass) {
            if ($row[4]==0){
                $_SESSION['UserID'] = $row[0];
                $_SESSION['Name'] = $row[2];
                header('Location: ../Student/dashboard.php');

            }
            if ($row[4]==1){
                $_SESSION['UserID'] = $row[0];
                $_SESSION['Name'] = $row[2];
                header('Location: ../Lecturer/dashboard.php');

            }

            if ($row[4]==2){
                $_SESSION['UserID'] = $row[0];
                $_SESSION['Name'] = $row[2];
                header('Location: ../Admin/dashboard.php');

            }


        } else {
            $_SESSION['LoginError'] = "1";
            header('Location: ../index.php');
        }
    } else {
        $_SESSION['LoginError'] = "2";
        header('Location: ../index.php');
    }
