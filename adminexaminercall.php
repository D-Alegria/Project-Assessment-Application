<?php 

include_once('models/Examiner.php');
          session_start();
    
           include('config/connect.php');

            $database = new Database();
            $db =$database->connect();
         
            $examinerlist = new Examiner($db);
            $examinerlist->admin_id = "DEOL1234";
            $examinerlist->getAllExaminers();

        ?>
