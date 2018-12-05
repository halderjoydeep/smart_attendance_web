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
							"SELECT studentRoll
							FROM student
							WHERE studentRoll = '$studentRoll';");

	$row = mysqli_fetch_array($result);


	if($studentRoll == $row['studentRoll']){
			mysqli_query($con,
						"DELETE FROM student
						WHERE studentRoll = '$studentRoll';");

			$result = mysqli_query($con,
									"SELECT subjectCode
									FROM subject_register
									WHERE studentRoll = '$studentRoll';");


			if($result->num_rows>0){
				while($row = $result->fetch_assoc()){

					$subjectCode = $row['subjectCode'];
					mysqli_query($con,
								"ALTER TABLE $subjectCode
								DROP COLUMN $studentRoll;");
				}

				mysqli_query($con,
								"DELETE FROM subject_register
								WHERE studentRoll = '$studentRoll';");
			}

			if($result){
				header("Location: ../delete_student.php?m=success#login-area");
			}else{
				header("Location: ../delete_student.php?m=fail#login-area");
			}

			
	}else{
		header("Location: ../delete_student.php?m=stnot#login-area");
	}


}else{
	header("Location: ../delete_student.php?m=pnot#login-area");
}
?>