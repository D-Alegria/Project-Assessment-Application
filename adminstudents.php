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
                <input type="button" name="add" value="Add" onclick="show()">
            </div>
        </div>
    </div>
    <div class="add" id="add">
        <div class="wrap">
            <h2><p>New Student</p></h2>
            <hr>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
                <p class = "wrap-input"><input type="text" name="sname" id="sname" placeholder="Last Name"></p>
                <p class = "wrap-input"><input type="text" name="fname" id="fname" placeholder="First Name"></p>
                <p class = "wrap-input"><input type="text" name="faculty" id="faculty" placeholder= "Faculty"></p>
                <p class = "wrap-input"><input type="text" name="department" id="department" placeholder="Department"></p>
                <p class = "wrap-input">
                    <select name="project" id="">
                        <option value="Project 1">Project 1</option>
                        <option value="Project 2">Project 2</option>
                        <option value="Project 2">Project 3</option>
                    </select>
                </p>
                <p class = "wrap-input"><input type="submit" name="submit" id="submit" value="Submit" onclick="hide()"></p>
            </form>
        </div>
    </div>
</body>
</html>
