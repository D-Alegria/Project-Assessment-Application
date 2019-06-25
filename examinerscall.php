<?php 

include_once('models/Admin.php');
          session_start();
    
           include('config/connect.php');

            $database = new Database();
            $db =$database->connect();
         
            $examiner = new Admin($db);

            $examiner -> getAllAdmins();
            
            // die();
        
?>
