<?php
include_once('connect.php');

$title = $_POST["title"];
$date = $_POST["date"];
$stime = $_POST["stime"];
$etime = $_POST["etime"];
$teacherid = $_POST["teacherid"];
$date = date("Y/m/d", strtotime($date));
$sql = "INSERT INTO `lectures`(`Title`, `Date`, `TimeS`, `TimeE`, `Lecturer`) VALUES ('$title','$date','$stime','$etime','$teacherid');";

if (mysqli_query($con,$sql)){
    echo "TRUE";
}else{
    echo $sql;
}

