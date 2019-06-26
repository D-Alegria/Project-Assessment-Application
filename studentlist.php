<?php 
include_once('validate.php');
include_once('models/Student.php');
          session_start();
    
           include('config/connect.php');

            $database = new Database();
            $db =$database->connect();
         
            $Student = new Student($db);
            $Student->admin_id = $_SESSION["LoggedInUserId"];//"DEOL1234";
            $Student->getAllStudents();
            
            if(isset($_POST["add"])){
                if (isset($_SESSION['LoggedInUserId'])) {
                    $sname = htmlentities($_POST["sname"]);
                    $fname = htmlentities($_POST["fname"]);
                
                    $Student->id= createStudentId($fname,$sname);
                    $Student->name = getName($fname,$sname);        
                    $Student->faculty = htmlentities($_POST["faculty"]);
                    $Student->department = htmlentities($_POST["department"]);
                    $Student->project_id = htmlentities($_POST["project"]);
                    $Student->admin_id = $_SESSION['LoggedInUserId'];
                    $Student->password = password_hash($sname,PASSWORD_DEFAULT);
        
                    $Student->createStudent();
                    header("Location: adminstudents.php");   
                }else {
                    header("Location: index.php");
                }
            }

            if(isset($_POST["edit"])){
                if (isset($_SESSION['LoggedInUserId'])) {
                    
                    $sname = htmlentities($_POST["sname"]);
                    $fname = htmlentities($_POST["fname"]);
                
                    $Student->id= createStudentId($fname,$sname);
                    $Student->name = getName($fname,$sname);        
                    $Student->faculty = htmlentities($_POST["faculty"]);
                    $Student->department = htmlentities($_POST["department"]);
                    $Student->project_id = htmlentities($_POST["project"]);
                    $Student->admin_id = $_SESSION['LoggedInUserId'];
                    $Student->password = password_hash($sname,PASSWORD_DEFAULT);
        
                    $Student->createStudent();
                    header("Location: adminstudents.php");   
                }else {
                    header("Location: index.php");
                }
            }
        
        ?>