<?php


require("db_connect.php");

session_start();
$teacherId = $_SESSION['user-info']['id'];

$subjectCode = $_POST['subjectCode'];
$Date = $_POST['Date'];

if(!empty($_POST['multiple'])){
	$multiple = $_POST['multiple'];
	$_SESSION['multiple'] = $multiple;
}

$result = mysqli_query($con,
                      "SELECT teacherId,subjectCode 
                       FROM subject 
                       WHERE subjectCode = '$subjectCode' 
                       AND teacherId = '$teacherId';");

$row = mysqli_fetch_array($result);

if($subjectCode == $row['subjectCode']){

	$result = mysqli_query($con,
							"SELECT Date 
							 FROM $subjectCode
							 WHERE Date = '$Date';");
	$row = mysqli_fetch_array($result);

	if($Date == $row['Date'] && $multiple!="yes"){
		header("Location: ../teacher_attendance.php?m=dnot#take-attendance");
	}else{

		$_SESSION['subjectCode'] = $subjectCode;
    	$_SESSION['Date'] = $Date;
    
    
    	header("Location: ../take_attendance.php#attendance-area");
	}
    
    
    
}else{
    header("Location: ../teacher_attendance.php?m=sbnot#take-attendance");
}

?>