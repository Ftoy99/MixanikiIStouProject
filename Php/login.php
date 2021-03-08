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
        $dbpass = $row[2];
        $password = hash('sha256', $password);
        //if passwords match.
        if ($password == $dbpass) {
            if ($row[3]==0){
                header('Location: ../Student/dashboard.html');
            }
            if ($row[3]==1){
                header('Location:   ../Lecturer/dashboard.html');
            }

            if ($row[3]==2){
                header('Location: ../Secretary/dashboard.html');
            }


        } else {
            echo "Wrong Pass";
        }
    } else {

        echo "Account Dosent Exist";
    }
?>