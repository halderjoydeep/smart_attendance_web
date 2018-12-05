<?php

require("db_connect.php");
session_start();

$teacherName = $_POST['teacherName'];
$teacherEmail = $_POST['teacherEmail'];
$teacherPhone = $_POST['teacherPhone'];
$teacherPassword = md5($_POST['teacherPassword']);


$result = mysqli_query($con,
                      "INSERT INTO teacher (teacherName,teacherEmail,teacherPhone,teacherPassword) 
                       VALUES ('$teacherName','$teacherEmail','$teacherPhone','$teacherPassword');");
    
    
if($result){
    $result = mysqli_query($con,
                           "SELECT teacherId 
                           FROM teacher 
                           WHERE teacherEmail = '$teacherEmail';");

    $row = mysqli_fetch_array($result);
    
    $_SESSION['teacherId'] = $row['teacherId'];
    
    
    header("Location: ../add_teacher.php?m=success#login-area");
    
}else{
    
    $result = mysqli_query($con,
                          "SELECT teacherEmail,teacherId
                          FROM teacher
                          WHERE teacherEmail = '$teacherEmail';");

    $row = mysqli_fetch_array($result);
    
    if($teacherEmail == $row['teacherEmail']){
        header("Location: ../add_teacher.php?m=exist#login-area");
        $_SESSION['teacherId'] = $row['teacherId'];
    }else{
        header("Location: ../add_teacher.php?m=fail#login-area");
    }
    
    
}


?>