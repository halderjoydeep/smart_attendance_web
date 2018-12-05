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
                    <li><a href="add_student.php">Add Student</a></li>
                    <li><a href="add_teacher.php">Add Teacher</a></li>
                    <li><a href="add_subject.php">Add Subject</a></li>
                    <li class="current"><a href="admin_profile.php">Profile</a></li>
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
            <h1>Update Profile</h1>

            <div id="success">
                <?php
                
                
                if(!empty($_GET['m'])){
                        
                    if($_GET['m'] == 'success'){
                        echo "<img src=./images/success.png> Updated Successfully";
                    }else if($_GET['m'] == 'notmatch'){
                        echo "<img src=./images/error.png> Current password is wrong";
                    }else{
                        echo "<img src=./images/error.png> updation Failed";
                    }

                        }
                
                ?>
            </div>


            <form method="post" action="./PHP/update_admin_profile.php">


                <div>
                    <label>Name</label>
                    <input type="text" name="adminName" placeholder="Enter full your full name" required>
                </div>


                <div>
                    <label>Email</label>
                    <input type="email" name="adminEmail" placeholder="Enter your email" required>
                </div>

                <div>
                    <label>Mobile No</label>
                    <input type="text" name="adminPhone" placeholder="Enter mobile no" required>
                </div>

                <div>
                    <label>Current Password</label>
                    <input type="password" name="adminOldPassword" placeholder="Enter current password" required>
                </div>

                <div>
                    <label>New Password</label>
                    <input type="password" name="adminNewPassword" placeholder="Enter new password" required>

                </div>
                <button type="submit">Update</button>


            </form>


            <aside class="dark">
                <p>Please fill all the fileds.</p>
                <p>If you don't want to change some field, fill them up with current data</p>
                <p>Remember your new password very carefully.It is very important.</p>

            </aside>
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
