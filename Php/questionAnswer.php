<?php
include_once('connect.php');
session_start();

$answer = $_POST["answer"];
$qid = $_POST["id"];
$answerdby = $_SESSION["UserID"];

$sql = 'UPDATE `questions` SET `Answer`="'.$answer.'",`AnsweredBy`="'.$answerdby.'" WHERE `QuestionID`="'.$qid.'";';

if (mysqli_query($con,$sql)){
    echo "TRUE";
}else{
    echo $sql;
}

