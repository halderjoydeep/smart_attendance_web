<?php

require("db_connect.php");

session_start();

$teacherId = $_SESSION['user-info']['id'];
$teacherName = $_POST['teacherName'];
$teacherEmail = $_POST['teacherEmail'];
$teacherPhone = $_POST['teacherPhone'];
$teacherOldPassword = md5($_POST['teacherOldPassword']);
$teacherNewPassword = md5($_POST['teacherNewPassword']);



$result = mysqli_query($con,
                      "SELECT teacherPassword
                      FROM teacher
                      WHERE teacherId = '$teacherId';");
$row = mysqli_fetch_array($result);

if($teacherOldPassword == $row['teacherPassword']){
    $result = mysqli_query($con,
                          "UPDATE teacher
                          SET teacherPassword='$teacherNewPassword',
                          teacherName = '$teacherName', 
                          teacherEmail='$teacherEmail',
                          teacherPhone = '$teacherPhone'
                          WHERE teacherId = '$teacherId';");
    if($result){
        $result = mysqli_query($con,
                              "SELECT * FROM teacher
                              WHERE teacherId = '$teacherId';");
        $row = mysqli_fetch_array($result);
        
        $_SESSION['user-info'] =array(
                
            'id'=>$row['teacherId'],
            'name'=> $row['teacherName'],
            'email' => $row['teacherEmail'],
            'phone' => $row['teacherPhone']
        
        );
        
        header("Location: ../update_teacher_profile.php?m=success#login-area");
        
    }else{
        header("Location: ../update_teacher_profile.php?m=fail#login-area");
    }
    
}else{
    header("Location: ../update_teacher_profile.php?m=notmatch#login-area");
}

?>