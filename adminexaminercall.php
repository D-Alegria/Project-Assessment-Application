<?php 

include_once('models/Examiner.php');
          session_start();
    
           include('config/connect.php');

            $database = new Database();
            $db =$database->connect();
         
            $examiner = new Examiner($db);
            $examiner->admin_id = "DEOL1234";
            $examiner->getAllExaminers();

            if(isset($_POST["add"])){
                if (isset($_SESSION['LoggedInUserId'])) {
                    $sname = htmlentities($_POST["sname"]);
                    $fname = htmlentities($_POST["fname"]);
                
                    $examiner->id= createExaminerId($fname,$sname);
                    $examiner->name = getName($fname,$sname);        
                    $examiner->faculty = htmlentities($_POST["faculty"]);
                    $examiner->department = htmlentities($_POST["department"]);
                    $examiner->admin_id = $_SESSION['LoggedInUserId'];
                    $examiner->password = password_hash($sname,PASSWORD_DEFAULT);
        
                    $examiner->createexaminer();
                    header("Location: adminexaminer.php");   
                }else {
                    header("Location: index.php");
                }
            }
            
            if(isset($_POST["edit"])){
                if (isset($_SESSION['LoggedInUserId'])) {
                    $sname = htmlentities($_POST["sname"]);
                    $fname = htmlentities($_POST["fname"]);
                
                    $Examiner->id= createExaminerId($fname,$sname);
                    $Examiner->name = getName($fname,$sname);        
                    $Examiner->faculty = htmlentities($_POST["faculty"]);
                    $Examiner->department = htmlentities($_POST["department"]);
                    $Examiner->project_id = htmlentities($_POST["project"]);
                    $Examiner->admin_id = $_SESSION['LoggedInUserId'];
                    $Examiner->password = password_hash($sname,PASSWORD_DEFAULT);
        
                    $Examiner->createExaminer();
                    header("Location: adminstudents.php");   
                }else {
                    header("Location: index.php");
                }
            }

        ?>