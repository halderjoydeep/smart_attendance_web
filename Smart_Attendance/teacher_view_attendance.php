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
                    <li ><a href="teacher_profile.php">Profile</a></li>
                </ul>
            </nav>
        </div>
    </header>


    <section id="showcase">
        <div class="container">
            <h1>Redifining The<br>Traditional Attendance System.<br>Save Paper, Go Digital</h1>
        </div>
    </section>
    
    <section id="profile-area">
        <div class="container">

          <div class="profile-information">
               <h1>Subject Code:
               <span>
                   <?php
                    echo $_SESSION['subjectCode'];
                    ?>
               </span>
            </h1>
           </div>
          
          <div class="profile-information">
               <h1>Roll No:
               <span>
                   <?php
                    echo $_SESSION['studentRoll'];
                    ?>
               </span>
            </h1>
           </div>
           
           <div class="profile-information">
               <h1>Name:
               <span>
                   <?php
                    echo $_SESSION['studentName'];
                    ?>
               </span>
            </h1>
           </div>
           
           <div class="profile-information">
               <h1>Email:
               <span>
                   <?php
                    echo $_SESSION['studentEmail'];
                    ?>
               </span>
               
            </h1>
           </div>
           
           <div class="profile-information">
               <h1>Mobile:
               <span>
                   <?php
                    echo $_SESSION['studentPhone'];
                    ?>
               </span>
               
            </h1>
           </div>

           <div class="profile-information">
               <h1>Total Attendance:
               <span>
                   <?php
                    echo $_SESSION['totalAttendance'];
                    ?>
               </span>
               
            </h1>
           </div>

           <div class="profile-information">
               <h1>Total Class:
               <span>
                   <?php
                    echo $_SESSION['totalClass'];
                    ?>
               </span>
               
            </h1>
           </div>

           <div class="profile-information">
               <h1>Percentage:
               <span>
                   <?php
                    echo round($_SESSION['percentage'],2)." %";
                    ?>
               </span>
               
            </h1>
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
