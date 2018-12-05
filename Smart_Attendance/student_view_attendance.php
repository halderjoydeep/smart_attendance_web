<?php 

session_start();
if($_SESSION['log-status'] == false || $_SESSION['type']!="student"){
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
                    <li class="current"><a href="student_view_attendance.php">Attendance</a></li>
                    <li><a href="student_profile.php">Profile</a></li>
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

            
            <div id="student-view-attendance">
                <h1>View Attendance</h1>

                <div id="success">

                <?php
                
                
                if(!empty($_GET['m'])){
                        
                    if($_GET['m'] == 'sbnot'){
                        echo "<img src=./images/monocle.png> Subject is not registered to you";
                    }

                }

                
                ?>
               </div>

                <form method="post" action="./PHP/student_view_attendance.php">
                    <div>
                        <label>Subject Code</label>
                        <input type="text" name="subjectCode" placeholder="Format: CS3001" required>
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
