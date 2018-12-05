<?php 

session_start();
if($_SESSION['log-status'] == false || $_SESSION['type']!="admin"){
    header("Location: error.html#breacher-area");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Attendance |
        <?php
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
                    <li class="current"><a href="add_student.php">Add Student</a></li>
                    <li><a href="add_teacher.php">Add Teacher</a></li>
                    <li><a href="add_subject.php">Add Subject</a></li>
                    <li><a href="admin_profile.php">Profile</a></li>
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
            <h1>Add Student</h1>

            <div id="success">

                <?php

                    if (!empty($_GET['m'])) {
                        if($_GET['m'] == 'success'){
                                echo "<img src=./images/success.png> Registered Successfully";
                        }else if($_GET['m'] == 'stexist'){
                                echo "<img src=./images/error.png> Student Already Registered";
                        }elseif ($_GET['m'] == 'emlexist') {
                                echo "<img src=./images/monocle.png> Email Already Registered";
                        }else{
                                echo "<img src=./images/error.png> Registration Failed";
                        }

                    }
                    
                    
                
                ?>
            </div>


            <form method="post" action="./PHP/add_student.php">


                <div>
                    <label>Student Name</label>
                    <input type="text" name="studentName" placeholder="Enter full name of student" required>
                </div>

                <div>
                    <label>Roll No</label>
                    <input type="text" name="studentRoll" placeholder="Format:B160042" required>
                </div>

                <div>
                    <label>Email</label>
                    <input type="email" name="studentEmail" placeholder="College email address" required>
                </div>

                <div>
                    <label>Mobile No</label>
                    <input type="text" name="studentPhone" placeholder="Enter the mobile no" required>
                </div>

                <div>
                    <label>Password</label>
                    <input type="password" name="studentPassword" placeholder="Enter the password" required>

                </div>
                <button type="submit">Register</button>


            </form>


            <aside class="dark">
                <p>Carefully fill the details of the students.</p>
                <p>Email address of the students must be unique.</p>
                <p>Initially give a password to the students.They will change it later.</p>
            </aside>

            <section id="delete">

                <form method="post" action="update_student.php#login-area">
                    <button>Update Student</button>
                </form>

                <form method="post" action="delete_student.php#login-area">
                    <button>Delete Student</button>
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
