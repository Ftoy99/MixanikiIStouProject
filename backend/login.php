<?php
session_start();
include("connect.php");
//Get Data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email     = $_POST["email"];
    $password      = $_POST["password"];
    //Query DB
    $query = mysqli_query($con, "SELECT * FROM accounts WHERE email='$email'");
    //IF result Do Stuff with them
    if (mysqli_num_rows($query) == 1) {
        $row = mysqli_fetch_row($query);
        /*
        echo $row[3];
        echo "<br>";
        echo $row[4];
        echo "<br>";
        echo $row[5];
        echo "<br>";
        */

        $dbpass = $row[4];
        $password = hash('sha256', $password);
        /* Password check if hash works
        echo $dbpass;
        echo "<br>";
        echo $password;
        */
        //if password match do the if
        //else if wrong password
        if ($password == $dbpass) {
            if ($row[5]==0){
                header('Location: ../Student/student.html');
            }
            if ($row[5]==1){
                header('Location:   ../Lecturer/lecturer.html');
            }

            if ($row[5]==2){
                header('Location: ../Secretary/secretary.html');
            }


        }
        else{
        header('Location: ../Secretary/secretary.html');
        exit;
        
        

        }
    }
    //IF query Didnt FInd Results
    else {
        header('Location: ../index.php?error=1');
    }
}
