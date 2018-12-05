<?php


require("db_connect.php");

session_start();
$studentRoll = $_SESSION['user-info']['roll'];


$subjectCode = $_POST['subjectCode'];


$result = mysqli_query($con,
                      "SELECT studentRoll,subjectCode 
                      FROM subject_register 
                      WHERE subjectCode = '$subjectCode' 
                      AND studentRoll = '$studentRoll';");

$row = mysqli_fetch_array($result);


if($subjectCode == $row['subjectCode']){
	$result = mysqli_query($con,"SELECT count($studentRoll) as totalAttendance
                                  FROM $subjectCode
                                  WHERE $studentRoll = 'present';");
    $row = mysqli_fetch_array($result);

    $result_1 = mysqli_query($con,
                              "SELECT COUNT(Date) as totalClass 
                              FROM $subjectCode;");
    $row_1 = mysqli_fetch_array($result_1);


    if($row['totalAttendance']!=0 && $row_1['totalClass']!=0){
                    $percentage = ($row['totalAttendance']/$row_1['totalClass'])*100;
    }else{
          $percentage = 0;
    }

    $_SESSION['totalClass'] = $row_1['totalClass'];
    $_SESSION['totalAttendance'] = $row['totalAttendance'];
    $_SESSION['percentage'] = $percentage;
    $_SESSION['subjectCode'] = $subjectCode;


    header("Location: ../student_view_attendance2.php#profile-area");

}else{
	header("Location: ../student_view_attendance.php?m=sbnot#student-view-attendance");
}


?>