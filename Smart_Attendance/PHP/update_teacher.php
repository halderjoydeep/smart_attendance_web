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
							"SELECT * 
							FROM teacher
							WHERE teacherId = '$teacherId';");
	$row = mysqli_fetch_array($result);

	if($teacherId == $row['teacherId']){

		$teacherName = $row['teacherName'];
		$teacherEmail = $row['teacherEmail'];
		$teacherPhone = $row['teacherPhone'];
		$teacherPassword = $row['teacherPassword'];

		if(!empty($_POST['teacherName'])){
			$teacherName = $_POST['teacherName'];
		}

		if(!empty($_POST['teacherEmail'])){
			$teacherEmail = $_POST['teacherEmail'];
		}

		if(!empty($_POST['teacherPhone'])){
			$teacherPhone = $_POST['teacherPhone'];
		}

		if(!empty($_POST['teacherPassword'])){
			$teacherPassword = md5($_POST['teacherPassword']);
		}


		$result = mysqli_query($con,
								"SELECT teacherEmail
								FROM teacher
								WHERE teacherEmail = '$teacherEmail' AND teacherId != '$teacherId';");

		$row = mysqli_fetch_array($result);

		if($teacherEmail != $row['teacherEmail']){
				$result = mysqli_query($con,
								"UPDATE teacher
								SET teacherName = '$teacherName', 
								teacherEmail = '$teacherEmail',
								teacherPhone = '$teacherPhone',
								teacherPassword = '$teacherPassword'
								WHERE teacherId = '$teacherId';");

				if($result){
					header("Location: ../update_teacher.php?m=success#login-area");
				}else{
					header("Location: ../update_teacher.php?m=fail#login-area");
				}
		}else{
				header("Location: ../update_teacher.php?m=emlexist#login-area");
		}


		

	}else{
		header("Location: ../update_teacher.php?m=stnot#login-area");
	}

}else{
	header("Location: ../update_teacher.php?m=pnot#login-area");
}

?>