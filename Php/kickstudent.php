<?php
include_once('connect.php');

$student = $_POST["student"];
$lecture = $_POST["lecture"];


$stmt = mysqli_prepare($con, "DELETE FROM `participations` WHERE `LectureID`=? AND `AccountID`=?");
mysqli_stmt_bind_param($stmt, 'ii', $lecture,$student);

if (mysqli_stmt_execute($stmt)) {
    echo "TRUE";
} else {
    echo $sql;

}
