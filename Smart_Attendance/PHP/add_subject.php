<?php

require("db_connect.php");

$subjectCode = $_POST['subjectCode'];
$subjectName = $_POST['subjectName'];
$teacherId = $_POST['teacherId'];

$result = mysqli_query($con,
                      "SELECT teacherId
                      FROM teacher
                      WHERE teacherId = '$teacherId';");

$row = mysqli_fetch_array($result);

if($teacherId == $row['teacherId']){
    $result = mysqli_query($con,
                            "INSERT INTO subject (subjectCode,subjectName,teacherId) 
                             VALUES ('$subjectCode','$subjectName','$teacherId');");
    if($result){

        mysqli_query($con,
                    "CREATE TABLE $subjectCode
                    (Date date);");

        header("Location: ../add_subject.php?m=success#login-area");
    }else{

        $result = mysqli_query($con,
                              "SELECT subjectCode
                              FROM subject
                              WHERE subjectCode = '$subjectCode';");
        $row = mysqli_fetch_array($result);

        if($subjectCode == $row['subjectCode']){
            header("Location: ../add_subject.php?m=scexist#login-area");
        }else{
            $result = mysqli_query($con,
                              "SELECT subjectName
                              FROM subject
                              WHERE subjectName = '$subjectName';");
            $row = mysqli_fetch_array($result);
            
            if($subjectName == $row['subjectName']){
                header("Location: ../add_subject.php?m=snexist#login-area");
            }else{
                 header("Location: ../add_subject.php?m=fail#login-area");
            }
            
            
           
        }
    }

}else{
    header("Location: ../add_subject.php?m=notexist#login-area");
}


?>
