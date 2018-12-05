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
                    <li class="current"><a href="enroll_student.php">Enroll Student</a></li>
                    <li><a href="teacher_attendance.php">Attendance</a></li>
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
            <h1>Remove Student</h1>
            
            <div id="wrong">
                <?php
                
                
                if(!empty($_GET['m'])){
                        
                    if($_GET['m'] == 'success'){
                        echo "<img src=./images/success.png> <span style=color:green>Removed Successfully</span>";
                    }else if($_GET['m'] == 'pnot'){
                        echo "<img src=./images/monocle.png> Wrong password";
                    }else if($_GET['m'] == 'stnot'){
                        echo "<img src=./images/monocle.png> Student not registered yet.";
                    }else if($_GET['m'] == 'sbnot'){
                        echo "<img src=./images/monocle.png> Subject is not registered to you.";
                    }else {
                        echo "<img src=./images/error.png> Registration Failed";
                    }

                        }
                
                ?>
            </div>
            
            
            <form method="post" action="./PHP/remove_student.php">

                <div>
                    <label>Roll No</label>
                    <input type="text" name="studentRoll" placeholder="Format: B160042" required>
                </div>
                
                <div>
                    <label>Subject Code</label>
                    <input type="text" name="subjectCode"
                    placeholder="Enter Subject Code" required>
                </div>

                <div>
                    <label>Teacher Password</label>
                    <input type="password" name="teacherPassword"
                    placeholder="Enter your Password" required>
                </div>

                
                <button type="submit">Remove</button>


            </form>


            <aside class="dark">
                <p>Be careful about deletion.All the attendances of the student will be deleted.</p>
                <p>Please make sure you really want to delete</p>
            </aside>

            <section id="delete">

                <form method="post" action="enroll_student.php#login-area">
                    <button>Enroll Student</button>
                </form>

                

            </section>
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
