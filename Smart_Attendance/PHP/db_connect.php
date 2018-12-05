<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connection Failed</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
   
   <header>
        <div class="container">
            <h1><span>Smart</span> Attendance</h1>
            
            <nav>
                <ul>
                    <li class="current"><a href="../index.php">Student </a></li>
                    <li><a href="../teacher_login.php">Teacher</a></li>
                    <li><a href="../admin_login.php">Admin</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <?php


        $server_name = "localhost";
        $server_user = "root";
        $server_password = "";
        $db_name = "attendance";

        $con = mysqli_connect($server_name,$server_user,$server_password,$db_name);

        if(!$con){
            die("<center><h1 style=color:red>Ooops!<br><span style=color:green>Connection Failed.</span><h1><br>
            <img src=../images/error.png ><center>".mysqli_connect_error());
        }


        ?>
    </div>
    
</body>
</html>



