<?php
include_once('connect.php');
session_start();

$answer_input = $_POST["answer"];
$answer = strip_tags($answer_input);
$qid = $_POST["id"];
$answerdby = $_SESSION["UserID"];

//Query
$stmt = mysqli_prepare($con, "UPDATE `questions` SET `Answer`=?,`AnsweredBy`=? WHERE `QuestionID`=?");
mysqli_stmt_bind_param($stmt, 'sii', $answer,$answerdby,$qid);
if (mysqli_stmt_execute($stmt)){
    echo "TRUE";
}else{
    echo $sql;
}