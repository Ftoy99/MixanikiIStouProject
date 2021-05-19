<?php
include_once('connect.php');

$title_input = $_POST["title"];
$title = strip_tags($title_input);
$date = $_POST["date"];
$stime = $_POST["stime"];
$etime = $_POST["etime"];
$id = $_POST["id"];
$date = date("Y/m/d", strtotime($date));
$stmt = mysqli_prepare($con, "UPDATE `lectures` SET `Title`=?,`Date`=?,`TimeS`=?,`TimeE`=? WHERE `LectureID`=?");
mysqli_stmt_bind_param($stmt, 'ssssi', $title,$date,$stime,$etime,$id);
if (mysqli_stmt_execute($stmt)){
    echo "TRUE";
}else{
    echo $sql;
}

