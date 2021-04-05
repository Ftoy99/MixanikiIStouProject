<?php
include_once('connect.php');

$id = $_POST["id"];
$sql = 'DELETE FROM `lectures` WHERE `LectureID`="' . $id . '";';
if (mysqli_query($con, $sql)) {
    echo "TRUE";
} else {
    //echo $sql;
    echo $sql;
}
