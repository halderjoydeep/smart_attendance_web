<?php

require("db_connect.php");

session_start();
$teacherId = $_POST['teacherId'];
$adminPassword = md5($_POST['adminPassword']);
$adminId = $_SESSION['user-info']['id'];

$result = mysqli_query($con,
						"SELECT adminPassword
						FROM admin
						WHERE adminId = '$adminId';");

$row = mysqli_fetch_array($result);

if($adminPassword == $row['adminPassword']){
	$result = mysqli_query($con,
							"SELECT teacherId
							FROM teacher
							WHERE teacherId = '$teacherId';");

	$row = mysqli_fetch_array($result);


	if($teacherId == $row['teacherId']){

			$result = mysqli_query($con,
						"DELETE FROM teacher
						WHERE teacherId = '$teacherId';");

			$result_1 = mysqli_query($con,
						"UPDATE subject
						SET teacherId = Null
						WHERE teacherId = '$teacherId';");

			if($result && $result_1){
				header("Location: ../delete_teacher.php?m=success#login-area");
			}else{
				header("Location: ../delete_teacher.php?m=fail#login-area");
			}

			
	}else{
		header("Location: ../delete_teacher.php?m=stnot#login-area");
	}


}else{
	header("Location: ../delete_teacher.php?m=pnot#login-area");
}
?>