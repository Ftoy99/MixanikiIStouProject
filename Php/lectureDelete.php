<?php
include_once('connect.php');

$id = $_POST["id"];

$stmt = mysqli_prepare($con, "DELETE FROM `lectures` WHERE `LectureID`=?");
mysqli_stmt_bind_param($stmt, 'i', $id);


if (mysqli_stmt_execute($stmt)) {
    echo "TRUE";
} else {
    //echo $sql;
    echo $sql;
}


