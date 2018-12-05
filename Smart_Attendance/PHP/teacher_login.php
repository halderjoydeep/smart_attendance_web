<?php


    session_start();
    require("db_connect.php");

    $teacherId = $_POST['teacherId'];
    $teacherPassword  = md5($_POST['teacherPassword']);


    $result = mysqli_query($con,
                          "SELECT *
                          FROM teacher
                          WHERE teacherId = '$teacherId' AND teacherPassword = '$teacherPassword';");
    $row = mysqli_fetch_array($result);

    if($teacherId == $row['teacherId']){
        
        
        $_SESSION['user-info'] =array(
                
            'id'=>$row['teacherId'],
            'name'=> $row['teacherName'],
            'email' => $row['teacherEmail'],
            'phone' => $row['teacherPhone']
        
        );
        
        if($teacherId!=""){
            $_SESSION['log-status'] = true;
            $_SESSION['type'] = "teacher";
        }else{
            $_SESSION['log-status'] = false;
        }
        
        
        
        header("Location: ../enroll_student.php");
            
    }else{
        header("Location: ../teacher_login.php?m=f#login-area");
    }
    

    

?>