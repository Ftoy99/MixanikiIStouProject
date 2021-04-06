<?php
include_once('connect.php');

$title = $_POST["title"];
$date = $_POST["date"];
$stime = $_POST["stime"];
$etime = $_POST["etime"];
$id = $_POST["id"];
$date = date("Y/m/d", strtotime($date));
$sql = 'UPDATE `lectures` SET `Title`="'.$title.'",`Date`="'.$date.'",`TimeS`="'.$stime.'",`TimeE`="'.$etime.'" WHERE `LectureID`='.$id.';';

if (mysqli_query($con,$sql)){
    echo "TRUE";
}else{
    echo $sql;
}

