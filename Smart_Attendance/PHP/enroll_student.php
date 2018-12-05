<?php


// Designed by Joydeep Halder.
require("db_connect.php");

session_start();
$subjectCode = $_POST['subjectCode'];
$studentRoll = $_POST['studentRoll'];
$teacherId = $_SESSION['user-info']['id'];



    
    $result = mysqli_query($con,
                           "SELECT studentRoll 
                            FROM student 
                            WHERE studentRoll = '$studentRoll';");
    $row = mysqli_fetch_array($result);

    if($studentRoll == $row['studentRoll']){
        
        
            
            $result = mysqli_query($con,
                                  "SELECT teacherId, subjectCode
                                   FROM subject
                                   WHERE teacherId = '$teacherId' AND subjectCode = '$subjectCode';");
            $row = mysqli_fetch_array($result);
            if($subjectCode == $row['subjectCode']){
                
                $result = mysqli_query($con,
                                   "SELECT * 
                                   FROM subject_register 
                                   WHERE subjectCode = '$subjectCode' 
                                   AND studentRoll = '$studentRoll';");
            
                $row = mysqli_fetch_array($result);
            
                if($row['subjectCode']==$subjectCode && $row['studentRoll']==$studentRoll){
                    header("Location: ../enroll_student.php?m=exist#login-area");
                }else{
                    $result = mysqli_query($con,
                                          "INSERT INTO subject_register
                                           VALUES ('$subjectCode','$studentRoll');");

                    $result_1 = mysqli_query($con,
                                          "ALTER TABLE $subjectCode 
                                          ADD $studentRoll varchar(20);");

                    if($result && $result_1){
                        header("Location: ../enroll_student.php?m=success#login-area");
                    }else{
                        header("Location: ../enroll_student.php?m=fail#login-area");
                    }
                }
            }else{
                header("Location: ../enroll_student.php?m=sbnot#login-area");
            }
            
            
    }else{
        header("Location: ../enroll_student.php?m=stnot#login-area");
    }
    
    

?>