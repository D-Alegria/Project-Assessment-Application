<?php 

            include_once('models/Project.php');
          session_start();
    
           include('config/connect.php');

            $database = new Database();
            $db =$database->connect();
         
            $projectlist = new Project($db);
            $projectlist->admin_id = "DEOL1234";
            $projectlist->getAllProjects();

        ?>