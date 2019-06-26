<?php 
/*    include_once 'config/connect.php';
    include_once 'models/Student.php';
    include 'validate.php';

    $database = new Database();
    $db = $database->connect();
    $student = new Student($db);
    if (isset($_SESSION['LoggedInUserId'])) {
        session_start();
        $student->admin_id = $_SESSION['LoggedInUserId'];
    }
    
    if(isset($_POST["submit"])){
        if (isset($_SESSION['LoggedInUserId'])) {
            $sname = htmlentities($_POST["sname"]);
            $fname = htmlentities($_POST["fname"]);
            $student->id = createStudentId($fname,$sname);
            $student->name = getName($fname,$sname);

            $student->faculty = htmlentities($_POST["faculty"]);
            $student->department = htmlentities($_POST["department"]);
            $student->project_id = htmlentities($_POST["project"]);
            $student->admin_id = $_SESSION['LoggedInUserId'];
            $student->password = password_hash($sname,PASSWORD_DEFAULT);

            $student->createStudent();
            header("Location: adminstudents.php");   
        }else {
            header("Location: index.php");
        }
    }*/
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="static/css/external.css">
    <link rel="stylesheet" href="static/css/admin.css">
    <script src="static/js/index.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="nav">
            <p class= "title">admin </p><br>
            <p><a href="admindashboard.php">dashboard</a></p>
            <p><a href="adminstudents.php">students</a></p> 
            <p><a href="adminexaminer.php">examiners</a></p>
            <p><a href="adminprojects.php">projects</a></p>
            <p><a href="adminresults.php">results</a></p>
        </div>
        <div class="content">
            <div class="wrapper">
                <h2><p>Student List</p></h2>
                <hr>
                <ul>
                    <?php 
                        include "studentlist.php";
                    ?>
                </ul>
            </div>
            <div class="button">
                <input type="submit" name="add" value="Add" onclick="show('add')">
            </div>
        </div>
    </div>
    <?php include "AEDD.php";?>
</body>
</html>
