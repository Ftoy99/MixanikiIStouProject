<?php
include_once("connect.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('../PhpMailer/Exception.php');
require_once('../PhpMailer/PHPMailer.php');
require_once('../PhpMailer/SMTP.php');

//Stoixia GMAIL
$smtpUsername = 'srsproject2021@gmail.com';
$smtpPassword = 'SrSProject2021!';

$userEmail = $_POST['email'];
//if it exists
$result = mysqli_query($con, 'SELECT * FROM accounts WHERE Email="' . $userEmail . '";');

if (mysqli_num_rows($result) > 0) {
    //Create new password here . 
    echo "Account Exists";
    echo "<br>";
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+{}:"|<>?';
    $charactersLength = strlen($characters);
    $newPass = '';
    for ($i = 0; $i < 16; $i++) {
        $newPass .= $characters[rand(0, $charactersLength - 1)];
    }

    $newHash = hash("sha256", $newPass);
    echo "New pass:";
    echo $newPass;
    echo "<br>";
    echo "New hash:";
    echo $newHash;
    echo "<br>";
    $result2 = mysqli_query($con, 'UPDATE accounts SET Password="'.$newHash.'" WHERE Email="'.$userEmail.'";');
    echo "<br>";
    echo "Result of Code Update:";
    echo $result2;







    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUsername;
    $mail->Password = $smtpPassword;

    $mail->setFrom($smtpUsername, 'Student Record System 2021');
    $mail->addAddress($userEmail); // to who to send
    $mail->Subject = 'SRS Password Reset';
    $mail->msgHTML('<p>Your Password Has Been Reset, New password Is : </p></br></br><p><b>' . $newPass . '</b></p>');
    $mail->AltBody = 'HTML messaging not supported';

    $mail->send();
    //Say Nothing go to index.
    header("Location: ../index.php");
} else {
    //Say Nothing go to index.
    header("Location: ../index.php");
}
