<?php

require("db_connect.php");

session_start();

$adminId = $_SESSION['user-info']['id'];
$adminName = $_POST['adminName'];
$adminEmail = $_POST['adminEmail'];
$adminPhone = $_POST['adminPhone'];
$adminOldPassword = md5($_POST['adminOldPassword']);
$adminNewPassword = md5($_POST['adminNewPassword']);



$result = mysqli_query($con,
                      "SELECT adminPassword
                      FROM admin
                      WHERE adminId = '$adminId';");
$row = mysqli_fetch_array($result);

if($adminOldPassword == $row['adminPassword']){
    $result = mysqli_query($con,
                          "UPDATE admin
                          SET adminPassword='$adminNewPassword',
                          adminName = '$adminName', adminEmail='$adminEmail',
                          adminPhone = '$adminPhone'
                          WHERE adminId = '$adminId';");
    if($result){
        $result = mysqli_query($con,
                              "SELECT * FROM admin
                              WHERE adminId = '$adminId';");
        $row = mysqli_fetch_array($result);
        
        $_SESSION['user-info'] =array(
                
            'id'=>$row['adminId'],
            'name'=> $row['adminName'],
            'email' => $row['adminEmail'],
            'phone' => $row['adminPhone']
        
        );
        
        header("Location: ../update_admin_profile.php?m=success#login-area");
        
    }else{
        header("Location: ../update_admin_profile.php?m=fail#login-area");
    }
    
}else{
    header("Location: ../update_admin_profile.php?m=notmatch#login-area");
}

?>