<?php

require("db_connect.php");

session_start();
$subjectCode = $_POST['subjectCode'];
$adminPassword = md5($_POST['adminPassword']);
$adminId = $_SESSION['user-info']['id'];

$result = mysqli_query($con,
						"SELECT adminPassword
						FROM admin
						WHERE adminId = '$adminId';");

$row = mysqli_fetch_array($result);

if($adminPassword == $row['adminPassword']){
	$result = mysqli_query($con,
							"SELECT subjectCode
							FROM subject
							WHERE subjectCode = '$subjectCode';");

	$row = mysqli_fetch_array($result);



	if($subjectCode == $row['subjectCode']){
			$result = mysqli_query($con,
						"DELETE FROM subject
						WHERE subjectCode = '$subjectCode';");

			$result_1 = mysqli_query($con,
									"DELETE FROM subject_register
									WHERE subjectCode = '$subjectCode';");


			$result_2 = mysqli_query($con,
									"DROP TABLE $subjectCode;");


			if($result && $result_1 && $result_2){
				header("Location: ../delete_subject.php?m=success#login-area");
			}else{
				header("Location: ../delete_subject.php?m=fail#login-area");
			}

			
	}else{
		header("Location: ../delete_subject.php?m=stnot#login-area");
	}


}else{
	header("Location: ../delete_subject.php?m=pnot#login-area");
}
?>