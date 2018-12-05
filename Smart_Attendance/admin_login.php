<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendance | Admin</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1><a href="index.php"><span>Smart</span> Attendance</a></h1>
            
            <nav>
                <ul>
                    <li><a href="index.php">Student </a></li>
                    <li><a href="teacher_login.php">Teacher</a></li>
                    <li class="current"><a href="admin_login.php">Admin</a></li>
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
           <h1>Admin Log In</h1>
           
           <div id="wrong">
                   
                    <?php

                        if(!empty($_GET['m'])){
                        echo "<img src=images/error.png> Admin Id or Password is incorrect";

                        }
               
                        session_start();
                        $_SESSION['log-status'] = false;
                    ?>
            </div>
           
           <form method="post" action="./PHP/admin_login.php">
               <div>
                   <label for="adminId">Admin ID</label>
                   <input type="text" name="adminId" placeholder="Enter your Admin ID" required>
               </div>
               
               <div>
                   <label for="adminPassword">Password</label>
                   <input type="password" name="adminPassword" placeholder="Enter your password" required>
               </div>
               
               <button type="submit">Log In</button>
           </form>
           
           <aside class="dark">
               <p>If you want to be Admin then contact with your present Admin.</p>
               <p>Only Admin can add teacher,student and subject.</p>
           </aside>
       </div>
        
    </section>
    
        <footer>
        <p>Smart Attendance, Copyright &copy; 2018</p>
    </footer>
</body>
</html>