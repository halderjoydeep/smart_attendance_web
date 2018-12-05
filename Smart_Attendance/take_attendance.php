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
         
         <div id="success" style="margin-top:50px">
                <?php
                
                
                if(!empty($_GET['m'])){
                        
                    if($_GET['m'] == 'success'){
                        echo "<img src=./images/success.png> Submitted Successfully";
                    }else if($_GET['m'] == 'exist'){
                        echo "<img src=./images/monocle.png> Already Submitted";
                    }else{
                        echo "<img src=./images/error.png> Submission Failed";
                    }

                        }
                
                ?>
            </div>
         
         
          <form action="./PHP/take_attendance2.php" method="post">
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
                
                $Date = $_SESSION['Date'];
                $subjectCode = $_SESSION['subjectCode'];

                $result = mysqli_query($con,
                                        "SELECT Distinct studentRoll
                                        FROM subject_register
                                        WHERE subjectCode = '$subjectCode'
                                        ORDER BY (studentRoll);");

                $student_array = array();
                $i=0;
               
               if($result->num_rows>0){
                   while($row = $result->fetch_assoc()){

                        $studentRoll = $row['studentRoll'];

                        $result_1 = mysqli_query($con,
                                                "SELECT studentName
                                                FROM student
                                                WHERE studentRoll='$studentRoll';");
                        $row_1 = mysqli_fetch_array($result_1);

                        $studentName = $row_1['studentName'];

                       echo "<li style=\"margin-bottom: 20px;
                                    font-size: 20px;
                                    background:#ccc;
                                    border: 1px solid #333;
                                    padding: 20px;\">
                                    <label style=font-weight:bold>".$studentRoll."</label>
                                    <input type=radio value=present name=".$studentRoll." required>Present".
                                    "<input type=radio value=absent name=".$studentRoll.">Absent
                                    <label style=float:right>".$studentName."</lable>

                            </li>";
                       
                       if($i<$result->num_rows){
                           $student_array[$i] = $row['studentRoll'];
                           $i++;
                       }
                       
                   }
               }
                  
                  
                  $_SESSION['student_array']  = $student_array;
            
                ?>
               
           </ul>
           
           <button type="submit">Submit</button>
          </form>
                  
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
