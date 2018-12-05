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
                    <li ><a href="student_view_attendance.php">Attendance</a></li>
                    <li class="current"><a href="student_profile.php">Profile</a></li>
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
               <h1>Roll No:
               <span>
                   <?php
                    echo $_SESSION['user-info']['roll'];
                    ?>
               </span>
            </h1>
           </div>
           
           <div class="profile-information">
               <h1>Name:
               <span>
                   <?php
                    echo $_SESSION['user-info']['name'];
                    ?>
               </span>
            </h1>
           </div>
           
           <div class="profile-information">
               <h1>Email:
               <span>
                   <?php
                    echo $_SESSION['user-info']['email'];
                    ?>
               </span>
               
            </h1>
           </div>
           
           <div class="profile-information">
               <h1>Mobile:
               <span>
                   <?php
                    echo $_SESSION['user-info']['phone'];
                    ?>
               </span>
               
            </h1>
           </div>
           
           <form method="post" action="update_student_profile.php#login-area">
               <button type="submit">Update Profile</button>
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
