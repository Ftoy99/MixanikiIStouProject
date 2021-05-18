<?php
include_once('connect.php');

$title = $_POST["title"];
$date = $_POST["date"];
$stime = $_POST["stime"];
$etime = $_POST["etime"];
$teacherid = $_POST["teacherid"];

$name=mysqli_fetch_assoc(mysqli_query($con,'SELECT `Name`FROM `accounts` WHERE `AccountID`="'.$teacherid.'"'))["Name"];
$date = date("Y/m/d", strtotime($date));
$stmt = mysqli_prepare($con, "INSERT INTO `lectures`(`Title`, `Date`, `TimeS`, `TimeE`, `Lecturer`, `LecturerName`) VALUES (?,?,?,?,?,?)");
mysqli_stmt_bind_param($stmt, 'ssssis', $title,$date, $stime,$etime, $teacherid, $name);


if (mysqli_stmt_execute($stmt)){
    echo "TRUE";
}else{
    echo $stmt;
}

