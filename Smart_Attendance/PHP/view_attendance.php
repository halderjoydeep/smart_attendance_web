<?php


require("db_connect.php");


$subjectCode = $_POST['subjectCode'];

session_start();

$teacherId = $_SESSION['user-info']['id'];

$result = mysqli_query($con,"SELECT subjectCode,teacherId 
                              FROM subject
                              WHERE subjectCode = '$subjectCode' 
                              AND teacherId = '$teacherId';");

$row = mysqli_fetch_array($result);

if($teacherId == $row['teacherId']){

  if(!empty($_POST['studentRoll'])){

    $studentRoll = $_POST['studentRoll'];

      $result = mysqli_query($con,"SELECT studentRoll 
                                FROM subject_register
                                WHERE studentRoll = '$studentRoll' 
                                AND subjectCode = '$subjectCode';");

    $row = mysqli_fetch_array($result);

    if($studentRoll == $row['studentRoll']){

      $result = mysqli_query($con,"SELECT COUNT($studentRoll) AS totalAttendance
                                    FROM $subjectCode
                                    WHERE $studentRoll = 'present';");
      $row = mysqli_fetch_array($result);

      $result_1 = mysqli_query($con,
                                "SELECT COUNT(Date) AS totalClass 
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
      $_SESSION['studentRoll'] = $studentRoll;
      $_SESSION['subjectCode'] = $subjectCode;


      $result = mysqli_query($con,
                              "SELECT studentName,studentPhone,studentEmail 
                              FROM student 
                              WHERE studentRoll='$studentRoll';");

      $row = mysqli_fetch_array($result);

      $_SESSION['studentName'] = $row['studentName'];
      $_SESSION['studentPhone'] = $row['studentPhone'];
      $_SESSION['studentEmail'] = $row['studentEmail'];

      header("Location: ../teacher_view_attendance.php#profile-area");


    }else{
      header("Location: ../teacher_attendance.php?s=stnot#teacher-view-attendance");
    }
  }else{

    $_SESSION['subjectCode'] = $subjectCode;

    header("Location: ../view_entire_attendance.php?#attendance-area");
  }



}else{
  header("Location: ../teacher_attendance.php?s=sbnot#teacher-view-attendance");
}



              
        
        
?>