<?php
    session_start();
    include("connect.php");
    $email     = $_POST["email"];
    $password      = $_POST["password"];
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
                header('Location: ../Student/dashboard.html');
            }
            if ($row[4]==1){
                header('Location: ../Lecturer/dashboard.html');
            }

            if ($row[4]==2){
                header('Location: ../Secretary/dashboard.html');
            }


        } else {
            $_SESSION['LoginError'] = "1";
            header('Location: ../index.php');
        }
    } else {
        $_SESSION['LoginError'] = "2";
        header('Location: ../index.php');
    }
