<?php
include_once('connect.php');
session_start();

$lectureID = $_POST["id"];
$userID = $_SESSION["UserID"];
$date = date("Y-m-d", strtotime($_POST["date"]));
$timeStart = date('g:ia', strtotime($_POST["timeStart"]));
$timeEnd = date('g:ia', strtotime($_POST["timeEnd"]));

$dupquery = "SELECT LectureID FROM participations WHERE AccountID = '$userID'";
$dupresult = mysqli_query($con,$dupquery);
{
    $flag = 0;
    while($row = mysqli_fetch_assoc($dupresult))
    {
        if($row["LectureID"] == $lectureID)
        {
            $flag = 1;
        }
    }
}

if ($flag == 1)
{
    echo "You have already enrolled for this lecture.";
} 
else
{
    //$timequery = "SELECT LectureID FROM participations NATURAL JOIN lectures as L WHERE AccountID = '$userID'";
    //$timeresult = mysqli_query($con,$timequery);
    //if(mysqli_num_rows ($timeresult) > 0)
    //{
        //echo "This lecture coincides with a lecture you have already enrolled for.";
    //}
    //else
    //{
        $sql = "INSERT INTO participations(LectureID, AccountID) VALUES ('$lectureID','$userID')";
        if (mysqli_query($con,$sql)){
            echo "TRUE";
        }else{
            echo $sql;
        }
    //}
}
?>
