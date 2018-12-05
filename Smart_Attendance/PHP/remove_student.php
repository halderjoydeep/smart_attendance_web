<?php

require("db_connect.php");

session_start();
$studentRoll = $_POST['studentRoll'];
$teacherPassword = md5($_POST['teacherPassword']);
$subjectCode = $_POST['subjectCode'];
$teacherId = $_SESSION['user-info']['id'];

$result = mysqli_query($con,
                        "SELECT teacherPassword
                        FROM teacher
                        WHERE teacherId = '$teacherId';");

$row = mysqli_fetch_array($result);

if($teacherPassword == $row['teacherPassword']){
    $result = mysqli_query($con,
                            "SELECT studentRoll
                            FROM subject_register
                            WHERE studentRoll = '$studentRoll' AND subjectCode = '$subjectCode';");

    $row = mysqli_fetch_array($result);


    if($studentRoll == $row['studentRoll']){
            $result = mysqli_query($con,
                        "DELETE FROM subject_register
                        WHERE studentRoll = '$studentRoll' 
                        AND subjectCode = '$subjectCode';");
            $result_1 = mysqli_query($con,
                                    "ALTER TABLE $subjectCode
                                    DROP COLUMN $studentRoll");

            if($result && $result_1){
                header("Location: ../remove_student.php?m=success#login-area");
            }else{
                header("Location: ../remove_student.php?m=fail#login-area");
            }

            
    }else{
        header("Location: ../remove_student.php?m=stnot#login-area");
    }


}else{
    header("Location: ../remove_student.php?m=pnot#login-area");
}
?>