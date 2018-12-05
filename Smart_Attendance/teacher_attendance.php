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
                    <li><a href="enroll_student.php">Enroll Student</a></li>
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

    <section id="login-area">
        <div class="container">
            <div id="take-attendance">
               <h1>Take Attendance</h1>

               <div id="success">

                <?php
                
                
                if(!empty($_GET['m'])){
                        
                    if($_GET['m'] == 'sbnot'){
                        echo "<img src=./images/monocle.png> Subject is not registered to you.";
                    }elseif ($_GET['m'] == 'dnot') {
                        echo "<img src=./images/monocle.png> Attendance already taken.
                        ";
                    }

                }

                
                ?>
               </div>

                <form action="./PHP/take_attendance.php" method="post">


                    <?php

                        if(!empty($_GET['m'])){
                            if($_GET['m'] == 'dnot'){
                                echo "<div><ul><li><input style=\"width:5%; padding:0;margin-bottom:10px;margin-left:0\" type=checkbox name=multiple value=yes>Take multiple attendance</li></ul></div>";
                            }
                        }
                    ?>
                    <div>
                        <label>Subject Code</label>
                        <input type="text" name="subjectCode" placeholder="Format:CS3001" required>
                    </div>
                    <div>
                        <label>Date</label>
                        <input type="date" name="Date" required>
                    </div>
                    
                    <button type="submit">Take Attendance</button>
                </form>
            </div>




            <!-- View Attendance Section -->
            
            <div id="teacher-view-attendance">
                <h1>View Attendance</h1>

                <div id="success">

                <?php
                
                
                if(!empty($_GET['s'])){
                        
                    if($_GET['s'] == 'sbnot'){
                        echo "<img src=./images/monocle.png> Subject is not registered to you";
                    }elseif ($_GET['s'] == 'stnot') {
                        echo "<img src=./images/monocle.png> Student is not registered to the Subject"; 
                    }

                }

                
                ?>
               </div>

                <form method="post" action="./PHP/view_attendance.php">
                    <div>
                        <label>Subject Code</label>
                        <input type="text" name="subjectCode" placeholder="Format: CS3001" required>
                    </div>
                    <div>
                        <label>Student Roll</label>
                        <input type="text" name="studentRoll" placeholder="Format: B160042">
                    </div>             
                    
                    <button type="submit">View Attendance</button>
                </form>
            </div>
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
