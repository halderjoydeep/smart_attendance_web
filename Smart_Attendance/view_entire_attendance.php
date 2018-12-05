<?php 

session_start();
if($_SESSION['log-status'] == false || $_SESSION['type']!="teacher"){
    header("Location: error.html#breacher-area");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Attendance | <?php
                            echo $_SESSION['user-info']['name'];
        ?>
    </title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <div class="container">
            <h1><a href="index.php"><span>Smart</span> Attendance</a></h1>

            <nav>
                <ul>
                    <li ><a href="enroll_student.php">Enroll Student</a></li>
                    <li class="current"><a href="teacher_attendance.php">Attendance</a></li>
                    <li><a href="teacher_profile.php">Profile</a></li>
                </ul>
            </nav>
        </div>
    </header>


    <section id="showcase">
        <div class="container">
            <h1>Redifining The<br>Traditional Attendance System.<br>Save Paper, Go Digital</h1>
        </div>
    </section>

    <section id="attendance-area">
        <div class="container">

              <ul>
               
                <?php
            
               
                $server_name = "localhost";
                $server_user = "root";
                $server_password = "";
                $db_name = "attendance";
                $con = mysqli_connect($server_name,$server_user,$server_password,$db_name);

                if(!$con){
                    die("<center><h1 style=color:red>Ooops!<br><span style=color:green>Connection Failed.</span><h1><br>
                    <img src=../images/error.png ><center>".mysqli_connect_error());
                }
                
                $subjectCode = $_SESSION['subjectCode'];

                $result_1 = mysqli_query($con,
                                                "SELECT COUNT(Date) AS totalClass
                                                FROM $subjectCode;");

                $row_1 = mysqli_fetch_array($result_1);
                $totalClass = $row_1['totalClass'];

                echo "<div><h2>".$subjectCode.": Total ".$totalClass." classes</h2></div>";


                $result = mysqli_query($con,
                                        "SELECT Distinct studentRoll
                                        FROM subject_register
                                        WHERE subjectCode = '$subjectCode'
                                        ORDER BY (studentRoll);");
               if($result->num_rows>0){
                   while($row = $result->fetch_assoc()){

                        $studentRoll = $row['studentRoll'];

                        $result_1 = mysqli_query($con,
                                                "SELECT studentName
                                                FROM student
                                                WHERE studentRoll='$studentRoll';");
                        $row_1 = mysqli_fetch_array($result_1);

                        $studentName = $row_1['studentName'];

                        $result_1 = mysqli_query($con,
                                                "SELECT COUNT($studentRoll) AS totalAttendance
                                                FROM $subjectCode
                                                WHERE $studentRoll = 'present';");
                        $row_1 = mysqli_fetch_array($result_1);

                        $totalAttendance = $row_1['totalAttendance'];

                        

                        $percentage = 0;

                        
                        if($totalClass!=0 && $totalAttendance!=0){
                            $percentage = ($totalAttendance/$totalClass)*100;
                        }

                       echo "<li style=\"margin-bottom: 20px;
                                    font-size: 20px;
                                    background:#ccc;
                                    border: 1px solid #333;
                                    padding: 20px;\">

                                    <style>
                                    .report li{
                                        display: inline-block;
                                    }
                                    .report li a{
                                        padding: 0 100px;
                                        color: black;
                                        font-weight: bold;
                                    }

                                    </style>
                                    
                                    <ul class=report>
                                    <li ><a >".$studentRoll."</a></li>
                                    <li><a>".$totalAttendance." class</a></li>
                                    <li><a>".$percentage."%</a></li>
                                    <li><a>".$studentName."</a></li>
                                    </ul>

                            </li>";
                       
                   }
               }
                  
                  
                 
            
                ?>
               
           </ul>
                  
        </div>

    </section>
    
    <form method="post" action="log_out.php">
        <button id="float-button">Log Out</button>
    </form>
    
    
    <footer>
        <p>Smart Attendance, Copyright &copy; 2018</p>
    </footer>
</body>

</html>
