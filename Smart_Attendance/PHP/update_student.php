<?php

require("db_connect.php");

session_start();
$studentRoll = $_POST['studentRoll'];
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
							FROM student
							WHERE studentRoll = '$studentRoll';");
	$row = mysqli_fetch_array($result);

	if($studentRoll == $row['studentRoll']){

		$studentName = $row['studentName'];
		$studentEmail = $row['studentEmail'];
		$studentPhone = $row['studentPhone'];
		$studentPassword = $row['studentPassword'];

		if(!empty($_POST['studentName'])){
			$studentName = $_POST['studentName'];
		}

		if(!empty($_POST['studentEmail'])){
			$studentEmail = $_POST['studentEmail'];
		}

		if(!empty($_POST['studentPhone'])){
			$studentPhone = $_POST['studentPhone'];
		}

		if(!empty($_POST['studentPassword'])){
			$studentPassword = md5($_POST['studentPassword']);
		}


		$result = mysqli_query($con,
								"SELECT studentEmail
								FROM student
								WHERE studentEmail = '$studentEmail' AND studentRoll != '$studentRoll';");

		$row = mysqli_fetch_array($result);

		if($studentEmail != $row['studentEmail']){
				$result = mysqli_query($con,
								"UPDATE student
								SET studentName = '$studentName', 
								studentEmail = '$studentEmail',
								studentPhone = '$studentPhone',
								studentPassword = '$studentPassword'
								WHERE studentRoll = '$studentRoll';");

				if($result){
					header("Location: ../update_student.php?m=success#login-area");
				}else{
					header("Location: ../update_student.php?m=fail#login-area");
				}
		}else{
				header("Location: ../update_student.php?m=emlexist#login-area");
		}


		

	}else{
		header("Location: ../update_student.php?m=stnot#login-area");
	}

}else{
	header("Location: ../update_student.php?m=pnot#login-area");
}

?>