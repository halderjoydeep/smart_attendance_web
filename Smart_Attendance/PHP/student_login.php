<?php



    // Designed by Joydeep Halder.
    require("db_connect.php");

    $studentRoll = $_POST['studentRoll'];
    $studentPassword  = md5($_POST['studentPassword']);


    $result = mysqli_query($con,
                          "SELECT *
                          FROM student
                          WHERE studentRoll = '$studentRoll' AND studentPassword = '$studentPassword';");
    $row = mysqli_fetch_array($result);

    if($studentRoll == $row['studentRoll'] && $studentPassword == $row['studentPassword']){

            session_start();

            $_SESSION['user-info'] =array(
                
            'roll'=>$row['studentRoll'],
            'name'=> $row['studentName'],
            'email' => $row['studentEmail'],
            'phone' => $row['studentPhone']
        
        );
        
        if($studentRoll!=""){
            $_SESSION['log-status'] = true;
            $_SESSION['type'] = "student";
        }else{
            $_SESSION['log-status'] = false;
        }


            header("Location: ../student_view_attendance.php");
    }else{
        header("Location: ../index.php?m=f#login-area");
    }

?>
