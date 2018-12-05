<?php

require("db_connect.php");


$studentName = $_POST['studentName'];
$studentRoll = $_POST['studentRoll'];
$studentEmail = $_POST['studentEmail'];
$studentPhone = $_POST['studentPhone'];
$studentPassword = md5($_POST['studentPassword']);


$result = mysqli_query($con,
                        "INSERT INTO student (studentName,studentRoll,studentEmail,studentPhone,studentPassword) 
                         VALUES ('$studentName','$studentRoll','$studentEmail','$studentPhone','$studentPassword');");
if($result){
    header("Location: ../add_student.php?m=success#login-area");
}else{

    $result = mysqli_query($con,
                          "SELECT studentRoll
                           FROM student
                           WHERE studentRoll = '$studentRoll';");

    $row = mysqli_fetch_array($result);

    if($row['studentRoll'] == $studentRoll){
        header("Location: ../add_student.php?m=stexist#login-area");
    }else{

         $result = mysqli_query($con,
                                "SELECT studentEmail
                                 FROM student
                                 WHERE studentEmail = '$studentEmail';");

          $row = mysqli_fetch_array($result);

          if($studentEmail == $row['studentEmail']){
              header("Location: ../add_student.php?m=emlexist#login-area");
          }else{
              header("Location: ../add_student.php?m=fail#login-area");
          }
        
    }
}


?>
