<?php


    session_start();
    require("db_connect.php");

    $adminId = $_POST['adminId'];
    $adminPassword  =md5($_POST['adminPassword']);


    $result = mysqli_query($con,
                          "SELECT *
                           FROM admin
                           WHERE adminId = '$adminId' 
                           AND adminPassword = '$adminPassword';");

    $row = mysqli_fetch_array($result);

    if($adminId == $row['adminId'] && $adminPassword == $row['adminPassword']){
        
        
        $_SESSION['user-info'] =array(
                
            'id'=>$row['adminId'],
            'name'=> $row['adminName'],
            'email' => $row['adminEmail'],
            'phone' => $row['adminPhone']
        
        );
        
        if($adminId!=""){
            $_SESSION['log-status'] = true;
            $_SESSION['type'] = "admin";
        }else{
            $_SESSION['log-status'] = false;
        }
        
        
        header("Location: ../add_student.php");
            
    }else{
        header("Location: ../admin_login.php?m=f#login-area");
    }
    

    

?>