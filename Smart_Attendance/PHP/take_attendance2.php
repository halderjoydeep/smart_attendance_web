<?php

require("db_connect.php");


session_start();
$subjectCode= $_SESSION['subjectCode'];
$Date = $_SESSION['Date'];
$student_array = $_SESSION['student_array'];

if(!empty($_SESSION['multiple'])){
  $multiple = $_SESSION['multiple'];
}


$result = mysqli_query($con,
                          "SELECT Date
                          FROM $subjectCode
                          WHERE Date = '$Date';");
$row = mysqli_fetch_array($result);
    
if($Date == $row['Date'] && $multiple != "yes"){
        header("Location: ../take_attendance.php?m=exist#attendance-area");
}else{
    $student_presence_array = array();

    for($i=0;$i<count($student_array);$i++){
        $student_presence_array[$i] = $_POST[$student_array[$i]];
    }


    $str2 = implode(",",$student_array);
    $str = implode("','",$student_presence_array);



    $result = mysqli_query($con,
                           "INSERT INTO $subjectCode (Date,$str2)
                            VALUES ('$Date','$str');");

    if($result){
      $_SESSION['multiple'] = "no";
        header("Location: ../take_attendance.php?m=success#attendance-area");
    }else{
        header("Location: ../take_attendance.php?m=fail#attendance-area");
    }
}


?>