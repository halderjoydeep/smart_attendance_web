<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Attendance | Teacher</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <div class="container">
            <h1><a href="index.php"><span>Smart</span> Attendance</a></h1>

            <nav>
                <ul>
                    <li><a href="index.php">Student </a></li>
                    <li class="current"><a href="teacher_login.php">Teacher</a></li>
                    <li><a href="admin_login.php">Admin</a></li>
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
            <h1>Teacher Log In</h1>
            
            <div id="wrong">
                   
                   
                    <?php

                        if(!empty($_GET['m'])){
                        echo "<img src=images/error.png> Teacher Id or Password is incorrect";
                        }
                
                        session_start();
                        $_SESSION['log-status'] = false;
                    ?>
            </div>

            <form method="post" action="./PHP/teacher_login.php">
                <div>
                    <label>Teacher ID</label>
                    <input type="text" name="teacherId" placeholder="Enter your teacher ID" required>
                </div>

                <div>
                    <label>Password</label>
                    <input type="password" name="teacherPassword" placeholder="Enter your password" required>
                </div>

                <button type="submit">Log In</button>
            </form>

            <aside class="dark">
                <p>If you are not registered yet, then contact the admin to be registered.</p>
                <p>Change your password which is given initially to you as soon as possible.</p>
                <p>If you still face any trouble to log in,then contact the admin.</p>
            </aside>
        </div>

    </section>
        <footer>
        <p>Smart Attendance, Copyright &copy; 2018</p>
    </footer>
</body>

</html>
