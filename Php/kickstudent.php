<?php
include_once('connect.php');

$student = $_POST["student"];
$lecture = $_POST["lecture"];


$sql = 'DELETE FROM `participations` WHERE `LectureID`="'.$student.'" AND `AccountID`="'.$lecture.'"';
if (mysqli_query($con, $sql)) {
    echo "TRUE";
} else {
    echo $sql;

}
