<?php

require("db_connect.php");

session_start();

$studentRoll = $_SESSION['user-info']['roll'];
$studentEmail = $_POST['studentEmail'];
$studentPhone = $_POST['studentPhone'];
$studentOldPassword = md5($_POST['studentOldPassword']);
$studentNewPassword = md5($_POST['studentNewPassword']);



$result = mysqli_query($con,
                      "SELECT studentPassword
                      FROM student
                      WHERE studentRoll = '$studentRoll';");
$row = mysqli_fetch_array($result);

if($studentOldPassword == $row['studentPassword']){


  $result = mysqli_query($con,
                          "SELECT studentEmail
                          FROM student
                          WHERE studentEmail = '$studentEmail' AND studentRoll!='$studentRoll';");
  $row = mysqli_fetch_array($result);

  if($studentEmail == $row['studentEmail']){
    header("Location: ../update_student_profile.php?m=emlexist#login-area");
  }else{
    $result = mysqli_query($con,
                          "UPDATE student
                          SET studentPassword='$studentNewPassword',
                          studentEmail='$studentEmail',
                          studentPhone = '$studentPhone'
                          WHERE studentRoll = '$studentRoll';");
    if($result){
        $result = mysqli_query($con,
                              "SELECT * FROM student
                              WHERE studentRoll = '$studentRoll';");
        $row = mysqli_fetch_array($result);
        
        $_SESSION['user-info'] =array(
                
            'roll'=>$row['studentRoll'],
            'name'=> $row['studentName'],
            'email' => $row['studentEmail'],
            'phone' => $row['studentPhone']
        
        );
        
        header("Location: ../update_student_profile.php?m=success#login-area");
        
    }else{
        header("Location: ../update_student_profile.php?m=fail#login-area");
    }
  }

    
    
}else{
    header("Location: ../update_student_profile.php?m=notmatch#login-area");
}

?>