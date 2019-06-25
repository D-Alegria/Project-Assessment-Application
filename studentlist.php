<?php 

include_once('models/Student.php');
          session_start();
    
           include('config/connect.php');

            $database = new Database();
            $db =$database->connect();
         
            $Student = new Student($db);
            $Student->admin_id = $_SESSION["LoggedInUserId"];//"DEOL1234";
            $Student -> getAllStudents();
            
            // die();
        
        ?>