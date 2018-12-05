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
                    <li><a href="add_student.php">Add Student</a></li>
                    <li ><a href="add_teacher.php">Add Teacher</a></li>
                    <li class="current"><a href="add_subject.php">Add Subject</a></li>
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
            <h1>Add Subject</h1>
            
            <div id="success">

                <?php
                
                if(!empty($_GET['m'])){
                        
                    if($_GET['m'] == 'success'){
                        echo "<img src=./images/success.png> Registered Successfully.";
                    }else if($_GET['m'] == 'scexist'){
                        echo "<img src=./images/monocle.png> Subject Code Already Registered.";
                    }else if($_GET['m'] == 'snexist'){
                        echo "<img src=./images/monocle.png> Subject Name Already Registered.";
                    }else if($_GET['m'] == 'notexist'){
                        echo "<img src=./images/monocle.png> Teacher is not registered.";
                    }else{
                        echo "<img src=./images/error.png> Registration Failed";
                    }

                }
                
                ?>
            </div>
            
            
            <form method="post" action="./PHP/add_subject.php">

                <div>
                    <label>Subject Name</label>
                    <input type="text" name="subjectName" placeholder="Enter full name of subject" required>
                </div>

                <div>
                    <label>Subject Code</label>
                    <input type="text" name="subjectCode" placeholder="Format:CS3001" required>
                </div>
                
                <div>
                    <label>Teacher Id</label>
                    <input type="text" name="teacherId" placeholder="Enter the teacher Id" required>
                </div>

                <button type="submit">Register</button>
            </form>


            <aside class="dark">
                <p>
                    We are aiming to provide you the ease of taking and managing the attendance.We are happy that you are using our system.
                </p>
            </aside>

            <section id="delete">

                <form method="post" action="update_subject.php#login-area">
                    <button>Update Subject</button>
                </form>

                <form method="post" action="delete_subject.php#login-area">
                    <button>Delete Subject</button>
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
