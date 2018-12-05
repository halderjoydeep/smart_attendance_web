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
							"SELECT * 
							FROM subject
							WHERE subjectCode = '$subjectCode';");
	$row = mysqli_fetch_array($result);

	if($subjectCode == $row['subjectCode']){

		$subjectName = $row['subjectName'];
		$teacherId = $row['teacherId'];

		if(!empty($_POST['subjectName'])){
			$subjectName = $_POST['subjectName'];
		}

		if(!empty($_POST['teacherId'])){
			$teacherId = $_POST['teacherId'];
		}


		$result = mysqli_query($con,
								"SELECT teacherId
								FROM teacher
								WHERE teacherId = '$teacherId';");

		$row = mysqli_fetch_array($result);

		if($teacherId == $row['teacherId']){
				$result = mysqli_query($con,
								"UPDATE subject
								SET subjectName = '$subjectName', 
								teacherId = '$teacherId'
								WHERE subjectCode = '$subjectCode';");

				if($result){
					header("Location: ../update_subject.php?m=success#login-area");
				}else{
					header("Location: ../update_subject.php?m=fail#login-area");
				}
		}else{
				header("Location: ../update_subject.php?m=tnot#login-area");
		}


		

	}else{
		header("Location: ../update_subject.php?m=stnot#login-area");
	}

}else{
	header("Location: ../update_subject.php?m=pnot#login-area");
}

?>